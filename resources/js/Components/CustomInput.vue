<script setup>
import { useField } from "vee-validate";

import { toRef } from "vue";

const props = defineProps({
    type: {
        type: String,
        default: "text",
    },
    value: {
        type: String,
        default: "",
    },
    name: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        required: true,
    },

    placeholder: {
        type: String,
        default: "",
    },
});

const name = toRef(props, "name");

const {
    value: inputValue,
    errorMessage,
    handleBlur,
    handleChange,
    meta,
} = useField(name, undefined, {
    initialValue: props.value,
});
</script>

<template>
    <div>
        <label
            :for="name"
            class="block font-normal text-sm text-slate-500 pb-2.5 leading-[150.69%] placeholder:text-slate-500 placeholder:text-base placeholder:font-normal"
            >{{ label }}</label
        >
        <input
            class="bg-white pb-3.5 pt-4 pl-4 w-full rounded-md text-sm leading-[150.69%] text-slate-500 font-normal font-sans border-solid border-2 outline-indigo-700 outline-2 border-slate-200 active:border-indigo-700"
            :class="{ 'border-red-500': !!errorMessage }"
            :name="name"
            :id="name"
            :type="type"
            :value="inputValue"
            :placeholder="placeholder"
            @input="handleChange"
            @blur="handleBlur"
        />
        <div v-show="errorMessage" class="flex items-center w-full mt-[9px]">
            <div>
                <svg
                    width="17"
                    height="17"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M8.5 16a7.5 7.5 0 1 0 0-15 7.5 7.5 0 0 0 0 15Z"
                        fill="#D93025"
                        stroke="#fff"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M8.5 5.5v3M8.5 11.5h.008"
                        stroke="#fff"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </div>
            <p class="text-error font-normal text-sm leading-[150%] ml-[8px]">
                {{ errorMessage }}
            </p>
        </div>
    </div>
</template>
