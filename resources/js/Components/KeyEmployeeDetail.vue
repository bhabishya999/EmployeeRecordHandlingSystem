<script setup>
import { ref } from "vue";
import Details from "@/Layouts/Details.vue";
import {
  Listbox,
  ListboxLabel,
  ListboxButton,
  ListboxOptions,
  ListboxOption,
} from "@headlessui/vue";
const organization = ref(null);
const workschedule = ref(null);
const team = ref(null);
const manager = ref(null);
</script>
<template>
  <Details>
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
      <Form @submit="onSubmit" :validation-schema="schema">
        <div class="flex">
          <div class="w-2/3 mr-10">
            <div>
              <div class="flex flex-row justify-between mb-2.5">
                <div class="w-full mr-10">
                  <single-select
                    :options="organizations"
                    name="organization"
                    v-model="organization"
                    key-prop="label"
                    label-prop="label"
                    label="Organization*"
                  />
                </div>
                <div class="w-full">
                  <custom-input
                    type="date"
                    name="joinDate"
                    label="Join Date*"
                    placeholder="DD-MM-YYYY"
                  />
                </div>
              </div>
            </div>
            <div class="flex flex-row justify-between mb-2.5">
              <div class="w-full mr-10">
                <custom-input
                  type="text"
                  label="Curent Position*"
                  name="position"
                  placeholder="Enter Current Position"
                />
              </div>
              <div class="w-full">
                <single-select
                  :options="workschedules"
                  name="workschedule"
                  v-model="workschedule"
                  key-prop="label"
                  label-prop="label"
                  label="Work Schedule*"
                />
              </div>
            </div>
            <div class="mb-2.5">
              <single-select
                :options="teams"
                name="team"
                v-model="team"
                key-prop="label"
                label-prop="label"
                label="Team*"
              />
            </div>
            <div class="mb-2.5">
              <manager-singleselect
                :options="managers"
                name="manager"
                v-model="manager"
                key-prop="label"
                label-prop="label"
                label="Manager*"
              />
            </div>
            <div class="mb-2.5">
              <Label class="text-sm text-slate-500">Manage</Label>
              <Multiselect
                class="bg-white pb-2 mt-2 pt-2"
                v-model="managesSelected"
                mode="tags"
                placeholder="Enter Manages"
                label="name"
                :close-on-select="true"
                :searchable="true"
                :options="manages"
                :classes="{
                  tag: 'bg-[#F5F5F5] font-bold text-primary text-sm font-semibold py-0.5 pl-2 rounded mr-1 mb-1 flex items-center whitespace-nowrap rtl:pl-0 rtl:pr-2 rtl:mr-0 rtl:ml-1',
                  containerActive: 'ring ring-primary',
                  tagsSearch:
                    'absolute inset-0 border-none outline-none focus:ring-0 appearance-none p-0 text-base font-sans box-border w-full',
                  placeholder:
                    'text-sm flex items-center h-full absolute text-slate-500 left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5 text-gray-400 rtl:left-auto rtl:right-0 rtl:pl-0 rtl:pr-3.5',
                }"
              >
                <template v-slot:option="{ option }">
                  <span class="flex items-center">
                    <img
                      :src="option.image"
                      class="rounded-full w-10 h-10 mr-3"
                    />
                    <div>
                      <p>{{ option.name }}</p>
                      <p class="text-sm text-primary">
                        {{ option.email }}
                      </p>
                    </div>
                  </span>
                </template>
              </Multiselect>
            </div>
            <div class="mb-2.5">
              <CustomInput
                type="text"
                label="Superpowers"
                name="superpowers"
                placeholder="Enter Superpowers"
              />
            </div>
          </div>
        </div>

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
      </Form>
    </div>
  </Details>
</template>
<script>
import CustomInput from "@/Components/CustomInput.vue";
import Button from "@/Components/Button.vue";
import SingleSelect from "@/Components/SingleSelect.vue";
import ManagerSingleselect from "@/Components/ManagerSingleinput.vue";
import { Form } from "vee-validate";
import * as Yup from "yup";
import Multiselect from "@vueform/multiselect";
import { ref } from "vue";
export default {
  name: "KeyEmployeeDetails",
  Components: {
    CustomInput,
    Multiselect,
    SingleSelect,
    ManagerSingleselect,
    Button,
    Form,
    Yup,
  },
  data() {
    const schema = Yup.object().shape({
      joinDate: Yup.string().required(),
      position: Yup.string().required(),
      organization: Yup.object().required(),
      workschedule: Yup.object().required(),
      team: Yup.object().required(),
      manager: Yup.object().required(),
    });
    return {
      schema,
      errorMessage: false,
      organizations: [
        { label: "Introcep Nepal" },
        { label: "Introcept Australia" },
      ],
      managesSelected: null,
      workschedules: [
        { label: "Monday-Friday(Full time)" },
        { label: "Monday-Friday(Part time) " },
      ],
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
          value: {
            name: "Judy",
            image: "https://randomuser.me/api/portraits/med/women/1.jpg",
            email: "Judy@gmail.com",
          },
          name: "Judy",
          image: "https://randomuser.me/api/portraits/med/women/1.jpg",
          email: "Judy@gmail.com",
        },
        {
          value: {
            name: "Jane",
            image: "https://randomuser.me/api/portraits/med/women/2.jpg",
            email: "Judy@gmail.com",
          },
          name: "Jane",
          image: "https://randomuser.me/api/portraits/med/women/2.jpg",
          email: "Judy@gmail.com",
        },
        {
          value: {
            name: "John",
            image: "https://randomuser.me/api/portraits/med/men/1.jpg",
            email: "Judy@gmail.com",
          },
          name: "John",
          image: "https://randomuser.me/api/portraits/med/men/1.jpg",
          email: "Judy@gmail.com",
        },
        {
          value: {
            name: "Joe",
            image: "https://randomuser.me/api/portraits/med/men/2.jpg",
            email: "Judy@gmail.com",
          },
          name: "Joe",
          image: "https://randomuser.me/api/portraits/med/men/2.jpg",
          email: "Judy@gmail.com",
        },
      ],
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

  methods: {
    onSubmit(values) {
      console.log(this.managesSelected);
      console.log(values);
    },
  },
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
