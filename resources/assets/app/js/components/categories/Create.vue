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

                        this.initBankAutocomplete();
                    });
            },
            initBankAutocomplete () {
                let self = this;

                $('#bank_id').materialize_autocomplete({
                    limit: 10,
                    multiple: {
                        enable: false
                    },
                    dropdown: {
                        el: '#bank_id_dropdown'
                    },
                    getData (value, callback) {
                        let banks = _.filter(self.banks, (object) => {
                            return _.includes(object.name.toLowerCase(), value.toLowerCase());
                        }).map((object) => {
                            return { id: object.id, text: object.name };
                        });

                        callback(value, banks);
                    },
                    onSelect (item) {
                        self.bank_account.bank_id = item.id;
                    }
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
