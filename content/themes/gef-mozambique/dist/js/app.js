/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/helpers/translation-helper.js":
/*!**********************************************!*\
  !*** ./src/js/helpers/translation-helper.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* export default binding */ __WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'lodash'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());


/* harmony default export */ function __WEBPACK_DEFAULT_EXPORT__(translationKey, options) {
  const rawTranslation = Object(function webpackMissingModule() { var e = new Error("Cannot find module 'lodash'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())(this.$root.translations, translationKey)
  let translation = rawTranslation[0]
  for (let key in options) {
    translation = translation.replace(`%{${key}}`, options[key])
  }
  return translation
}


/***/ }),

/***/ "./src/js/store.js":
/*!*************************!*\
  !*** ./src/js/store.js ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vuex/dist/vuex.esm'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());


Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())(Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vuex/dist/vuex.esm'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()))

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (new Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vuex/dist/vuex.esm'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())({
  state: {
    preselectedTerm: undefined
  },

  mutations: {
    updatePreselectedTerm (state, payload) {
      state.preselectedTerm = payload
    }
  }
}));


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!***********************!*\
  !*** ./src/js/app.js ***!
  \***********************/
__webpack_require__.r(__webpack_exports__);
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./store */ "./src/js/store.js");
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'object-fit-images'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vue-progressive-image'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module './helpers/AddClassOnClick.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/resources/DownloadList.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/drawers/Drawer.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/drawers/DrawerTrigger.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/drawers/DrawersOverlay.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/widgets/LatestPosts.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/listing/ListingGrid.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/header/HeaderSearch.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/header/MainHeader.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
/* harmony import */ var _helpers_translation_helper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./helpers/translation-helper.js */ "./src/js/helpers/translation-helper.js");
















window.axios = __webpack_require__(Object(function webpackMissingModule() { var e = new Error("Cannot find module 'axios'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()))

;

Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())(Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vue-progressive-image'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()))

Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()) = false

Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()) = _helpers_translation_helper_js__WEBPACK_IMPORTED_MODULE_2__.default

window.addEventListener("DOMContentLoaded", () => {
  document.body.classList.add('loaded')
  Object(function webpackMissingModule() { var e = new Error("Cannot find module 'object-fit-images'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())()

  if(document.getElementById('v-app')) {

    // TODO: Change to $root, delete the below line
    Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()) = new Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())()

    new Object(function webpackMissingModule() { var e = new Error("Cannot find module 'vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())({
      el: '#v-app',

      store: _store__WEBPACK_IMPORTED_MODULE_1__.default,

      components: {
        AddClassOnClick: Object(function webpackMissingModule() { var e = new Error("Cannot find module './helpers/AddClassOnClick.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
        DownloadList: Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/resources/DownloadList.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
        Drawer: Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/drawers/Drawer.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
        DrawerTrigger: Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/drawers/DrawerTrigger.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
        DrawersOverlay: Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/drawers/DrawersOverlay.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
        HeaderSearch: Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/header/HeaderSearch.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
        LatestPosts: Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/widgets/LatestPosts.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
        ListingGrid: Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/listing/ListingGrid.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()),
        MainHeader: Object(function webpackMissingModule() { var e = new Error("Cannot find module './components/header/MainHeader.vue'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())
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

})();

/******/ })()
;