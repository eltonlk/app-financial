<template>
    <div>
        <nav class="grey lighten-4 black-text">
            <div class="container">
                <div class="nav-wrapper">
                    <h4 class="left">Alterar Conta Corrente</h4>

                    <ul class="right">
                        <li>
                            <a v-link="{ name: 'bank_accounts.list'}" class="waves-effect waves-light btn grey">Voltar</a>
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
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" id="name" v-model="bank_account.name">
                                <label for="name" class="active">Nome</label>
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
    </div>
</template>

<script>
    import {BankAccounts} from "../../services/resources";
    export default {
        data () {
            return {
                bank_account: {
                    name: ''
                }
            };
        },
        ready () {
            let id = this.$route.params.id;
            BankAccounts.get({ id: id })
                .then((response) => {
                    this.bank_account = response.data;
                });
        },
        methods: {
            submit () {
                BankAccounts.update({ id: this.bank_account.id }, this.bank_account)
                    .then(() => {
                        this.$router.go({ name: 'product.list' });
                    });
            }
        }
    }
</script>
