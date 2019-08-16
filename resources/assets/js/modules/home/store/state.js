const initialState = {
    isAuthenticate: false,
    authToken: '',
    operator: {},
    message: '',
    isError: false
}

export default {
    initialState: initialState,
    ...initialState
}