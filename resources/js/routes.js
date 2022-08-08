import Login from '@/Pages/Auth/Login.vue';
import ForgotPassword from '@/Pages/Auth/ForgotPassword.vue';
import AddEmployeeDetails from "@/Pages/Auth/AddEmployeeDetails.vue"
import Employees from "@/Pages/Employees/Employees.vue"
import { createWebHistory, createRouter } from 'vue-router'
const routes = [
    {
        name: 'Home',
        redirect: '/login',

    },
    {
        name: 'Login',
        path: '/login',
        component: Login
    },
    {
        name: 'ForgotPassword',
        path: '/forgot-password',
        component: ForgotPassword
    },
    {
        name: 'AddEmployeeDetails',
        path: '/employee-details',
        component: AddEmployeeDetails

    },
    {
        name: 'Employees',
        path: '/employees',
        requiresAuth: true,
        component: Employees

    },

];

const router = createRouter({
    history: createWebHistory(),
    routes
})
router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('token')
    const authenticated = !!token
    const shouldbeAuthenticated = to.matched.some(
        record => record.meta.requiresAuth
    );
    if (shouldbeAuthenticated) {

        if (!authenticated) {
            next({
                path: "/login",
                query: { redirect: to.fullPath }
            });
        } else {
            next();
        }
    } else {
        next();
    }
});
export default router

