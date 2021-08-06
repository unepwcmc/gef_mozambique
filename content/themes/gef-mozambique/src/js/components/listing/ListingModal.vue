<template>
  <modal :id="id">
    <h3 class="listing-modal__title">
      {{ title }}
    </h3>
    <div
      v-if="content"
      v-html="content"
      class="listing-modal__content richtext"
    />
    </div>
  </modal>
</template>

<script>
  import { decodeString } from '../../helpers/application-helpers.js'
  import Modal from '../modal/Modal.vue'

  export default {
    name: 'ListingModal',

    components: {
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

      imageUrl() {
        return this.post._embedded && this.post._embedded['wp:featuredmedia'] ? this.post._embedded['wp:featuredmedia'][0].source_url : ''
      },

      title() {
        return this.post.title ? decodeString(this.post.title.rendered) : ''
      }
    }
  }
</script>
