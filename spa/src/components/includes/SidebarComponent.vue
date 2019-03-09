<template>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" :class="{toggled: this.$parent.sidebarToggled}">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="../../assets/img/logo.svg" alt="" class="sidebar-logo">
            </div>
            <div class="sidebar-brand-text mx-3">AKAI Manager</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item" :class="{active: routeIs('Dashboard')}">
            <router-link :to="{ name: 'Dashboard' }" class="nav-link">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </router-link>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Projekty
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item" :class="{active: routeIs('Projects')}">
            <router-link :to="{ name: 'Projects' }" class="nav-link">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span>
            </router-link>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Członkowie
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item" :class="{active: routeIs('Members')}">
            <router-link :to="{ name: 'Members' }" class="nav-link">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span>
            </router-link>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline" @click="$parent.toggleSidebar()">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
</template>
<script>
/* eslint-disable */
    export default {
        name: 'SidebarComponent',
        methods: {
            routeIs: function (name) {
                return this.$route.name == name;
            }
        }
    }
</script>