<template>
  <ModalTable
    v-if="activePost"
    id="modalID"
  >
    <template #header>
      <h3 class="table-modal__title">
        {{ activePost.title }}
      </h3>
    </template>
    <ul class="table-modal__list-items">
      <li
        v-for="item in activePost.data"
        v-if="item.value"
        class="table-modal__list-item"
      >
        <h4 class="table-modal__heading"
          v-html="item.label"
        />
        <p class="table-modal__text"
          v-html="item.value"
        />
      </li>
    </ul>
  </ModalTable>
</template>

<script>
  import { decodeString } from '../../helpers/application-helpers.js'
  import ModalTable from '../modal/ModalTable.vue'

  export default {
    name: 'TableModal',

    components: {
      ModalTable
    },

    props: {
      postType: {
        type: String,
        default: 'post'
      },
      restrictedColumns: {
        type: String,
        default: undefined
      }
    },

    data () {
      return {
        activePost: undefined,
        activePostID: undefined,
        posts: []
      }
    },

    mounted () {
      this.$eventHub.$on('modal-open', this.openModal)
      this.getData()
    },

    computed: {
      postURL () {
        let requestURL = `/wp-json/gef-mozambique/v1/table-posts`

        requestURL += `?post_type=${this.postType}`

        if (this.restrictedColumns) {
          requestURL += `&restricted_columns=${this.restrictedColumns}`
        }

        return encodeURI(requestURL)
      },
    },

    methods: {
      getData () {
        axios.get(this.postURL)
        .then((response) => {
          console.log(response);
          this.posts = response.data
          this.activePost = this.posts[0]
        })
        .catch((error) => {
          console.error(error)
        })
      },

      openModal (modalID, postID) {
        this.activePost = this.posts.find(post => post.id == postID)
      }
    }
  }
</script>
