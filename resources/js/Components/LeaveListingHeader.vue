<template>
  <div>
    <div class="flex pb-5 flex-row items-center float-right pt-1 px-5">
      <div class="flex flex-row space-x-4">
        <div>
          <slot />
        </div>

        <div>
          <slot />
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
        px-10
      "
    >
      <h1 class="col-span-3">Full Name/Email</h1>
      <h1 class="col-span-2">Leave Type</h1>
      <h1 class="col-span-2">Date</h1>
      <h1 class="col-span-2">Total Days</h1>
      <h1 class="col-span-2">Approval</h1>
      <h1 class="">Actions</h1>
    </div>
  </div>
</template>
  
  <script>
export default {
  name: "LeaveListingHeader",
};
</script>
  