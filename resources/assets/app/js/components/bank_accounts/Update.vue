<template src="./form.html"></template>

<script>
    import {Bank, BankAccount}    from "../../services/resources";
    import ErrorMessagesComponent from "../shared/errorMessages.vue";
    import PageTitleComponent     from "../shared/PageTitle.vue";

    export default {
        components: {
            ErrorMessagesComponent,
            PageTitleComponent
        },
        created () {
            this.getBanks();
            this.getBankAccount(this.$route.params.id);
        },
        data () {
            return {
                bank_account: {
                    name: '',
                    agency: '',
                    account: '',
                    bank_id: null,
                    'default': false
                },
                banks: [],
                errorMessages: [],
                title: 'Alterar Conta bancária'
            };
        },
        methods: {
            getBankAccount (id)  {
                BankAccount.get({ id: id })
                    .then((response) => {
                        this.bank_account = response.data.data;
                    });
            },
            getBanks () {
                Bank.query()
                    .then((response) => {
                        this.banks = response.data.data;
                    });
            },
            submit () {
                BankAccount.update({ id: this.bank_account.id }, this.bank_account)
                    .then((response) => {
                        Materialize.toast('Conta bancária atualizada com sucesso!', 4000);

                        this.$router.go({ name: 'bank_account.list' });
                    })
                    .catch((response) => {
                        switch (response.status) {
                            case 422:
                                this.errorMessages = response.data;
                                break;
                            default:
                                this.errorMessages = [ "Conta Bancária não foi salva." ];
                        }
                    });
            }
        }
    }
</script>
