




import Vue from 'vue'
import store from './vuex/store'

Vue.component('BookingForm', require('./components/BookingForm.vue'))
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
  el: '#app',
  store,
 
})