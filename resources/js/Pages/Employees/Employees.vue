<template>
  <div>
    <NavBar />
    <div
      v-show="showSuccess"
      class="h-10 w-full flex justify-center items-center bg-dark_green"
    >
      <svg
        width="20"
        height="12"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M18.51 1 6.472 10.625 1 6.25"
          stroke="#fff"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
      <p class="font-bold pl-2 text-lg text-white">
        Employee has been sucessfully added.
      </p>
    </div>
  </div>
</template>
<script>
import NavBar from "@/Components/NavBar.vue";
export default {
  name: "Employees",
  components: {
    NavBar,
  },
  data() {
    return {
      showSuccess: false,
    };
  },
  created() {
    this.showSuccess = localStorage.getItem("showSuccess");
    console.log(this.showSuccess);
  },
};
</script>
