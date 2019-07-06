

import _ from 'lodash'
import Vue from 'vue'
import vueResource from 'vue-resource'
import Routes from './routes.js';
import Main from './Main.vue';

import Vuetify from 'vuetify'
Vue.use(Vuetify);

Vue.use(vueResource);

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});



const app = new Vue({
    el: '#app',
    router: Routes,
    render:h => h(Main)
});

export default app;
