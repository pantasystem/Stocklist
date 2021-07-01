import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify'
import axios from 'axios';

var VueTouch = require('vue-touch')
Vue.use(VueTouch, {name: 'v-touch'})

Vue.config.productionTip = false
axios.defaults.withCredentials = true;

new Vue({
    router,
    store,
    vuetify,
    render: h => h(App)
}).$mount('#app')