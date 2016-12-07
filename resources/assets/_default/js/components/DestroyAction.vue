<template>
    <a href="#{{modalOptions.id}}" class="red-text">Excluir</a>

    <modal-component :modal="modalOptions">
        <div slot="content">
            <h5 class="center-align">Deseja excluir esse registro?</h5>
        </div>
        <div slot="footer">
            <button class="btn btn-flat waves-effect modal-close modal-action red-text" @click="confirm()">SIM</button>
            <button class="btn btn-flat waves-effect modal-close modal-action grey-text">NÃO</button>
        </div>
    </modal-component>

    <form :id="formId" :action="action" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" :value="csrfToken">
    </form>
</template>

<script type="text/javascript">
    import ModalComponent from "./Modal.vue";

    export default {
        components: {
            ModalComponent
        },
        computed: {
            formId () {
                return `form-destroy-action-${this.id}`;
            },
            modalOptions () {
                return {
                    id: `modal-destroy-action-${this.id}`
                };
            }
        },
        methods: {
            confirm () {
                $(`#${this.formId}`).submit();
            }
        },
        props: [
            "action",
            "csrfToken",
            "id"
        ]
    };
</script>

<style type="text/css" scoped>
    form {
        display: none;
    }

    .modal {
        max-width: 400px;
    }
</style>
