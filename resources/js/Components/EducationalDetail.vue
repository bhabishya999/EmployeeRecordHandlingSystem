<script setup>
import Details from "@/Layouts/Details.vue";
</script>
<template>
    <Details>
        <div class="p-9">
            <div class="flex justify-between items-center">
                <h1
                    class="text-black leading-[150%] text-2xl font-medium font-bold font-sans"
                >
                    EMPLOYEE DETAILS
                </h1>
                <button
                    type="button"
                    class="bg-[#4C51BF] p-[7px] rounded-md drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)] flex items-center justify-center text-white font-bold text-base leading-[150%] font-sans"
                >
                    <svg
                        class="mr-[9px]"
                        width="8"
                        height="14"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M0 13.152V.848C0 .657.129.5.287.5h1.147c.158 0 .287.157.287.348v5.119L6.392.715c.493-.496 1.255-.081 1.255.714V12.57c0 .795-.762 1.21-1.255.714l-4.671-5.22v5.087c0 .191-.13.348-.287.348H.287c-.158 0-.287-.157-.287-.348Z"
                            fill="#fff"
                        />
                    </svg>
                    Back to List
                </button>
            </div>
            <div class="mt-[30px] mb-5">
                <ul class="flex">
                    <li
                        class="font-bold leading-[150%] text-lg py-2.5 px-1.5 mr-7"
                    >
                        Personal Details
                    </li>
                    <li
                        class="font-semibold leading-[150%] text-lg py-2.5 px-1.5 bg-[#4C51BF] rounded-lg font-sans text-white mr-7"
                    >
                        Educational Details
                    </li>
                    <li class="font-bold leading-[150%] text-lg py-2.5 px-1.5">
                        Key Employment Details
                    </li>
                </ul>
            </div>

            <div class="flex">
                {{ item }}
                <div class="w-2/3 mr-10">
                    <div
                        v-for="(item, index) in form"
                        :key="item"
                        class="mb-2.5"
                    > {{ item }}
                        <div class="flex justify-between">
                            <p
                                class="block font-bold text-sm text-[#4C51BF] pb-2.5 leading-[150.69%] placeholder:text-[#718096] placeholder:text-base placeholder:font-normal"
                            >
                                Education {{ index + 1 }}
                            </p>
                            <button
                                type="button"
                                class="py-[7px] px-2.5 text-base font-bold flex items-center justify-center text-danger"
                            >
                                <svg
                                    class="mr-2"
                                    width="14"
                                    height="15"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M4.25 2.5c0-.966.784-1.75 1.75-1.75h2c.966 0 1.75.784 1.75 1.75v.75H13a.75.75 0 0 1 0 1.5h-.787l-.369 7.387a2.75 2.75 0 0 1-2.746 2.613H4.902a2.75 2.75 0 0 1-2.746-2.613l-.37-7.387H1a.75.75 0 0 1 0-1.5h3.25V2.5Zm1.5.75h2.5V2.5A.25.25 0 0 0 8 2.25H6a.25.25 0 0 0-.25.25v.75ZM6 6.463a.75.75 0 1 0-1.5.074l.25 5a.75.75 0 0 0 1.5-.075l-.25-5Zm3.5.074A.75.75 0 1 0 8 6.463l-.25 5a.75.75 0 0 0 1.5.075l.25-5Z"
                                        fill="#C53030"
                                    />
                                </svg>
                                Remove
                            </button>
                        </div>
                        <div class="flex flex-row justify-between mb-2.5">
                            <div class="w-full mr-10">
                                <CustomInput
                                    type="text"
                                    :error="error"
                                    label="Education Level"
                                    v-model="item.education"
                                    placeholder="Higher Secondary Level"
                                ></CustomInput>
                            </div>
                            <div class="w-full">
                                <CustomInput
                                    type="year"
                                    :error="error"
                                    label="Passed Year(A.D)"
                                    v-model="item.year"
                                    placeholder="2017"
                                ></CustomInput>
                            </div>
                        </div>
                        <div>
                            <CustomInput
                                type="text"
                                :error="error"
                                label="Institution"
                                v-model="item.institution"
                                placeholder="United Academy"
                            />
                        </div>
                    </div>

                    <div class="border-b-2 border-[#EDF2F7] w-full my-5"></div>
                    <button
                        @click="addInputForm"
                        type="button"
                        class="mr-2.5 py-[7px] px-2.5 bg-[#F4F7FA] rounded-md shadow text-base font-bold flex items-center text-primary"
                    >
                        <svg
                            class="mr-2"
                            width="11"
                            height="12"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M5.5 1.5v9M1 6h9"
                                stroke="#4C51BF"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                        Add more
                    </button>
                </div>
            </div>
        </div>
        <div class="border-b-2 border-[#EDF2F7] w-full"></div>
        <div>
            <div class="flex flex-row-reverse items-center px-9 py-2.5">
                <button
                    type="button"
                    class="bg-[#4C51BF] p-[7px] rounded-md drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)] flex items-center justify-center text-white font-bold text-base leading-[150%] font-sans"
                >
                    Save and Continue
                </button>
                <button
                    type="button"
                    class="mr-2.5 py-[7px] px-2.5 bg-[#F4F7FA] rounded-md shadow text-base font-bold"
                >
                    Cancel
                </button>
            </div>
        </div>
    </Details>
</template>
<script>
import CustomInput from "@/Components/CustomInput.vue";
import { reactive } from "vue";
export default {
    name: "AddEducationalDetail",
    Components: {
        CustomInput,
    },
    setup() {
        const form = reactive([{ education: "", year: "", institution: "" }]);
        const addInputForm = () => {
            form.push({ education: "", year: "", institution: "" });
        };
        return {
            form,
            addInputForm,
        };
    },
};
</script>
