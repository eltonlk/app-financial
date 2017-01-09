<template>
    <ul :id="subMenu.id" class="dropdown-content" v-for="subMenu in config.subMenus">
        <li v-for="item in subMenu.items" :class="menuItemClass(item)">
            <a :href="item.url">{{ item.text }}</a>
        </li>
    </ul>

    <ul id="dropdown-user" class="dropdown-content">
        <li>
            <a :href="config.urlLogout" @click.prevent="goToLogout()">Sair</a>
            <form id="logout-form" :action="config.urlLogout" method="POST" style="display: none;">
                <input type="hidden" name="_token" :value="config.csrfToken"/>
            </form>
        </li>
    </ul>

    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Financeiro Admin</a>

                <a href="#" data-activates="nav-mobile" class="button-collapse">
                    <i class="material-icons">menu</i>
                </a>

                <ul class="right hide-on-med-and-down">
                    <li v-for="menu in config.menus" :class="menuItemClass(menu)">
                        <a v-if="menu.subMenuId" class="dropdown-button" href="!#" :data-activates="menu.subMenuId">
                            {{ menu.text }} <i class="material-icons right">arrow_drop_down</i>
                        </a>
                        <a v-else :href="menu.url">{{ menu.text }}</a>
                    </li>
                    <li>
                        <a class="dropdown-button" href="!#" data-activates="dropdown-user">
                            {{ config.username }} <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li v-for="menu in config.menus">
                        <a :href="menu.url">{{ menu.text }}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script type="text/javascript">
    export default {
        methods: {
            goToLogout () {
                $("#logout-form").submit();
            },
            menuItemClass (menu) {
                let menuClass = [ "active" ];

                if (menu.active) {
                    return menuClass;
                }

                if (menu.subMenuId !== undefined) {
                    let subMenu = this.config.subMenus.find((element) => {
                        return element.id == menu.subMenuId;
                    });

                    if (subMenu) {
                        for (let item of subMenu.items) {
                            if (item.active) {
                                return menuClass;
                            }
                        }
                    }
                }
            }
        },
        props: {
            config: {
                type: Object,
                default () {
                    return {
                        username: "",
                        menus: [],
                        subMenus: [],
                        urlLogout: "/admin/logout",
                        csrfToken: ""
                    }
                }
            }
        },
        ready () {
            $(document).ready(() => {
                $(".button-collapse").sideNav({ closeOnClick: true });
                $(".dropdown-button").dropdown();
            });
        }
    };
</script>
