

import store from './vuex/store'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

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

import App from './App'

/* eslint-disable no-new */
new Vue({
  el: 'app',
  router,
  store,
  template: '<App/>',
  components: { App }
})