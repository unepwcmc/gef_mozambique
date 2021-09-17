<template>
  <div>
    <button
      :class="buttonClassList"
      @click="openModal"
    >
      {{ buttonText }}

      <IconAngleRight
        v-if="customButton"
      />
    </button>
    <ListingModal
      :id="modalID"
      v-bind="{ post }"
    />
  </div>
</template>

<script>
import IconAngleRight from '../../icons/IconAngleRight.vue'
import ListingModal from '../listing/ListingModal.vue'

export default {
  components: {
    IconAngleRight,
    ListingModal
  },

  props: {
    customButton: {
      type: Boolean,
      default: false
    },
    downloads: {
      type: Array,
      default: undefined
    },
    text: {
      type: String,
      default: undefined
    },
    title: {
      type: String,
      default: undefined
    },
    triggerText: {
      type: String,
      default: undefined
    }
  },

  computed: {
    buttonClassList() {
      let classList = 'listing-modal__trigger'

      classList += this.customButton
        ? ' listing-modal__trigger--arrow'
        : ' listing-modal__trigger--secondary'

      return classList
    },

    buttonText() {
      return this.customButton ? this.triggerText : this.$t('common.related_documents')
    },

    modalID() {
      return String(this._uid)
    },

    post() {
      return {
        'content': {
          'rendered': this.text
        },

        'acf': {
          'modal_downloads': this.downloads
        },

        'title': {
          'rendered': this.title || this.$t('common.related_documents')
        }
      }
    }
  },

  methods: {
    openModal () {
      this.$eventHub.$emit('modal-open', this.modalID)
    }
  }
}
</script>
