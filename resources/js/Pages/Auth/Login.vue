<script setup>
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/Guest.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <GuestLayout>
        <form @submit.prevent="submit">
            <div>
                <ApplicationLogo />
                <div>
                    <h1
                        class="font-bold font-sans text-lg not-italic text-[#1A202C] mt-8 mb-8"
                    >
                        Login to your account
                    </h1>
                </div>
            </div>
            <div class="space-y-1">
                <CustomInput
                    :error="error"
                    label="Email Address"
                    v-model="email"
                    required
                    autocomplete="current-password"
                    placeholder="your email@introcept.co"
                />
            </div>
            <div v-if="msg.email" class="flex items-center w-full mt-[9px]">
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
                    {{ msg.email }}
                </p>
            </div>
            <div class="mt-4 w-full">
                <PasswordInput
                    :error="error"
                    id="password"
                    label="Password"
                    class="mt-1 w-full"
                    v-model="password"
                    required
                    autocomplete="current-password"
                    placeholder="your password"
                />
            </div>

            <div v-if="msg.password" class="flex items-center w-full mt-[9px]">
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
            <Button
                type="submit"
                class="w-full mt-[30px] mb-9"
                :class="{ 'opacity-25': processing }"
                :disabled="processing"
            >
                login
            </Button>

            <router-link
                to="/forgot-password"
                class="flex flex-col justify-center items-center text-[#4C51BF] font-bold text-base leading-[150.69%] font-sans"
                >Forgot password?</router-link
            >
        </form>
    </GuestLayout>
</template>

<script>
import axios from "axios";
import PasswordInput from "@/Components/PasswordInput.vue";
import CustomInput from "@/Components/CustomInput.vue";

export default {
    components: {
        PasswordInput,
        CustomInput,
    },

    data() {
        return {
            email: "",
            password: "",
            error: false,
            msg: [],
        };
    },

    props: {
        canResetPassword: {
            required: true,
            type: Boolean,
        },
        status: {
            required: true,
            type: String,
        },
    },
    methods: {
        submit() {
            axios
                .post("login", {
                    email: this.email,
                    password: this.password,
                })
                .then((response) => {
                    const { talent_token } = response.data;
                    localStorage.setItem("talent_token", talent_token);
                    this.$router.push({
                        path: "/employes",
                    });
                })
                .catch((error) => {
                    const { message } = error.response.data;
                    this.msg["password"] = message;
                });
        },
    },
};
</script>
