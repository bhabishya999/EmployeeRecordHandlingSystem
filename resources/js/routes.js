import AddEmployeeDetails from "@/Pages/Auth/AddEmployeeDetails.vue";
import ForgotPassword from "@/Pages/Auth/ForgotPassword.vue";
import ResetPassword from "@/Pages/Auth/ResetPassword.vue";
import Login from "@/Pages/Auth/Login.vue";
import Employees from "@/Pages/Employees/Employees.vue";
import EditEducationPage from "@/Pages/Auth/EditEducationPage.vue";
import LinkExpired from "@/Pages/Auth/LinkExpired.vue"
import EmployeeDetail from "@/Pages/Employees/EmployeeDetail.vue"
import ImportDataFromExcel from "@/Pages/Auth/ImportDataFromExcel.vue"
import { createRouter, createWebHistory } from "vue-router";
import EditPersonalDetailPage from "@/Pages/Auth/EditPersonalDetailPage.vue"
import EditKeyDetailPage from "@/Pages/Auth/EditKeyEmployeeDetail.vue"
import DashBoard from "@/Pages/Auth/DashBoard.vue"
import LeaveListingPage from "@/Pages/Auth/LeaveListingPage.vue"
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
        name: "EmployeeDetail",
        path: "/employees/:id",
        component: EmployeeDetail,
        meta: {
            requiresAuth: true,
        }
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
        name: "editProfile",
        path: "/employees/:id/editpersonaldetail",
        component: EditPersonalDetailPage,
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
        name: "Dashboard",
        path: "/dashboard",
        component: DashBoard,
        meta: {
            requiresAuth: true,
        }

    },
    {

        name:"LeaveListingPage",
        path: "/leave",
        component: LeaveListingPage,
        meta: {
            requiresAuth: true,
        }
    },
    {
        name: "ImportDataFromExcel",
        path: "/employees/import",
        component: ImportDataFromExcel,
        meta: {
            requiresAuth: true,
        }

    },
    {
        name: "EditEducationPage",
        path: "/employees/:id/editeducationdetailpage",
        component: EditEducationPage,
        meta: {
        requiresAuth: true,
        }
    },
    {
        name: "editKeyDetail",
        path: "/employees/:id/editkeydetail",
        component: EditKeyDetailPage,
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
        const pageName = ['Login', 'ForgotPassword', 'ResetPassword', 'LinkExpired'];
        if (authenticated && pageName.includes(to.name)) {
            next({
                path: "/dashboard",
                query: { redirect: to.fullPath },
            });
        } else {
            next();
        }
    }
});

export default router;
