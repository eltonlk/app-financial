<template src="../form.html"></template>

<script>
    import {BankAccount, Bill}    from "../../../services/resources";
    import ErrorMessagesComponent from "../../shared/errorMessages.vue";
    import PageTitleComponent     from "../../shared/PageTitle.vue";

    export default {
        components: {
            ErrorMessagesComponent,
            PageTitleComponent
        },
        created () {
            this.getBill(this.$route.params.id);
            this.getBankAccounts();
        },
        data () {
            return {
                bill: {
                    flow_in: false,
                    description: '',
                    due_at: '',
                    amount: 0,
                    bank_account_id: null,
                    paid: false
                },
                bankAccounts: [],
                errorMessages: [],
                title: "Alterar Conta a Pagar",
                linkToBack: {
                    name: 'bills.pays'
                }
            };
        },
        methods: {
            getBill (id)  {
                Bill.get({ id: id })
                    .then((response) => {
                        this.bill = response.data.data;
                    });
            },
            getBankAccounts () {
                BankAccount.query()
                    .then((response) => {
                        this.bankAccounts = response.data.data;

                        this.initBankAccountAutocomplete();
                    });
            },
            initBankAccountAutocomplete () {
                let self = this;

                let bankAccountIdAutocomplete = $('#bank_account_id').materialize_autocomplete({
                    limit: 10,
                    multiple: {
                        enable: false
                    },
                    dropdown: {
                        el: '#bank_account_id_dropdown'
                    },
                    getData (value, callback) {
                        let bankAccounts = _.filter(self.bankAccounts, (object) => {
                            return _.includes(object.name.toLowerCase(), value.toLowerCase());
                        }).map((object) => {
                            return { id: object.id, text: object.name };
                        });

                        callback(value, bankAccounts);
                    },
                    onSelect (item) {
                        self.bill.bank_account_id = item.id;
                    }
                });

                let bankAccount = _.filter(self.bankAccounts, (object) => {
                    return object.id === self.bill.bank_account_id;
                }).map((object) => {
                    return { id: object.id, text: object.name };
                })[0];

                bankAccountIdAutocomplete.setValue(bankAccount);
            },
            submit () {
                Bill.update({ id: this.bill.id }, this.bill)
                    .then((response) => {
                        Materialize.toast('Conta a pagar atualizada com sucesso!', 4000);

                        this.$router.go(this.linkToBack);
                    })
                    .catch((response) => {
                        switch (response.status) {
                            case 422:
                                this.errorMessages = response.data;
                                break;
                            default:
                                this.errorMessages = [ "Conta a pagar não foi salva." ];
                        }
                    });
            }
        }
    }
</script>
