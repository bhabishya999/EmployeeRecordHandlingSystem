<template>
  <div>
    <div class="flex pb-5 flex-row items-center float-right pt-1 px-5">
      <div class="flex flex-row space-x-4">
        <div>
          <slot />
        </div>
        <div
          class="
            h-[38px]
            w-full
            flex
            justify-center
            items-center
            text-center
            bg-white
            font-sans
            not-italic
            font-bold
            text-base
          "
        >
          <router-link
            to="/employees/add"
            type="button"
            class="
              bg-primary
              p-[7px]
              rounded-md
              drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)]
              flex
              items-center
              justify-center
              text-white
              font-bold
              text-base
              font-sans
            "
          >
            + Add Employee
          </router-link>
        </div>
        <div
          class="
            h-[38px]
            w-full
            flex
            justify-center
            items-center
            text-center
            bg-white
            font-sans
            not-italic
            font-bold
            text-base
          "
        >
          <router-link
            to="/employees/import"
            type="button"
            class="
              bg-dark_pink
              p-[7px]
              w-[180px]
              rounded-md
              drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)]
              flex
              items-center
              justify-center
              text-white
              font-bold
              text-base
              font-sans
            "
          >
            <svg
              width="12"
              height="14"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M7.617 1.5H9.87c.3 0 .586.129.797.358.212.23.33.54.33.864v8.556c0 .324-.118.635-.33.864-.211.23-.498.358-.797.358H7.617M4.8 10.055 7.616 7 4.799 3.944M7.617 7H.854"
                stroke="#fff"
                stroke-width="1.222"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            &nbsp; Import from Excel
          </router-link>
        </div>
      </div>
    </div>

    <div
      class="
        w-full
        py-4
        grid grid-cols-12
        items-center
        text-dark_blue
        font-sans
        not-italic
        font-bold
        text-sm
        px-7
      "
    >
      <h1 class="col-span-3">Full Name/Email</h1>
      <h1 class="col-span-2">Desigination</h1>
      <h1 class="col-span-2">Phone</h1>
      <h1 class="col-span-2">Status</h1>
      <h1 class="col-span-2">Team</h1>
      <h1 class="">Actions</h1>
    </div>
  </div>
</template>

<script>
export default {
  name: "EmployeeListHeader",
};
</script>
