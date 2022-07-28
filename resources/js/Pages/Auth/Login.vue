<script setup>
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/Guest.vue";

</script>

<template>
    <GuestLayout>
        <form @submit.prevent="login">
            <div>
                <PasswordInput
                    :error="error"
                    label="Password"
                    id="password"
                    class=""
                    v-model="password"
                    required
                    autocomplete="current-password"
                    placeholder="your password"
                />

                <div v-if="error" class="flex items-center w-full mt-[9px]">
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
                        Incorrect password. Try again or click Forgot Password
                        to reset it.
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
import PasswordInput from "@/Components/PasswordInput.vue";
export default {
    components: {
        PasswordInput,
    },

    data() {
        return {
            email: "",
            password: "",
            error: false,
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
        login() {
            var regularExpression =
                /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/;
            if (password.length < 8 || password.length > 20) {
                return (this.error = true);
            }

            if (!regularExpression.test(this.password)) {
                return (this.error = true);
            }
            if (this.password) {
                console.log("Login function called");
                this.error = false;
            }
            if (!this.password) {
                this.error = true;
            }
        },
    },
};
</script>
