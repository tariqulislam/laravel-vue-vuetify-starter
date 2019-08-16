
export const SET_MERCHANT_SAVED_MESSAGE = (state, payload) => {
    state.message = payload
}

export const SET_MERCHANT_IS_LOADING = (state, payload) => {
    state.isLoading = payload;
}

export const SET_MERCHANT_IN_DETAILS = (state, payload) => {
    state.merchant = payload;
}

export const LOAD_PAYMENT_PROVIDERS = (state, payload) => {
    state.lstPaymentProviders = payload;
}

export const LOAD_ACCOUNT_TYPES = (state, payload) => {
    state.lstAccountTypes = payload 
}
