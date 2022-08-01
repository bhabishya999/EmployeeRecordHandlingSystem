<template>
    <div
        v-show="togglePopUp"
        class="z-10 w-[515px] h-[395px] bg-white shadow-[0_10px_15px_rgba(0,0,0,0.1)] flex flex-col items-center justify-center mt-20"
    >
        <slot />
        <button
            @click="$emit('close')"
            class="font-bold text-base py-[15px] px-[34px] border-[#4C51BF] text-[#4C51BF] border rounded-md"
        >
            Close
        </button>
    </div>
</template>

<script>
export default {
    props: {
        togglePopUp: {
            type: Boolean,
            required: true,
        },
    },
};
</script>
