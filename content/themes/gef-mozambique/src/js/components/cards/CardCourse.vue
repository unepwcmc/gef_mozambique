<template>
  <div class="listing-card listing-card--course">
    <div class="listing-card__header">
      <div class="listing-card__image-wrap">
        <IconCertificate class="listing-card__icon" />
      </div>
    </div>
    <div class="listing-card__body">
      <p
        v-if="year"
        class="listing-card__date"
      >
        {{ year }}
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
        v-if="link"
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
      year() {
        return this.config.acf && this.config.acf.year ? this.config.acf.year : ''
      },

      link() {
        return this.config.acf && this.config.acf.external_link_url ? this.config.acf.external_link_url : ''
      },

      title() {
        return this.config.title ? decodeString(this.config.title.rendered) : ''
      }
    }
  }
</script>
