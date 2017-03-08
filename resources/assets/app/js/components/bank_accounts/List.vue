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
        <div class="row">
            <div v-for="bank_account in bank_accounts" class="col s12 m4">
                <div class="card grey lighten-5">
                    <div class="card-content">
                        <span class="card-title">
                            {{ bank_account.name }}
                        </span>
                        <p class="grey-text">
                            Agência: {{ bank_account.agency }} | Conta: {{ bank_account.account }}
                        </p>
                    </div>
                    <div class="card-action">
                        <a v-link="{ name: 'bank_account.update', params: { id: bank_account.id } }">Editar</a>
                        <a href="#" @click.prevent="destroy(bank_account)" class="red-text">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {BankAccount} from "../../services/resources";

    export default {
        data () {
            return {
                bank_accounts: []
            };
        },
        ready () {
            BankAccount.query()
                .then((response) => {
                    this.bank_accounts = response.data.data;
                });
        },
        methods: {
            destroy (bank_account) {
                BankAccount.delete({ id: bank_account.id })
                    .then((response) => {
                        this.bank_accounts.$remove(bank_account);
                    });
            }
        }
    }
</script>
