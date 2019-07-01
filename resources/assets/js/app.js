require('./bootstrap');

Vue.use(Vuetify);

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
