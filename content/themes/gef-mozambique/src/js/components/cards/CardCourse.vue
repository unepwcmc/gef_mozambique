<template>
  <div
    class="listing-card listing-card--course"
    @click="clickHandler()"
  >
    <div
      v-if="!isResource"
      class="listing-card__header"
    >
      <div class="listing-card__image-wrap">
        <IconCertificate class="listing-card__icon" />
      </div>
    </div>
    <div class="listing-card__body">
      <p
        v-if="date"
        class="listing-card__date"
      >
        {{ date }}
      </p>
      <h3 class="listing-card__title">
        {{ title }}
      </h3>
      <p
        class="listing-card__button listing-card__button--external"
      >
        {{ $t( 'common.explore' )}}
        <IconExternal />
      </p>
      <a
        :href="link"
        class="listing-card__fauxlink"
        :title="title"
        target="_blank"
      >
        {{ $t( 'common.explore' )}}
      </a>
    </div>
  </div>
</template>

<script>
  import { decodeString } from '../../helpers/application-helpers.js'
  import moment from 'moment'
  import IconCertificate from '../../icons/IconCertificate.vue'
  import IconExternal from '../../icons/IconExternal.vue'

  export default {
    name: 'CardCourse',

    components: {
      IconCertificate,
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

    computed: {
      date() {
        return this.config.acf && this.config.acf.date_start ? moment(this.config.acf.date_start).format('D MMMM YYYY') : ''
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

      hrefTarget() {
        return this.externalLinkURL ? '_blank' : '_self'
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
