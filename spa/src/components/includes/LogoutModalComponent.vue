<template>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary text-white" @click="signOut" data-dismiss="modal">Logout</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import cookieHelper from "../../libs/cookieHelper";

    export default {
        name: "LogoutModalComponent",
        methods: {
            signOut: function () {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(() => {
                    window.vm.$refs.app.setGoogleUser(window.googleUser);
                    cookieHelper.eraseCookie("loggedIn");
                    this.$router.push("login");
                });
            }
        }
    }
</script>

<style scoped>

</style>