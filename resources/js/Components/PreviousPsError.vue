<template>
    <div
        class="w-[515px] h-[395px] bg-white shadow-[0_10px_15px_rgba(0,0,0,0.1)] flex flex-col items-center justify-center mt-20"
    >
        <svg
            width="120"
            height="120"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                d="M59.78 119.56c33.016 0 59.78-26.764 59.78-59.78C119.56 26.764 92.796 0 59.78 0 26.764 0 0 26.764 0 59.78c0 33.016 26.764 59.78 59.78 59.78Z"
                fill="#C53030"
            />
            <path
                d="M54.176 93.406h11.209V82.197h-11.21v11.21Zm0-70.989V70.99h11.209V22.417h-11.21Z"
                fill="#E6E6E6"
            />
        </svg>

        <p class="text-[#4C51BF] leading-[150%] text-2xl font-bold my-[20px]">
            Create a new password that <br />
            isn’t your current password.
        </p>
        <button
            class="font-bold text-base py-[15px] px-[34px] border-[#4C51BF] text-[#4C51BF] border rounded-md"
        >
            Close
        </button>
    </div>
</template>

<script>
export default {
    name: "PreviousPsError",
};
</script>
