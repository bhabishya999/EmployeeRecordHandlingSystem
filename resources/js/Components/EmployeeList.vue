<template>
  <div class="">
    <div
      class="grid grid-cols-10 pl-8 items-start font-sans content-around justify-around not-italic font-normal py-3"
    >
      <div class="flex flex-row col-span-2">
        <div class="pr-1 h-[36px] w-[36px] rounded-full">
          <img :src="list.avatar" alt="no image" />
        </div>

        <div class="flex flex-col w-[145px] h-[39px] truncate">
          <h1 class="text-sm text-dark_cyanblue">
            {{ list.first_name }} {{ list.last_name }}
          </h1>
          <h1 class="text-xs text-primary truncate">{{ list.email }}</h1>
        </div>
      </div>

      <div class="text-dark_cyanblue text-sm pl-4 col-span-2">
        {{ list.keyEmploymentDetail.current_position }}
        <h1 class="text-xs">{{ list.keyEmploymentDetail.work_schedule }}</h1>
      </div>

      <div class="text-xs text-dark_cyanblue pl-5">
        {{ list.contact_number }}
      </div>

      <div class="Status text-sm text-light_green pl-20" :class="list.status">
        {{ list.status }}
      </div>

      <div class="text-sm text-black items-start pl-32">
        {{ list.keyEmploymentDetail.team }}
      </div>
      <div class="pl-40">
        <div
          class="pl-1 flex flex-row text-sm w-[110px] h-[23px] text-primary border border-solid border-bordergray box-border rounded-md"
        >
          View Details &nbsp;
          <button v-on:click="seen = !seen" class="pt-[2px] z-auto">
            <svg
              width="11"
              height="7"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="m1.5 1.5 4 4 4-4"
                stroke="#4C51BF"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </button>
        </div>
        <div
          v-if="seen"
          id="hide"
          class="bg-white text-light_iris border rounded-sm w-[109px] h-[60px] shadow-lg fixed z-50"
        >
          <router-link
            :to="'/employees/' + list.id"
            class="flex flex-col text-light_iris text-xs w-[108px] px-3 pt-2 pb-1 font-normal hover:bg-primary_blue font-sans not-italic"
          >
            View Details
          </router-link>
          <button
            v-on:click="list.status = 'Alumni'"
            class="flex flex-col text-light_iris text-xs w-[108px] h-[32px] px-3 pt-1 font-normal hover:bg-primary_blue font-sans not-italic"
          >
            Set as Alumni
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "EmployeeList",
  el: "#hide",
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
