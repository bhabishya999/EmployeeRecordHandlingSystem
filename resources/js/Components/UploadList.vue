<template>
    <ul class="flex flex-row">
        <li v-for="(file, index) in files" :key="index">
            <div
                class="border-2 border-[#E2E8F0] rounded my-2 flex flex-row justify-between p-1.5 mr-6"
            >
                <div class="w-1/3">{{ file.img }}</div>
                <div class="w-2/3 flex flex-col">
                    <p class="leading-[150%] font-normal text-base text-black">
                        {{ file.name }}
                    </p>
                    <p class="text-[#4A5568] font-normal text-[6px]">
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
};
</script>
