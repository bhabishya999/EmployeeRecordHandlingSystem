<script setup></script>

<template>
    <label class="block font-medium text-sm text-gray-700 pb-2.5">
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
