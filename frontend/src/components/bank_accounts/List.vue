<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Contas Correntes</li>
            </ol>

            <router-link :to="{ name: 'bank_accounts.create' }" class="btn btn-primary">
                Adicionar
            </router-link>
        </nav>

        <div class="row">
            <div v-for="(bank_account, i) in bank_accounts" :key="i" class="col-md-4 col-lg-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ bank_account.name }}</h5>

                        <router-link :to="{ name: 'bank_accounts.update', params: { id: bank_account.id } }" class="card-link">
                            Alterar
                        </router-link>

                        <a href="#" @click.prevent="destroy(bank_account, i)" class="card-link text-danger">Excluir</a>
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
                        this.bank_accounts.splice(index, 1)
                    })
            }
        }
    }
</script>
