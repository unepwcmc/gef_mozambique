<template>
  <div
    class="listing-card listing-card__card--multimedia"
    @click="clickHandler()"
  >
    <div class="listing-card__header">
      <span class="listing-card__badge">
        <component :is="iconName" />
      </span>
      <div class="listing-card__image-wrap">
        <img
          :src="imageUrl"
          :alt="title"
          class="listing-card__image"
        >
      </div>
    </div>
    <div class="listing-card__body">
      <h3 class="listing-card__title">
        {{ title }}
      </h3>
      <p
        class="listing-card__button listing-card__button--arrow"
      >
        {{ $t( 'common.more' ) }}
        <IconAngleRight />
      </p>
    </div>
  </div>
</template>

<script>
  import { decodeString } from '../../helpers/application-helpers.js'
  import IconAngleRight from '../../icons/IconAngleRight.vue'
  import IconVideo from '../../icons/IconVideo.vue'
  import IconImage from '../../icons/IconImage.vue'

  export default {
    name: 'CardMultimedia',

    components: {
      IconAngleRight,
      IconVideo,
      IconImage
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
      modalID: {
        type: String,
        default: undefined
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
      iconName() {
        return `icon-${this.mediaType}`
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

      mediaType() {
        return this.config._embedded['wp:term'][0][0].slug
      },

      title() {
        return this.config.title ? decodeString(this.config.title.rendered) : ''
      }
    },

    methods: {
      clickHandler () {
        this.$eventHub.$emit('modal-open', this.modalID)
        this.$parent.$emit('onCardClicked', this.id)
      }
    }
  }
</script>
