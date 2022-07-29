<template>
    <div v-if="error" class="flex items-center w-full mt-[9px]">
        <div>
            <svg
                width="17"
                height="17"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M8.5 16a7.5 7.5 0 1 0 0-15 7.5 7.5 0 0 0 0 15Z"
                    fill="#D93025"
                    stroke="#fff"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M8.5 5.5v3M8.5 11.5h.008"
                    stroke="#fff"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </div>
        <p class="text-[#D93025] font-normal text-sm leading-[150%] ml-[8px]">
            Incorrect password. Try again or click Forgot Password to reset
            it.{{ error }}
        </p>
    </div>
</template>
<script>
export default {
    name: "Error",
    props: {
        error: {
            required: true,
        },
    },
};
</script>
