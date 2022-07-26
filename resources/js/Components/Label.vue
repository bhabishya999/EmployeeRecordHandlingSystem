<script setup>
defineProps(["Label"]);
</script>

<template>
    <label class="block font-medium text-sm text-gray-700 pb-2.5">
        <span v-if="Label">{{ Label }}</span>
        <span v-else><slot /></span>
    </label>
</template>
