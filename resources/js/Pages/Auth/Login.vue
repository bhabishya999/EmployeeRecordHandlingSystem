<script setup>

import GuestLayout from "@/Layouts/Guest.vue";
import TalentApplicationLogo from "@/Components/ApplicationLogo.vue";

import { Head } from "@inertiajs/inertia-vue3";


</script>

<script>
import InputField from "@/Components/InputField.vue";
export default {
components:{
    InputField,
}
}
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        

        <form @submit.prevent="submit">
            <div class="m-6">
                <div>
                    <TalentApplicationLogo />
                </div>
                
                <div class="space-y-2">
                    <InputField/>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>
