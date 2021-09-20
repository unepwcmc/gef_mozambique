<template>
  <button
    class="hero__summary-link"
    v-scroll-to="{
      el: scrollElement,
      offset: -100
    }"
  >
    {{ $t('table.jump_to_database') }}
    <IconAngleDown />
  </button>
</template>

<script>
import IconAngleDown from '../../icons/IconAngleDown.vue'
export default {
  components: {
    IconAngleDown
  },

  props: {
    id: {
      type: String,
      default: undefined
    }
  },

  computed: {
    scrollElement() {
      return `#${this.id}`
    }
  }
}
</script>

<style lang="css" scoped>
</style>
