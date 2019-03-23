<template>
    <div class="login">
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
    </div>
</template>

<script>
/*eslint-disable*/
    import cookieHelper from '../../libs/cookieHelper';
    export default {
        name: "Login",
        mounted() {
            if(cookieHelper.getCookie("loggedIn") === "true") {
                this.$router.push("/");
            }
        }
    }
</script>

<style scoped>

</style>