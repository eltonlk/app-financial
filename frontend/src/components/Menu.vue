<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <router-link to="/" class="navbar-brand">
                Financeiro
            </router-link>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" @click.stop="toggleNavbar()">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" v-bind:class="{ 'show': show }">
                <ul class="navbar-nav ml-auto">
                    <li v-for="(link, i) in links" :key="i" class="nav-item">
                        <router-link :to="{ name: link.routeName }" class="nav-link">
                            {{ link.label }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script type="text/javascript">
    export default {
        data () {
            return {
                links: [
                    { label: 'Dashboard'       , routeName: 'dashboard' },
                    { label: 'Contas Correntes', routeName: 'bank_accounts' },
                    { label: 'Tags'            , routeName: 'tags' },
                    { label: 'Sair'            , routeName: 'sign_out' }
                ],
                show: true
            };
        },
        methods: {
            toggleNavbar () {
                this.show = !this.show
            }
        }
    };
</script>
