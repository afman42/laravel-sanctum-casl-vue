import { createRouter, createWebHistory } from "vue-router";
import { useAuthStore } from "../store/auth";

const Login = () => import("../views/Login.vue");
const Dashboard = () => import("../views/Dashboard.vue");

const routes = [
    {
        name: "login",
        path: "/login",
        component: Login,
        meta: {
            middleware: "guest",
            title: `Login`,
        },
    },
    {
        name: "dashboard",
        path: "/",
        component: Dashboard,
        meta: {
            middleware: "auth",
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    //document.title = to.meta.title;
    let store = useAuthStore();
    //console.log(store.authenticatedUser);
    if (to.meta.middleware == "guest") {
        if (store.authenticatedUser) {
            next({ name: "dashboard" });
        }
        next();
    } else {
        if (store.authenticatedUser) {
            next();
        } else {
            next({ name: "login" });
        }
    }
});

export default router;
