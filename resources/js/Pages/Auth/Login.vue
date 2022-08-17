<script setup>
import GuestLayout from "@/Layouts/Guest.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <GuestLayout>
        <Form @submit="onSubmit" :validation-schema="schema">
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
                    type="text"
                    label="Email Address"
                    name="email"
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
                :disabled="isLoading"
                :class="{ 'opacity-80 cursor-not-allowed': isLoading }"
                type="submit"
                class="w-full mt-[30px] mb-9"
                :isLoading="isLoading"
            >
                Login
            </Button>

            <router-link
                to="/forgot-password"
                class="flex flex-col justify-center items-center text-[#4C51BF] font-bold text-base leading-[150.69%] font-sans"
                >Forgot password?</router-link
            >
        </Form>
    </GuestLayout>
</template>

<script>
import axios from "axios";
import PasswordInput from "@/Components/PasswordInput.vue";
import CustomInput from "@/Components/CustomInput.vue";
import Button from "@/Components/Button.vue";
import { Form } from "vee-validate";
import * as Yup from "Yup";
export default {
    components: {
        PasswordInput,
        CustomInput,
        Button,
        ApplicationLogo,
        GuestLayout,
        Form,
        Yup,
    },

    data() {
        const schema = Yup.object().shape({
            email: Yup.string().email().required(),
        });
        return {
            schema,
            password: "",
            error: false,
            msg: [],
            isLoading: false,
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
        onSubmit(values) {
            const { email } = values;
            this.isLoading = true;
            axios
                .post("login", {
                    email: email,
                    password: this.password,
                })
                .then((response) => {
                    const { token } = response.data;
                    localStorage.setItem("talent_token", token);
                    this.$router.push({
                        path: "/employes",
                    });
                })
                .catch((error) => {
                    const { message } = error.response.data;
                    this.msg["password"] = message;
                    this.error = true;
                })
                .finally(() => (this.isLoading = false));
        },
    },
};
</script>
