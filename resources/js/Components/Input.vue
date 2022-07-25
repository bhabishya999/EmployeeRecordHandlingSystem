<script setup>
import { onMounted, ref } from 'vue';

defineProps(['modelValue']);

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>


<template>
    <input class=" rounded-md text-base leading-[150.69%] text-[#000000] font-normal font-sans border-solid border-[1px] border-[#E2E8F0] focus:border-[#4C51BF] focus:ring-1 focus:ring-[#4C51BF] w-full placeholder:text-[#718096]" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>




