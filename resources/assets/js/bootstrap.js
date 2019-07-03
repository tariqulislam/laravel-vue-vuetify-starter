
window._ = require('lodash');

window.Vue = require('vue');

window.Vuetify = require('vuetify');
window.vueResource = require('vue-resource');
Vue.use(Vuetify);
Vue.use(vueResource);

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});
