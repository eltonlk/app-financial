<template>
    <div id="app">
        <div class="page-loading page-loading-fixed" v-if="loading">
            <div class="indeterminate"></div>
        </div>

        <header v-if="showHeader">
            <menu-component></menu-component>
        </header>

        <main>
            <router-view></router-view>
        </main>

        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                    @ {{ year }} <a class="grey-text text-lighten-4" href="https://github.com/eltonlk">Elton Luis Kolling</a>
                </div>
            </div>
        </footer>
    </div>
</template>

<script type="text/javascript">
    import Auth          from "../services/auth";
    import MenuComponent from "./Menu.vue";

    export default {
        components: {
            MenuComponent
        },
        computed: {
            showHeader () {
                return this.user.check && this.$route.name != 'auth.login';
            }
        },
        created () {
            window.Vue.http.interceptors.unshift((request, next) => {
                this.loading = true;
                next(() => this.loading = false);
            });
        },
        data () {
            return {
                loading: false,
                year: new Date().getFullYear(),
                user: Auth.user
            }
        }
    };
</script>

<style type="text/css">
    #app {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }
</style>
