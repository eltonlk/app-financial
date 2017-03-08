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
                        <th>Nome</th>
                        <th>Agência</th>
                        <th>C/C</th>
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
