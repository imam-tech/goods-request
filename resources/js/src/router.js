import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

import Dashboard from './pages/Dashboard.vue'

const router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/app',
            component: Dashboard
        }
    ]
});


export default router