
import Vue from 'vue'
import Element from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en'


//import 'element-ui/lib/theme-chalk/index.css'
Vue.use(Element, { locale })

Vue.component('MessageUs', require('./components/MessageUsForm.vue'))




// Dev settings
Vue.config.productionTip = true
Vue.config.devtools = true
Vue.config.debug = true
Vue.config.silent = false

// production settings
// Vue.config.productionTip = false
// Vue.config.devtools = false
// Vue.config.debug = false
// Vue.config.silent = true

/* eslint-disable no-new */
new Vue({
  el: '#app'
})