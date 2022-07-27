<script setup>
import Button from "@/Components/Button.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import GuestLayout from "@/Layouts/Guest.vue";
import PasswordInput from "@/Components/PasswordInput.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
<GuestLayout>

    <form @submit.prevent="submit">
        <div class="w-full">
            <!-- <div>
                <ApplicationLogo />
            </div> -->
            <div class="space-y-2">
                <CustomInput v-model="form.password" required autocomplete="current-password" placeholder="your Email@introcept.co" />
            </div>
            <div class="mt-4 w-full">
                <PasswordInput id="password" class="mt-1 w-full" v-model="form.password" required autocomplete="current-password" placeholder="your password" />
            </div>

            <Button type="submit" class="w-full mt-[30px] mb-9" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                login
            </Button>

            <Link v-if="canResetPassword" :href="route('password.request')" class="flex flex-col justify-center items-center text-[#4C51BF] font-bold text-base leading-[150.69%] font-sans">
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
    compoenents:{
 CustomInput,
    },

    data() {
        return{
email: "",
    password: "",
    remember: false,
        }

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
