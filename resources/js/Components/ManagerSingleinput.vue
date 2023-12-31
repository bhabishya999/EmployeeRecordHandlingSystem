<template>
  <div class="relative">
    <Listbox v-model="value">
      <ListboxLabel class="text-sm text-slate-500">{{ label }}</ListboxLabel>
      <div class="">
        <ListboxButton
          class="
            bg-white
            pb-3.5
            mt-2
            pt-4
            pl-4
            w-full
            rounded-md
            text-sm
            leading-[150.69%]
            text-[#718096]
            font-normal font-sans
            border-solid border-2
            outline-primary outline-2
            active:border-primary
            focus:border-primary
          "
          :class="{ 'border-red-600': !!errorMessage }"
        >
          <span
            class="flex justify-between pr-3"
            :class="[value ? 'text-primary font-bold' : '']"
            >{{ value?.[labelProp] || "Please Select" }}
            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
              <path
                fillRule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clipRule="evenodd"
              />
            </svg>
          </span>
        </ListboxButton>

        <transition
          leave-active-class="transition duration-100 ease-in"
          leave-from-class="opacity-100"
          leave-to-class="opacity-0"
        >
          <ListboxOptions
            class="
              shadow-lg
              max-h-48
              overflow-auto
              bg-white
              w-full
              z-50
              absolute
            "
          >
            <ListboxOption
              v-slot="{ active }"
              v-for="option in options"
              :key="option[keyProp]"
              :value="option"
              as="template"
            >
              <li
                :class="[
                  active ? 'bg-blue-50' : 'text-gray-900',
                  'cursor-default  pl-5 select-none relative py-2 ',
                ]"
              >
                <span class="flex items-center" @click="update">
                  <img
                    :src="option.avatar"
                    alt="no pic"
                    class="rounded-full w-10 h-10 mr-3"
                  />
                  <div>
                    <p>{{ option[labelProp] }}</p>
                    <p class="text-sm text-primary">
                      {{ option.email }}
                    </p>
                  </div>
                </span>
              </li>
            </ListboxOption>
          </ListboxOptions>
        </transition>
      </div>
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
        <p class="text-red-600 font-normal text-sm leading-normal ml-[8px]">
          {{ name }} is a required field
        </p>
      </div>
    </Listbox>
  </div>
</template>

<script setup>
import {
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from "@headlessui/vue";
import { useField } from "vee-validate";

const props = defineProps({
  options: {
    type: Array,
    required: true,
  },
  modelValue: {
    type: Object,
  },
  keyProp: {
    type: String,
    required: true,
  },
  labelProp: {
    type: String,
    required: true,
  },
  name: {
    type: String,
    required: true,
  },
  label: {
    type: String,
    required: true,
  },
});

const { value, errorMessage } = useField(props.name, {
  initialValue: props.modelValue,
});
</script>
