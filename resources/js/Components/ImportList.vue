<template>
  <ul class="flex flex-col">
    <li>
      <div class="flex flex-col">
        <p class="leading-normal font-normal text-base text-black mb-2">
          {{ items[0].name }}
        </p>
      </div>
    </li>
  </ul>
</template>
<script>
export default {
  name: "UploadList",
  props: ["items"],
  computed: {
    files() {
      return this.items.pop();
    },
  },
};
</script>
