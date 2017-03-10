<template>
    <form name="search" method="GET" @submit.prevent="filter">
        <div class="filter-group">
            <button type="submit" class="btn waves-effect">
                <i class="material-icons">search</i>
            </button>
            <div class="filter-wrapper">
                <input type="text" name="search" v-model="search" placeholder="Digite aqui sua busca">
            </div>
        </div>
    </form>
</template>

<script type="text/javascript">
    export default {
        data () {
            return {
                search: '',
            }
        },
        methods: {
            filter () {
                this.$dispatch('filter::submit', this.search);
            }
        }
    }
</script>
