<template>
    <div>
        <nav class="grey lighten-4 black-text">
            <div class="container">
                <div class="nav-wrapper">
                    <h4 class="left">Contas Correntes</h4>

                    <ul class="right">
                        <li>
                            <a v-link="{ name: 'bank_accounts.create'}" class="waves-effect waves-light btn">Adicionar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="container">
            <div class="row">
                <div v-for="bank_account in bank_accounts" :key="bank_account" class="col s12 m4">
                    <div class="card grey lighten-5">
                        <div class="card-content">
                            <span class="card-title">
                                #{{ bank_account.id }} {{ bank_account.name }}
                            </span>
                        </div>
                        <div class="card-action">
                            <a v-link="{ name: 'bank_accounts.update', params: { id: bank_account.id } }">Editar</a>
                            <a href="#" @click.prevent="destroy(bank_account)" class="red-text">Excluir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {BankAccounts} from "../../services/resources";
    export default {
        data () {
            return {
                bank_accounts: []
            };
        },
        ready () {
            BankAccounts.query()
                .then((response) => {
                    this.bank_accounts = response.data;
                });
        },
        methods: {
            destroy (bank_account) {
                BankAccounts.delete({ id: bank_account.id })
                    .then(() => {
                        this.bank_accounts.$remove(bank_account);
                    });
            }
        }
    }
</script>
