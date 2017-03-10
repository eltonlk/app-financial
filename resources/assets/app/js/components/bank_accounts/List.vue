<template>
    <nav class="grey lighten-4 black-text">
        <div class="container">
            <div class="nav-wrapper">
                <h4 class="left">Contas Correntes</h4>

                <ul class="right">
                    <li>
                        <a v-link="{ name: 'bank_account.create'}" class="waves-effect waves-light btn">Adicionar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="card-panel z-depth-5">
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
        </div>
    </div>
</template>

<script>
    import {BankAccount}       from "../../services/resources";
    import PaginationComponent from "../shared/Pagination.vue";

    export default {
        components: {
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
                        this.getBankAccounts();
                    });
            },
            getBankAccounts () {
                BankAccount.query({
                    page: this.pagination.current_page,
                    orderBy: this.order.column,
                    sortedBy: this.order.sort
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
