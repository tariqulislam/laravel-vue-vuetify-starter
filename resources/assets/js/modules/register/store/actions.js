import WebClient from '../../../webclient.js'
import router from '../../../routes';


export const  fetchPaymentProviders = ({commit})  => {
        WebClient().get('/payment/providers')
            .then(response => {
                commit('LOAD_PAYMENT_PROVIDERS', response.data)
            })
            .catch(error => {
                commit('LOAD_PAYMENT_PROVIDERS', [])
            })
}

export const fetchAccountTypes = ({commit}) => {
    WebClient().get('/account/types')
    .then(response => {
        commit('LOAD_ACCOUNT_TYPES', response.data)
    })
    .catch(error => {
        commit('LOAD_ACCOUNT_TYPES', [])
    })
}

export const postMerchantDataToApiServer = ({commit}, formData) => {
    WebClient().post('/merchants/register', formData)
    .then(response => {
      if(response.data) {
          if(response.data.output == 'success') {
            router.push('/thank-you');
          }
          
      }
    });

}
