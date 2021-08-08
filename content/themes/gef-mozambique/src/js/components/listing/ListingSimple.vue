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
      v-if="hasDate"
      class="listing-simple__date"
    >
      Ratification Year: <strong>{{ date }}</strong>
    </p>
    <p
      v-if="description"
      class="listing-simple__text"
    >
      {{ description }}
    </p>
    <ul class="listing-simple__items">
      <li class="listing-simple__item">
        <button
          class="listing-simple__button"
          @click="clickHandler()"
        >
          Related Documents
        </button>
      </li>
      <li class="listing-simple__item">
        <a
          href="#"
          title="<?php echo $link_text; ?>"
          target="_blank"
          class="listing-simple__link listing-simple__link--external"
        >
          Explore
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
        placeholderImageUrl: '/content/themes/ea/dist/img/card-placeholder.png'
      }
    },

    computed: {
      date() {
        return this.config.acf && this.config.acf.date
          ? this.config.acf.date
          : moment(this.config.date).format('D MMMM YYYY')
      },

      description() {
        return this.config.acf && this.config.acf.description ? decodeString(this.config.acf.description) : ''
      },

      externalLinkURL() {
        return this.config.acf && this.config.acf.external_link_url ? this.config.acf.external_link_url : ''
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

      link() {
        return this.externalLinkURL ? this.externalLinkURL : this.config.link
      },

      hasDate() {
        return this.postType == 'convention'
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
        this.$eventHub.$emit('modal-open')
        this.$emit('onListingClicked', this.id)
      }
    }
  }
</script>
