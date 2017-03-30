<template>
    <div class="container">
        <page-title-component>
            <h5>Contas a Pagar</h5>
        </page-title-component>

        <div class="card-panel">
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
                    <tr v-for="bill in bills">
                        <td>{{ bill.due_at }}</td>
                        <td>{{ bill.description }}</td>
                        <td>{{ bill.bank_account.data.name }}</td>
                        <td>{{ bill.amount }}</td>
                        <td>
                            <i class="material-icons green-text" v-if="bill.paid">check</i>
                        </td>
                        <td class="right-align">
                            <a v-link="{ name: 'bill.pay.update', params: { id: bill.id } }">Editar</a> |
                            <a href="#" @click.prevent="destroy(bill)" class="red-text">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <pagination-component :current-page.sync="pagination.current_page" :per-page="pagination.per_page" :total.sync="pagination.total"></pagination-component>

            <div class="fixed-action-btn">
                <a class="btn-floating btn-large" v-link="{ name: 'bill.pay.create' }">
                    <i class="large material-icons">add</i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import {Bill}              from "../../../services/resources";
    import PageTitleComponent  from "../../shared/PageTitle.vue";
    import PaginationComponent from "../../shared/Pagination.vue";

    export default {
        components: {
            PageTitleComponent,
            PaginationComponent
        },
        data () {
            return {
                bills: [],
                pagination: {
                    current_page: 1,
                    per_page: 0,
                    total: 0
                },
                order: {
                    column: 'due_at',
                    sort: 'asc'
                },
                table: {
                    headers: {
                        due_at: {
                            label: 'Vencimento',
                            width: '12%'
                        },
                        description: {
                            label: 'Descrição',
                            width: '40%'
                        },
                        'bank_accounts:bank_account_id|bank_accounts.name': {
                            label: 'Conta Bancária',
                            width: '20%'
                        },
                        amount: {
                            label: 'Valor',
                            width: '12%'
                        },
                        'paid': {
                            label: 'Pago',
                            width: '5%'
                        }
                    }
                }
            };
        },
        events: {
            'pagination::changed' (page) {
                this.getBills();
            }
        },
        ready () {
            this.getBills();
        },
        methods: {
            destroy (bill) {
                Bill.delete({ id: bill.id })
                    .then((response) => {
                        if (this.bills.length === 1 && this.pagination.current_page > 1) {
                            this.pagination.current_page--;
                        } else {
                            this.getBills();
                        }
                    });
            },
            getBills () {
                Bill.query({
                    page: this.pagination.current_page,
                    orderBy: this.order.column,
                    search: 'flow_in:0',
                    sortedBy: this.order.sort,
                    include: 'bank_account'
                })
                .then((response) => {
                    this.bills = response.data.data;
                    this.pagination = response.data.meta.pagination;
                });
            },
            sortBy (column) {
                this.order.column = column;
                this.order.sort = this.order.sort == 'asc' ? 'desc' : 'asc';

                this.getBills();
            }
        }
    }
</script>
