<template>
  <div
    class="listing-card listing-card--report"
    @click="clickHandler()"
  >
    <div class="listing-card__header">
      <div class="listing-card__image-wrap">
        <IconReport class="listing-card__icon" />
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
  import IconReport from '../../icons/IconReport.vue'

  export default {
    name: 'CardReport',

    components: {
      IconAngleRight,
      IconReport
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
        required: true
      },
      postType: {
        type: String,
        required: true
      }
    },

    computed: {
      excerpt() {
        return this.config.excerpt.rendered ? decodeString(this.config.excerpt.rendered).substring(0, 80) : ''
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
