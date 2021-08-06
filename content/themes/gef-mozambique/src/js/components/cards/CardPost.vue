<template>
  <div
    class="listing-card listing-card--post"
    @click="clickHandler()"
  >
    <div class="listing-card__header">
      <div class="listing-card__image-wrap">
        <img
          class="listing-card__image"
          :src="imageUrl"
          :alt="title"
        >
      </div>
    </div>
    <div class="listing-card__body">
      <p
        v-if="hasDate"
        class="listing-card__date"
      >
        {{ date }}
      </p>
      <h3 class="listing-card__title">
        {{ title }}
      </h3>
      <p
        v-if="excerpt"
        class="listing-card__text"
      >
        {{ excerpt }}
      </p>
      <p
        class="listing-card__button"
      >
        More <!-- To be translated -->
        <IconAngleRight />
      </p>
      <a
        v-if="!modal || (modal && externalLinkURL)"
        :href="link"
        class="listing-card__fauxlink"
        :title="title"
        :target="hrefTarget"
      >
        View More <!-- To be translated -->
      </a>
    </div>
  </div>
</template>

<script>
  import { decodeString } from '../../helpers/application-helpers.js'
  import moment from 'moment'
  import IconAngleRight from '../../icons/IconAngleRight.vue'

  export default {
    name: 'ListingCard',

    components: {
      IconAngleRight
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
        placeholderImageUrl: '/content/themes/ea/dist/img/card-placeholder.png'
      }
    },

    computed: {
      date() {
        if (this.postType === 'event') {
          return this.config.acf && moment(this.config.acf.date_start).format('D MMMM YYYY')
        } else {
          return this.config.ACF && this.config.ACF.date
            ? this.config.ACF.date
            : moment(this.config.date).format('D MMMM YYYY')
        }
      },

      excerpt() {
        return this.config.excerpt.rendered ? decodeString(this.config.excerpt.rendered).substring(0, 80) : ''
      },

      externalLinkURL() {
        return this.config.acf && this.config.acf.external_link_url ? this.config.acf.external_link_url : ''
      },

      imageUrl() {
        if (this.postType == 'casestudy') {
          return this.config.imageUrl
            ? this.config.imageUrl
            : this.placeholderImageUrl
        } else {
          return (
            this.config.hasOwnProperty('_embedded') &&
            this.config._embedded.hasOwnProperty('wp:featuredmedia')
          )
            ? this.config._embedded['wp:featuredmedia'][0].source_url
            : this.placeholderImageUrl
        }
      },

      isResource() {
        return this.postType === 'resource'
      },

      link() {
        return this.externalLinkURL ? this.externalLinkURL : this.config.link
      },

      hasDate() {
        return this.postType == 'post' || this.postType == 'event'
      },

      hrefTarget() {
        return this.externalLinkURL ? '_blank' : '_self'
      },

      resourceType() {
        return this.postType == 'resource' &&
          this.config._embedded['wp:term'].find(term => term[0].taxonomy == 'resource_type') ?
            this.config._embedded['wp:term']
            .find(term => term[0].taxonomy == 'resource_type')[0]
            .slug.replace('-', '_') :
            undefined
      },

      title() {
        return this.config.title ? decodeString(this.config.title.rendered) : ''
      }
    },

    methods: {
      clickHandler () {
        if (this.modal & !this.externalLinkURL) {
          this.$eventHub.$emit('modal-open')
          this.$parent.$emit('onCardClicked', this.id)
        }
      }
    }
  }
</script>
