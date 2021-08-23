<template>
  <modal :id="id">
    <template v-slot:header>
      <h3 class="listing-modal__title">
        {{ title }}
      </h3>
    </template>
    <template v-slot:default>
      <div
        v-if="content"
        v-html="content"
        class="listing-modal__content richtext"
      />
      <ul
        v-if="documents"
        class="listing-modal__items"
      >
        <li
          v-for="document in documents"
          class="listing-modal__item"
        >
          <div class="listing-modal__download">
            <h4 class="listing-modal__download-heading">
              {{ document.title }}
            </h4>
            <p class="listing-modal__download-text">
              {{ document.description }}
            </p>
            <a
              :href="document.file.link"
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
  </modal>
</template>

<script>
  import { decodeString } from '../../helpers/application-helpers.js'
  import Modal from '../modal/Modal.vue'
  import IconDownload from '../../icons/IconDownload.vue'

  export default {
    name: 'ListingModal',

    components: {
      IconDownload,
      Modal
    },

    props: {
      id: {
        type: String,
        default: undefined
      },
      post: {
        type: Object,
        default: () => {}
      }
    },

    computed: {
      content() {
        return this.post.content ? this.post.content.rendered : ''
      },

      documents() {
        return this.post.acf && this.post.acf.documents ? this.post.acf.documents : ''
      },

      imageUrl() {
        return this.post._embedded && this.post._embedded['wp:featuredmedia'] ? this.post._embedded['wp:featuredmedia'][0].source_url : ''
      },

      title() {
        return this.post.title ? decodeString(this.post.title.rendered) : ''
      }
    }
  }
</script>
