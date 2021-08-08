<template>
  <div
    class="listing-list"
    :class="`listing-list--${postType}`"
  >

    <div class="listing-list__body">
      <div
        v-if="posts.length"
        class="listing-list__content"
      >
        <ul class="listing-list__items">
          <li
            v-for="(post, index) in posts"
            class="listing-list__item"
          >

            <listing-simple
              :id="index"
              :key="post.id"
              :config="post"
              :modal="modal"
              :post-type="postType"
              @onListingClicked="updateActivePost"
            />
          </li>
        </ul>
        <observer v-on:intersect="intersected" />
      </div>

      <div
        v-else
        class="listing-list__content listing-list__content--empty"
      >
        <p
          v-if="!isFetching"
          class="listing-list___empty-message"
        >
          {{ $t('common.no_results_found') }}
        </p>
      </div>

      <div
        v-if="isFetching"
        class="listing-list__loader"
      >
        <Loader />
      </div>

      <listing-modal
        v-if="modal"
        v-bind="{ post: activePost }"
      />
    </div>
  </div>
</template>

<script>
import ListingSimple from './ListingSimple.vue'
import ListingModal from '../listing/ListingModal.vue'
import Loader from '../../icons/IconLoader.vue'
import Observer from '../utilities/Observer.vue'

export default {
  name: 'ListingList',

  components: {
    ListingSimple,
    ListingModal,
    Loader,
    Observer
  },

  props: {
    postType: {
      type: String,
      required: true
    },
    modal: {
      type: Boolean,
      default: false
    }
  },

  created() {
    if (this.postType === 'posts') {
      this.postSingular = 'post'
    } else if (this.postType === 'report_publication') {
      this.postSingular = 'report'
    } else {
      this.postSingular = this.postType
    }
  },

  mounted() {
    this.getPosts()
  },

  data() {
    return {
      activePost: {},
      config: {
        postsBaseUrl: '/wp-json/wp/v2/'
      },
      isLoading: true,
      isFetching: false,
      maxPosts: 1,
      page: 1,
      perPage: 8,
      posts: [],
      postSingular: ''
    }
  },

  computed: {
    postsParams() {
      let params = {
        'page': this.page,
        'per_page': this.perPage
      }

      return params
    }
  },

  methods: {
    getPosts() {
      if (!this.isFetching && ((this.posts.length < this.maxPosts) || this.isLoading)) {
        this.isFetching = true

        console.log('getting posts')
        axios.get(this.getPostsURL(), { params: this.postsParams })
        .then((response) => {
          console.log(response)

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
      let requestURL = this.config.postsBaseUrl + this.postType + '?_embed'

      console.log(encodeURI(requestURL))

      return encodeURI(requestURL)
    },

    intersected() {
      this.getPosts()
    },

    updateActivePost(id) {
      console.log('updating active post');
      this.activePost = this.posts[id]
    }
  }
}
</script>
