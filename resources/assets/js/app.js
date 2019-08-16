

import _ from 'lodash'
import Vue from 'vue'
import vueResource from 'vue-resource'
import Routes from './routes.js';
import Main from './Main.vue';
import store from './store.js';

import Vuetify from 'vuetify'
Vue.use(Vuetify);

Vue.use(vueResource);

import Vuelidate from 'vuelidate';

Vue.use(Vuelidate);

const app = new Vue({
    el: '#app',
    router: Routes,
    store: store,
    render:h => h(Main)
});

export default app;
