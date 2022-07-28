<template>
    <GuestLayout>
        <ApplicationLogo></ApplicationLogo>
        <p
            class="text-[#1A202C] text-2xl font-bold leading-[150.69%] mt-[37px]"
        >
            Reset Password
        </p>

        <p
            class="text-[#718096] font-normal text-sm leading-[150.69%] mt-[9px] mb-[30px]"
        >
            Your new password must be diffrent from previous used one
        </p>
        <div>
            <PasswordInput
                :error="error"
                label="Create new password"
                id="password"
                class="mt-1 w-full"
                required
                autocomplete="current-password"
            />
        </div>
        <div v-if="error" class="flex items-center w-full mt-[9px]">
            <div>
                <svg
                    width="17"
                    height="17"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M8.5 16a7.5 7.5 0 1 0 0-15 7.5 7.5 0 0 0 0 15Z"
                        fill="#D93025"
                        stroke="#fff"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M8.5 5.5v3M8.5 11.5h.008"
                        stroke="#fff"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </div>
            <p
                class="text-[#D93025] font-normal text-sm leading-[150%] ml-[8px]"
            >
                Incorrect password. Try again or click Forgot Password to reset
                it.
            </p>
        </div>
        <p
            class="text-[#718096] font-normal text-sm leading-[150.69%] mt-[20px] mb-[30px]"
        >
            Password must have atleast 8 characters,1lowercase, 1 uppercase, 1
            number and 1 special character
        </p>
        <div>
            <PasswordInput
                :error="error"
                label="Re-enter new password"
                id="password"
                class="mt-1 w-full"
                required
                autocomplete="current-password"
                placeholder="your password"
            />
        </div>

        <Button type="submit" class="w-full mt-[41px]"> Reset Password </Button>
    </GuestLayout>
</template>

<script>
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/Guest.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Label from "@/Components/Label.vue";
import PasswordInput from "@/Components/PasswordInput.vue";
export default {
    name: "ResettPassword",
    components: {
        Button,
        GuestLayout,
        ApplicationLogo,
        Label,
        PasswordInput,
    },
    data() {
        return {
            password: "",
            error: false,
        };
    },
};
</script>
