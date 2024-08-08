import {createRouter, createWebHistory} from "vue-router";
import store from './store';

const routes = [
    //Erro page when the url not mathing with anything here
    {
        path: '/:pathMatch(.*)*',
        component: () => import("./pages/NotFound.vue")
    },
    {
        path: "/",
        name: "Home",
        component: () => import("./pages/home/index.vue"),
    },
    {
        path: "/admin",
        name: "Admin",
        component: () => import("./pages/TestRoute.vue"),
        meta: {requiresAuth: true, requiresAdmin: true}
    },
    {
        path: "/login",
        name: "Login",
        component: () => import("./pages/login/index.vue"),
    },
    {
        path: "/register",
        name: "Register",
        component: () => import("./pages/register/index.vue"),
    },
    {
        path: "/curriculo",
        name: "Curriculo",
        component: () => import("./pages/curriculo/index.vue"),
        meta: {requiresAuth: true, requiresUser: true},
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!store.getters.isAuthenticated) {
            next({name: 'Login'});
        }
        if (to.matched.some(record => record.meta.requiresAdmin) && store.getters.userRole !== 2) {
            next({name: 'Home'});
        }
        if (to.matched.some(record => record.meta.requiresUser) && store.getters.userRole === 1) {
            next({name: 'Home'});
        }
        next();
    }
    next();
});

export default router;
