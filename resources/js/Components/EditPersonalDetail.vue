<script setup>
import { ref } from "vue";
</script>
<template>
  <Form
    @submit="onSubmit"
    :validation-schema="schema"
    v-if="personalActive"
    class="personal_Detail"
  >
    <div class="flex">
      <div class="w-2/3 mr-10">
        <div class="flex flex-row justify-between mb-2.5">
          <div class="w-full mr-10">
            <custom-input
              v-model="firstName"
              name="firstName"
              type="text"
              label="First Name*"
              placeholder="Enter First Name"
            />
          </div>
          <div class="w-full">
            <custom-input
              name="lastName"
              v-model="lastName"
              type="text"
              label="Last Name*"
              placeholder="Enter Last Name"
            />
          </div>
        </div>
        <div class="mb-2.5">
          <custom-input
            type="email_address"
            name="email"
            v-model="email"
            label="Email Address*"
            placeholder="Enter Email Address"
          />
        </div>
        <div class="flex flex-row justify-between mb-2.5">
          <div class="w-full mr-10">
            <p
              class="block font-normal text-sm text-gray-900 pb-2.5 leading-normal placeholder:text-slate-500 placeholder:text-base placeholder:font-normal"
            >
              Contact Number*
            </p>
            <vue-tel-input
              :class="[error ? 'border-red ' : 'vue-tel-input']"
              v-model="phone"
              ref="phoneNo"
              mode="international"
            ></vue-tel-input>
            <div v-if="message.phone" class="flex items-center w-full mt-[9px]">
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
              <p
                class="text-red-600 font-normal text-sm leading-normal ml-[8px]"
              >
                {{ message.phone }}
              </p>
            </div>
          </div>
          <div class="w-full">
            <custom-input
              type="date"
              name="dateOfBirth"
              v-model="dateOfBirth"
              label="Date of Birth*"
              placeholder="DD-MM-YYYY"
            />
          </div>
        </div>
        <div class="mb-2.5">
          <custom-input
            type="text"
            label="Current Address*"
            name="currentAddress"
            v-model="currentAddress"
            placeholder="Enter Current Address"
          />
        </div>
        <div class="flex flex-row justify-between mb-2.5">
          <div class="w-full mr-10">
            <custom-input
              type="number"
              label="PAN Number"
              name="panNumber"
              v-model="panNumber"
              placeholder="Enter PAN Number"
            />
          </div>
          <div class="w-full">
            <custom-input
              type="text"
              label="Bank Account Number"
              name="accountNumber"
              v-model="accountNumber"
              placeholder="Enter Bank Account Number"
            />
          </div>
        </div>
        <DropZone
          v-model="files"
          @update="fileChanges"
          @change="fieldchange"
        ></DropZone>
        <UploadList
          :items="files"
          @deleteComplete="deleteComplete"
        ></UploadList>
        <div v-if="message.files" class="flex items-center w-full mt-[9px]">
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
            {{ message.files }}
          </p>
        </div>
      </div>
      <div class="w-1/3 flex flex-col text-center items-center">
        <div v-if="avatar" class="w-36 h-36 mb-4 !rounded-full relative">
          <img :src="avatarUrl()" class="w-36 h-36 mb-4 !rounded-full" />
          <div
            v-if="avatar"
            class="absolute bottom-8 right-0"
            @click="toggleShow"
          >
            <svg
              width="31"
              height="32"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <ellipse
                cx="15.5"
                cy="15.702"
                rx="15.5"
                ry="15.394"
                fill="#fff"
              />
              <path
                d="M15.157 9.929H9.59c-.421 0-.826.166-1.124.462A1.574 1.574 0 0 0 8 11.508v11.056c0 .42.168.821.466 1.117.298.296.703.463 1.124.463h11.133c.422 0 .826-.167 1.124-.463.299-.296.466-.698.466-1.117v-5.528"
                stroke="#4C51BF"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M21.12 8.744a1.693 1.693 0 0 1 2.386 0 1.67 1.67 0 0 1 0 2.37l-7.554 7.502-3.18.79.794-3.16 7.554-7.502Z"
                stroke="#4C51BF"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </div>
        </div>

        <div class="mb-4" v-else>
          <svg
            width="146"
            height="146"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect
              x="2"
              y="2"
              width="142"
              height="142"
              rx="71"
              fill="#FFEEE6"
              stroke="#E2E8F0"
              stroke-width="4"
            />
            <path
              d="M73.109 79.58c16.077 0 29.121-13.043 29.121-29.12 0-16.078-13.044-29.121-29.121-29.121-16.077 0-29.12 13.043-29.12 29.12 0 16.078 13.043 29.121 29.12 29.121Zm25.885 6.472H87.851a35.24 35.24 0 0 1-14.742 3.235c-5.258 0-10.233-1.173-14.742-3.235H47.224c-14.298 0-25.885 11.587-25.885 25.885v3.235c0 5.36 4.347 9.707 9.707 9.707h84.126c5.359 0 9.707-4.347 9.707-9.707v-3.235c0-14.298-11.587-25.885-25.885-25.885Z"
              fill="#C2A68E"
            />
          </svg>
        </div>

        <div id="app">
          <button
            class="btn leading-normal text-primary text-base font-bold"
            @click="toggleShow"
            type="button"
          >
            Upload Image
          </button>
          <my-upload
            field="img"
            type="file"
            @crop-success="cropSuccess"
            @crop-upload-success="cropUploadSuccess"
            @crop-upload-fail="cropUploadFail"
            v-model="show"
            :params="params"
            :headers="headers"
            :imgFormat="imgFormat"
            lang-type="en"
          ></my-upload>
        </div>
      </div>
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
          class="!my-0 bg-primary p-[7px] rounded-md drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)] flex items-center justify-center text-white font-bold text-base leading-normal font-sans"
        >
          Save and Continue
        </Button>
        <button
          type="button"
          class="mr-2.5 py-[7px] px-2.5 bg-slate-100 rounded-md shadow text-base font-bold"
        >
          Cancel
        </button>
      </div>
    </div>
    <div
      v-if="showPopUp"
      class="fixed inset-0 w-full h-screen bg-black bg-opacity-50"
    >
      <div
        class="h-[342px] w-[772px] flex !items-stretch !justify-between absolute z-10 top-1/2 left-1/2 !transform !-translate-x-1/2 !-translate-y-1/2"
      >
        <div
          class="p-9 bg-white w-[515px] h-[395px] bg-white rounded-md flex items-center"
        >
          <div>
            <div class="flex flex-col px-9 py-2.5 items-center">
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

              <button
                @click="togglePopUp"
                class="font-bold text-base py-[15px] px-[34px] border-indigo-700 text-indigo-700 border rounded-md"
              >
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 
    <div
      v-if="togglePopUp"
      class="z-10 w-[515px] h-[395px] bg-white shadow-[0_10px_15px_rgba(0,0,0,0.1)] flex flex-col items-center justify-center mt-20"
    >
      <div
        class="z-50 fixed inset-0 w-full h-screen flex items-center justify-center bg-black bg-opacity-50"
      >
        <div class="absolute z-10">
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
        </div>
      </div>
      <button
        @click="togglePopUp"
        class="font-bold text-base py-[15px] px-[34px] border-indigo-700 text-indigo-700 border rounded-md"
      >
        Close
      </button>
    </div> -->
  </Form>
