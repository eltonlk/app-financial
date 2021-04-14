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
    import Auth          from "@/services/auth"
    import MenuComponent from "@/components/Menu.vue"

    export default {
        components: {
            MenuComponent
        },
        computed: {
            showHeader () {
                return !(this.$route.name == 'login' || this.$route.name == 'logout') && Auth.user.check
            }
        }
    }
</script>

<style>
    html,
    body {
        background: #f8f9fa !important;
    }

    main {
        margin-top: 100px;
    }
</style>
