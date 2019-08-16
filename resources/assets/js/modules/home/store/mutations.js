export const IS_MERCHANT_AUTHENTICATE = (state, payload) => {
    state.isAuthenticate = payload.isAuthenticate
    state.authToken = payload.authToken
    state.operator = payload.operator
    state.isError = payload.isError
    state.message = payload.message
}