</template>
<script>
import CustomInput from "@/Components/CustomInput.vue";
import DropZone from "@/Components/DropZone.vue";
import EducationalDetail from "@/Components/EducationalDetail.vue";
import KeyDetail from "@/Components/KeyEmployeeDetail.vue";
import NavBar from "@/Components/NavBar.vue";
import UploadList from "@/Components/UploadList.vue";
import { dataToFileMixin } from "@/mixins/data-to-file";
import { Form } from "vee-validate";
import Button from "@/Components/Button.vue";
import { VueTelInput } from "vue3-tel-input";
import "vue3-tel-input/dist/vue3-tel-input.css";
import * as Yup from "yup";
import myUpload from "vue-image-crop-upload";
export default {
  name: "AddEmployeeDetails",
  components: {
    NavBar,
    CustomInput,
    DropZone,
    UploadList,
    Button,
    "vue-tel-input": VueTelInput,
    Form,
    Yup,

    EducationalDetail,
    KeyDetail,
    "my-upload": myUpload,
  },
  mixins: [dataToFileMixin],

  data() {
    const {
      firstName,
      lastName,
      email,
      dateOfBirth,
      currentAddress,
      panNumber,
      accountNumber,
    } = ref(null);

    const schema = Yup.object().shape({
      firstName: Yup.string().required(),
      lastName: Yup.string().required(),
      email: Yup.string().email().required(),
      dateOfBirth: Yup.string().required(),
      currentAddress: Yup.string().required(),
      panNumber: Yup.string().max(9),
      accountNumber: Yup.string().max(15),
    });
    return {
      employeeId: 1,
      phone: null,
      isLoading: false,
      schema,
      files: [],
      error: false,
      show: false,
      avatar: null,
      keyempActive: false,
      personalActive: true,
      educationalActive: false,
      message: [],
      document_id: [],
      firstName,
      lastName,
      email,
      dateOfBirth,
      currentAddress,
      panNumber,
      accountNumber,
      showPopUp: false,
      fileUploaded: false,
    };
  },

  props: {
    msg: String,

    field: {
      type: String,
      default: "avatar",
    },

    modelValue: {
      type: Boolean,
      default: true,
    },
    params: {
      type: Object,
      default: () => null,
    },

    headers: {
      type: Object,
      default: () => null,
    },
    imgFormat: {
      type: String,
      deault: () => "jpg/png",
    },
  },

  methods: {
    togglePopUp() {
      const id = this.$route.params.id;
      this.showPopUp = !this.showPopUp;
      this.$router.push({
        path: `/employees/${id}`,
      });
    },
    deleteComplete(event) {
      this.document_id.push(event);
    },
    fileChanges(files) {
      this.files = [...this.files, ...files];
      this.fileUploaded = true;
    },
    fieldChange() {
      let selectedFiles = this.files;
      if (!selectedFiles.length) {
        return false;
      }
      for (let i = 0; i < selectedFiles.length; i++) {
        this.files.push(selectedFiles[i]);
      }
    },
    avatarUrl() {
      if (this.avatar) {
        let dataUrl = "";
        if (typeof this.avatar == "string") {
          dataUrl = this.avatar;
        } else {
          dataUrl = URL.createObjectURL(this.avatar);
        }
        return dataUrl;
      }
    },
    onSubmit(values) {
      const employeeId = this.$route.params.id;
      if (this.$refs.phoneNo.phone.length == 0) {
        this.message["phone"] = "PhoneNumber is a Required Field";
        this.error = true;
      } else {
        this.message["phone"] = "";
        this.error = false;
      }
      if (this.files.length == 0) {
        this.message["files"] = "Documents is a Required Field";
      } else {
        this.message["files"] = "";
      }
      const { firstName } = values;
      const { lastName } = values;
      const { dateOfBirth } = values;
      const { email } = values;
      const { panNumber } = values;
      const { currentAddress } = values;
      const { accountNumber } = values;

      let formData = new FormData();

      for (let i = 0; i < this.files.length; i++) {
        if (!this.files[i].path) {
          formData.append("documents[]", this.files[i]);
        }
      }

      if (this.document_id?.length) {
        for (let i = 0; i < this.document_id.length; i++) {
          formData.append("document_id[]", this.document_id[i]);
        }
      }
      if (typeof this.avatar !== "string" && this.avatar !== null) {
        formData.append("avatar", this.avatar);
      }
      formData.append("first_name", firstName);
      formData.append("last_name", lastName);
      formData.append("email", email);
      formData.append("date_of_birth", dateOfBirth);
      formData.append("pan_number", panNumber);
      formData.append("current_address", currentAddress);
      formData.append("bank_account_number", accountNumber);
      formData.append("contact_number", this.$refs.phoneNo.phone);
      this.isLoading = true;
      axios
        .post(`employees/${employeeId}`, formData)
        .then(() => {
          this.showPopUp = true;
        })
        .catch((error) => {
          alert(error);
        })
        .finally(() => (this.isLoading = false));
    },

    toggleShow() {
      this.show = !this.show;
    },

    cropSuccess(imgDataUrl, field) {
      this.avatar = this.dataToFile(imgDataUrl, "avatar");
    },
    cropUploadSuccess(jsonData, field) {
      console.log("-------- upload success --------");
      console.log(jsonData);
      console.log("field: " + field);
    },

    cropUploadFail(status, field) {
      console.log("-------- upload fail --------");
      console.log(status);
      this.avatar = null;
      console.log("field: " + field);
    },
  },

  created() {
    const employeeId = this.$route.params.id;

    axios
      .get(`employees/profile/${employeeId}`)
      .then(({ data }) => {
        const personalDetailList = data.data;
        this.firstName = personalDetailList.first_name;
        this.lastName = personalDetailList.last_name;
        this.email = personalDetailList.email;
        this.dateOfBirth = personalDetailList.date_of_birth;
        this.currentAddress = personalDetailList.current_address;
        this.panNumber = personalDetailList.pan_number;
        this.accountNumber = personalDetailList.bank_account_number;
        this.files = personalDetailList.documents;
        this.avatar = personalDetailList.avatar;
        this.phone = personalDetailList.contact_number;
      })
      .catch((error) => console.log(error));
  },
};
</script>
<style>
.vue-tel-input {
  background: #ffffff;
  border: 2px solid #e2e8f0;
  border-radius: 6px;
}
.vue-tel-input:focus {
  border: 2px solid #4c51bf !important;
  border-radius: 6px;
}
.vti__input {
  border: none !important;
  border-radius: none !important;
  width: 100%;
  outline: none !important;
  padding-left: 10px !important;
}

.vti__selection {
  background: #e2e8f0;
  border: 1px solid #e2e8f0;
  border-radius: 6px;
  width: 92px;
  height: 51px;
}

.vti__dropdown {
  padding: 0px !important;
}
.border-red {
  background: #ffffff;
  border: 2px solid red;
  border-radius: 6px;
}
.vue-tel-input:focus {
  border: 6px solid red !important;
}
.border-blue {
  background: #ffffff;
  border: 2px solid #e2e8f0;
  border-radius: 6px;
}
.vue-tel-input:focus-within {
  -webkit-box-shadow: none;
  box-shadow: none;
  border: 3px solid #4c51bf !important;
}

/* .vue-tel-input:focus-within{-webkit-box-shadow:inset 0 1px
      1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);box-shadow:inset 0 1px 1px
      rgba(0,0,0,.075),0 0 8px
      rgba(102,175,233,.6);border-color:#66afe9} */
</style>
