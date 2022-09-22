<script setup>
import Details from "@/Layouts/Details.vue";
</script>
<template>
  <Details>
    <div class="flex flex-col">
      <div
        class="bg-indigo-100 h-[365px] drop-shadow-4xl flex flex-col relative"
      >
        <div class="flex flex-col items-center text-center">
          <div class="w-[185px] h-[185px] rounded-full mt-5">
            <img
              class="w-[185px] h-[185px] rounded-full"
              :src="personalList.avatar"
              :alt="personalList.first_name"
            />
          </div>
          <h1 class="text-gray-900 leading-normal font-semibold text-lg">
            {{ personalList.first_name }}{{ personalList.last_name }}
          </h1>
          <p class="text-slate-600 leading-normal font-medium text-base">
            {{ keyEmpList.current_position }}
          </p>
        </div>
      </div>
      <TabGroup>
        <TabList class="">
          <div class="flex bg-indigo-100">
            <Tab
              @click="personalDetail(personalList.employee_id)"
              class="border-0 outline-0 font-bold leading-normal text-lg py-2.5 px-1.5 mr-7 focus:bg-indigo-700 focus:rounded-lg focus:font-sans focus:text-white"
            >
              Personal Details
            </Tab>
            <Tab
              @click="educationlDetail(personalList.employee_id)"
              class="border-0 outline-0 font-bold leading-normal text-lg py-2.5 px-1.5 mr-7 focus:bg-indigo-700 focus:rounded-lg focus:font-sans focus:text-white"
            >
              Educational Details
            </Tab>
            <Tab
              @click="employmentDetail(personalList.employee_id)"
              class="border-0 outline-0 font-bold leading-normal text-lg py-2.5 px-1.5 mr-7 focus:bg-indigo-700 focus:rounded-lg focus:font-sans focus:text-white"
            >
              Key Employment Details
            </Tab>
          </div>
        </TabList>
        <TabPanels>
          <TabPanel>
            <div
              class="flex justify-between items-center text-center bg-slate-100 h-[60px]"
            >
              <p class="leading-normal font-bold text-base text-indigo-700">
                Personal Details
              </p>
              <div class="flex justify-between items-center text-center">
                <svg
                  width="14"
                  height="14"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M6.367 2.265H2.193A1.193 1.193 0 0 0 1 3.458v8.35A1.192 1.192 0 0 0 2.193 13h8.35a1.192 1.192 0 0 0 1.192-1.193V7.632"
                    stroke="#4C51BF"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M10.84 1.37a1.265 1.265 0 0 1 1.79 1.79L6.964 8.825l-2.386.597.597-2.386 5.665-5.665Z"
                    stroke="#4C51BF"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>

                <div
                  @click="editProfile"
                  class="leading-normal font-bold text-base text-indigo-700 ml-2.5"
                >
                  Edit
                </div>
              </div>
            </div>
            <div class="h-52 p-8">
              <div
                class="flex justify-between mb-12 rounded-md drop-shadow-[0_1px_2px_rgba(0,0,0,0.06)_0_10px_15px_rgba(0,0,0,0.1)]"
              >
                <div class="flex flex-col">
                  <div class="mb-12">
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Email Address
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ personalList.email }}
                    </p>
                  </div>
                  <div>
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      PAN Number
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ personalList.pan_number }}
                    </p>
                  </div>
                </div>
                <div class="flex flex-col">
                  <div class="mb-12">
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Current Address
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ personalList.current_address }}
                    </p>
                  </div>
                  <div>
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Bank Account Number
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ personalList.bank_account_number }}
                    </p>
                  </div>
                </div>
                <div class="flex flex-col">
                  <div class="mb-12">
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Date of Birth
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ personalList.date_of_birth }}
                    </p>
                  </div>
                  <div>
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Contact Number
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ personalList.contact_number }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-slate-100 h-[60px] rounded"></div>
            <div class="h-40 p-8 flex flex-col">
              <p class="text-indigo-700 leading-normal font-bold text-base">
                Documents
              </p>

              <div class="flex flex-row">
                <div
                  v-for="document in documents"
                  :key="document"
                  class="border-2 border-[#E2E8F0] rounded my-2 flex flex-row justify-between p-1.5 mr-6 w-52"
                >
                  <img
                    class="h-7 w-7"
                    src="../../../images/jpg.png"
                    alt="png"
                    v-if="getFileExt(document) == 'jpg'"
                  />
                  <img
                    class="h-7 w-7"
                    src="../../../images/pdf.png"
                    alt="png"
                    v-if="getFileExt(document) == 'pdf'"
                  />
                  <img
                    class="h-7 w-7"
                    src="../../../images/png.png"
                    alt="png"
                    v-if="getFileExt(document) == 'png'"
                  />

                  <div class="flex flex-col w-48 px-4">
                    <p
                      class="leading-normal font-normal text-base text-black truncate mr-2"
                    >
                      {{ document.name }}
                    </p>
                    <p class="text-[#4A5568] font-normal text-[6px]">
                      {{ document.type }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </TabPanel>
          <TabPanel>
            <div
              class="flex justify-between items-center text-center bg-slate-100 h-[60px]"
            >
              <p class="leading-normal font-bold text-base text-indigo-700">
                Education Details
              </p>
              <div class="flex justify-between items-center text-center">
                <svg
                  width="14"
                  height="14"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M6.367 2.265H2.193A1.193 1.193 0 0 0 1 3.458v8.35A1.192 1.192 0 0 0 2.193 13h8.35a1.192 1.192 0 0 0 1.192-1.193V7.632"
                    stroke="#4C51BF"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M10.84 1.37a1.265 1.265 0 0 1 1.79 1.79L6.964 8.825l-2.386.597.597-2.386 5.665-5.665Z"
                    stroke="#4C51BF"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
                <div
                  @click="editProfile"
                  class="leading-normal font-bold text-base text-indigo-700 ml-2.5"
                >
                  Edit
                </div>
              </div>
            </div>

            <div v-for="(education, index) in educationlList" :key="index">
              <div class="h-40 p-8 flex flex-col">
                <p
                  class="mb-4 text-indigo-700 leading-normal font-bold text-base"
                >
                  Education {{ index + 1 }}
                </p>

                <div class="flex flex-row justify-between">
                  <div class="mb-12 w-1/3">
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Education Level
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ education.education_level }}
                    </p>
                  </div>
                  <div class="mb-12 w-1/3">
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Institution
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ education.institution }}
                    </p>
                  </div>
                  <div class="mb-12 w-1/3">
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Passed Year
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ education.passed_year }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="bg-slate-100 h-[60px] w-full rounded"></div>
            </div>
          </TabPanel>
          <TabPanel>
            <div
              class="flex justify-between items-center text-center bg-slate-100 h-[60px]"
            >
              <p class="leading-normal font-bold text-base text-indigo-700">
                Key Employment Details
              </p>
              <div class="flex justify-between items-center text-center">
                <svg
                  width="14"
                  height="14"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M6.367 2.265H2.193A1.193 1.193 0 0 0 1 3.458v8.35A1.192 1.192 0 0 0 2.193 13h8.35a1.192 1.192 0 0 0 1.192-1.193V7.632"
                    stroke="#4C51BF"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M10.84 1.37a1.265 1.265 0 0 1 1.79 1.79L6.964 8.825l-2.386.597.597-2.386 5.665-5.665Z"
                    stroke="#4C51BF"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
                <div
                  @click="editProfile"
                  class="leading-normal font-bold text-base text-indigo-700 ml-2.5"
                >
                  Edit
                </div>
              </div>
            </div>
            <div class="px-8 py-16">
              <div
                class="flex justify-between rounded-md drop-shadow-[0_1px_2px_rgba(0,0,0,0.06)_0_10px_15px_rgba(0,0,0,0.1)]"
              >
                <div class="flex flex-col">
                  <div class="mb-12">
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Organization
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ keyEmpList.organization }}
                    </p>
                  </div>
                  <div class="mb-12">
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Work Scedule
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ keyEmpList.work_schedule }}
                    </p>
                  </div>
                  <div>
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Superpowers
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ keyEmpList.superpowers.join(", ") }}
                    </p>
                  </div>
                </div>
                <div class="flex flex-col">
                  <div class="mb-12">
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Join Date
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ keyEmpList.join_date }}
                    </p>
                  </div>
                  <div class="mb-12">
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Manager
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ keyEmpList.manager.first_name }}
                      {{ keyEmpList.manager.last_name }}
                    </p>
                  </div>
                  <div>
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Team
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ keyEmpList.team }}
                    </p>
                  </div>
                </div>
                <div class="flex flex-col">
                  <div class="mb-12">
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Current Position
                    </p>
                    <p class="leading-normal font-bold text-base">
                      {{ keyEmpList.current_position }}
                    </p>
                  </div>
                  <div>
                    <p
                      class="block font-normal text-sm text-slate-500 leading-normal"
                    >
                      Manages
                    </p>
                    <p class="leading-normal font-bold text-base">--</p>
                  </div>
                </div>
              </div>
            </div>
          </TabPanel>
        </TabPanels>
      </TabGroup>
    </div>
  </Details>
