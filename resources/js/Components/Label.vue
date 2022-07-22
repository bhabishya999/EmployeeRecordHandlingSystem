<script setup>
defineProps(['value']);
</script>

<template>
    <label class="text-[#718096] font-medium font-sans text-base  not-italic">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
