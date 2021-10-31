import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import Vue2Filters from 'vue2-filters'

import router from './router/routes'
import store from './store/store'

Vue.use(Vue2Filters)

Vue.config.productionTip = false

new Vue({
  vuetify,
  router,
  store,
  render: h => h(App)
}).$mount('#app')
