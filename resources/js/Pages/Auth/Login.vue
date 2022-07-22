<script setup>
// import BreezeButton from '@/Components/Button.vue';
// import BreezeCheckbox from '@/Components/Checkbox.vue';
import GuestLayout from "@/Layouts/Guest.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import InputField from "@/Components/InputField.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
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

        <!-- <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div> -->

        <form @submit.prevent="submit">
            <div class="m-6">
                <div>
                    <ApplicationLogo />
                </div>
                
                <div class="space-y-2">
                    <InputField/>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>
