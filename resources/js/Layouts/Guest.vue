<script setup>
// import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div id="background" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-origin-content  bg-norepeat bg-center bg-fixed">
        <!-- <div>
            <Link href="/">
                <BreezeApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div> -->

        <div class="w-full sm:max-w-[370px]  mt-6 px-6 py-4 bg-white shadow-md overflow-hidden ">
            <slot />
        </div>
    </div>
</template>
<style>
#background{
    background-image: url(../../images/background.svg);
}

</style>