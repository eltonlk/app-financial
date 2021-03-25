<template>
    <div class="navbar-fixed">
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <a v-link="{ name: 'dashboard' }" class="brand-logo">Zanshin Ti</a>

                    <a href="#" data-ativates="nav-mobile" class="button-collapse">
                        <i class="material-icons">menu</i>
                    </a>

                    <ul class="right hide-on-med-and-down">
                        <li v-for="link in links" :key="link">
                            <a v-link="{ name: link.routeName }">{{ link.label }}</a>
                        </li>
                        <li>
                            <a class="dropdown-button" href="!#" data-activates="dropdown-user">
                                {{ name }} <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                    </ul>

                    <ul class="side-nav" id="nav-mobile">
                        <li v-for="link in links" :key="link">
                            <a v-link="{ name: link.routeName }">{{ link.label }}</a>
                        </li>
                    </ul>
                </div>

                <ul id="dropdown-user" class="dropdown-content">
                    <li>
                        <a v-link="{ name: 'auth.logout' }">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script type="text/javascript">
    import Auth from "../services/auth";
    export default {
        computed: {
            name () {
                return this.user.data ? this.user.data.name : '';
            }
        },
        created () {
            // $(function () {
            //     $('.button-collapse').sideNav();
            // });
        },
        data () {
            return {
                links: [
                    { label: 'Dashboard'       , routeName: 'dashboard' },
                    { label: 'Contas Correntes', routeName: 'bank_accounts' }
                ],
                user: Auth.user
            };
        },
        ready () {
            // $(document).ready(() => {
            //     $(".button-collapse").sideNav({ closeOnClick: true });
            //     $(".dropdown-button").dropdown();
            // });
        }
    };
</script>
