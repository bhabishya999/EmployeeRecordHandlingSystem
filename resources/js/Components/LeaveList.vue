<template>
  <div class="">
    <div class="grid grid-cols-12 font-sans not-italic font-normal py-3 px-10">
      <div class="flex flex-row col-span-3">
        <div class="h-[40px] w-[40px] rounded-full">
          <img
            src="https://randomuser.me/api/portraits/med/women/2.jpg"
            alt=""
            class="rounded-full"
          />
        </div>

        <div class="pl-2">
          <h1 class="text-sm text-dark_cyanblue">Neha Rai</h1>
          <h1 class="text-xs text-primary truncate">neha@gmail.com</h1>
        </div>
      </div>

      <div class="text-dark_cyanblue text-sm col-span-2">Sick Leave</div>

      <div class="text-xs text-dark_cyanblue col-span-2">11/21/2022</div>

      <div class="text-xs text-dark_cyanblue col-span-2">2</div>

      <div class="text-sm col-span-2 text-black items-start">Yes</div>
      <div class="text-base text-[#1B31F8] cursor-pointer">View Form</div>
    </div>
  </div>
</template>
  <script>
export default {
  name: "LeaveList",
  data() {
    return {
      seen: false,
    };
  },
  props: {
    list: {
      required: true,
      type: Object,
    },
  },
  methods: {
    setAlumni(empId) {
      axios
        .put(`/employees/status/${empId}`)
        .then(() => {
          this.list.status = "Alumni";
        })

        .catch((error) => {
          alert(error);
        });
    },
  },
};
</script>
  <style>
.Status.Active {
  color: #4d966f;
}
.Status.Alumni {
  color: #fbad17;
}
</style>
  