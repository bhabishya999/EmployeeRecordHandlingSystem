<script setup>
import Details from "@/Layouts/Details.vue";
</script>
<template>
  <div class="max-h-screen">
    <NavBar />
    <div class="h-6 bg-slate-100"></div>
    <Details>
      <div class="h-[716px] mb-24">
        <div class="h-[108px] p-9">
          <p class="text-black leading-normal text-2xl font-bold">
            IMPORT DATA FILE
          </p>
        </div>
        <div
          v-if="message[0].isImportError"
          class="border-t-[1px] border-slate-400 p-9"
        >
          <div class="flex items-center w-full">
            <div>
              <svg
                width="30"
                height="30"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <rect width="30" height="30" rx="5" fill="#FFF5F5" />
                <path
                  d="M21 9 8 22M8 9l13 13"
                  stroke="#C53030"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </div>
            <p
              class="text-red-600 font-medium text-2xl leading-normal ml-[8px]"
            >
              {{ message[0].isImportError }}
            </p>
          </div>
          <div class="flex flex-col items-center justify-center mt-28">
            <p
              class="mb-2.5 block font-normal text-2xl text-gray-900 pb-2.5 leading-normal mb-12"
            >
              Please download your file below to review and fix errors.
            </p>
            <router-link
              to="/employees"
              type="submit"
              class="bg-indigo-700 py-[7px] px-2.5 rounded-md drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)] flex items-center justify-center text-white font-bold text-base leading-normal font-sans"
            >
              Go back to homepage
            </router-link>
          </div>
        </div>
        <div v-else>
          <div class="flex flex-row p-9">
            <svg
              width="30"
              height="30"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <rect
                width="30"
                height="30"
                rx="5"
                fill="#4C51BF"
                fill-opacity=".2"
              />
              <path
                d="M24 15.058v3.928c0 .521-.21 1.02-.586 1.39A2.019 2.019 0 0 1 22 20.95H8c-.53 0-1.04-.207-1.414-.576A1.947 1.947 0 0 1 6 18.986v-3.928M20 8.182l-5-4.91-5 4.91M15 3.271v11.786"
                stroke="#4C51BF"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            <p
              class="text-indigo-700 leading-normal text-2xl font-medium ml-3.5 mb-10"
            >
              Upload your file
            </p>
          </div>
          <div class="px-28">
            <ImportDropZone v-model="files" @change="hasFiles"></ImportDropZone>
          </div>

          <div
            v-if="showPopUp"
            class="fixed inset-0 w-full h-screen bg-black bg-opacity-50"
          >
            <div
              class="h-[342px] w-[772px] flex !items-stretch !justify-between absolute z-10 top-1/2 left-1/2 !transform !-translate-x-1/2 !-translate-y-1/2"
            >
              <div class="p-9 bg-white h-[342px] w-[772px] rounded-md">
                <div class="flex justify-between">
                  <p
                    class="text-indigo-700 leading-normal text-2xl font-medium mb-10"
                  >
                    Upload your file
                  </p>
                  <p @click="showPopUp = !showPopUp">
                    <svg
                      width="14"
                      height="14"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M13 1 1 13M1 1l12 12"
                        stroke="#718096"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </p>
                </div>
                <p
                  class="block font-normal text-sm text-slate-500 pb-2.5 leading-normal placeholder:text-slate-500 placeholder:text-base placeholder:font-normal"
                >
                  File
                </p>
                <ImportList :items="files"></ImportList>
                <div>
                  <div class="flex justify-end items-center px-9 py-2.5 mt-24">
                    <Button
                      @click="importData"
                      :isLoading="isLoading"
                      :disabled="isLoading"
                      :class="{
                        'opacity-80 cursor-not-allowed': isLoading,
                      }"
                      type="submit"
                      class="!my-0 bg-fuchsia-600 py-[7px] px-2.5 rounded-md drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)] flex items-center justify-center text-white font-bold text-base leading-normal font-sans"
                    >
                      Import data
                    </Button>
                    <button
                      @click="showPopUp = !showPopUp"
                      type="button"
                      class="ml-2.5 py-[7px] px-2.5 bg-slate-100 rounded-md shadow text-base font-bold"
                    >
                      Cancel
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Details>
  </div>
</template>

<script>
import NavBar from "@/Components/NavBar.vue";
import ImportDropZone from "@/Components/ImportDropZone.vue";
import ImportList from "@/Components/ImportList.vue";
import Button from "@/Components/Button.vue";
export default {
  name: "ImportDataFromExcel",
  Components: {
    NavBar,
    ImportDropZone,
    Button,
    ImportList,
  },

  data() {
    return {
      message: [
        {
          isImportError:
            "Data validation failed. Please fix the errors and upload the file again.",
        },
      ],
      files: [],
      showPopUp: false,
      isLoading: false,
    };
  },

  computed: {
    hasFiles() {
      this.showPopUp = this.files.length != 0;
    },
  },
  methods: {
    importData() {},
  },
};
</script>
