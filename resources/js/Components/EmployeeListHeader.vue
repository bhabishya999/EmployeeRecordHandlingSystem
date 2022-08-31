<template>
  <div>
    <div
      class="flex h-[80px] flex-row justify-between text-center justify-center items-center px-9"
    >
      <div class="flex flex-row space-x-6">
        <div class="flex flex-col font-sans not-italic font-medium">
          <h1 class="text-xl text-black">EMPLOYEES</h1>
          <h3 class="text-base text-light_iris">Total 30 results</h3>
        </div>
        <div
          class="flex flex-row border shadow-sm justify-between rounded-md h-[37px] w-[170px] text-center justify-center items-center"
        >
          <input
            v-model="searchfilter"
            type="text"
            placeholder="search"
            class="h-[26px] w-[120px] border-transparent focus:border-transparent focus:ring-0"
          />
          <button class="pr-4" id="cmnt" v-on:click="seen = !seen">
            <svg
              width="14"
              height="9"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="m1 1.5 6 6 6-6"
                stroke="#4C51BF"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            <div v-if="seen" id="hide">
              <div>abc</div>
            </div>
          </button>
        </div>
      </div>

      <div class="flex flex-row space-x-4">
        <div>
          <slot />
        </div>
        <div
          class="h-[38px] w-full flex justify-center items-center text-center bg-white font-sans not-italic font-bold text-base"
        >
          <button
            type="button"
            class="bg-primary p-[7px] rounded-md drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)] flex items-center justify-center text-white font-bold text-base font-sans"
          >
            + Add Employee
          </button>
        </div>
        <div
          class="h-[38px] w-full flex justify-center items-center text-center bg-white font-sans not-italic font-bold text-base"
        >
          <button
            type="button"
            class="bg-dark_pink p-[7px] w-[180px] rounded-md drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)] flex items-center justify-center text-white font-bold text-base font-sans"
          >
            ->] Import from Excel
          </button>
        </div>
      </div>
    </div>

    <div
      class="h-[49px] w-full grid grid-cols-6 pl-8 gap-4 content-around justify-around items-center bg-dark_gray text-dark_blue font-sans not-italic font-bold text-sm"
    >
      <h1>FullName/Email</h1>
      <h1 class="pl-4">Desigination</h1>
      <h1 class="pl-6">Phone</h1>
      <h1>Status</h1>
      <h1>Team</h1>
      <h1>Actions</h1>
    </div>
  </div>
</template>

<script>
export default {
  name: "EmployeeListHeader",
  el: "#hide",
  data() {
    return {
      searchfilter: "",
    };
  },
};
</script>
