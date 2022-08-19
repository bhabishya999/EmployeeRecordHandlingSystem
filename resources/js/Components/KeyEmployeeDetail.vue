<script setup>
// import { ref } from "vue";
import Details from "@/Layouts/Details.vue";
import { ref } from "vue";
// import { reactive, watch } from "vue";
import {
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from "@headlessui/vue";
import { object } from "yup/lib/locale";
// let defaultSelect = ref({ label: "Please Select" });
// const selectedOrganization = ref({ label: "Please Select" });
</script>
<template>
  <Details>
    <form @submit.prevent="submit">
      <div class="p-9">
        <div class="flex justify-between">
          <h1 class="text-black font-bold leading-[150%] text-2xl font-sans">
            EMPLOYEE DETAILS
          </h1>
          <button
            type="button"
            class="
              bg-[#4C51BF]
              p-[7px]
              rounded-md
              drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)]
              flex
              text-white
              font-bold
              text-base
              leading-[150%]
              font-sans
            "
          >
            <svg
              class="mr-[9px]"
              width="8"
              height="14"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M0 13.152V.848C0 .657.129.5.287.5h1.147c.158 0 .287.157.287.348v5.119L6.392.715c.493-.496 1.255-.081 1.255.714V12.57c0 .795-.762 1.21-1.255.714l-4.671-5.22v5.087c0 .191-.13.348-.287.348H.287c-.158 0-.287-.157-.287-.348Z"
                fill="#fff"
              />
            </svg>
            Back to List
          </button>
        </div>
        <div class="mt-[30px] mb-5">
          <ul class="flex">
            <li class="font-bold leading-[150%] text-lg py-2.5 px-1.5">
              Personal Details
            </li>
            <li class="font-bold leading-[150%] text-lg py-2.5 px-1.5 mr-7">
              Educational Details
            </li>
            <li
              class="
                font-semibold
                leading-[150%]
                text-lg
                py-2.5
                px-1.5
                bg-primary
                rounded-lg
                font-sans
                text-white
                mr-7
              "
            >
              Key Employment Details
            </li>
          </ul>
        </div>
        <div class="flex">
          <div class="w-2/3 mr-10">
            <div>
              <div class="flex flex-row justify-between mb-2.5">
                <div class="w-full mr-10">
                  <Listbox v-model="selectedOrganization">
                    <ListboxLabel class="text-sm">Organization*</ListboxLabel>
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
                          border-[#E2E8F0]
                          active:border-primary
                          focus:border-primary
                        "
                      >
                        <span class="flex justify-between pr-3"
                          >{{ selectedOrganization.label }}
                          <svg
                            class="w-5 h-5"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                          >
                            <path
                              fillRule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clipRule="evenodd"
                            />
                          </svg>
                        </span>
                      </ListboxButton>
                      <ListboxOptions
                        class="shadow-lg bg-white z-50 w-[462px] absolute"
                      >
                        <ListboxOption
                          v-slot="{ active }"
                          v-for="option in organizations"
                          :key="option.label"
                          :value="option"
                          as="template"
                        >
                          <li
                            :class="[
                              active ? 'bg-[#EBF4FF]' : 'text-gray-900',
                              'cursor-default select-none py-2',
                            ]"
                          >
                            <span
                              :class="['block truncate font-bold text-center']"
                              @click="update"
                              >{{ option.label }}</span
                            >
                          </li>
                        </ListboxOption>
                      </ListboxOptions>
                    </div>
                  </Listbox>
                </div>
                <div class="w-full">
                  <CustomInput
                    type="date"
                    :error="error"
                    label="Join Date*"
                    v-model="joinDate"
                    required
                    placeholder="DD-MM-YYYY"
                  ></CustomInput>
                </div>
              </div>
            </div>
            <div class="flex flex-row justify-between mb-2.5">
              <div class="w-full mr-10">
                <CustomInput
                  type="text"
                  :error="error"
                  label="Curent Position*"
                  v-model="position"
                  required
                  placeholder="Enter Current Position"
                ></CustomInput>
              </div>
              <div class="w-full">
                <Listbox v-model="selectedworkschedule">
                  <ListboxLabel class="text-sm">Work Schedule*</ListboxLabel>
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
                        border-[#E2E8F0]
                        active:border-primary
                        focus:border-primary
                      "
                    >
                      <span class="flex justify-between pr-3"
                        >{{ selectedworkschedule.label }}
                        <svg
                          class="w-5 h-5"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fillRule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clipRule="evenodd"
                          />
                        </svg>
                      </span>
                    </ListboxButton>
                    <ListboxOptions
                      class="shadow-lg bg-white z-50 w-[462px] absolute"
                    >
                      <ListboxOption
                        v-slot="{ active }"
                        v-for="option in workschedules"
                        :key="option.label"
                        :value="option"
                        as="template"
                      >
                        <li
                          :class="[
                            active ? 'bg-[#EBF4FF]' : 'text-gray-900',
                            ' cursor-default select-none py-2 ',
                          ]"
                        >
                          <span
                            :class="['block truncate font-bold text-center']"
                            @click="update"
                            >{{ option.label }}</span
                          >
                        </li>
                      </ListboxOption>
                    </ListboxOptions>
                  </div>
                </Listbox>
              </div>
            </div>
            <div class="mb-2.5">
              <Listbox v-model="selectedteam">
                <ListboxLabel class="text-sm">Team*</ListboxLabel>
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
                      border-[#E2E8F0]
                      active:border-primary
                      focus:border-primary
                    "
                  >
                    <span class="flex justify-between pr-3"
                      >{{ selectedteam.label }}
                      <svg
                        class="w-5 h-5"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fillRule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clipRule="evenodd"
                        />
                      </svg>
                    </span>
                  </ListboxButton>
                  <ListboxOptions
                    class="shadow-lg bg-white z-50 w-[970px] absolute"
                  >
                    <ListboxOption
                      v-slot="{ active }"
                      v-for="option in teams"
                      :key="option.label"
                      :value="option"
                      as="template"
                    >
                      <li
                        :class="[
                          active ? 'bg-[#EBF4FF]' : 'text-gray-900',
                          'pl-10 cursor-default select-none py-2 pr-4',
                        ]"
                      >
                        <span
                          :class="['block truncate font-bold']"
                          @click="update"
                          >{{ option.label }}</span
                        >
                      </li>
                    </ListboxOption>
                  </ListboxOptions>
                </div>
              </Listbox>
            </div>
            <div class="mb-2.5">
              <Listbox v-model="selectedmanagers">
                <ListboxLabel class="text-sm">Manager*</ListboxLabel>
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
                      border-[#E2E8F0]
                      active:border-primary
                      focus:border-primary
                    "
                  >
                    <span class="flex justify-between pr-3"
                      >{{ selectedmanagers.label }}
                      <svg
                        class="w-5 h-5"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fillRule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clipRule="evenodd"
                        />
                      </svg>
                    </span>
                  </ListboxButton>
                  <ListboxOptions
                    class="shadow-lg bg-white w-[970px] z-50 absolute"
                  >
                    <ListboxOption
                      v-slot="{ active }"
                      v-for="option in managers"
                      :key="option.label"
                      :value="option"
                      as="template"
                    >
                      <li
                        :class="[
                          active ? 'bg-[#EBF4FF]' : 'text-gray-900',
                          'pl-5 cursor-default select-none py-2 pr-4',
                        ]"
                      >
                        <span class="flex items-center" @click="update">
                          <img
                            :src="option.images"
                            class="rounded-full w-10 h-10 mr-3"
                          />
                          <div>
                            <p>{{ option.label }}</p>
                            <p class="text-sm text-primary">
                              {{ option.email }}
                            </p>
                          </div>
                        </span>
                      </li>
                    </ListboxOption>
                  </ListboxOptions>
                </div>
              </Listbox>
            </div>
            <div class="mb-2.5">
              <Label class="text-sm">Manage</Label>
              <Multiselect
                class="bg-white pb-2 mt-2 pt-2 pl-2"
                v-model="value"
                mode="tags"
                placeholder="Enter Manages"
                label="name"
                track-by="email"
                :close-on-select="false"
                :searchable="true"
                :options="manages"
                :classes="{
                  tag: 'bg-[#F5F5F5] text-primary text-sm font-semibold py-0.5 pl-2 rounded mr-1 mb-1 flex items-center whitespace-nowrap rtl:pl-0 rtl:pr-2 rtl:mr-0 rtl:ml-1',
                  containerActive: 'ring ring-primary',
                  tagsSearch:
                    'absolute inset-0 border-none outline-none focus:ring-0 appearance-none p-0 text-base font-sans box-border w-full',
                }"
              >
                <template v-slot:tag="{ option, handleTagRemove, disabled }">
                  <div
                    class="multiselect-tag is-user"
                    :class="{
                      'is-disabled': disabled,
                    }"
                  >
                    <div class="rounded-full">
                      <img
                        :src="option.image"
                        :class="['rounded-full h-5 w-5']"
                      />
                    </div>
                    <div>
                      <p>{{ option.name }}</p>
                      <p>{{ option.email }}</p>
                    </div>
                    <span
                      v-if="!disabled"
                      class="multiselect-tag-remove"
                      @mousedown.prevent="handleTagRemove(option, $event)"
                    >
                      <span class="multiselect-tag-remove-icon"></span>
                    </span>
                  </div>
                </template>
              </Multiselect>
            </div>
            <div class="mb-2.5">
              <CustomInput
                type="text"
                :error="error"
                label="Superpowers"
                v-model="superpowers"
                required
                placeholder="Enter Superpowers"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="border-b-2 border-[#EDF2F7] w-full"></div>
      <div>
        <div class="flex flex-row-reverse items-center px-9 py-2.5">
          <button
            type="submit"
            class="
              bg-primary
              p-[7px]
              rounded-md
              drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)]
              flex
              items-center
              justify-center
              text-white
              font-bold
              text-base
              leading-[150%]
              font-sans
            "
          >
            Save and Continue
          </button>
          <button
            type="button"
            class="
              mr-2.5
              py-[7px]
              px-2.5
              bg-[#F4F7FA]
              rounded-md
              shadow
              text-base
              font-bold
            "
          >
            Cancel
          </button>
        </div>
      </div>
    </form>
  </Details>
</template>
<script>
import CustomInput from "@/Components/CustomInput.vue";
import DropZone from "@/Components/DropZone.vue";
import UploadList from "@/Components/UploadList.vue";
import { VueTelInput } from "vue3-tel-input";
import "vue3-tel-input/dist/vue3-tel-input.css";
// import SelectInput from "@/Components/SingleSelect.vue";
import Multiselect from "@vueform/multiselect";
import { ref } from "vue";
export default {
  name: "KeyEmployeeDetails",
  data() {
    return {
      selectedOrganization: ref({ label: "Please Select" }),
      organizations: [
        { label: "Introcep Nepal" },
        { label: "Introcept Australia" },
      ],
      value: null,
      selectedworkschedule: ref({ label: "Please Select" }),
      workschedules: [
        { label: "Monday-Friday(Full time)" },
        { label: "Monday-Friday(Part time) " },
      ],
      selectedteam: ref({ label: "Please Select" }),
      teams: [
        { label: "Development" },
        { label: "Product" },
        { label: "QA" },
        { label: "Sales" },
        { label: "Design" },
      ],
      selectedmanages: ref({ label: "Please Select" }),
      manages: [
        {
          value: "judy",
          name: "Judy",
          image: "https://randomuser.me/api/portraits/med/women/1.jpg",
          email: "Judy@gmail.com",
        },
        {
          value: "jane",
          name: "Jane",
          image: "https://randomuser.me/api/portraits/med/women/2.jpg",
          email: "Judy@gmail.com",
        },
        {
          value: "john",
          name: "John",
          image: "https://randomuser.me/api/portraits/med/men/1.jpg",
          email: "Judy@gmail.com",
        },
        {
          value: "joe",
          name: "Joe",
          image: "https://randomuser.me/api/portraits/med/men/2.jpg",
          email: "Judy@gmail.com",
        },
      ],
      selectedmanagers: ref({ label: "Please Select" }),
      managers: [
        {
          images: "https://randomuser.me/api/portraits/med/women/1.jpg",
          label: "Wade Cooper",
          email: "wade@gmail.com",
        },
        {
          images: "https://randomuser.me/api/portraits/med/women/2.jpg",
          label: "Devon Webb",
          email: "devon@gmail.com",
        },
        {
          images: "https://randomuser.me/api/portraits/med/men/1.jpg",
          label: "Tom Cook",
          email: "tom@gmail.com",
        },
        {
          images: "https://randomuser.me/api/portraits/med/men/2.jpg",
          label: "Hellen Schmidt",
          email: "hellen@gmail.com",
        },
      ],
    };
  },

  Components: {
    CustomInput,
    DropZone,
    UploadList,
    VueTelInput,
    Multiselect,
  },
  methods: {},
};
</script>
<style>
.vue-tel-input {
  background: #ffffff;
  border: 2px solid #e2e8f0;
  border-radius: 6px;
}
.vti__input {
  border: none !important;
  border-radius: none !important;
  width: 100%;
  outline: none !important;
  padding-left: 10px !important;
}
.vti__input:focus {
  outline: 0 !important;
  border: 0 !important;
}
.vti__selection {
  background: #e2e8f0;
  border: 1px solid #e2e8f0;
  border-radius: 4px;
  width: 92px;
  height: 51px;
}

.vti__dropdown {
  padding: 0px !important;
}

.multiselect-tag.is-user {
  padding: 5px 8px;
  border-radius: 22px;
  background: #4c51bf;
  margin: 3px 3px 8px;
}

.multiselect-tag.is-user img {
  width: 30px;
  border-radius: 50%;
  height: 30px;
  margin-right: 8px;
  border: 2px solid #ffffffbf;
}

.multiselect-tag.is-user i:before {
  color: #ffffff;
  border-radius: 50%;
}

.user-image {
  margin: 0 6px 0 0;
  border-radius: 50%;
  height: 22px;
}
</style>

<style src="@vueform/multiselect/themes/default.css"></style>
