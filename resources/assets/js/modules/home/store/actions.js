import WebClient from '../../../webclient'
import router from '../../../routes'


export const loginToMerchantAccount = ({commit}, payload) => {
    WebClient().post('/merchants/login', payload)
    .then(response => {
        debugger
        if(response.status === 200 && response.data.output === 'success') {
            commit('IS_MERCHANT_AUTHENTICATE', {
                isAuthenticate: true,
                isError: false,
                authToken: response.data.operator.api_token,
                operator: response.data.operator,
                message: response.data.message
            })
            localStorage.setItem('merchantAccessToken', response.data.operator.api_token)
            router.push('/merchant-dashboard')
        } else {
            localStorage.removeItem('merchantAccessToken')
            commit('IS_MERCHANT_AUTHENTICATE', {
                isAuthenticate: false,
                isError: true,
                authToken: '',
                operator: {},
                message: response.data.message
            })
        }
    })
}
