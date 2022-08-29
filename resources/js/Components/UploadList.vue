<template>
  <ul class="flex flex-row">
    <li v-for="(file, index) in files" :key="index">
      <div
        class="border-2 border-[#E2E8F0] rounded my-2 flex flex-row justify-between p-1.5 mr-6 w-40"
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
            {{ file.size }}
          </p>
        </div>
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
    getFileExt(file) {
      const fileExt = file.name.split(".").pop();
      console.log(fileExt);
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
