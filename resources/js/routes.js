import Login from '@/Pages/Auth/Login.vue';
import ForgotPassword from '@/Pages/Auth/ForgotPassword.vue';
import AddEmployeeDetails from "@/Pages/Auth/AddEmployeeDetails.vue"
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

];

const router = createRouter({
    history: createWebHistory(),
    routes
})
export default router

