<template>
    <form name="search" method="GET" @submit.prevent="submit">
        <div class="filter-group">
            <button type="submit" class="btn waves-effect">
                <i class="material-icons">search</i>
            </button>
            <div class="filter-wrapper">
                <input type="text" name="search" v-model="model" placeholder="Digite aqui sua busca">
            </div>
        </div>
    </form>
</template>

<script type="text/javascript">
    export default {
        props: {
            model: {
                required: true,
                type: String
            }
        },
        methods: {
            submit () {
                this.$emit('on-submit');
            }
        }
    }
</script>
