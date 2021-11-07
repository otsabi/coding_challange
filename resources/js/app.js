require('./bootstrap');

import Vue from 'vue'
import App from './vue/app.vue'

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Import VSelect
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';


// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
    // Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)


Vue.component('v-select', vSelect)

const app = new Vue({
    el: '#app',
    components: { App }
});