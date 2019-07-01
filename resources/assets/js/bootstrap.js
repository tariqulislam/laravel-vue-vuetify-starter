
window._ = require('lodash');

window.Vue = require('vue');

window.Vuetify = require('vuetify');

require('vue-resource');

Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});
