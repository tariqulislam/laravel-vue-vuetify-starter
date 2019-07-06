

import _ from 'lodash'
import Vue from 'vue'
import vueResource from 'vue-resource'

import Vuetify from 'vuetify'
Vue.use(Vuetify);

Vue.use(vueResource);

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
