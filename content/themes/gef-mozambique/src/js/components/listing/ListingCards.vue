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
        :post-type="postType"
      />
    </li>
  </ul>
</template>

<script>
  import CardEvent from '../cards/CardEvent.vue'
  import CardMultimedia from '../cards/CardMultimedia.vue'
  import CardPost from '../cards/CardPost.vue'

  export default {
    name: 'ListingCards',

    components: {
      CardEvent,
      CardMultimedia,
      CardPost,
    },

    props: {
      modal: {
        type: Boolean,
        default: false
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
        return 'card-' + this.postType
      }
    }
  }
</script>
