import AddEmployeeDetails from "@/Pages/Auth/AddEmployeeDetails.vue";
import ForgotPassword from "@/Pages/Auth/ForgotPassword.vue";
import Login from "@/Pages/Auth/Login.vue";
import Employees from "@/Pages/Employees/Employees.vue";
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
        path: "/employee-details",
        component: AddEmployeeDetails,
    },
    {
        name: "Employees",
        path: "/employees",
        meta: {
            requiresAuth: true,
        },
        component: Employees,
    },
    {
        name: 'ResetPasssword',
        path: '/reset-passsword',
        component: ResetPasssword


    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
router.beforeEach((to, from, next) => {
    const token = localStorage.getItem("token");
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
