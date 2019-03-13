<template>
    <div class="dashboard">
        <div id="wrapper">
            <sidebar-component></sidebar-component>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <topbar-component></topbar-component>
                    <div class="container-fluid">
                        <slot />
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
            }
        },
        data() {
            return {
                sidebarToggled: false,
            }
        },
        mounted() {
            if(cookieHelper.getCookie("loggedIn") !== "true") {
                this.$router.push("login");
            }
        }
    }
</script>

<style scoped>

</style>