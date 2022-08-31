import AddEmployeeDetails from "@/Pages/Auth/AddEmployeeDetails.vue";
import ForgotPassword from "@/Pages/Auth/ForgotPassword.vue";
import ResetPassword from "@/Pages/Auth/ResetPassword.vue";
import Login from "@/Pages/Auth/Login.vue";
import Employees from "@/Pages/Employees/Employees.vue";
import LinkExpired from "@/Pages/Auth/LinkExpired.vue"
import { createRouter, createWebHistory } from "vue-router";
const routes = [
    {
        name: "Home",
        redirect: "/login",
    },
    {
        name: "Login",
        path: "/login",
        component: Login,
    },
    {
        name: "ForgotPassword",
        path: "/forgot-password",
        component: ForgotPassword,
    },

    {
        name: "AddEmployeeDetails",
        path: "/employees/add",
        component: AddEmployeeDetails,
        meta: {
            requiresAuth: true,
        }
    },

    {
        name: "Employees",
        path: "/employees",
        component: Employees,
        meta: {
            requiresAuth: true,
        }

    },
    {
        name: 'LinkExpired',
        path: '/link-expired',
        component: LinkExpired
    },
    {
        name: 'ResetPassword',
        path: '/reset-password',
        component: ResetPassword
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
router.beforeEach((to, from, next) => {
    const token = localStorage.getItem("talent_token");
    const authenticated = !!token;
    const requiresAuth = to.matched.some((record) => record.meta.requiresAuth);

    if (requiresAuth) {
        if (!authenticated && to.name !== "Login") {

            next({
                path: "/login",
                query: { redirect: to.fullPath },
            });
        } else {
            next();
        }
    } else {
        next();
    }
});
export default router;
