
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./spa_bootstrap');


import Vue from 'vue'
import App from './App'
import store from './vuex/store'




// import ElementUI from 'element-ui'
// import 'element-ui/lib/theme-default/index.css'
// Vue.use(ElementUI)


// import yesno from './components/quizset/YesNo2'

Vue.component('StorageModule', require('./components/StorageModule.vue'))
Vue.component('ServiceSelector', require('./components/ServiceSelector.vue'))

Vue.component('DefaultProductSection', require('./components/DefaultProductSection.vue'))
Vue.component('StorageProductSection', require('./components/StorageProductSection.vue'))
Vue.component('RemovalProductSection', require('./components/RemovalProductSection.vue'))

Vue.filter('currency', function (cents) {
    return '$'+(cents/100)
})


Vue.config.productionTip = true

/* eslint-disable no-new */
new Vue({
  el: 'app',
  store,
  template: '<App/>',
  components: { App }
})