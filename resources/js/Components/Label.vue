<script setup></script>

<template>
    <label
        class="block font-normal text-sm text-[#1A202C] pb-2.5 leading-[150.69%] placeholder:text-[#718096] placeholder:text-base placeholder:font-normal"
    >
        <span v-if="Label">{{ Label }}</span>
        <span v-else><slot /></span>
    </label>
</template>
<script>
export default {
    props: {
        Label: {
            required: true,
            type: String,
        },
    },
};
</script>
