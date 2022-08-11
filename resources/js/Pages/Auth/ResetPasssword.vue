<template>
    <GuestLayout class="relative">
        <div v-if="reset_sucess">
            <form @submit.prevent="handleSubmit">
                <div
                    class="flex flex-col justify-center items-center border-b-2 border-solid border-b-gray-200"
                >
                    <svg
                        width="81"
                        height="80"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <circle cx="40.527" cy="40" r="40" fill="url(#a)" />
                        <path
                            d="M40.387 52.177c.84-4.19.223-8.217.027-12.062-.011 0-.016.005-.022.01.006-.005.011-.01.011-.02-3.85-.107-7.887-.622-12.055.313-5.306 1.195-9.3 5.614-9.22 11.09.042 2.798 1.259 5.284 3.181 7.132 1.89 1.875 4.408 3.038 7.207 3.012 5.48-.048 9.804-4.138 10.871-9.475ZM40.62 27.815c-.817 4.195-.18 8.216.033 12.061.01 0 .016-.005.02-.01-.004.005-.01.01-.01.02 3.85.086 7.887.585 12.056-.37 5.3-1.222 9.273-5.657 9.166-11.138-.053-2.8-1.285-5.28-3.218-7.117-1.901-1.87-4.424-3.017-7.223-2.98-5.475.08-9.782 4.19-10.823 9.534Z"
                            fill="#fff"
                        />
                        <path
                            d="M26.866 35.325c3.35.653 6.559.143 9.634-.032 0-.01-.006-.016-.006-.016.006.005.006.01.016.01.064-3.075.462-6.298-.302-9.628-.983-4.233-4.525-7.404-8.901-7.314-2.236.043-4.217 1.03-5.683 2.57-1.492 1.52-2.406 3.538-2.374 5.769.064 4.376 3.351 7.812 7.616 8.64ZM54.062 44.699c-3.35-.654-6.558-.144-9.633.032 0 .01.005.016.005.016-.005-.006-.005-.011-.016-.011-.064 3.075-.462 6.299.303 9.629.977 4.233 4.524 7.404 8.895 7.313 2.236-.042 4.217-1.03 5.683-2.57 1.492-1.52 2.406-3.537 2.374-5.768-.059-4.371-3.346-7.807-7.61-8.641Z"
                            fill="#E5E5E5"
                        />
                        <path
                            d="M40.387 52.177c.84-4.19.223-8.217.027-12.062-.011 0-.016.005-.022.01.006-.005.011-.01.011-.02-3.85-.107-7.887-.622-12.055.313-5.306 1.195-9.3 5.614-9.22 11.09.042 2.798 1.259 5.284 3.181 7.132 1.89 1.875 4.408 3.038 7.207 3.012 5.48-.048 9.804-4.138 10.871-9.475ZM40.62 27.815c-.817 4.195-.18 8.216.033 12.061.01 0 .016-.005.02-.01-.004.005-.01.01-.01.02 3.85.086 7.887.585 12.056-.37 5.3-1.222 9.273-5.657 9.166-11.138-.053-2.8-1.285-5.28-3.218-7.117-1.901-1.87-4.424-3.017-7.223-2.98-5.475.08-9.782 4.19-10.823 9.534Z"
                            fill="#fff"
                        />
                        <path
                            d="M26.866 35.325c3.35.653 6.559.143 9.634-.032 0-.01-.006-.016-.006-.016.006.005.006.01.016.01.064-3.075.462-6.298-.302-9.628-.983-4.233-4.525-7.404-8.901-7.314-2.236.043-4.217 1.03-5.683 2.57-1.492 1.52-2.406 3.538-2.374 5.769.064 4.376 3.351 7.812 7.616 8.64ZM54.062 44.699c-3.35-.654-6.558-.144-9.633.032 0 .01.005.016.005.016-.005-.006-.005-.011-.016-.011-.064 3.075-.462 6.299.303 9.629.977 4.233 4.524 7.404 8.895 7.313 2.236-.042 4.217-1.03 5.683-2.57 1.492-1.52 2.406-3.537 2.374-5.768-.059-4.371-3.346-7.807-7.61-8.641Z"
                            fill="#E5E5E5"
                        />
                        <defs>
                            <linearGradient
                                id="a"
                                x1="40.527"
                                y1="0"
                                x2="40.527"
                                y2="80"
                                gradientUnits="userSpaceOnUse"
                            >
                                <stop stop-color="#0457A2" />
                                <stop offset="1" stop-color="#636363" />
                            </linearGradient>
                        </defs>
                    </svg>

                    <h1
                        class="font-bold font-sans text-center text-base text-[#1A202C] not-italic mb-3"
                    >
                        IntroCept Employee <br />
                        Portal
                    </h1>
                </div>
                <p
                    class="text-[#1A202C] text-2xl font-bold leading-[150.69%] mt-[37px]"
                >
                    Reset Password
                </p>

                <p
                    v-if="!msg.previousPassword"
                    class="text-[#718096] font-normal text-sm leading-[150.69%] mt-[9px] mb-[30px]"
                >
                    Your new password must be diffrent from previous used one
                </p>
                <div
                    v-if="msg.previousPassword"
                    class="flex items-center w-full mt-[9px]"
                >
                    <div>
                        <svg
                            width="17"
                            height="17"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M8.5 16a7.5 7.5 0 1 0 0-15 7.5 7.5 0 0 0 0 15Z"
                                fill="#D93025"
                                stroke="#fff"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M8.5 5.5v3M8.5 11.5h.008"
                                stroke="#fff"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>
                    <p
                        class="text-[#D93025] font-normal text-sm leading-[150%] ml-[8px]"
                    >
                        {{ msg.previousPassword }}
                    </p>
                </div>
                <div>
                    <PasswordInput
                        :error="error"
                        label="Create new password"
                        v-model="newPassword"
                        id="password"
                        class="mt-1 w-full"
                        required
                        autocomplete="current-password"
                    />
                </div>

                <p
                    v-if="!msg.password"
                    class="text-[#718096] font-normal text-sm leading-[150.69%] mt-[20px] mb-[30px]"
                >
                    Password must have atleast 8 characters,1lowercase, 1
                    uppercase, 1 number and 1 special character
                </p>
                <div
                    v-if="msg.password"
                    class="flex items-center w-full mt-[9px]"
                >
                    <div>
                        <svg
                            width="17"
                            height="17"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M8.5 16a7.5 7.5 0 1 0 0-15 7.5 7.5 0 0 0 0 15Z"
                                fill="#D93025"
                                stroke="#fff"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M8.5 5.5v3M8.5 11.5h.008"
                                stroke="#fff"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>
                    <p
                        class="text-[#D93025] font-normal text-sm leading-[150%] ml-[8px]"
                    >
                        {{ msg.password }}
                    </p>
                </div>
                <div>
                    <PasswordInput
                        v-model="confirmPassword"
                        :error="error"
                        label="Re-enter new password"
                        id="password"
                        class="mt-1 w-full"
                        required
                        autocomplete="current-password"
                    />
                </div>
                <div
                    v-if="msg.confirmPassword"
                    class="flex items-center w-full mt-[9px]"
                >
                    <div>
                        <svg
                            width="17"
                            height="17"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M8.5 16a7.5 7.5 0 1 0 0-15 7.5 7.5 0 0 0 0 15Z"
                                fill="#D93025"
                                stroke="#fff"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M8.5 5.5v3M8.5 11.5h.008"
                                stroke="#fff"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>
                    <p
                        class="text-[#D93025] font-normal text-sm leading-[150%] ml-[8px]"
                    >
                        {{ msg.confirmPassword }}
                    </p>
                </div>

                <Button
                    type="submit"
                    class="w-full mt-[41px]"
                    @click="ResetPassword"
                >
                    Reset Password
                </Button>
                <div
                    v-if="togglePopUp"
                    class="fixed inset-0 w-full h-screen flex items-center justify-center bg-black bg-opacity-50"
                >
                    <TogglePopUp
                        :togglePopUp="togglePopUp"
                        @close="togglePopUp = !togglePopUp"
                        class="absolute z-10 top-1/2 left-1/2 !transform !-translate-x-1/2 !-translate-y-1/2"
                    >
                        <svg
                            width="120"
                            height="120"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M59.78 119.56c33.016 0 59.78-26.764 59.78-59.78C119.56 26.764 92.796 0 59.78 0 26.764 0 0 26.764 0 59.78c0 33.016 26.764 59.78 59.78 59.78Z"
                                fill="#C53030"
                            />
                            <path
                                d="M54.176 93.406h11.209V82.197h-11.21v11.21Zm0-70.989V70.99h11.209V22.417h-11.21Z"
                                fill="#E6E6E6"
                            />
                        </svg>

                        <p
                            class="text-[#4C51BF] leading-[150%] text-2xl font-bold my-[20px]"
                        >
                            Create a new password that <br />
                            isn’t your current password.
                        </p>
                    </TogglePopUp>
                </div>
            </form>
        </div>
        <div v-else>
            <ApplicationLogo></ApplicationLogo>
            <p
                class="text-[#1A202C] text-2xl font-bold leading-[150.69%] mt-[37px] mb-[41px]"
            >
                Password Reset Successfully
            </p>
            <p class="text-[#718096] font-normal text-sm leading-[150.69%]">
                You password has been reset. Please click next to login.
            </p>
            <router-link to="/login">
                <Button type="submit" class="w-full mt-[41px]">
                    Return to login
                </Button></router-link
            >
        </div>
    </GuestLayout>
