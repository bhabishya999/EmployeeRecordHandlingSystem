<script setup>
import { onMounted, ref } from "vue";
import Label from "@/Components/Label.vue";
defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});
</script>

<template>
    <Label :for="id" :Label="label" />
    <input
        :id="id"
        :type="type"
        class="bg-white pb-3.5 pt-4 pl-4 w-full rounded-md text-sm leading-[150.69%] text-[#718096] font-normal font-sans border-solid border-2 outline-[#4C51BF] outline-2 border-[#E2E8F0] active:border-[#4C51BF]"
        :placeholder="placeholder"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
<script>
export default {
    name: "CustomInput",

    props: {
        modelValue: {
            required: true,
        },
        label: {
            type: String,
            requird: true,
        },
        name: {
            type: String,
            requird: true,
        },
        id: {
            type: String,
            requird: true,
        },
        placeholder: {
            type: String,
            required: true,
        },
    },
};
</script>
