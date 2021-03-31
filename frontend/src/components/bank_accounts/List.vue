<template>
    <div class="container">
        <nav>
            <h4 class="left">Contas Correntes</h4>

            <router-link :to="{ name: 'bank_accounts.create' }">
                Adicionar
            </router-link>
        </nav>

        <br>

        <div class="row">
            <div v-for="bank_account in bank_accounts" :key="bank_account" class="col s12 m4">
                <div class="card grey lighten-5">
                    <div class="card-content">
                        <span class="card-title">
                            #{{ bank_account.id }} {{ bank_account.name }}
                        </span>
                    </div>
                    <div class="card-action">
                        <router-link :to="{ name: 'bank_accounts.update', params: { id: bank_account.id } }">
                            Editar
                        </router-link>

                        <a href="#" @click.prevent="destroy(bank_account)" class="red-text">Excluir</a>
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
