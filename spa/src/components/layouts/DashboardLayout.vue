<template>
    <div class="dashboard">
        <div id="wrapper">
            <sidebar-component></sidebar-component>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <topbar-component></topbar-component>
                    <div class="container-fluid">
                        <div class="alert alert-danger" v-if="errors">
                            <ul>
                                <li v-for="error in errors">{{error}}</li>
                            </ul>
                        </div>
                        <div class="alert alert-success" v-if="success">
                            {{success}}
                        </div>
                        <slot/>
                    </div>
                </div>
                <footer-component></footer-component>
            </div>
        </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <logout-modal-component></logout-modal-component>
    </div>
</template>
<script>
    import SidebarComponent from '../includes/SidebarComponent';
    import TopbarComponent from '../includes/TopbarComponent';
    import FooterComponent from '../includes/FooterComponent';
    import LogoutModalComponent from '../includes/LogoutModalComponent';
    import cookieHelper from "../../libs/cookieHelper";

    export default {
        name: "DashboardLayout",
        components: {
            SidebarComponent,
            TopbarComponent,
            FooterComponent,
            LogoutModalComponent
        },
        methods: {
            toggleSidebar: function () {
                this.sidebarToggled = !this.sidebarToggled;
            },
            dumpErrors: function (errors) {
                this.success = null;
                this.errors = errors;
            },
            dumpSuccess: function (success) {
                this.errors = null;
                this.success = success;
            }
        },
        data() {
            return {
                sidebarToggled: false,
                errors: null,
                success: null
            }
        },
        mounted() {
            if (cookieHelper.getCookie("loggedIn") !== "true") {
                this.$router.push("login");
            }
        },
        watch: {
            $route (to, from) {
                this.success = null;
                this.errors = null;
            }
        }
    }
</script>

<style scoped>

</style>