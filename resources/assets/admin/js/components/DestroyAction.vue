<template>
    <a href="!#" @click.prevent="submit()" class="red-text">Excluir</a>
    <form :id="formId" :action="url" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" :value="csrfToken">
    </form>
</template>

<script>
    export default {
        methods: {
            submit () {
                $(`form#${this.formId}`).submit();
            }
        },
        props: [ 'csrfToken', 'url', 'formId' ]
    };
</script>
