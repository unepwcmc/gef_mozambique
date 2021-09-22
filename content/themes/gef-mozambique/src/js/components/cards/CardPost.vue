<template>
  <div class="listing-card listing-card--post">
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
      <p class="listing-card__date">
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
        class="listing-card__button listing-card__button--arrow"
      >
        {{ $t( 'common.more' ) }}
        <IconAngleRight />
      </p>
      <a
        :href="externalLinkURL"
        class="listing-card__fauxlink"
        :title="title"
        target="_blank"
      >
        {{ $t( 'common.more' ) }}
      </a>
    </div>
  </div>
</template>

<script>
  import { decodeString } from '../../helpers/application-helpers.js'
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
      date() {
        return this.config.ACF && this.config.ACF.date
          ? this.config.ACF.date
          : moment(this.config.date).format('D MMMM YYYY')
      },

      excerpt() {
        return this.config.excerpt.rendered ? decodeString(this.config.excerpt.rendered).substring(0, 80) : ''
      },

      externalLinkURL() {
        return this.config.acf && this.config.acf.external_link_url ? this.config.acf.external_link_url : ''
      },

      imageUrl() {
        return (
          this.config.hasOwnProperty('_embedded') &&
          this.config._embedded.hasOwnProperty('wp:featuredmedia')
        )
          ? this.config._embedded['wp:featuredmedia'][0].source_url
          : this.placeholderImageUrl
      },

      title() {
        return this.config.title ? decodeString(this.config.title.rendered) : ''
      }
    }
  }
</script>
