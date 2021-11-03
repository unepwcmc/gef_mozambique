<template>
  <ul class="listing-grid__items">
    <li
      v-for="(post, index) in posts"
      class="listing-grid__item"
    >
      <Component
        :is="CardName"
        :key="post.id"
        v-bind="{
          config: post,
          id: index,
          modal,
          modalID,
          postType
        }"
      />
    </li>
  </ul>
</template>

<script>
  import CardCourse from '../cards/CardCourse.vue'
  import CardEvent from '../cards/CardEvent.vue'
  import CardMultimedia from '../cards/CardMultimedia.vue'
  import CardPost from '../cards/CardPost.vue'
  import CardReport from '../cards/CardReport.vue'

  export default {
    name: 'ListingCards',

    components: {
      CardCourse,
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
        if (this.postType === 'public_consultation') {
          return 'card-event'
        }
        if (this.postType === 'report_publication') {
          return 'card-report'
        }
        if (this.postType === 'online_course') {
          return 'card-course'
        }
        return 'card-' + this.postType
      }
    }
  }
</script>
