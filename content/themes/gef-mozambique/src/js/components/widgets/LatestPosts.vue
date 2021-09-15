<template>
  <div>
  <listing-cards
    v-bind="{
      modalID,
      posts,
      postType: postSingular
    }"
    @onCardClicked="updateActivePost"
  />
  <listing-modal
    v-bind="{
      id: modalID,
      post: activePost
    }"
  />
  </div>
</template>

<script>
  import ListingCards from '../listing/ListingCards.vue'
  import ListingModal from '../listing/ListingModal.vue'

  export default {
    name: 'LatestPosts',

    components: {
      ListingCards,
      ListingModal
    },

    props: {
      postType: {
        type: String,
        required: true
      },
      postSingular: {
        type: String,
        required: true
      }
    },

    data() {
      return {
        activePost: {},
        config: {
          byStartDateBaseUrl: '/wp-json/gef-mozambique/v1/posts-by-start-date?_embed&post_type=',
          postsBaseUrl: '/wp-json/wp/v2/'
        },
        posts: []
      }
    },

    mounted() {
      this.getPosts()
    },

    computed: {
      modalID() {
        return String(this._uid)
      },

      postsURL() {
        let requestURL = ''

        switch (this.postType) {
          case 'online_course':
            requestURL = this.config.byStartDateBaseUrl + this.postType
            break;
          case 'event':
            requestURL = this.config.byStartDateBaseUrl + this.postType
            break;
          case 'public_consultation':
            requestURL = this.config.byStartDateBaseUrl + this.postType
            break;
          default:
            requestURL = this.config.postsBaseUrl + this.postType + '?_embed'
        }

        return encodeURI(requestURL)
      },

      postsParams() {
        let params = {
          'page': 1,
          'per_page': 4
        }

        return params
      }
    },

    methods: {
      getPosts() {
        axios.get(this.postsURL, { params: this.postsParams })
        .then((response) => {
          this.posts.push(...response.data)
        })
        .catch((error) => {
          console.error(error)
        })
      },

      updateActivePost(id) {
        this.activePost = this.posts[id]
      }
    }
  }
</script>
