




import Vue from 'vue'
import Element from 'element-ui'
import App from './App'
import store from './vuex/store'

//import 'element-ui/lib/theme-chalk/index.css'

Vue.use(Element)

Vue.component('BookingPage', require('./components/BookingPage.vue'))
Vue.component('ServiceSelector', require('./components/ServiceSelector.vue'))
Vue.component('LocationSelector', require('./components/LocationSelector.vue'))
Vue.component('ModuleSelector', require('./components/ModuleSelector.vue'))
Vue.component('ExtraSelector', require('./components/ExtraSelector.vue'))
Vue.component('InsuranceSelector', require('./components/InsuranceSelector.vue'))
Vue.component('BookingSummary', require('./components/BookingSummary.vue'))
Vue.component('BookingSidebar', require('./components/BookingSidebar.vue'))
Vue.component('BookingEnquiry', require('./components/BookingEnquiry.vue'))


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