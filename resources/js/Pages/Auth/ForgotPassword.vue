<template>
    <GuestLayout>
        <div v-if="email_sent">
            <div>
                <ApplicationLogo />
            </div>
            <div>
                <div>
                    <h1
                        class="mt-11 font-bold font-sans text-xl text-[#1A202C] not-italic"
                    >
                        Reset your password
                    </h1>
                </div>
                <p class="text-[#718096] text-sm my-7">
                    Enter the email associated with your account and we’ll send
                    an email with instructions to reset your password.
                </p>

                <form @submit.prevent="submit">
                    <div>
                        <custom-input
                            :error="error"
                            v-model="email"
                            required
                            autocomplete
                            label="We’ll send a recovery link to "
                            placeholder="sunita.shakya@introcept.co"
                        />
                    </div>
                    <div
                        v-if="msg.email"
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
                            {{ msg.email }}
                        </p>
                    </div>

                    <Button
                        type="submit"
                        class="w-full mt-10"
                        :disabled="isLoading"
                        :class="{ 'opacity-80 cursor-not-allowed': isLoading }"
                        :isLoading="isLoading"
                    >
                        Continue
                    </Button>
                </form>
                <router-link
                    to="/login"
                    class="text-md flex items-center justify-center mt-1 font-bold text-[#4C51BF]"
                >
                    <div class="mr-2">
                        <svg
                            width="7"
                            height="12"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M6 11 1 6l5-5"
                                stroke="#4C51BF"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>
                    Return to Login</router-link
                >
            </div>
        </div>

        <div v-else>
            <div
                class="flex flex-col justify-center items-center w-[284px] mx-auto"
            >
                <img src="../../../images/email.png" alt="Email" />

                <div
                    class="mb-8 mt-5 font-bold font-sans text-2xl text-[#1A202C] not-italic"
                >
                    Verify your email address
                </div>
                <p class="text-[#718096] text-md">We sent a recovery link at</p>

                <p class="text-[#4C51BF] text-md font-bold">{{ email }}</p>
            </div>
        </div>
    </GuestLayout>
</template>
<script>
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/Guest.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import CustomInput from "@/Components/CustomInput.vue";

export default {
    name: "ForgotPassword",
    components: {
        CustomInput,
        Button,
        GuestLayout,
        ApplicationLogo,
    },
    data() {
        return {
            email: "",
            error: false,
            email_sent: true,
            msg: [],
            isLoading: false,
        };
    },

    methods: {
        submit() {
            this.isLoading = true;
            axios
                .post("send-email", {
                    email: this.email,
                })
                .then(() => {
                    this.email_sent = false;
                })
                .catch((error) => {
                    const { message } = error.response.data;
                    this.msg["email"] = message;
                    this.error = true;
                })
                .finally(() => (this.isLoading = false));
        },
    },
};
</script>
