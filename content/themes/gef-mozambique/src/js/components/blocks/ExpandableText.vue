<template>
  <div
    class="block-expandable"
    :class="[
      { 'block-expandable--active': expandable },
      { 'block-expandable--toggled': toggled }
    ]"
  >
    <div class="block-expandable__inner">
      <div class="block-expandable__body">
        <div
          class="block-expandable__content"
          v-html="content"
        />
        <button
          class="block-expandable__toggle"
          @click="toggleTextHeight"
          v-if="expandable"
        >
          {{ toggleText }}
          <IconAngle class="block-expandable__toggle-icon" />
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import IconAngle from '../../icons/IconAngle.vue'

export default {
  components: {
    IconAngle
  },

  props: {
    content: {
      type: String,
      default: undefined
    },
    expandable: {
      type: Boolean,
      default: false
    },
    toggleText: {
      type: String,
      default: undefined
    },
  },

  data () {
    return {
      toggled: false
    }
  },

  methods: {
    toggleTextHeight () {
      this.toggled = true
    }
  }
}
</script>
