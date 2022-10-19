<template>
  <div class="flex">
    <div class="w-[237px]">
      <SideNavigationBar />
    </div>
    <div class="w-full">
      <NavBar>
        <template v-slot:headerName :headerName="headerName"
          >DASHBOARD</template
        >
      </NavBar>
    </div>
  </div>
</template>
  <script>
import Details from "@/Layouts/Details.vue";
import NavBar from "@/Components/NavBar.vue";
import SideNavigationBar from "@/Components/SideNavigationBar.vue";
export default {
  name: "DashBoard",
  components: {
    Details,
    NavBar,
    SideNavigationBar,
  },
};
</script>

  