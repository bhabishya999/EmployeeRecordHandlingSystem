<template>
  <div class="p-9">
    <Form
      @submit="onSubmit"
      :initial-values="initialData"
      :validation-schema="schema"
    >
      <div class="flex flex-col w-2/3 mr-10">
        <FieldArray name="users" v-slot="{ fields, push, remove }">
          <fieldset
            class="InputGroup mb-2.5"
            v-for="(field, index) in fields"
            :key="field.key"
          >
            <div class="flex justify-between">
              <legend
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
                Education{{ index + 1 }}
              </legend>
              <button
                @click="remove(index)"
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
                <div class="flex flex-col">
                  <label
                    :for="`education_${index}`"
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
                    >Education</label
                  >
                  <Field
                    :id="`education_${index}`"
                    :name="`users[${index}].education_level`"
                    type="text"
                    placeholder="Higher Secondary Level"
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
                  />
                  <ErrorMessage
                    :name="`users[${index}].education_level`"
                    class="text-red-600"
                  />
                </div>
              </div>
              <div class="w-full">
                <div class="flex flex-col">
                  <label
                    :for="`year_${index}`"
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
                    >Passed Year(A.D)</label
                  >
                  <Field
                    type="number"
                    :id="`year_${index}`"
                    :name="`users[${index}].passed_year`"
                    placeholder="2017"
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
                  />
                  <ErrorMessage
                    :name="`users[${index}].passed_year`"
                    class="text-red-600"
                  />
                </div>
              </div>
            </div>
            <div class="flex flex-col">
              <label
                :for="`institution_${index}`"
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
                >Institution</label
              >
              <Field
                :id="`institution_${index}`"
                :name="`users[${index}].institution`"
                type="text"
                placeholder="United Academy"
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
              />
              <ErrorMessage
                :name="`users[${index}].institution`"
                class="text-red-600"
              />
            </div>
          </fieldset>

          <div class="border-b-2 border-slate-100 w-full my-5"></div>
          <button
            @click="
              push({
                education_level: '',
                passed_year: '',
                institution: '',
              })
            "
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
        </FieldArray>
      </div>
      <div class="border-b-2 border-slate-100 w-full"></div>
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
    </Form>
  </div>
</template>
<script>
import { ErrorMessage, Field, FieldArray, Form } from "vee-validate";
import * as Yup from "yup";
import Button from "@/Components/Button.vue";
export default {
  name: "EducationalDetail",
  components: {
    Field,
    Form,
    ErrorMessage,
    FieldArray,
    Yup,
    Button,
  },
  data() {
    const initialData = {
      users: [
        {
          education_level: "",
          passed_year: "",
          institution: "",
          employee_id: "",
        },
      ],
    };
    const schema = Yup.object().shape({
      users: Yup.array()
        .of(
          Yup.object().shape({
            education_level: Yup.string().required().label("Education"),
            passed_year: Yup.string().max(4).required().label("Year"),
            institution: Yup.string().required().label("Institution"),
          })
        )
        .strict(),
    });
    return {
      initialData,
      schema,
      isLoading: false,
      keyempActive: false,
    };
  },
  props: {
    userId: Number,
  },
  methods: {
    onSubmit(values) {
      const educational_details = values.users.map((c) => {
        c.employee_id = this.userId;
        return c;
      });
      this.isLoading = true;
      axios
        .post("employees/educations", {
          educational_details: educational_details,
          employee_id: this.employeeId,
        })
        .then(() => {
          this.keyempActive = true;
          this.$emit("statusChanged", this.keyempActive);
        })
        .catch((errors) => {
          console.log(errors);
        })
        .finally(() => (this.isLoading = false));
    },
  },
};
</script>
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type="number"] {
  -moz-appearance: textfield;
}
</style>
