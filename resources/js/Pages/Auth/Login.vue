<script setup>
import Button from "@/Components/Button.vue";

import GuestLayout from "@/Layouts/Guest.vue";
import PasswordInput from "@/Components/PasswordInput.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <GuestLayout>
        <form>
            <div class="p-10">
                <div>
                    <ApplicationLogo />
                </div>
                <div class="space-y-1">
                    <custom-input
                        label="Email Address"
                        v-model="email"
                        required
                        autocomplete="username"
                        placeholder=" your email@introcept.co"
                    />
                </div>
                <div class="mt-5">
                    <PasswordInput
                        id="password"
                        class="mt-1"
                        v-model="password"
                        required
                        autocomplete="current-password"
                        placeholder="your password"
                    />
                </div>

                <Button
                    type="submit"
                    class="w-full mt-[30px] mb-9"
                    :class="{ 'opacity-25': processing }"
                    :disabled="processing"
                >
                    login
                </Button>

                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="flex flex-col justify-center items-center text-[#4C51BF] font-bold text-base leading-[150.69%] font-sans"
                >
                    Forgot password?
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>

<script>
import axios from "axios";
import CustomInput from "@/Components/CustomInput.vue";
export default {
    compoenents: {
        CustomInput,
    },

    data() {
        return {
            email: "",
            password: "",
            remember: false,
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
                .post("http://talent.local/api/login", {
                    email: "sunita.gurau@introcept.co",
                    password: "password",
                })
                .then(function (response) {
                    console.log("sucessful message", response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>
