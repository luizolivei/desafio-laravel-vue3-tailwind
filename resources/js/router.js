import { createRouter, createWebHistory } from "vue-router";

const routes = [
    //Erro page when the url not mathing with anything here
    { path: '/:pathMatch(.*)*',
        component: () => import("./pages/NotFound.vue")
    },
    {
        path: "/",
        component: () => import("./pages/HomeRoute.vue"),
    },
    {
        path: "/test",
        component: () => import("./pages/TestRoute.vue"),
    }
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
