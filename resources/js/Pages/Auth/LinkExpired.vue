<template>
    <GuestLayout>
        <div class="flex flex-col items-center justify-center">
            <div>
                <img src="../../../images/expire-link.png" alt="linkExpire" />
            </div>
            <p
                class="my-[17px] text-[#4C51BF] font-bold text-[26px] leading-[150.69%]"
            >
                SORRY!
            </p>
            <p class="font-light text-base text-[#4C51BF] leading-[150.69%]">
                The password reset link was expired
            </p>
            <button
                class="py-[15px] px-[41px] text-white text-base font-bold leading-[150.69%] bg-[#4C51BF] mt-[17px] !rounded-md"
            >
                Request Another Link
            </button>
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
