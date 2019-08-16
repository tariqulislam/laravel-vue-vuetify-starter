import WebClient from '../../../webclient.js'

export const  fetchListOfMerchants = ({commit})  => {
        WebClient().get('/merchants/list')
            .then(response => {
                commit('GET_MERCHANTS_LIST', response.data)
            })
            .catch(error => {
                commit('GET_MERCHANTS_LIST', [])
            })
}