</template>

<script>
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/Guest.vue";
import Label from "@/Components/Label.vue";
import PasswordInput from "@/Components/PasswordInput.vue";
import TogglePopUp from "@/Components/TogglePopUp.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

import { ref } from "vue";
export default {
    name: "ResetPasssword",
    components: {
        Button,
        GuestLayout,
        Label,
        PasswordInput,
        TogglePopUp,
        ApplicationLogo,
    },
    setup() {
        const togglePopUp = ref(false);

        return {
            togglePopUp,
        };
    },
    data() {
        return {
            newPassword: "",
            confirmPassword: "",
            error: false,
            msg: [],
            reset_sucess: true,
        };
    },
    watch: {
        newPassword(value) {
            this.newPassword = value;
            this.validateNewPassword(value);
        },
        confirmPassword(value) {
            this.confirmPassword = value;
            this.validateConfirmPassword(value);
        },
    },
    beforeRouteEnter(to, from, next) {
        axios
            .get(`validate-token?token=${to.query.token}`)
            .then(() => {
                next();
            })
            .catch(() => {
                next({
                    path: "/link-expired",
                });
            });
    },

    methods: {
        validateNewPassword(value) {
            if (
                /^(?=.*[0-9])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/.test(
                    value
                )
            ) {
                this.msg["password"] = "";
                this.error = false;
            } else {
                this.error = true;
                this.msg["password"] =
                    "Password must have atleast 8 characters,1lowercase, 1 uppercase, 1 number and 1 special character ";
            }
        },
        validateConfirmPassword() {
            if (this.newPassword == this.confirmPassword) {
                this.msg["confirmPassword"] = "";
                this.error = false;
            } else {
                this.error = true;
                this.msg["confirmPassword"] =
                    "The password you entered do not match. ";
            }
        },
        handleSubmit() {
            axios
                .post("reset-password", {
                    password: this.newPassword,
                    password_confirmation: this.confirmPassword,
                    token: this.$route.query.token,
                })
                .then(() => {
                    this.reset_sucess = false;
                })
                .catch((errors) => {
                    const { message } = errors.response.data;

                    if (
                        message ===
                        "New password should not same as old password!"
                    ) {
                        this.error = true;
                        this.msg["previousPassword"] = message;
                        this.togglePopUp = true;
                    }
                });
        },
    },
};
</script>
