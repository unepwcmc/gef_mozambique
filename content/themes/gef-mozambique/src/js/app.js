import Vue from 'vue'
window.Vue = Vue
import store from './store'

import VueScrollTo from 'vue-scrollto'
Vue.use(VueScrollTo, {
     container: "body",
     duration: 500,
     easing: "ease",
     offset: 0,
     force: true,
     cancelable: true,
     onStart: false,
     onDone: false,
     onCancel: false,
     x: false,
     y: true
 })

import objectFitImages from 'object-fit-images'
import VueProgressiveImage from 'vue-progressive-image'

import AddClassOnClick from './helpers/AddClassOnClick.vue'
import DownloadList from './components/resources/DownloadList.vue'
import Drawer from './components/drawers/Drawer.vue'
import DrawerTrigger from './components/drawers/DrawerTrigger.vue'
import DrawersOverlay from './components/drawers/DrawersOverlay.vue'
import ExpandableText from './components/blocks/ExpandableText.vue'
import FlickityCarousel from './components/carousel/FlickityCarousel.vue'
import IconAngle from './icons/IconAngle.vue'
import LatestPosts from './components/widgets/LatestPosts.vue'
import ListingGrid from './components/listing/ListingGrid.vue'
import ListingList from './components/listing/ListingList.vue'
import HeaderSearch from './components/header/HeaderSearch.vue'
import MenuMobile from './components/menu/MenuMobile.vue'
import MainHeader from './components/header/MainHeader.vue'
import ModalDownloads from './components/modal/ModalDownloads.vue'
import TableJumpLink from './components/table/TableJumpLink.vue'
import TableModal from './components/table/TableModal.vue'
import TableModalTrigger from './components/table/TableModalTrigger.vue'

window.axios = require('axios')

window.moment = require('moment')
moment.locale('pt')

import translate from './helpers/translation-helper.js'

Vue.use(VueProgressiveImage)

Vue.config.productionTip = false

Vue.prototype.$t = translate

window.addEventListener("DOMContentLoaded", () => {
  document.body.classList.add('loaded')
  objectFitImages()

  if(document.getElementById('v-app')) {

    // TODO: Change to $root, delete the below line
    Vue.prototype.$eventHub = new Vue()

    new Vue({
      el: '#v-app',

      store,

      components: {
        AddClassOnClick,
        DownloadList,
        Drawer,
        DrawerTrigger,
        DrawersOverlay,
        ExpandableText,
        FlickityCarousel,
        HeaderSearch,
        LatestPosts,
        ListingGrid,
        ListingList,
        MenuMobile,
        MainHeader,
        ModalDownloads,
        TableJumpLink,
        TableModal,
        TableModalTrigger
      },

      data () {
        return {
          translations: undefined
        }
      },

      created () {
        this.translations = window.vue_translations
      },

      mounted() {
        document.querySelector('body').classList.add('layout__body--loaded')
      }
    })

  }
})
