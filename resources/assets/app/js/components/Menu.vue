<template>
    <nav>
        <div class="nav-wrapper">
            <div class="col s12">
                <a v-link="{ name: 'dashboard' }" class="brand-logo">Financeiro</a>
                <a href="#" data-ativates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li v-for="link in links">
                        <a v-link="{ name: link.routeName }">{{ link.label }}</a>
                    </li>
                </ul>

                <ul class="side-nav" id="mobile-demo">
                    <li v-for="link in links">
                        <a v-link="{ name: link.routeName }">{{ link.label }}</a>
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
                    { label: 'Dashboard', routeName: 'dashboard' },
                    { label: 'Sair'     , routeName: 'auth.logout' }
                ]
            };
        },
        created () {
            $(function () {
                $('.button-collapse').sideNav();
            });
        }
    };
</script>
