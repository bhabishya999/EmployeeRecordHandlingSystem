<template>
  <div class="px-2 py-5">
    <Form @submit="onSubmit">
      <div class="flex flex-col w-2/3 mr-10">
        <div v-for="(edutionalList, index) in edutionalList" v-bind:key="index">
          <div class="flex justify-between">
            <p
              class="
                block
                font-bold
                text-sm text-indigo-700
                pb-2.5
                leading-normal
                placeholder:text-slate-500
                placeholder:text-base
                placeholder:font-normal
              "
            >
              Education {{ index + 1 }}
            </p>
            <button
              @click="deleteEducation(index)"
              v-show="index > 0"
              type="button"
              class="
                py-[7px]
                px-2.5
                text-base
                font-bold
                flex
                items-center
                justify-center
                text-danger
              "
            >
              <svg
                class="mr-2"
                width="14"
                height="15"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M4.25 2.5c0-.966.784-1.75 1.75-1.75h2c.966 0 1.75.784 1.75 1.75v.75H13a.75.75 0 0 1 0 1.5h-.787l-.369 7.387a2.75 2.75 0 0 1-2.746 2.613H4.902a2.75 2.75 0 0 1-2.746-2.613l-.37-7.387H1a.75.75 0 0 1 0-1.5h3.25V2.5Zm1.5.75h2.5V2.5A.25.25 0 0 0 8 2.25H6a.25.25 0 0 0-.25.25v.75ZM6 6.463a.75.75 0 1 0-1.5.074l.25 5a.75.75 0 0 0 1.5-.075l-.25-5Zm3.5.074A.75.75 0 1 0 8 6.463l-.25 5a.75.75 0 0 0 1.5.075l.25-5Z"
                  fill="#C53030"
                />
              </svg>
              Remove
            </button>
          </div>
          <div class="flex flex-row justify-between mb-2.5">
            <div class="w-full mr-10">
              <label
                class="
                  block
                  font-normal
                  text-sm text-gray-900
                  pb-2.5
                  leading-normal
                  placeholder:text-slate-500
                  placeholder:text-base
                  placeholder:font-normal
                "
                for="education"
                >Education</label
              >
              <input
                type="text"
                class="
                  bg-white
                  pb-3.5
                  pt-4
                  pl-4
                  w-full
                  rounded-md
                  text-sm
                  leading-normal
                  text-slate-500
                  font-normal font-sans
                  border-solid border-2
                  outline-indigo-700 outline-2
                  border-slate-200
                  active:border-indigo-700
                "
                v-model="edutionalList.education_level"
                placeholder="Higher Secondary Level"
                name="education_level"
              />
            </div>
            <div class="w-full">
              <label
                class="
                  block
                  font-normal
                  text-sm text-gray-900
                  pb-2.5
                  leading-normal
                  placeholder:text-slate-500
                  placeholder:text-base
                  placeholder:font-normal
                "
                for="passedYear"
                >Passed Year(A.D)</label
              >
              <input
                class="
                  bg-white
                  pb-3.5
                  pt-4
                  pl-4
                  w-full
                  rounded-md
                  text-sm
                  leading-normal
                  text-slate-500
                  font-normal font-sans
                  border-solid border-2
                  outline-indigo-700 outline-2
                  border-slate-200
                  active:border-indigo-700
                "
                type="text"
                v-model="edutionalList.passed_year"
                name="passed_year"
                placeholder="2017"
              />
            </div>
          </div>
          <div class="w-full">
            <label
              class="
                block
                font-normal
                text-sm text-gray-900
                pb-2.5
                leading-normal
                placeholder:text-slate-500
                placeholder:text-base
                placeholder:font-normal
              "
              for="institution"
              >Institution</label
            >
            <input
              class="
                bg-white
                pb-3.5
                pt-4
                pl-4
                w-full
                rounded-md
                text-sm
                leading-normal
                text-slate-500
                font-normal font-sans
                border-solid border-2
                outline-indigo-700 outline-2
                border-slate-200
                active:border-indigo-700
              "
              type="text"
              v-model="edutionalList.institution"
              name="institution"
              placeholder="United Academy"
            />
          </div>
          <div class="border-b-2 border-slate-100 w-full my-5"></div>
        </div>

        <button
          @click="addEducation"
          type="button"
          class="
            w-32
            mr-2.5
            py-[7px]
            px-2.5
            bg-slate-100
            rounded-md
            shadow
            text-base
            font-bold
            flex
            items-center
            text-primary
          "
        >
          <svg
            class="mr-2"
            width="11"
            height="12"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M5.5 1.5v9M1 6h9"
              stroke="#4C51BF"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          Add more
        </button>
      </div>
      <div>
        <div class="flex flex-row-reverse items-center px-9 py-2.5">
          <Button
            :isLoading="isLoading"
            :disabled="isLoading"
            :class="{
              'opacity-80 cursor-not-allowed': isLoading,
            }"
            type="submit"
            class="
              !my-0
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
              leading-normal
              font-sans
            "
          >
            Save and Continue
          </Button>
          <button
            type="button"
            class="
              mr-2.5
              py-[7px]
              px-2.5
              bg-slate-100
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
      <div
        v-if="togglePopUp"
        class="
          z-50
          fixed
          inset-0
          w-full
          h-screen
          flex
          items-center
          justify-center
          bg-black bg-opacity-50
        "
      >
        <TogglePopUp
          :togglePopUp="togglePopUp"
          @close="togglePopUp = !togglePopUp"
          class="absolute z-10"
        >
          <svg
            width="120"
            height="120"
            viewBox="0 0 120 120"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M119.56 59.78C119.56 92.7957 92.7957 119.56 59.78 119.56C26.7643 119.56 0 92.7957 0 59.78C0 26.7643 26.7643 0 59.78 0C92.7957 0 119.56 26.7643 119.56 59.78ZM52.8653 91.4331L97.2182 47.0801C98.7243 45.5741 98.7243 43.132 97.2182 41.6259L91.764 36.1717C90.258 34.6654 87.8159 34.6654 86.3096 36.1717L50.1381 72.343L33.2505 55.4554C31.7444 53.9493 29.3023 53.9493 27.796 55.4554L22.3418 60.9096C20.8357 62.4157 20.8357 64.8577 22.3418 66.3638L47.4109 91.4328C48.9172 92.9391 51.359 92.9391 52.8653 91.4331Z"
              fill="#4D966F"
            />
          </svg>

          <p
            class="text-indigo-700 leading-normal text-2xl font-bold my-[20px]"
          >
            Changes have been saved successfully.
          </p>
        </TogglePopUp>
      </div>
    </Form>
  </div>
