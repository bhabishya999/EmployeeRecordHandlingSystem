<template>
  <ul class="flex flex-row">
    <li v-for="(file, index) in items" v-bind:key="index">
      <div
        class="border-2 border-[#E2E8F0] rounded my-2 flex flex-row justify-between p-1.5 mr-6 w-40 relative"
      >
        <div class="w-1/3">
          <img
            src="../../images/pdf.png"
            alt="png"
            v-if="getFileExt(file) == 'pdf'"
          />
          <img
            src="../../images/jpg.png"
            alt="png"
            v-if="getFileExt(file) == 'jpg'"
          />
          <img
            src="../../images/png.png"
            alt="png"
            v-if="getFileExt(file) == 'png'"
          />
          <!-- <img
            :src="getExtenationIcon(getFileExt(file))"
            :alt="getFileExt(file)"
          /> -->
        </div>
        <div class="w-2/3 flex flex-col">
          <p class="leading-normal font-normal text-base text-black truncate">
            {{ file.name }}
          </p>
          <p class="text-slate-600 font-normal text-[6px]">
            {{ file.type }}
          </p>
        </div>
        <button class="absolute top-0 right-0" @click="deleteDocument(index)">
          <svg
            width="19"
            height="19"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g filter="url(#a)">
              <path
                d="M9.621 14.551c3.523 0 6.379-2.81 6.379-6.275C16 4.81 13.144 2 9.62 2 6.1 2 3.243 4.81 3.243 8.276c0 3.466 2.856 6.275 6.378 6.275Z"
                fill="#fff"
              />
            </g>
            <path
              d="M11.535 6.393 7.708 10.16M7.708 6.393l3.827 3.766"
              stroke="#718096"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <defs>
              <filter
                id="a"
                x=".243"
                y="0"
                width="18.757"
                height="18.551"
                filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB"
              >
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feColorMatrix
                  in="SourceAlpha"
                  values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                  result="hardAlpha"
                />
                <feOffset dy="1" />
                <feGaussianBlur stdDeviation="1.5" />
                <feComposite in2="hardAlpha" operator="out" />
                <feColorMatrix
                  values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0"
                />
                <feBlend
                  in2="BackgroundImageFix"
                  result="effect1_dropShadow_699_3230"
                />
                <feColorMatrix
                  in="SourceAlpha"
                  values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                  result="hardAlpha"
                />
                <feOffset dy="1" />
                <feGaussianBlur stdDeviation="1" />
                <feComposite in2="hardAlpha" operator="out" />
                <feColorMatrix
                  values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0"
                />
                <feBlend
                  in2="effect1_dropShadow_699_3230"
                  result="effect2_dropShadow_699_3230"
                />
                <feBlend
                  in="SourceGraphic"
                  in2="effect2_dropShadow_699_3230"
                  result="shape"
                />
              </filter>
            </defs>
          </svg>
        </button>
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
      return this.items.reverse();
    },
  },
  methods: {
    deleteDocument(index) {
      let removedItem = this.items.splice(index, 1);
      let document_id = removedItem[0].document_id;
      this.$emit("deleteComplete", document_id);
    },
    getFileExt(file) {
      const fileExt = file.name.split(".").pop();
      return fileExt.toLowerCase();
    },
    // getExtenationIcon(value) {
    //   if (value == "pdf") {
    //     console.log("pdfqwedrftgyhujikl");
    //     // return require("../../images/pdf.png");
    //     return "'../../images/pdf.png'";
    //   } else if (value == "png") {
    //     console.log("pnggggggggggg");
    //     // return require("../../images/png.png");
    //     return "'../../images/png.png'";
    //   } else if (value == "jpg") {
    //     console.log("jpggggggg");
    //     // return require("../../images/jpg.png");
    //     return "'../../images/jpg.png'";
    //   } else {
    //     return;
    //   }
    // },
  },
};
</script>
