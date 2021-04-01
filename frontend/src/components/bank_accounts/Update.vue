<template>
    <div class="container">
        <nav>
            <h4 class="left">Alterar Conta Corrente</h4>

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
    import BankAccountsResource from "@/resources/bank_accounts.resource"

    export default {
        data () {
            return {
                bank_account: {
                    name: ''
                }
            }
        },
        ready () {
            let id = this.$route.params.id

            BankAccountsResource.get({ id: id })
                .then((response) => {
                    this.bank_account = response.data
                })
        },
        methods: {
            submit () {
                BankAccountsResource.update({ id: this.bank_account.id }, this.bank_account)
                    .then(() => {
                        this.$router.push({ name: 'bank_accounts' })
                    })
            }
        }
    }
</script>
