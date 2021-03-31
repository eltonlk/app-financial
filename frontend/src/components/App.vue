<template>
    <main>
        <header v-if="showHeader">
            <menu-component></menu-component>
        </header>

        <section>
            <router-view></router-view>
        </section>

        <footer>
            <!-- <h6>Footer</h6> -->
        </footer>
    </main>
</template>

<script>
    import Auth          from "../services/auth";
    import MenuComponent from "./Menu.vue";
    export default {
        components: {
            MenuComponent
        },
        computed: {
            showHeader () {
                return Auth.user.check && this.$route.name != 'auth.login';
            }
        }
    };
</script>

<style scoped>
    main {
        margin-top: 100px;
    }
</style>
