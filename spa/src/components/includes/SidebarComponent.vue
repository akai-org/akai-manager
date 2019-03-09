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

        <!-- Nav Item - Project index -->
        <li class="nav-item" :class="{active: routeIs('Projects')}">
            <router-link :to="{ name: 'Projects' }" class="nav-link">
                <i class="fas fa-fw fa-project-diagram"></i>
                <span>Projekty</span>
            </router-link>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Członkowie
        </div>

        <!-- Nav Item - Member index -->
        <li class="nav-item" :class="{active: routeIs('Members')}">
            <router-link :to="{ name: 'Members' }" class="nav-link">
                <i class="fas fa-fw fa-users"></i>
                <span>Członkowie</span>
            </router-link>
        </li>

        <!-- Nav Item - Meetings -->
        <li class="nav-item" :class="{active: routeIs('Meetings')}">
            <router-link :to="{ name: 'Meetings' }" class="nav-link">
                <i class="fas fa-fw fa-comments"></i>
                <span>Spotkania</span>
            </router-link>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Promocja
        </div>

        <!-- Nav Item - Member index -->
        <li class="nav-item" :class="{active: routeIs('Companies')}">
            <router-link :to="{ name: 'Companies' }" class="nav-link">
                <i class="fas fa-fw fa-building"></i>
                <span>Firmy</span>
            </router-link>
        </li>

        <!-- Nav Item - Member index -->
        <li class="nav-item" :class="{active: routeIs('Events')}">
            <router-link :to="{ name: 'Events' }" class="nav-link">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Wydarzenia</span>
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