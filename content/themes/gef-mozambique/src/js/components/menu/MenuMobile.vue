<template>
  <div>
    <slot />
  </div>
</template>

<script>
export default {
  mounted() {
    const topLevelLinks = document.querySelectorAll('.nav-mobile .menu-item-has-children')

    topLevelLinks.forEach(link => {
      link.addEventListener('click', function() {
        this.classToggle(link)
      }.bind(this))
    })
  },

  methods: {
    classToggle (el) {
      if (el.classList.contains('open')) {
        el.classList.remove('open')
      } else {
        el.classList.add('open')
      }
    }
  }
}
</script>
