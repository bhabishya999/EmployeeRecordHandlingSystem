<script setup>
// import { computed } from 'vue';

// const emit = defineEmits(['update:checked']);

// const props = defineProps({
//     checked: {
//         type: [Array, Boolean],
//         default: false,
//     },
//     value: {
//         default: null,
//     },
// });

// const proxyChecked = computed({
//     get() {
//         return props.checked;
//     },

//     set(val) {
//         emit("update:checked", val);
//     },
// });


</script>

<template>
<Label for="email" value="Email Address" />
<Input id="email" type="email" placeholder="Your email" class="w-full  placeholder:text-[#718096]" v-model="form.email" required autocomplete="username" />
</template>

-->
