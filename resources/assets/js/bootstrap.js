


window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.moment = require('moment')

window.Vue = require('vue');

import Element from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'


//import 'element-ui/lib/theme-chalk/index.css'
Vue.use(Element, { locale })

// Pricing and Booking
Vue.component('ServiceSelector', require('./components/ServiceSelector.vue'))
Vue.component('LocationSelector', require('./components/LocationSelector.vue'))
Vue.component('StorageModuleSelector', require('./components/StorageModuleSelector.vue'))
Vue.component('RemovalModuleSelector', require('./components/RemovalModuleSelector.vue'))
Vue.component('ExtraSelector', require('./components/ExtraSelector.vue'))
Vue.component('InsuranceSelector', require('./components/InsuranceSelector.vue'))
Vue.component('BookingSummary', require('./components/BookingSummary.vue'))
Vue.component('BookingSidebar', require('./components/BookingSidebar.vue'))
Vue.component('BookingEnquiry', require('./components/BookingEnquiry.vue'))
Vue.component('CheckoutRemovalConfirm', require('./components/CheckoutRemovalConfirm.vue'))
Vue.component('CheckoutStorageConfirm', require('./components/CheckoutStorageConfirm.vue'))

// Message Us
import MessageUs from './components/MessageUsForm.vue'
Vue.component('MessageUs',MessageUs )

//Book Return
import BookReturnForm from './components/BookReturnForm.vue'
Vue.component('BookReturnForm', BookReturnForm)

//Access Storage
import AccessStorageForm from './components/AccessStorageForm.vue'
Vue.component('AccessStorageForm', AccessStorageForm)




Vue.filter('currency', function (cents) {
    return '$'+(cents/100)
})



Vue.filter('capitalize', function (value) {
  if (!value) return ''
  value = value.toString()
  return value.charAt(0).toUpperCase() + value.slice(1)
})

Vue.filter('truncate', function (str, len) {
  if(str.length > len){
    return str.substring(0,len) + '...'
  }
  return str
})




// Dev settings
// Vue.config.productionTip = true
// Vue.config.devtools = true
// Vue.config.debug = true
// Vue.config.silent = false

// production settings
Vue.config.productionTip = false
Vue.config.devtools = false
Vue.config.debug = false
Vue.config.silent = true

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
