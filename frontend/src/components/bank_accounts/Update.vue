<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'bank_accounts' }">
                        Contas Corrente
                    </router-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Alterar Conta Corrente</li>
            </ol>
        </nav>

        <form @submit.prevent="submit()" >
            <div v-if="error.any" class="text-center">
                <p class="text-danger">Verifique os erros abaixo:</p>
            </div>

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control" v-model="bank_account.name" required autofocus :class="{ 'is-invalid': isInvalid('name') }">
                <div class="invalid-feedback">
                    <p v-for="(message, i) in error.messages['name']" :key="i">
                        {{ message }}
                    </p>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Alterar</button>
        </form>
    </div>
</template>

<script>
    import BankAccountsResource from "@/resources/bank_accounts.resource"

    export default {
        data () {
            return {
                bank_account: {
                    name: ''
                },
                error: {
                    any: false,
                    messages: {}
                }
            }
        },
        created () {
            let id = this.$route.params.id

            BankAccountsResource.get({ id: id })
                .then((response) => {
                    this.bank_account = response.data
                })
        },
        methods: {
            isInvalid (attribute) {
                return attribute in this.error.messages
            },
            submit () {
                BankAccountsResource.update({ id: this.bank_account.id }, this.bank_account)
                    .then(() => {
                        this.$router.push({ name: 'bank_accounts' })
                    })
            }
        }
    }
</script>
