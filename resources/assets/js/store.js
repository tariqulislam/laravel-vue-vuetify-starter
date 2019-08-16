require('es6-promise').polyfill();
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import RegisterStore from './modules/register/store'
import LoginStore from './modules/home/store'
import AdminStore from './modules/admin/store'
import DashboardStore from './modules/dashboard/store'

export default new Vuex.Store({
    modules: {
        RegisterStore,
        LoginStore,
        AdminStore,
        DashboardStore
    }
})