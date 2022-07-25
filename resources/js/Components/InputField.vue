<script setup>
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import {
    useForm
} from "@inertiajs/inertia-vue3";

const form = useForm({
    email: " ",
    remember: false,
});

// data(){
//     return{
//         email:" ",
//         remember: false,
//     }
// }
</script>

<script>
export default {
    name: "InputField",
    data() {
        return {
            email: " ",
            remember: false,
        }
    }
}
</script>

<template>
<Label for="email" value="Email Address" />
<Input id="email" type="email" placeholder="Your email@introcept.co" v-model="form.email" required autocomplete="username" />
</template>
