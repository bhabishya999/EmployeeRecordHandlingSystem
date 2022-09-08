<template>
  <div class="">
    <div
      class="grid grid-cols-10 pl-8 items-start font-sans content-around justify-around not-italic font-normal py-3"
    >
      <div class="flex flex-row col-span-2">
        <div class="pr-1">
          <svg
            width="36"
            height="36"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <circle cx="18" cy="18" r="18" fill="#FFEEE6" />
            <path
              d="M28 28.375V26a4.75 4.75 0 0 0-4.75-4.75h-9.5A4.75 4.75 0 0 0 9 26v2.375"
              fill="#C2A68E"
            />
            <path
              d="M28 28.375V26a4.75 4.75 0 0 0-4.75-4.75h-9.5A4.75 4.75 0 0 0 9 26v2.375"
              stroke="#C2A68E"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M18.5 16.5a4.75 4.75 0 1 0 0-9.5 4.75 4.75 0 0 0 0 9.5Z"
              fill="#C2A68E"
              stroke="#C2A68E"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            {{ list.avatar }}
          </svg>
        </div>

        <div class="flex flex-col truncate">
          <h1 class="text-sm text-dark_cyanblue">
            {{ list.first_name }} {{ list.last_name }}
          </h1>
          <h1 class="text-xs text-primary truncate">{{ list.email }}</h1>
        </div>
      </div>

      <div class="text-dark_cyanblue text-sm pl-4 col-span-2">
        {{ list.employment.current_position }}
        <h1 class="text-xs">{{ list.employment.work_schedule }}</h1>
      </div>

      <div class="text-xs text-dark_cyanblue pl-5">
        {{ list.contact_number }}
      </div>

      <div class="Status text-sm text-light_green pl-20" :class="list.status">
        {{ list.status }}
      </div>
      <!-- <div v-else id="hide" class="Status text-sm text-light_green pl-20">
        Alumni
      </div> -->

      <div class="text-sm text-black items-start pl-32">
        {{ list.employment.team }}
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
