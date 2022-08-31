<script setup>
import Details from "@/Layouts/Details.vue";
</script>
<template>
  <div class="max-h-screen">
    <NavBar></NavBar>
    <div class="h-6 bg-slate-100"></div>
    <Details>
      <div class="h-[716px] mb-24 p-9">
        <div class="mb-20">
          <p class="text-black leading-normal text-2xl font-semibold">
            IMPORT DATA FILE
          </p>
        </div>
        <div class="flex flex-row items-center">
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
          <ImportDropZone></ImportDropZone>
        </div>
      </div>
    </Details>
  </div>
</template>

<script>
import NavBar from "@/Components/NavBar.vue";
import ImportDropZone from "@/Components/ImportDropZone.vue";
export default {
  name: "ImportDataFromExcel",
  Components: {
    NavBar,
    ImportDropZone,
  },

  data() {
    return {};
  },

  props: {},
  methods: {},
};
</script>
