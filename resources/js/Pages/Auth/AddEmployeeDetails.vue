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
                        class="font-semibold leading-[150%] text-lg py-2.5 px-1.5 bg-[#4C51BF] rounded-lg font-sans text-white mr-7"
                    >
                        Personal Details
                    </li>
                    <li
                        class="font-bold leading-[150%] text-lg py-2.5 px-1.5 mr-7"
                    >
                        Educational Details
                    </li>
                    <li class="font-bold leading-[150%] text-lg py-2.5 px-1.5">
                        Key Employment Details
                    </li>
                </ul>
            </div>
            <div class="flex">
                <div class="w-2/3 mr-10">
                    <div class="flex flex-row justify-between mb-2.5">
                        <div class="w-full mr-10">
                            <CustomInput
                                :error="error"
                                label="First Name*"
                                v-model="firstName"
                                required
                                placeholder="Enter First Name"
                            ></CustomInput>
                        </div>
                        <div class="w-full">
                            <CustomInput
                                :error="error"
                                label="Last Name*"
                                v-model="lasttName"
                                required
                                placeholder="Enter Last Name"
                            ></CustomInput>
                        </div>
                    </div>
                    <div class="mb-2.5">
                        <CustomInput
                            :error="error"
                            label="Email Address*"
                            v-model="email"
                            required
                            placeholder="Enter Email Address"
                        />
                    </div>
                    <div class="flex flex-row justify-between mb-2.5">
                        <div class="w-full mr-10">
                            <CustomInput
                                :error="error"
                                label="Contact Number*"
                                v-model="contactNumber"
                                required
                                placeholder="Enter Contact Number"
                            ></CustomInput>
                        </div>
                        <div class="w-full relative">
                            <CustomInput
                                :error="error"
                                label="Date of Birth*"
                                v-model="dateOfBirth"
                                required
                                placeholder="DD-MM-YYYY"
                            ></CustomInput>
                            <div
                                class="absolute inset-y-0 right-0 pr-5 pt-7 flex items-center"
                            >
                                <svg
                                    width="14"
                                    height="16"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M0 14.5A1.5 1.5 0 0 0 1.5 16h11a1.5 1.5 0 0 0 1.5-1.5V6H0v8.5Zm10-6.125c0-.206.169-.375.375-.375h1.25c.206 0 .375.169.375.375v1.25a.376.376 0 0 1-.375.375h-1.25A.376.376 0 0 1 10 9.625v-1.25Zm0 4c0-.206.169-.375.375-.375h1.25c.206 0 .375.169.375.375v1.25a.376.376 0 0 1-.375.375h-1.25a.376.376 0 0 1-.375-.375v-1.25Zm-4-4C6 8.169 6.169 8 6.375 8h1.25c.206 0 .375.169.375.375v1.25a.376.376 0 0 1-.375.375h-1.25A.376.376 0 0 1 6 9.625v-1.25Zm0 4c0-.206.169-.375.375-.375h1.25c.206 0 .375.169.375.375v1.25a.376.376 0 0 1-.375.375h-1.25A.376.376 0 0 1 6 13.625v-1.25Zm-4-4C2 8.169 2.169 8 2.375 8h1.25c.206 0 .375.169.375.375v1.25a.376.376 0 0 1-.375.375h-1.25A.376.376 0 0 1 2 9.625v-1.25Zm0 4c0-.206.169-.375.375-.375h1.25c.206 0 .375.169.375.375v1.25a.376.376 0 0 1-.375.375h-1.25A.376.376 0 0 1 2 13.625v-1.25ZM12.5 2H11V.5c0-.275-.225-.5-.5-.5h-1c-.275 0-.5.225-.5.5V2H5V.5c0-.275-.225-.5-.5-.5h-1c-.275 0-.5.225-.5.5V2H1.5A1.5 1.5 0 0 0 0 3.5V5h14V3.5A1.5 1.5 0 0 0 12.5 2Z"
                                        fill="#718096"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2.5">
                        <CustomInput
                            :error="error"
                            label="Current Address*"
                            v-model="currentAddress"
                            required
                            placeholder="Enter Current Address"
                        />
                    </div>
                    <div class="flex flex-row justify-between mb-2.5">
                        <div class="w-full mr-10">
                            <CustomInput
                                :error="error"
                                label="PAN Number"
                                v-model="panNumber"
                                placeholder="Enter PAN Number"
                            ></CustomInput>
                        </div>
                        <div class="w-full">
                            <CustomInput
                                :error="error"
                                label="Bank Account Number"
                                v-model="accountNumber"
                                placeholder="Enter Bank Account Number"
                            ></CustomInput>
                        </div>
                    </div>
                </div>
                <div class="w-1/3 flex flex-col text-center items-center">
                    <div class="mb-4">
                        <svg
                            width="146"
                            height="146"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <rect
                                x="2"
                                y="2"
                                width="142"
                                height="142"
                                rx="71"
                                fill="#FFEEE6"
                                stroke="#E2E8F0"
                                stroke-width="4"
                            />
                            <path
                                d="M73.109 79.58c16.077 0 29.121-13.043 29.121-29.12 0-16.078-13.044-29.121-29.121-29.121-16.077 0-29.12 13.043-29.12 29.12 0 16.078 13.043 29.121 29.12 29.121Zm25.885 6.472H87.851a35.24 35.24 0 0 1-14.742 3.235c-5.258 0-10.233-1.173-14.742-3.235H47.224c-14.298 0-25.885 11.587-25.885 25.885v3.235c0 5.36 4.347 9.707 9.707 9.707h84.126c5.359 0 9.707-4.347 9.707-9.707v-3.235c0-14.298-11.587-25.885-25.885-25.885Z"
                                fill="#C2A68E"
                            />
                        </svg>
                    </div>
                    <p
                        class="leading-[150%] text-[#4C51BF] text-base font-bold"
                    >
                        Upload Image
                    </p>
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
export default {
    name: "AddEmployeeDetails",
    Components: {
        CustomInput,
    },
};
</script>
