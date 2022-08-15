<script setup>
defineProps({
    isLoading: {
        type: Boolean,
        default: false,
    },
    type: {
        type: String,
        default: "submit",
    },
});
</script>

<template>
    <button
        :type="type"
        class="relative bg-[#4C51BF] rounded-md drop-shadow-[0_10px_15px_rgba(0,0,0,0.08)] my-4 items-center justify-center text-white font-bold text-base leading-[150.69%] font-sans py-[15px]"
    >
        <svg
            v-show="isLoading"
            class="w-5 h-5 text-white animate-spin absolute left-1/2 -ml-2.5"
            fill="none"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
        >
            <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4"
            ></circle>
            <path
                class="opacity-75"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                fill="currentColor"
            ></path>
        </svg>
        <span :class="{ invisible: isLoading }">
            <slot></slot>
        </span>
    </button>
</template>
