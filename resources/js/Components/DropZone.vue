<template>
    <p
        class="mb-2.5 block font-normal text-sm text-[#1A202C] pb-2.5 leading-[150.69%] placeholder:text-[#718096] placeholder:text-base placeholder:font-normal"
    >
        Documents*
    </p>
    <div
        @dragenter.prevent=""
        @dragover.prevent=""
        @drop.prevent="handleFiles"
        class="flex flex-row items-center justify-center bg-white pb-3.5 pt-4 pl-4 w-full rounded-md text-sm leading-[150.69%] text-[#718096] font-normal font-sans border-dotted border-2 outline-[#4C51BF] outline-2 border-[#4C51BF] active:border-[#4C51BF]"
    >
        <div class="mr-[9px]">
            <svg
                width="31"
                height="25"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="m20.176 17.61-5.112-5.112-5.111 5.112M15.065 12.498V24"
                    stroke="#718096"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M25.786 20.665a6.39 6.39 0 0 0-3.054-12h-1.61a10.223 10.223 0 1 0-17.56 9.329"
                    stroke="#718096"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="m20.176 17.61-5.112-5.112-5.111 5.112"
                    stroke="#718096"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </div>
        <p class="leading-[150.69%] text-[#718096] text-base mr-2">
            Drag a file here or
        </p>
        <label
            for="dropzone-file"
            class="leading-[150%] text-[#4C51BF] text-base font-bold"
            >Browse</label
        >
        <input
            class="hidden"
            type="file"
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
                e.target.files ||
                e.dataTransfer.files ||
                this.$refs.dropzoneFile.files;
            for (let i = 0; i < inputValue.length; i++) {
                const fileitem = inputValue[i];
                this.files.push(fileitem);
            }
            this.$emit("update:modelValue", this.files);
        },
    },
};
</script>
