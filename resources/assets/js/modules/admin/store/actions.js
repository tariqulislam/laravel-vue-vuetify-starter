import WebClient from '../../../webclient';
import router from '../../../routes';

export const logInToAdmin = ({commit}, payload) => {
    WebClient().post('/admins/login', payload)
    .then(response => {
        if(response.status === 200 && response.data.output === 'success') {
            commit('IS_ADMIN_AUTHENTICATE', {
                isAuthenticate: true,
                isError: false,
                admin: response.data.admin,
                adminToken: response.data.admin.api_token,
                message: response.data.message
            })
            localStorage.setItem('adminAccessToken', response.data.admin.api_token)
            router.push('/admin-dashboard')
        } else {
            localStorage.removeItem('adminAccessToken')
            commit('IS_ADMIN_AUTHENTICATE', {
                isAuthenticate: false,
                isError: true,
                admin: {},
                adminToken: '',
                message: response.data.message
            })
        }
    })
}