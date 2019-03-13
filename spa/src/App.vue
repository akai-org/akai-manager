<template>
    <div id="app">
        <component :is="layout">
            <router-view />
        </component>
    </div>
</template>

<script>
    const default_layout = "login";
    export default {
        name: 'App',
        data() {
            return {
                googleUser: {
                    isSignedIn: function () {
                        return false;
                    }
                }
            }
        },
        methods: {
            setGoogleUser: function(googleUser) {
                this.googleUser = googleUser;
            }
        },
        computed: {
            layout(){
                return (this.$route.meta.layout || default_layout) + '-layout';
            }
        }
    }
</script>