</template>

<script>
import Button from "@/Components/Button.vue";
import { Form } from "vee-validate";
import TogglePopUp from "@/Components/TogglePopUp.vue";
import * as Yup from "yup";
import { ref } from "vue";
export default {
  name: "EditEducationalDetail",
  components: {
    Form,
    Button,
    TogglePopUp,
    Yup,
  },
  data() {
    const togglePopUp = ref(false);
    return {
      edutionalList: [],
      togglePopUp,
      isLoading: false,
    };
  },
  methods: {
    addEducation() {
      this.edutionalList.push({
        education_level: "",
        passed_year: "",
        institution: "",
      });
    },
    deleteEducation(index) {
      this.edutionalList.splice(index, 1);
    },
    onSubmit() {
      const educational_details = this.edutionalList.map((edu) => {
        return edu;
      });
      axios
        .put(`employees/education-update/11`, {
          educational_details: educational_details,
        })
        .then(() => {
          this.togglePopUp = true;
        })
        .catch((error) => console.log(error))
        .finally(() => (this.isLoading = false));
    },
  },
  created() {
    axios
      .get(`employees/educations/11`)
      .then(({ data }) => {
        const edutionalDetailList = data.data.educational_details;
        edutionalDetailList.forEach((edu) => {
          this.edutionalList.push(edu);
        });
      })
      .catch((error) => console.log(error));
  },
};
</script>
  