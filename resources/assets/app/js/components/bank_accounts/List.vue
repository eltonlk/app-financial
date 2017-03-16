<template>
    <div class="container">
        <page-title-component>
            <h5>Contas Correntes</h5>
        </page-title-component>

        <div class="card-panel z-depth-5">
            <filter-component @on-submit="filter" :model.sync="search"></filter-component>

            <table class="bordered striped highlight responsive-table">
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
                        <td class="right-align">
                            <a v-link="{ name: 'bank_account.update', params: { id: bank_account.id } }">Editar</a> |
                            <a href="#" @click.prevent="destroy(bank_account)" class="red-text">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <pagination-component :current-page.sync="pagination.current_page" :per-page="pagination.per_page" :total.sync="pagination.total"></pagination-component>

            <div class="fixed-action-btn">
                <a class="btn-floating btn-large" v-link="{ name: 'bank_account.create'}">
                    <i class="large material-icons">add</i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import {BankAccount}       from "../../services/resources";
    import FilterComponent     from "../shared/Filter.vue";
    import PageTitleComponent  from "../shared/PageTitle.vue";
    import PaginationComponent from "../shared/Pagination.vue";

    export default {
        components: {
            FilterComponent,
            PageTitleComponent,
            PaginationComponent
        },
        data () {
            return {
                bank_accounts: [],
                pagination: {
                    current_page: 1,
                    per_page: 0,
                    total: 0
                },
                order: {
                    column: 'name',
                    sort: 'asc'
                },
                search: '',
                table: {
                    headers: {
                        name: {
                            label: 'Nome',
                            width: '50%'
                        },
                        agency: {
                            label: 'Agência',
                            width: '15%'
                        },
                        account: {
                            label: 'C/C',
                            width: '15%'
                        }
                    }
                }
            };
        },
        events: {
            'pagination::changed' (page) {
                this.getBankAccounts();
            }
        },
        ready () {
            this.getBankAccounts();
        },
        methods: {
            destroy (bank_account) {
                BankAccount.delete({ id: bank_account.id })
                    .then((response) => {
                        if (this.bank_accounts.length === 1 && this.pagination.current_page > 1) {
                            this.pagination.current_page--;
                        } else {
                            this.getBankAccounts();
                        }
                    });
            },
            filter () {
                this.pagination.current_page = 1;

                this.getBankAccounts();
            },
            getBankAccounts () {
                BankAccount.query({
                    page: this.pagination.current_page,
                    orderBy: this.order.column,
                    sortedBy: this.order.sort,
                    search: this.search
                })
                .then((response) => {
                    this.bank_accounts = response.data.data;
                    this.pagination = response.data.meta.pagination;
                });
            },
            sortBy (column) {
                this.order.column = column;
                this.order.sort = this.order.sort == 'asc' ? 'desc' : 'asc';

                this.getBankAccounts();
            }
        }
    }
</script>
