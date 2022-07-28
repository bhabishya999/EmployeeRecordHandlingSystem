<template>
    <GuestLayout>
        <div id="password-background">
            <MatchPsError></MatchPsError>
        </div>
    </GuestLayout>
</template>

<script>
import PreviousPsError from "@/Components/PreviousPsError.vue";
export default {
    name: {
        MatchPsError,
    },
    components: {
        PreviousPsError,
    },
};
</script>
<style>
#password-background {
}
</style>
