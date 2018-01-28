




import Vue from 'vue'
import VueRouter from 'vue-router'
import Element from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'


import App from './App'
import store from './vuex/store'

//import 'element-ui/lib/theme-chalk/index.css'
Vue.use(Element, { locale })
Vue.use(VueRouter)





Vue.component('ServiceSelector', require('./components/ServiceSelector.vue'))
Vue.component('LocationSelector', require('./components/LocationSelector.vue'))
Vue.component('StorageModuleSelector', require('./components/StorageModuleSelector.vue'))
Vue.component('RemovalModuleSelector', require('./components/RemovalModuleSelector.vue'))
Vue.component('ExtraSelector', require('./components/ExtraSelector.vue'))
Vue.component('InsuranceSelector', require('./components/InsuranceSelector.vue'))
Vue.component('BookingSummary', require('./components/BookingSummary.vue'))
Vue.component('BookingSidebar', require('./components/BookingSidebar.vue'))
Vue.component('BookingEnquiry', require('./components/BookingEnquiry.vue'))


Vue.filter('currency', function (cents) {
    return '$'+(cents/100)
})

const routes = [
  { path: '/', component: require('./components/BookingPage.vue') },
  { path: '/confirm', component: require('./components/CheckoutConfirm.vue') },
  { path: '/submit',  component: require('./components/SubmitForm.vue')}
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
  routes // short for `routes: routes`
})


Vue.config.productionTip = true

/* eslint-disable no-new */
new Vue({
  el: 'app',
  router,
  store,
  template: '<App/>',
  components: { App }
})