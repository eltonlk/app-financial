<template>
    <div class="container">
        <page-title-component>
            <h5>Categorias</h5>
        </page-title-component>

        <div class="card-panel">
            <tree-component :categories="categories"></tree-component>

            <!-- <table class="bordered striped highlight responsive-table">
                <thead>
                    <tr>
                        <th v-for="(column, options) in table.headers" :width="options.width">
                            <a href="#" @click.prevent="sortBy(column)">
                                {{ options.label }}
                                <i class="material-icons right" v-if="order.column == column">
                                    {{ order.sort == 'asc' ? 'arrow_drop_up' : 'arrow_drop_down' }}
                                </i>
                            </a>
                        </th>
                        <th class="center-align">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="bank_account in bank_accounts">
                        <td>{{ bank_account.name }}</td>
                        <td>{{ bank_account.agency }}</td>
                        <td>{{ bank_account.account }}</td>
                        <td class="center-align">
                            <img :src="bank_account.bank.data.logo" class="bank-logo" />
                        </td>
                        <td class="center-align">
                            <i class="material-icons green-text" v-if="bank_account.default">check</i>
                        </td>
                        <td class="right-align">
                            <a v-link="{ name: 'bank_account.update', params: { id: bank_account.id } }">Editar</a> |
                            <a href="#" @click.prevent="destroy(bank_account)" class="red-text">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table> -->

            <div class="fixed-action-btn">
                <a class="btn-floating btn-large" v-link="{ name: 'category.create'}">
                    <i class="large material-icons">add</i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import {Category}          from "../../services/resources";
    import PageTitleComponent  from "../shared/PageTitle.vue";
    import TreeComponent       from "./Tree.vue";

    export default {
        components: {
            PageTitleComponent,
            TreeComponent
        },
        data () {
            return {
                categories: []
            };
        },

        ready () {
            this.getCategories();
        },
        methods: {
            destroy (bank_account) {
                Category.delete({ id: category.id })
                    .then((response) => {
                        this.getCategories();
                    });
            },
            getCategories () {
                Category.query()
                    .then((response) => {
                        this.categories = response.data.data;
                    });
            }
        }
    }
</script>
