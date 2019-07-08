import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './modules/home/Home.vue'
import Register from './modules/register/components/Register.vue'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        }
    ]
});

export default router;
