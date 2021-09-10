<template>
  <div>
    <button
      class="listing-modal__trigger"
      @click="openModal"
    >
      {{ $t('common.related_documents') }}
    </button>
    <ListingModal
      :id="modalID"
      v-bind="{ post }"
    />
  </div>
</template>

<script>
import ListingModal from '../listing/ListingModal.vue'

export default {
  components: {
    ListingModal
  },

  props: {
    title: {
      type: String,
      default: undefined
    },
    text: {
      type: String,
      default: undefined
    },
    downloads: {
      type: Array,
      default: undefined
    }
  },

  computed: {
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
