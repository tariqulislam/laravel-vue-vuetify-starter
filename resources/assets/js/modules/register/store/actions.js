import WebClient from '../../../webclient.js'


export const  fetchPaymentProviders = ({commit})  => {
        WebClient().get('/payment/providers')
            .then(response => {
                debugger
            })
            .catch(error => {
                debugger
            })
}
