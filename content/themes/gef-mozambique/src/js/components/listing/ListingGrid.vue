<template>
  <div
    class="listing-grid"
    :class="`listing-grid--${postType}`"
  >
    <div class="listing-grid__header">
      <div class="listing-grid__filters">
        <button
        v-if="activeTermsCount !== 0"
        class="listing_text-button"
        @click="clearActiveTerms"
        >
          {{ $t( 'common.clear' )}}
        </button>

        <listing-drawer
          v-if="filters.length"
          v-bind="{
            activeTermsCount,
            filters
          }"
          @filterSelected="onFilterSelected()"
        />
      </div>
    </div>

    <div class="listing-grid__body">
      <div
        v-if="posts.length"
        class="listing-grid__content"
      >
        <listing-cards
          v-bind="{
            modal,
            modalID,
            posts,
            postType: postSingular
          }"
          @onCardClicked="updateActivePost"
        />

        <observer v-on:intersect="intersected" />
      </div>

      <div
        v-else
        class="listing-grid__content listing-grid__content--empty"
      >
        <p
          v-if="!isFetching"
          class="listing-grid___empty-message"
        >
          {{ $t('common.no_results_found') }}
        </p>
      </div>

      <div
        v-if="isFetching"
        class="listing-grid__loader"
      >
        <Loader />
      </div>

      <listing-modal
        v-if="modal && posts.length"
        v-bind="{
          id: modalID,
          post: activePost
        }"
      />
    </div>
  </div>
</template>

<script>
import ListingCards from './ListingCards.vue'
import ListingDrawer from './ListingDrawer.vue'
import ListingModal from '../listing/ListingModal.vue'
import Loader from '../../icons/IconLoader.vue'
import Observer from '../utilities/Observer.vue'

export default {
  name: 'ListingGrid',

  components: {
    ListingCards,
    ListingDrawer,
    ListingModal,
    Loader,
    Observer
  },

  props: {
    postType: {
      type: String,
      required: true
    },
    postSingular: {
      type: String,
      required: true
    },
    termId: {
      type: String,
      default: undefined
    },
    termLabel: {
      type: String,
      default: undefined
    },
    modal: {
      type: Boolean,
      default: false
    }
  },

  mounted() {
    this.getFilters()

    if (this.termLabel) {
      this.$store.commit('updatePreselectedTerm', {
        filter: this.termLabel,
        term_id: this.termId
      })
    } else {
      this.getPosts()
    }

    this.$eventHub.$on('termsUpdated', (filter, checkedTerms) => {
      this.$set(this.activeTerms, filter, checkedTerms)
    })
  },

  data() {
    return {
      activePost: {},
      activeTerms: {},
      config: {
        byStartDateBaseUrl: '/wp-json/gef-mozambique/v1/posts-by-start-date?_embed&post_type=',
        filtersBaseURL: '/wp-json/gef-mozambique/v1/list-filters',
        postsBaseUrl: '/wp-json/wp/v2/'
      },
      filters: [],
      isLoading: true,
      isFetching: false,
      maxPosts: 1,
      page: 1,
      perPage: 8,
      posts: []
    }
  },

  computed: {
    activeTermsCount() {
      let amount = 0
      for (const term in this.activeTerms) {
        amount += this.activeTerms[term].length
      }
      return amount
    },

    filtersURL() {
      let requestURL = this.config.filtersBaseURL + '?post_type=' + this.postSingular

      return encodeURI(requestURL)
    },

    modalID() {
      return String(this._uid)
    },

    postsParams() {
      let params = {
        'page': this.page,
        'per_page': this.perPage
      }

      Object.keys(this.activeTerms).forEach(term => {
        if (this.activeTerms[term].length > 0) {
          params[term] = this.activeTerms[term].join()
        } else {
          delete params[term]
        }
      });

      return params
    },

    viewAllText () {
      const pluralPostName = this.postType === 'posts'
        ? 'news'
        : this.postSingular + 's'
      return `${this.$t('common.view_all')} ${this.$t('post_types')[pluralPostName]}`
    }
  },

  watch: {
    activeTerms: {
      handler() {
        this.posts = []
        this.maxPosts = 1
        this.page = 1;
        this.getPosts()
      },
      deep: true
    }
  },

  methods: {
    clearActiveTerms() {
      window.history.replaceState({}, document.location.origin, document.location.pathname);
      this.activeTerms = {}
      this.$eventHub.$emit('clearCheckedTerms')
    },

    getFilters() {
      axios.get(this.filtersURL)
      .then((response) => {
        const newFilters = this.updateFiltersTaxonomyName(response.data.filters, 'category', 'categories')
        this.filters = this.getFiltersWithTerms(newFilters).sort(function(a, b) {
          return a.label.toLowerCase().localeCompare(b.label.toLowerCase())
        })
      })
      .catch((error) => {
        console.error(error)
      })
    },

    getFiltersWithTerms(filters) {
      return filters.filter(filter => {
        // check if filter has any terms
        if (filter.terms.length) {
          // Loop through all terms
          const newTerms = filter.terms.filter(term => {
            // Return if term is assigned to at least 1 post
            return term.count
          })

          // If filter has more than 1 term
          if (newTerms.length) {
            // Create copy of term
            const newFilter = filter
            // Update terms with emptys removed
            newFilter.terms = newTerms
            // Return new filter
            return newFilter
          }
        }
      })
    },

    getPosts() {
      if (!this.isFetching && ((this.posts.length < this.maxPosts) || this.isLoading)) {
        this.isFetching = true

        axios.get(this.getPostsURL(), { params: this.postsParams })
        .then((response) => {
          console.log(response);
          this.maxPosts = parseInt(response.headers['x-wp-total'])
          this.totalPostCount = this.maxPosts
          this.page += 1
          this.posts.push(...response.data)
          this.activePost = this.posts[0]
          this.isFetching = false
          this.isLoading = false
        })
        .catch((error) => {
          console.error(error)
          this.isFetching = false
          this.isLoading = false
        })
      }
    },

    getPostsURL() {
      let requestURL = ''

      switch (this.postType) {
        case 'event':
          requestURL = this.config.byStartDateBaseUrl + this.postType
          break;
        case 'public_consultation':
          requestURL = this.config.byStartDateBaseUrl + this.postType
          break;
        default:
          requestURL = this.config.postsBaseUrl + this.postType + '?_embed'
      }

      return encodeURI(requestURL)
    },

    intersected() {
      this.getPosts()
    },

    updateActivePost(id) {
      this.activePost = this.posts[id]
    },

    updateFiltersTaxonomyName(filters, currentName, newName) {
      return filters.map(filter => {
        filter.taxonomy = filter.taxonomy === currentName ? newName : filter.taxonomy
        return filter
      })
    }
  }
}
</script>
