<script setup>
import Details from "@/Layouts/Details.vue";
</script>
    <template>
  <NavBar></NavBar>
  <div class="h-[24px] bg-slate-100"></div>
  <Details>
    <div class="p-9">
      <div class="flex justify-between items-center">
        <h1 class="text-black leading-normal text-2xl font-medium font-sans">
          EMPLOYEE DETAILS
        </h1>
        <button
          type="button"
          class="
            bg-indigo-700
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
          <li
            :class="{
              'bg-indigo-700 rounded-lg font-sans text-white': personalActive,
            }"
            class="font-bold leading-normal text-lg py-2.5 px-1.5 mr-7"
          >
            Personal Details
          </li>
          <li
            :class="{
              'bg-indigo-700 rounded-lg font-sans text-white':
                educationalActive,
            }"
            class="font-semibold leading-normal text-lg py-2.5 px-1.5 mr-7"
          >
            Educational Details
          </li>
          <li
            :class="{
              'bg-indigo-700 rounded-lg font-sans text-white': keyempActive,
            }"
            class="font-bold leading-normal text-lg py-2.5 px-1.5"
          >
            Key Employment Details
          </li>
        </ul>
      </div>
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
                  name="firstName"
                  type="text"
                  label="First Name*"
                  placeholder="Enter First Name"
                />
              </div>
              <div class="w-full">
                <custom-input
                  name="lastName"
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
                label="Email Address*"
                placeholder="Enter Email Address"
              />
            </div>
            <div class="flex flex-row justify-between mb-2.5">
              <div class="w-full mr-10">
                <p
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
                >
                  Contact Number*
                </p>
                <vue-tel-input
                  :class="[error ? 'border-red ' : 'vue-tel-input']"
                  v-model="phone"
                  ref="phoneNo"
                  mode="international"
                ></vue-tel-input>
                <div
                  v-if="message.phone"
                  class="flex items-center w-full mt-[9px]"
                >
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
                    class="
                      text-red-600
                      font-normal
                      text-sm
                      leading-normal
                      ml-[8px]
                    "
                  >
                    {{ message.phone }}
                  </p>
                </div>
              </div>
              <div class="w-full">
                <custom-input
                  type="date"
                  name="dateOfBirth"
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
                placeholder="Enter Current Address"
              />
            </div>
            <div class="flex flex-row justify-between mb-2.5">
              <div class="w-full mr-10">
                <custom-input
                  type="number"
                  label="PAN Number"
                  name="panNumber"
                  placeholder="Enter PAN Number"
                />
              </div>
              <div class="w-full">
                <custom-input
                  type="text"
                  label="Bank Account Number"
                  name="accountNumber"
                  placeholder="Enter Bank Account Number"
                />
              </div>
            </div>
            <DropZone v-model="files" @change="fieldChange"></DropZone>
            <UploadList :items="files"></UploadList>
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
              <p
                class="text-red-600 font-normal text-sm leading-normal ml-[8px]"
              >
                {{ message.files }}
              </p>
            </div>
          </div>
          <div class="w-1/3 flex flex-col text-center items-center">
            <img
              v-if="avatar"
              :src="avatarUrl()"
              class="w-36 h-36 mb-4 !rounded-full"
            />

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
      <EducationalDetail
        v-if="educationalActive"
        class="Educational_Detail"
        :userId="employeeId"
        @statusChanged="onStatusChange"
      ></EducationalDetail>
      <KeyDetail v-show="keyempActive" :userId="employeeId"></KeyDetail>
    </div>
  </Details>
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
    Details,
    EducationalDetail,
    KeyDetail,
    "my-upload": myUpload,
  },
  mixins: [dataToFileMixin],

  data() {
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
      phone: "",
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
      managerLists: [],
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
    onStatusChange(event) {
      this.keyempActive = event;
      this.educationalActive = this.personalActive = false;
    },
    fieldChange(e) {
      let selectedFiles = e.target.files;
      if (!selectedFiles.length) {
        return false;
      }
      for (let i = 0; i < selectedFiles.length; i++) {
        this.files.push(selectedFiles[i]);
      }
    },
    avatarUrl() {
      if (this.avatar) {
        return URL.createObjectURL(this.avatar);
      }
    },
    onSubmit(values) {
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
        formData.append("documents[]", this.files[i]);
      }
      formData.append("first_name", firstName);
      formData.append("last_name", lastName);
      formData.append("email", email);
      formData.append("date_of_birth", dateOfBirth);
      formData.append("pan_number", panNumber);
      formData.append("current_address", currentAddress);
      formData.append("bank_account_number", accountNumber);
      formData.append("contact_number", this.$refs.phoneNo.phone);
      formData.append("avatar", this.avatar);

      this.isLoading = true;
      axios
        .post("employees", formData)
        .then((response) => {
          const { employeeId } = response.data;
          this.employeeId = employeeId;
          this.educationalActive = true;
          this.personalActive = false;
        })
        .catch((error) => {
          console.log(error);
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
    