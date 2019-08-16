import Vue from 'vue';
import VueRouter from 'vue-router';
import admin_auth from './middleware/adminAuth'
import merchant_auth from './middleware/merchantAuth'

import Home from './modules/home/components/Home.vue'
import Register from './modules/register/components/Register.vue'
import ThankYou from './modules/register/components/thankyou.vue'
import MerchantDashboard from './modules/dashboard/components/MerchantDashboard.vue'
import AdminLogin from './modules/admin/components/login.vue'
import AdminRegister from './modules/admin/components/register.vue'
import AdminDashboard from './modules/dashboard/components/AdminDashboard.vue'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                publicLayout: true,
                adminLayout: false,
                publicSecure: false,
            }
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
            meta: {
                publicLayout: true,
                adminLayout: false,
                publicSecure: false,
            }
        },
        {
            path: '/thank-you',
            name: 'ThankYou',
            component: ThankYou
        },
        {
            path: '/merchant-dashboard',
            name: 'MerchantDashboard',
            component: MerchantDashboard,
            meta: {
                publicLayout: false,
                adminLayout: false,
                publicSecure: true
            }
        },
        {
            path: '/admin/login',
            name: 'AdminLogin',
            component: AdminLogin, 
            meta: {
                publicLayout: false,
                adminLayout: false,
                adminSecure: false,
            }
        },
        {
            path: '/admin/register',
            name: 'AdminRegister',
            component: AdminRegister,
            meta: {
                publicLayout: false,
                adminLayout: true,
                adminSecure: true,
            }
        },
        {
            path: '/admin-dashboard',
            name: 'AdminDashboard',
            component: AdminDashboard,
            meta: {
                adminLayout: true,
                publicLayout: false,
                adminSecure: true,
                middleware: [admin_auth]
            }
        }
    ]
});

// Creates a `nextMiddleware()` function which not only
// runs the default `next()` callback but also triggers
// the subsequent Middleware function.
function nextFactory(context, middleware, index) {
    const subsequentMiddleware = middleware[index];
    // If no subsequent Middleware exists,
    // the default `next()` callback is returned.
    if (!subsequentMiddleware) return context.next;

    return (...parameters) => {
        // Run the default Vue Router `next()` callback first.
        context.next(...parameters);
        // Than run the subsequent Middleware with a new
        // `nextMiddleware()` callback.
        const nextMiddleware = nextFactory(context, middleware, index + 1);
        subsequentMiddleware({ ...context, next: nextMiddleware });
    };
}

router.beforeEach((to, from, next) => {
    if (to.meta.middleware) {
        const middleware = Array.isArray(to.meta.middleware)
            ? to.meta.middleware
            : [to.meta.middleware];

        const context = {
            from,
            next,
            router,
            to,
        };
        const nextMiddleware = nextFactory(context, middleware, 1);

        return middleware[0]({ ...context, next: nextMiddleware });
    }

    return next();
});

export default router;
