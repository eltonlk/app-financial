<template>
    <div class="container">
        <nav>
            <h4 class="left">Adicionar Conta Corrente</h4>

            <router-link :to="{ name: 'bank_accounts' }">
                Voltar
            </router-link>
        </nav>

        <br>

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
                                <button class="btn btn-large btn-default" type="button" @click="submit()">Adicionar</button>
                            </p>
                        </div>
                    </div>
                </form>
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
        },
        methods: {
            submit () {
                BankAccounts.save(this.bank_account)
                    .then(() => {
                        this.$router.go({ name: 'bank_accounts.list' });
                    });
            }
        }
    }
</script>
