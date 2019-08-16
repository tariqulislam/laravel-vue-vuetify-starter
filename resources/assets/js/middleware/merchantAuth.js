export default function merchant_auth({next, router}) {
    if(!localStorage.getItem('merchantAccessToken')) {
        return router.push({name: 'login'})
    }
    return next();
}