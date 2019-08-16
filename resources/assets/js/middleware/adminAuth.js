export default function admin_auth({next, router}) {
    if(!localStorage.getItem('adminAccessToken')) {
        return router.push({name: 'AdminLogin'})
    }
    return next();
}