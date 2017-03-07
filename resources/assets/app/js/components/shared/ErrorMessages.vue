<template>
    <div class="row" v-if="errors">
        <div v-for="(field, messages) in errors" class="col s12">
            <div class="card-panel red">
                <span class="white-text">{{ messages }}</span>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    export default {
        props: [ 'errors' ]
    };
</script>
