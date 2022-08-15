<template>
    <GuestLayout>
        <ApplicationLogo></ApplicationLogo>
        <p
            class="text-[#1A202C] text-2xl font-bold leading-[150.69%] mt-[37px] mb-[41px]"
        >
            Password Reset Successfully
        </p>
        <p class="text-[#718096] font-normal text-sm leading-[150.69%]">
            You password has been reset. Please click next to login.
        </p>
        <Button type="submit" class="w-full mt-[41px]">
            Return to login
        </Button>
    </GuestLayout>
</template>

<script>
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/Guest.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
export default {
    name: "ResetPasswordSucessful",
    components: {
        Button,
        GuestLayout,
        ApplicationLogo,
    },
};
</script>
