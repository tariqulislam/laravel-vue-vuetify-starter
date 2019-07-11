export const initialState = {
    message: '',
    isLoading: false,
    merchant: {
        business_name: '',
        media_link: '',
        address: ''
    },
    lstMerchants: [],
    lstPaymentProviders: []
}

export default {
    initialState: initialState,
    ...initialState
}