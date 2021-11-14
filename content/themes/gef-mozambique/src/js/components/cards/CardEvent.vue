<template>
  <div
    class="listing-card listing-card--event"
    @click="clickHandler()"
  >
    <div class="listing-card__header">
      <div class="listing-card__image-wrap">
        <IconCalendar class="listing-card__icon" />
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
  import IconCalendar from '../../icons/IconCalendar.vue'
  import IconExternal from '../../icons/IconExternal.vue'

  export default {
    name: 'CardEvent',

    components: {
      IconCalendar,
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
        return this.config.acf && this.config.acf.date_start
          ? this.config.acf.date_start
          : ''
      },

      externalLinkURL() {
        return this.config.acf && this.config.acf.external_link_url ? this.config.acf.external_link_url : ''
      },

      link() {
        return this.externalLinkURL ? this.externalLinkURL : this.config.link
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
