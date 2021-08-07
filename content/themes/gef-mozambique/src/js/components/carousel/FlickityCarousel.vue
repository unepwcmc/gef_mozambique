<template>
  <flickity
    :options="flickityOptions"
    ref="flickity"
  >
    <slot />
  </flickity>
</template>

<script>
  import Flickity from 'vue-flickity'
  import 'flickity/dist/flickity.min.css'

  export default {
    name: 'FlickityCarousel',

    components: {
      Flickity
    },

    props: {
      flickityOptions: {
        type: Object,
        default: undefined
      }
    },

    methods: {
      next() {
        this.$refs.flickity.next()
      },

      previous() {
        this.$refs.flickity.previous()
      }
    }
  }
</script>
