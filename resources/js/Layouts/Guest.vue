<script setup>
// import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <div
        id="login-background"
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-no-repeat bg-cover"
    >
        <!-- <div>
            <Link href="/">
                <BreezeApplicationLogo
                    class="w-20 h-20 fill-current text-gray-500"
                />
            </Link>
        </div> -->

        <div class="w-[628px] px-[86px] py-[68px] bg-white shadow">
            <slot />
        </div>
    </div>
</template>
<style>
#login-background {
    background-image: url(../../images/loginbackground.png);
}
</style>
