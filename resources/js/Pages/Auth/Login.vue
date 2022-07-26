<script setup>
import Button from "@/Components/Button.vue";

import GuestLayout from "@/Layouts/Guest.vue";
import PasswordInput from "@/Components/PasswordInput.vue";

import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

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
        <Head title="Log in" />

        <ValidationErrors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="w-full">
                <div class="mt-4 w-full">
                    <PasswordInput
                        id="password"
                        class="mt-1 w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        placeholder="your password"
                    />
                </div>

                <Button
                    class="w-full mt-[30px] mb-9"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
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
export default {
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
};
</script>
