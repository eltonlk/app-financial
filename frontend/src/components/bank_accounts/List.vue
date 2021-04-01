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
            <div v-for="(bank_account, i) in bank_accounts" :key="i" class="col s12 m4">
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

                        <a href="#" @click.prevent="destroy(bank_account, i)" class="red-text">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import BankAccountsResource from "@/resources/bank_accounts.resource"

    export default {
        data () {
            return {
                bank_accounts: []
            }
        },
        created () {
            BankAccountsResource.query()
                .then((response) => {
                    this.bank_accounts = response.data
                })
        },
        methods: {
            destroy (bank_account, index) {
                BankAccountsResource.delete({ id: bank_account.id })
                    .then(() => {
                        this.bank_accounts.splice(index)
                    })
            }
        }
    }
</script>
