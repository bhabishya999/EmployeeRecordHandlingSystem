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
    <Label for="password" Label="Password" />
    <div class="border-0 relative">
        <input
            class="relative pb-3.5 pt-4 pl-4 w-full rounded-md text-sm leading-[150.69%] text-[#718096] font-normal font-sans border-solid border-2 border-[#E2E8F0] active:border-[#4C51BF]"
            :value="modelValue"
            placeholder="your password"
            @input="$emit('update:modelValue', $event.target.value)"
            ref="input"
            :type="visible ? 'password' : 'text'"
        />
        <div
            class="absolute inset-y-0 right-0 pr-5 flex items-center"
            v-on:click="togglePassword"
        >
            <svg
                v-if="visible"
                width="21"
                height="16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M1.85 7.545S5.043 1 10.63 1c5.588 0 8.782 6.545 8.782 6.545s-3.194 6.546-8.782 6.546S1.85 7.545 1.85 7.545Z"
                    stroke="#718096"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M10.631 10c1.323 0 2.395-1.099 2.395-2.455 0-1.355-1.072-2.454-2.395-2.454-1.322 0-2.395 1.099-2.395 2.454C8.236 8.901 9.31 10 10.631 10Z"
                    stroke="#718096"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>

            <svg
                v-else
                width="21"
                height="17"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M12.333 9.764a2.51 2.51 0 0 1-.777.414c-.294.097-.611.15-.933.154-.321.004-.64-.04-.939-.13a2.575 2.575 0 0 1-.796-.393 1.847 1.847 0 0 1-.527-.593c-.12-.223-.18-.46-.174-.7.006-.24.076-.476.207-.695.13-.22.32-.416.555-.58m6.433 4.796c-1.364.775-3.026 1.205-4.741 1.226-5.587 0-8.78-4.76-8.78-4.76.993-1.38 2.37-2.585 4.039-3.535l9.482 7.069ZM8.965 3.885a9.667 9.667 0 0 1 1.676-.142c5.587 0 8.78 4.76 8.78 4.76a11.487 11.487 0 0 1-1.724 1.898L8.965 3.885ZM1.86 1.958l17.56 13.09"
                    stroke="#718096"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            visible: true,
        };
    },
    props: {
        modelValue: {
            required: true,
        },
        Label: {
            required: true,
            type: String,
        },
    },
    methods: {
        togglePassword() {
            this.visible = !this.visible;
        },
    },
};
</script>
