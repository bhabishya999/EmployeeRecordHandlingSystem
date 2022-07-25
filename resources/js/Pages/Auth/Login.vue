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

        <!-- <ValidationErrors class="mb-4" /> -->

        <!-- <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div> -->

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
