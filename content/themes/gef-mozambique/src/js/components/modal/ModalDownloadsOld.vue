<template>
  <div>
    <button
      @click="openModal"
    >
      Related Documents
    </button>
    <Modal :id="modalID">
      <template v-slot:header>
        <h3 class="listing-modal__title">
          {{ title }}
        </h3>
      </template>
      <template v-slot:default>
        <div v-html="text" />
        <ul
          v-if="downloads"
          class="listing-modal__items"
        >
          <li
            v-for="download in downloads"
            class="listing-modal__item"
          >
            <div class="listing-modal__download">
              <h4 class="listing-modal__download-heading">
                {{ download.title }}
              </h4>
              <p class="listing-modal__download-text">
                {{ download.description }}
              </p>
              <a
                :href="download.file.link"
                download
                class="listing-modal__download-button"
              >
                Download
                <IconDownload />
              </a>
            </div>
          </li>
        </ul>
      </template>
    </Modal>
  </div>
</template>

<script>
import Modal from './Modal.vue'

export default {
  components: {
    Modal
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
  },

  methods: {
    openModal () {
      this.$eventHub.$emit('modal-open', this.modalID)
    }
  }
}
</script>
