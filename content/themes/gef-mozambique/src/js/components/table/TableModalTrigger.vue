<template>
  <div
    v-if="postID"
  >
    <button
      class="table-modal__trigger"
      @click="clickHandler"
    >
      <IconAngleRightRing />
    </button>
  </div>
</template>

<script>
import IconAngleRightRing from '../../icons/IconAngleRightRing.vue'

export default {
  components: {
    IconAngleRightRing
  },

  mounted () {
    const tableRow = this.$el.parentElement.parentElement

    const tableRowPostId = tableRow.id.replace('post-row-','')
    const tableRowClassList = [ ...tableRow.classList ]

    const tableRowPostClass = tableRowClassList.find(el => el.includes('post-type-')).replace('post-type-','')

    this.postID = tableRowPostId
    this.postType = tableRowPostClass

    tableRow.addEventListener('click', this.clickHandler)
  },

  data () {
    return {
      postID: undefined,
      postType: 'post'
    }
  },

  computed: {
    modalID() {
      return String(this._uid)
    },
  },

  methods: {
    clickHandler (e) {
      this.$eventHub.$emit('modal-open', this.modalID, this.postID)
    }
  }
}
</script>
