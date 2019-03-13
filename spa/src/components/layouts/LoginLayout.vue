<template>
    <div class="container">
        <slot />
    </div>
</template>
<script>
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