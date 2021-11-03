<template>
  <div class="listing-simple">
    <div
      v-if="imageUrl"
      class="listing-simple__image-wrap"
    >
      <img
        class="listing-simple__image"
        :src="imageUrl"
        :alt="title"
      >
    </div>
    <h3 class="listing-simple__title">
      {{ title }}
    </h3>
    <p
      v-if="year"
      class="listing-simple__date"
      v-html="$t( 'listing.ratification_year', { year } )"
    >
    <p
      v-if="description"
      class="listing-simple__text"
    >
      {{ description }}
    </p>
    <ul
      v-if="externalLinkURL || hasDownloads"
      class="listing-simple__items"
    >
      <li
        v-if="hasDownloads"
        class="listing-simple__item"
      >
        <button
          class="listing-simple__button"
          @click="clickHandler()"
        >
          {{ $t( 'common.related_documents' )}}
        </button>
      </li>
      <li
        v-if="externalLinkURL"
        class="listing-simple__item"
      >
        <a
          :href="externalLinkURL"
          :title="$t( 'common.explore' )"
          target="_blank"
          class="listing-simple__link listing-simple__link--external"
        >
          {{ $t( 'common.explore' )}}
          <IconExternal />
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
  import { decodeString } from '../../helpers/application-helpers.js'
  import moment from 'moment'
  import IconExternal from '../../icons/IconExternal.vue'

  export default {
    name: 'ListingSimple',

    components: {
      IconExternal
    },

    props: {
      id: {
        type: Number,
        required: true
      },
      config: {
        type: Object,
        default: () => {}
      },
      modal: {
        type: Boolean,
        default: false
      },
      postType: {
        type: String,
        required: true
      }
    },

    data() {
      return {
        placeholderImageUrl: '/content/themes/gef-mozambique/dist/img/card-placeholder.png'
      }
    },

    computed: {
      year() {
        return this.config.acf && this.config.acf.ratification_year ? this.config.acf.ratification_year : ''
      },

      description() {
        return this.config.acf && this.config.acf.description ? decodeString(this.config.acf.description) : ''
      },

      externalLinkURL() {
        return this.config.acf && this.config.acf.external_link_url ? this.config.acf.external_link_url : ''
      },

      hasDownloads() {
        return this.config.acf && this.config.acf.modal_downloads
      },

      // THIS NEXT!
      imageUrl() {
        return (
          this.config.hasOwnProperty('_embedded') &&
          this.config._embedded.hasOwnProperty('wp:featuredmedia')
        )
          ? this.config._embedded['wp:featuredmedia'][0].source_url
          : ''
      },

      title() {
        return this.config.title ? decodeString(this.config.title.rendered) : ''
      }
    },

    methods: {
      clickHandler () {
        this.$eventHub.$emit('modal-open')
        this.$emit('onListingClicked', this.id)
      }
    }
  }
</script>
