<template>
    <div class="container">
        <slot />
    </div>
</template>
<script>
    /*eslint-disable*/
    import SidebarComponent from '../includes/SidebarComponent';
    export default {
        name: "LoginLayout",
        components: {
            SidebarComponent
        }
    }
</script>

<style scoped>

</style>