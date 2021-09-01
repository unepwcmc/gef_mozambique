<template>
  <ul class="listing-grid__items">
    <li
      v-for="(post, index) in posts"
      class="listing-grid__item"
    >
      <Component
        :is="CardName"
        :id="index"
        :key="post.id"
        :config="post"
        :modal="modal"
        :modalID="modalID"
        :post-type="postType"
      />
    </li>
  </ul>
</template>

<script>
  import CardEvent from '../cards/CardEvent.vue'
  import CardMultimedia from '../cards/CardMultimedia.vue'
  import CardPost from '../cards/CardPost.vue'
  import CardReport from '../cards/CardReport.vue'

  export default {
    name: 'ListingCards',

    components: {
      CardEvent,
      CardMultimedia,
      CardPost,
      CardReport
    },

    props: {
      modal: {
        type: Boolean,
        default: false
      },
      modalID: {
        type: String,
        default: undefined
      },
      posts: {
        type: Array,
        default: () => []
      },
      postType: {
        type: String,
        required: true
      }
    },

    computed: {
      CardName () {
        if (this.postType === 'course') {
          return 'card-event'
        }
        return 'card-' + this.postType
      }
    }
  }
</script>
