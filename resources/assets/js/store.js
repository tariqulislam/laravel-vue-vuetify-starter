require('es6-promise').polyfill();
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import RegisterStore from './modules/register/store'

export default new Vuex.Store({
    modules: {
        RegisterStore
    }
})