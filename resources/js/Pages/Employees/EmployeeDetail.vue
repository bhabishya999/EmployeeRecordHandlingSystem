<script setup>
import Details from "@/Layouts/Details.vue";
</script>
<template>
    <Details>
        <div class="flex flex-col relative">
            <div class="bg-blue-rgba h-[365px] drop-shadow-4xl flex flex-col">
                <div class="flex flex-col items-center text-center">
                    <div class="w-[185px] h-[185px] rounded mt-5">
                        <img
                            src="../../../images/latasa.png"
                            alt="Employee_Name"
                        />
                    </div>
                    <h1
                        class="text-gray-900 leading-normal font-semibold text-lg"
                    >
                        Latasa Maharjan
                    </h1>
                    <p
                        class="text-slate-600 leading-normal font-medium text-base"
                    >
                        Design Intern
                    </p>
                </div>
                <div class="absolute bottom-0">
                    <ul class="flex">
                        <li
                            :class="{
                                'bg-indigo-700 rounded-lg font-sans text-white':
                                    personal_active,
                            }"
                            @click="personal_detail"
                            class="font-bold leading-normal text-lg py-2.5 px-1.5 mr-7"
                        >
                            Personal Details
                        </li>
                        <li
                            :class="{
                                'bg-indigo-700 rounded-lg font-sans text-white':
                                    educational_active,
                            }"
                            @click="educationl_detail"
                            class="font-semibold leading-normal text-lg py-2.5 px-1.5 mr-7"
                        >
                            Educational Details
                        </li>
                        <li
                            :class="{
                                'bg-indigo-700 rounded-lg font-sans text-white':
                                    keyemp_active,
                            }"
                            @click="employment_detail"
                            class="font-bold leading-normal text-lg py-2.5 px-1.5"
                        >
                            Key Employment Details
                        </li>
                    </ul>
                </div>
            </div>
            <div v-if="personal_active" class="personal_Detail">
                <div
                    class="flex justify-between items-center text-center bg-slate-100 h-[60px]"
                >
                    <p
                        class="leading-normal font-bold text-base text-indigo-700"
                    >
                        Personal Details
                    </p>
                    <div class="flex justify-between items-center text-center">
                        <svg
                            width="14"
                            height="14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M6.367 2.265H2.193A1.193 1.193 0 0 0 1 3.458v8.35A1.192 1.192 0 0 0 2.193 13h8.35a1.192 1.192 0 0 0 1.192-1.193V7.632"
                                stroke="#4C51BF"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M10.84 1.37a1.265 1.265 0 0 1 1.79 1.79L6.964 8.825l-2.386.597.597-2.386 5.665-5.665Z"
                                stroke="#4C51BF"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                        <p
                            class="leading-normal font-bold text-base text-indigo-700 ml-2.5"
                        >
                            Edit
                        </p>
                    </div>
                </div>
                <div class="h-52 p-8">
                    <div
                        class="flex justify-between mb-12 rounded-md drop-shadow-[0_1px_2px_rgba(0,0,0,0.06)_0_10px_15px_rgba(0,0,0,0.1)]"
                    >
                        <div class="flex flex-col">
                            <div class="mb-12">
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    Email Address
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    Lasata99@gmail.com
                                </p>
                            </div>
                            <div>
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    PAN Number
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    123123456
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="mb-12">
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    Current Address
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    Nawalparasi
                                </p>
                            </div>
                            <div>
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    Bank Account Number
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    1234567895246
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="mb-12">
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    Date of Birth
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    25-04-1999 A.D
                                </p>
                            </div>
                            <div>
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    Contact Number
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    +9779818448321
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-100 h-[60px] rounded"></div>
                <div class="h-40 p-8 flex flex-col">
                    <p
                        class="text-indigo-700 leading-normal font-bold text-base"
                    >
                        Documents
                    </p>

                    <div class="flex flex-row">
                        <div
                            class="border-2 border-[#E2E8F0] rounded my-2 flex flex-row justify-between p-1.5 mr-6 w-48"
                        >
                            <div class="mr-2">
                                <img
                                    src="../../../images/pdf.png"
                                    alt="Document"
                                />
                            </div>
                            <div class="flex flex-col">
                                <p
                                    class="leading-normal font-normal text-base text-black truncate mr-2"
                                >
                                    citizenshipfront.jpg
                                </p>
                                <p
                                    class="text-[#4A5568] font-normal text-[6px]"
                                >
                                    400KB
                                </p>
                            </div>
                        </div>
                        <div
                            class="border-2 border-[#E2E8F0] rounded my-2 flex flex-row justify-between p-1.5 mr-6 w-48"
                        >
                            <div class="mr-2">
                                <img
                                    src="../../../images/pdf.png"
                                    alt="Document"
                                />
                            </div>
                            <div class="flex flex-col">
                                <p
                                    class="leading-normal font-normal text-base text-black truncate mr-2"
                                >
                                    citizenshipfront.jpg
                                </p>
                                <p
                                    class="text-[#4A5568] font-normal text-[6px]"
                                >
                                    400KB
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="educational_active" class="Educational_Detail">
                <div
                    class="flex justify-between items-center text-center bg-slate-100 h-[60px]"
                >
                    <p
                        class="leading-normal font-bold text-base text-indigo-700"
                    >
                        Education Details
                    </p>
                    <div class="flex justify-between items-center text-center">
                        <svg
                            width="14"
                            height="14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M6.367 2.265H2.193A1.193 1.193 0 0 0 1 3.458v8.35A1.192 1.192 0 0 0 2.193 13h8.35a1.192 1.192 0 0 0 1.192-1.193V7.632"
                                stroke="#4C51BF"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M10.84 1.37a1.265 1.265 0 0 1 1.79 1.79L6.964 8.825l-2.386.597.597-2.386 5.665-5.665Z"
                                stroke="#4C51BF"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                        <p
                            class="leading-normal font-bold text-base text-indigo-700 ml-2.5"
                        >
                            Edit
                        </p>
                    </div>
                </div>
                <div class="h-40 p-8 flex flex-col">
                    <p
                        class="mb-4 text-indigo-700 leading-normal font-bold text-base"
                    >
                        Education 1
                    </p>
                    <div class="flex flex-row justify-between">
                        <div class="mb-12">
                            <p
                                class="block font-normal text-sm text-slate-500 leading-normal"
                            >
                                Education Level
                            </p>
                            <p class="leading-normal font-bold text-base">
                                Education Level
                            </p>
                        </div>
                        <div class="mb-12">
                            <p
                                class="block font-normal text-sm text-slate-500 leading-normal"
                            >
                                Institution
                            </p>
                            <p class="leading-normal font-bold text-base">
                                United Academy
                            </p>
                        </div>
                        <div>
                            <p
                                class="block font-normal text-sm text-slate-500 leading-normal"
                            >
                                Passed Year
                            </p>
                            <p class="leading-normal font-bold text-base">
                                2017 A.D
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-100 h-[60px] rounded"></div>
                <div class="h-40 p-8 flex flex-col">
                    <p
                        class="mb-4 text-indigo-700 leading-normal font-bold text-base"
                    >
                        Education 2
                    </p>
                    <div class="flex flex-row justify-between">
                        <div class="mb-12">
                            <p
                                class="block font-normal text-sm text-slate-500 leading-normal"
                            >
                                Education Level
                            </p>
                            <p class="leading-normal font-bold text-base">
                                Bachelor’s Degree
                            </p>
                        </div>
                        <div class="mb-12">
                            <p
                                class="block font-normal text-sm text-slate-500 leading-normal"
                            >
                                Institution
                            </p>
                            <p class="leading-normal font-bold text-base">
                                Prime College
                            </p>
                        </div>
                        <div>
                            <p
                                class="block font-normal text-sm text-slate-500 leading-normal"
                            >
                                Passed Year
                            </p>
                            <p class="leading-normal font-bold text-base">
                                2022 A.D
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="keyemp_active" class="keyEmp_Detail">
                <div
                    class="flex justify-between items-center text-center bg-slate-100 h-[60px]"
                >
                    <p
                        class="leading-normal font-bold text-base text-indigo-700"
                    >
                        Key Employment Details
                    </p>
                    <div class="flex justify-between items-center text-center">
                        <svg
                            width="14"
                            height="14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M6.367 2.265H2.193A1.193 1.193 0 0 0 1 3.458v8.35A1.192 1.192 0 0 0 2.193 13h8.35a1.192 1.192 0 0 0 1.192-1.193V7.632"
                                stroke="#4C51BF"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M10.84 1.37a1.265 1.265 0 0 1 1.79 1.79L6.964 8.825l-2.386.597.597-2.386 5.665-5.665Z"
                                stroke="#4C51BF"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                        <p
                            class="leading-normal font-bold text-base text-indigo-700 ml-2.5"
                        >
                            Edit
                        </p>
                    </div>
                </div>
                <div class="px-8 py-16">
                    <div
                        class="flex justify-between rounded-md drop-shadow-[0_1px_2px_rgba(0,0,0,0.06)_0_10px_15px_rgba(0,0,0,0.1)]"
                    >
                        <div class="flex flex-col">
                            <div class="mb-12">
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    Email Address
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    Lasata99@gmail.com
                                </p>
                            </div>
                            <div class="mb-12">
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    Email Address
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    Lasata99@gmail.com
                                </p>
                            </div>
                            <div>
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    PAN Number
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    123123456
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="mb-12">
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    Current Address
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    Nawalparasi
                                </p>
                            </div>
                            <div>
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    Bank Account Number
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    1234567895246
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="mb-12">
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    Date of Birth
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    25-04-1999 A.D
                                </p>
                            </div>
                            <div>
                                <p
                                    class="block font-normal text-sm text-slate-500 leading-normal"
                                >
                                    Contact Number
                                </p>
                                <p class="leading-normal font-bold text-base">
                                    +9779818448321
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Details>
</template>
<script>
export default {
    name: "EmployeeDetail",
    Components: {
        Details,
    },
    data() {
        return {
            personal_active: true,
            educational_active: false,
            keyemp_active: false,
        };
    },
    methods: {
        personal_detail() {
            this.personal_active = true;
            this.educational_active = false;
            this.keyemp_active = false;
        },
        educationl_detail() {
            this.educational_active = true;
            this.personal_active = false;
            this.keyemp_active = false;
        },
        employment_detail() {
            this.keyemp_active = true;
            this.educational_active = false;
            this.personal_active = false;
        },
    },
};
</script>
