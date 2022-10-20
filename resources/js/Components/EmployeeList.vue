<template>
  <div class="">
    <div class="grid grid-cols-12 font-sans not-italic font-normal py-3 px-7">
      <div class="flex flex-row col-span-3">
        <div class="h-[40px] w-[40px] rounded-full">
          <img :src="list.avatar" alt="" class="rounded-full" />
        </div>

        <div class="pl-2">
          <h1 class="text-sm text-dark_cyanblue">
            {{ list.first_name }} {{ list.last_name }}
          </h1>
          <h1 class="text-xs text-primary truncate">{{ list.email }}</h1>
        </div>
      </div>

      <div class="text-dark_cyanblue text-sm col-span-2">
        {{ list.keyEmploymentDetail.current_position }}
        <h1 class="text-xs">{{ list.keyEmploymentDetail.work_schedule }}</h1>
      </div>

      <div class="text-xs text-dark_cyanblue col-span-2">
        {{ list.contact_number }}
      </div>

      <div
        class="Status text-sm text-light_green col-span-2"
        :class="list.status"
      >
        {{ list.status }}
      </div>

      <div class="text-sm col-span-2 text-black items-start">
        {{ list.keyEmploymentDetail.team }}
      </div>
      <div class="">
        <Menu as="div" class="relative inline-block text-left">
          <div>
            <MenuButton
              class="
                text-sm
                w-32
                h-8
                font-semibold
                text-primary
                border border-solid border-bordergray
                box-border
                rounded-md
                inline-flex
                justify-center
                bg-white
                px-3
                pt-1
                hover:bg-primary_blue
                focus:outline-none
                focus-visible:ring-2
                focus-visible:ring-white
                focus-visible:ring-opacity-75
              "
            >
              View Details &nbsp;
              <div class="pt-[6px] pl-1">
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
              </div>
            </MenuButton>
          </div>

          <transition
            enter-active-class="transition duration-100 ease-out"
            enter-from-class="transform scale-95 opacity-0"
            enter-to-class="transform scale-100 opacity-100"
            leave-active-class="transition duration-75 ease-in"
            leave-from-class="transform scale-100 opacity-100"
            leave-to-class="transform scale-95 opacity-0"
          >
            <MenuItems
              class="
                absolute
                bg-white
                text-light_iris
                border
                rounded-sm
                w-[123px]
                h-[63px]
                shadow-lg
                z-40
                divide-gray-100
                focus:outline-none
              "
            >
              <div class="">
                <MenuItem>
                  <router-link
                    :to="'/employees/' + list.id"
                    class="
                      flex flex-col
                      text-light_iris
                      text-xs
                      w-[121px]
                      h-[30px]
                      pl-5
                      pt-2
                      pb-1
                      font-normal
                      hover:bg-primary_blue
                      font-sans
                      not-italic
                    "
                  >
                    View Details
                  </router-link>
                </MenuItem>
                <MenuItem>
                  <button
                    v-on:click="setAlumni(list.id)"
                    class="
                      flex flex-col
                      text-light_iris
                      text-xs
                      w-[121px]
                      h-[31px]
                      pl-5
                      pt-2
                      pb-1
                      font-normal
                      hover:bg-primary_blue
                      font-sans
                      not-italic
                    "
                  >
                    Set as Alumni
                  </button>
                </MenuItem>
              </div>
            </MenuItems>
          </transition>
        </Menu>
      </div>
    </div>
  </div>
</template>
<script>
import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";

export default {
  name: "EmployeeList",
  el: "#hide",
  components: {
    Menu,
    MenuButton,
    MenuItems,
    MenuItem,
  },
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
