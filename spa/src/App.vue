<template>
    <div id="app">
        <div id="wrapper">
            <SidebarComponent></SidebarComponent>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <TopbarComponent></TopbarComponent>
                    <div class="container-fluid">
                        <router-view />
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
/* eslint-disable */
    import SidebarComponent from './components/includes/SidebarComponent';
    import TopbarComponent from './components/includes/TopbarComponent';
    import FooterComponent from './components/includes/FooterComponent';
    import LogoutModalComponent from './components/includes/LogoutModalComponent';

    export default {
        name: 'App',
        components: {
            SidebarComponent,
            TopbarComponent,
            FooterComponent,
            LogoutModalComponent
        },
        data() {
            return {
                logout: false,
                sidebarToggled: false
            }
        },
        methods: {
            toggleSidebar: function () {
                this.sidebarToggled = !this.sidebarToggled;
            },
            toggleLogoutModal: function() {
                this.logout = !this.logout;
            }
        }
    }
</script>
