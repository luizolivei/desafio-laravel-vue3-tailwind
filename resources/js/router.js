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
        console.log("caiu aq", store.getters.userRole)
        if (!store.getters.isAuthenticated) {
            console.log("caiu aq1")
            // next({name: 'Login'});
        }
        if (to.matched.some(record => record.meta.requiresAdmin) && store.getters.userRole !== 2) {
            console.log("caiu aq2")
            // next({name: 'Home'});
        }
        if (to.matched.some(record => record.meta.requiresUser) && store.getters.userRole === 1) {
            console.log("caiu aq3")
            // next({name: 'Home'});
        }
        console.log("caiu aq4")
        next();
    }
    next();
});

export default router;
