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
<Label :value="label"/>
<input  id="email" type="email" 
class=" relative pb-3.5 pt-4 pl-4 w-full rounded-md text-sm leading-[150.69%] text-[#718096] font-normal font-sans border-solid border-2 border-[#E2E8F0] active:border-[#4C51BF]"
            :value="modelValue"
            placeholder="your email@introcept.co"
            @input="$emit('update:modelValue', $event.target.value)"
            ref="input"
            />
</template>
<script>

export default {
 name: "CustomInput",
    data() {
        return {
            email: " ",
            remember: false,
            label:"Email Address"
        }
    },
     props: {
        modelValue: {
            required: true,
        },
        
    },

   
};
</script>