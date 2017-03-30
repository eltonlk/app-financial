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
            this.getBankAccount(this.$route.params.id);
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

                        this.initBankAutocomplete();
                    });
            },
            initBankAutocomplete () {
                let self = this;

                $(document).ready(() => {
                    let bankIdAutocomplete = $('#bank_id').materialize_autocomplete({
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

                    let bank = _.filter(self.banks, (object) => {
                        return object.id === self.bank_account.bank_id;
                    }).map((object) => {
                        return { id: object.id, text: object.name };
                    })[0];

                    bankIdAutocomplete.setValue(bank);
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
