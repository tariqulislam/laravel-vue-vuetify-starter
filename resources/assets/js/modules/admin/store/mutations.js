export const IS_ADMIN_AUTHENTICATE = (state, payload) => {
    state.isAdminAuthenticate = payload.isAdminAuthenticate
    state.isError = payload.isError
    state.admin = payload.admin
    state.adminToken = payload.adminToken
    state.message = payload.message
}