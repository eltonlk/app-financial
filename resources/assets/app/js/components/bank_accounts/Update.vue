<template>
    <nav class="grey lighten-4 black-text">
        <div class="container">
            <div class="nav-wrapper">
                <h4 class="left">Alterar Conta Corrente</h4>

                <ul class="right">
                    <li>
                        <a v-link="{ name: 'bank_account.list'}" class="waves-effect waves-light btn grey">Voltar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row">
            <div class="col m8 offset-m2 z-depth-1">
                <form>
                    <error-messages-component :errors="errorMessages"></error-messages-component>

                    <div class="row">
                        <div class="input-field col s12">
                            <select class="browser-default" v-model="bank_account.bank_id">
                                <option v-for="bank in banks" :value="bank.id">{{ bank.name }}</option>
                            </select>
                            <label for="bank_id" class="active">Banco</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="name" v-model="bank_account.name">
                            <label for="name" class="active">Nome</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" id="agency" v-model="bank_account.agency">
                            <label for="agency" class="active">Agência</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" id="account" v-model="bank_account.account">
                            <label for="account" class="active">Conta</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <p class="center-align">
                                <button class="btn btn-large btn-default" type="button" @click="submit()">Alterar</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {Bank, BankAccount}    from "../../services/resources";
    import ErrorMessagesComponent from "../shared/errorMessages.vue";

    export default {
        components: {
            ErrorMessagesComponent
        },
        data () {
            return {
                bank_account: {
                    name: '',
                    agency: '',
                    account: '',
                    bank_id: null
                },
                banks: [],
                errorMessages: []
            };
        },
        ready () {
            let id = this.$route.params.id;

            Bank.query()
                .then((response) => {
                    this.banks = response.data;
                });

            BankAccount.get({ id: id })
                .then((response) => {
                    this.bank_account = response.data.data;
                });
        },
        methods: {
            submit () {
                BankAccount.update({ id: this.bank_account.id }, this.bank_account)
                    .then((response) => {
                        this.$router.go({ name: 'bank_account.list' });
                    })
                    .catch((response) => {
                        switch (response.status) {
                            case 422:
                                this.errorMessages = response.data;
                                break;
                            default:
                                this.errorMessages = [ "Bank Account not saved." ];
                        }
                    });
            }
        }
    }
</script>
