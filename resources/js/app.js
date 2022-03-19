import Vue from 'vue'
import App from './src/App.vue'
import router from './src/router'
import store from './src/store/store.js'
import './src/plugins/axios'

import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.use(VueToast);

import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
Vue.component("v-select", vSelect);

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount("#app")