<template>
    <GuestLayout>
        <div class="flex flex-col items-center justify-center">
            <div>
                <img src="../../../images/expire-link.png" alt="linkExpire" />
            </div>
            <p
                class="my-[17px] text-indigo-700 font-bold text-[26px] leading-normal"
            >
                SORRY!
            </p>
            <p class="font-light text-base text-indigo-700 leading-normal">
                The password reset link was expired
            </p>
            <router-link to="/forgot-password">
                <button
                    class="py-[15px] px-[41px] text-white text-base font-bold leading-normal bg-[#4C51BF] mt-[17px] !rounded-md"
                >
                    Request Another Link
                </button>
            </router-link>
        </div>
    </GuestLayout>
</template>
<script>
import GuestLayout from "@/Layouts/Guest.vue";
export default {
    name: "LinkExpired",
    components: {
        GuestLayout,
    },
};
</script>
