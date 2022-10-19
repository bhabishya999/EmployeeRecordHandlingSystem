<template>
  <div
    @dragenter.prevent=""
    @dragover.prevent=""
    @drop.prevent="handleFiles"
    class="h-[361px] flex flex-col items-center justify-center text-center bg-white pb-3.5 pt-4 pl-4 w-full rounded-md text-sm leading-normal text-slate-500 font-normal font-sans border-dashed border-2 outline-indigo-700 outline-2 border-indigo-700 active:border-indigo-700"
  >
    <div class="mr-[9px]">
      <p class="leading-normal text-slate-900 text-2xl font-medium mr-2 mb-12">
        Drop your file here
      </p>
      <div class="flex items-center justify-center">
        <svg
          class="mr-4"
          width="60"
          height="66"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M55.526 23.608h-1.585V15.96c0-.048-.007-.095-.014-.144a1.27 1.27 0 0 0-.307-.838L40.895.443c-.004-.004-.008-.006-.01-.01a1.256 1.256 0 0 0-.343-.266 1.355 1.355 0 0 0-.255-.108c-.024-.006-.045-.016-.07-.022A1.301 1.301 0 0 0 39.922 0H8.647A2.59 2.59 0 0 0 6.06 2.588v21.02H4.474a3.7 3.7 0 0 0-3.699 3.698v19.237a3.7 3.7 0 0 0 3.7 3.7h1.584v13.169A2.59 2.59 0 0 0 8.647 66h42.706a2.592 2.592 0 0 0 2.588-2.588V50.243h1.585a3.7 3.7 0 0 0 3.699-3.7V27.308c0-2.044-1.657-3.7-3.699-3.7ZM8.647 2.588h29.98V15.83c0 .715.58 1.294 1.294 1.294h11.432v6.484H8.647V2.588Zm19.484 35.11c-3.212-1.118-5.304-2.895-5.304-5.704 0-3.298 2.752-5.822 7.31-5.822 2.18 0 3.786.459 4.932.976l-.974 3.527a9.165 9.165 0 0 0-4.043-.919c-1.892 0-2.81.86-2.81 1.864 0 1.234 1.09 1.778 3.585 2.724 3.412 1.262 5.018 3.039 5.018 5.763 0 3.24-2.495 5.993-7.8 5.993-2.207 0-4.387-.575-5.476-1.176l.888-3.613c1.176.604 2.982 1.205 4.847 1.205 2.007 0 3.068-.832 3.068-2.094 0-1.205-.919-1.893-3.241-2.723ZM5.363 36.437c0-6.594 4.703-10.264 10.551-10.264 2.266 0 3.986.459 4.76.86l-.889 3.47a9.471 9.471 0 0 0-3.67-.716c-3.47 0-6.164 2.092-6.164 6.392 0 3.871 2.293 6.308 6.194 6.308 1.318 0 2.78-.286 3.64-.63l.66 3.411c-.803.402-2.609.833-4.96.833-6.681 0-10.122-4.159-10.122-9.664Zm45.99 26.274H8.647V50.243h42.706V62.71Zm-2.89-16.898h-5.105l-6.193-19.324h4.79l2.35 8.173c.66 2.292 1.261 4.5 1.721 6.909h.085a84.555 84.555 0 0 1 1.75-6.825l2.465-8.257h4.646l-6.51 19.324Z"
            fill="#718096"
          />
        </svg>
        <svg
          width="60"
          height="66"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M55.527 23.608h-1.585V15.96c0-.048-.008-.096-.013-.144a1.27 1.27 0 0 0-.308-.838L40.895.443c-.004-.004-.008-.005-.01-.01a1.274 1.274 0 0 0-.258-.216 1.358 1.358 0 0 0-.34-.158c-.024-.006-.045-.016-.07-.022A1.287 1.287 0 0 0 39.922 0H8.647a2.59 2.59 0 0 0-2.588 2.588v21.02H4.474a3.7 3.7 0 0 0-3.7 3.699v19.237a3.7 3.7 0 0 0 3.7 3.699H6.06v13.169A2.59 2.59 0 0 0 8.647 66h42.706a2.592 2.592 0 0 0 2.588-2.588V50.243h1.585a3.7 3.7 0 0 0 3.699-3.7V27.308c0-2.044-1.656-3.7-3.698-3.7ZM8.647 2.588h29.98V15.83c0 .715.58 1.294 1.294 1.294h11.432v6.484H8.647V2.588Zm26.22 35.289c-2.543-.886-4.202-2.293-4.202-4.52 0-2.611 2.18-4.61 5.792-4.61 1.725 0 2.997.363 3.905.773l-.772 2.792a7.283 7.283 0 0 0-3.202-.726c-1.498 0-2.225.681-2.225 1.476 0 .977.863 1.408 2.838 2.157 2.702 1 3.974 2.408 3.974 4.565 0 2.567-1.976 4.747-6.177 4.747-1.748 0-3.474-.454-4.337-.931l.703-2.862c.931.477 2.363.955 3.838.955 1.591 0 2.43-.659 2.43-1.658 0-.953-.726-1.5-2.565-2.158Zm-5.857 3.52v2.907h-9.563V28.996h3.476v12.4h6.087ZM8.343 44.304H4.392l4.429-7.746-4.27-7.563h3.974l1.34 2.794c.454.931.795 1.68 1.159 2.544h.044c.364-.977.659-1.658 1.044-2.544l1.295-2.794h3.951l-4.315 7.472 4.543 7.836h-3.997l-1.386-2.771c-.567-1.066-.93-1.862-1.362-2.747h-.045c-.319.885-.704 1.681-1.181 2.747l-1.271 2.773Zm43.009 18.407H8.647V50.243h42.706v12.468Zm.023-18.407-1.385-2.77c-.568-1.068-.931-1.862-1.363-2.748h-.044c-.319.886-.705 1.68-1.183 2.747l-1.27 2.771h-3.953l4.429-7.746-4.27-7.563h3.975l1.34 2.794c.454.931.794 1.68 1.158 2.544h.046c.362-.977.657-1.658 1.043-2.544l1.295-2.794h3.952l-4.315 7.472 4.542 7.836h-3.997v.002Z"
            fill="#718096"
          />
        </svg>
      </div>
      <div class="flex flex-row items-center justify-center pt-2.5 pb-12">
        <span class="bg-slate-500 w-[64px] h-[2px] mr-2"></span>
        <p class="leading-normal text-slate-500 text-xl">or</p>
        <span class="bg-slate-500 w-[64px] h-[2px] ml-2"></span>
      </div>
    </div>

    <label
      for="dropzone-file"
      class="leading-normal bg-indigo-700 text-white px-9 py-2 rounded-md text-base font-bold"
      >Choose a file</label
    >
    <input
      class="hidden"
      type="file"
      accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
      id="dropzone-file"
      ref="dropzoneFile"
      @change="handleFiles"
    />
  </div>
</template>
<script>
export default {
  name: "DropZone",
  props: ["modelValue"],
  emits: ["update:modelValue"],
  data() {
    return {
      files: [],
    };
  },

  methods: {
    handleFiles(e) {
      const inputValue =
        e.target.files || e.dataTransfer.files || this.$refs.dropzoneFile.files;
      inputValue.forEach((value) => {
        this.files.push(value);
      });
      this.$emit("update:modelValue", this.files);
    },
  },
};
</script>
