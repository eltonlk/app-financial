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
                title: "Adicionar Conta Bancária"
            };
        },
        methods: {
            getBanks () {
                Bank.query()
                    .then((response) => {
                        this.banks = response.data.data;
                    });
            },
            submit () {
                BankAccount.save(this.bank_account)
                    .then((response) => {
                        Materialize.toast('Conta bancária adicionada com sucesso!', 4000);

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
