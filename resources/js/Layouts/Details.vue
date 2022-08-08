<template>
    <div class="min-h-screen bg-[#EDF2F7] px-40 py-6">
        <div
            class="bg-white  drop-shadow-[0_1px_2px_rgba(0,0,0,0.06)_0_10px_15px_rgba(0,0,0,0.1)]"
        >
            <slot />
        </div>
    </div>
</template>
<script>
export default {
    name: "Details",
};
</script>
