import { createRouter, createWebHistory } from "vue-router";
import store from './store';

const routes = [
    //Erro page when the url not mathing with anything here
    { path: '/:pathMatch(.*)*',
        component: () => import("./pages/NotFound.vue")
    },
    {
        path: "/",
        name: "Home",
        component: () => import("./pages/HomeRoute.vue"),
    },
    {
        path: "/normal",
        name: "Normal",
        component: () => import("./pages/TestRoute.vue"),
        meta: { requiresAuth: true, requiresUser: true },
    },
    {
        path: "/admin",
        name: "Admin",
        component: () => import("./pages/TestRoute.vue"),
        meta: { requiresAuth: true, requiresAdmin: true }
    },
    {
        path: "/login",
        name: "Login",
        component: () => import("./pages/Login.vue"),
    },
    {
        path: "/register",
        name: "Register",
        component: () => import("./pages/Register.vue"),
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    console.log("aq caiu")
    if (to.matched.some(record => record.meta.requiresAuth)) {
        console.log("aq caiu2")
        if (!store.getters.isAuthenticated) {
            console.log("aq caiu3", store.getters.getToken)
            // next({ name: 'Login' });
        } else {
            if (to.matched.some(record => record.meta.requiresAdmin) && store.getters.userRole !== '2') {
                next({ name: 'Home' });
            } else if (to.matched.some(record => record.meta.requiresUser) && store.getters.userRole === '1') {
                next({ name: 'Home' });
            } else {
                next();
            }
        }
    } else {
        next();
    }
});

export default router;