</template>
<script>
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from "@headlessui/vue";

export default {
  name: "EmployeeDetail",
  Components: {
    Details,
  },
  data() {
    return {
      TabGroup,
      TabList,
      Tab,
      TabPanels,
      TabPanel,
      documents: [],
      personalList: [],
      keyEmpList: [],
      educationlList: [],
    };
  },
  created() {
    const employeeId = this.$route.params.id;
    this.personalDetail(employeeId);
  },
  methods: {
    editProfile() {
      this.$router.push({
        name: "editProfile",
        params: {
          id: this.personalList.employee_id,
        },
      });
    },
    getFileExt(document) {
      const fileExt = document.name.split(".").pop();
      return fileExt.toLowerCase();
    },
    personalDetail(employeeId) {
      axios
        .get(`/employees/profile/${employeeId}`)
        .then((result) => {
          this.personalList = result.data.data;
          if (this.personalList.documents.length > 1) {
            this.documents = this.personalList.documents;
          }
        })
        .catch((error) => {
          alert(error);
        });
    },
    educationlDetail(employeeId) {
      axios
        .get(`/employees/educations/${employeeId}`)
        .then((result) => {
          this.educationlList = result.data.data?.educational_details;
        })
        .catch((error) => {
          alert(error);
        });
    },
    employmentDetail(employeeId) {
      axios
        .get(`/employees/key-employment-details/${employeeId}`)
        .then((result) => {
          this.keyEmpList = result.data.data?.key_employment_details;
        })
        .catch((error) => {
          alert(error);
        });
    },
  },
};
</script>
