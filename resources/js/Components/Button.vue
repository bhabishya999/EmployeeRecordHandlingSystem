<script setup>
defineProps({
    type: {
        type: String,
        default: "submit",
    },
});
</script>

<template>
    <button
        :type="type"
        class="bg-[#4C51BF] rounded-md drop-shadow-[0_10px_15px_rgba(0,0,0,0.08)] my-4 items-center justify-center text-white font-bold text-base leading-[150.69%] font-sans py-[15px]"
    >
        <slot />
    </button>
</template>
