<template>
    <h1>Dashboard</h1>
</template>

<script type="text/javascript">
    import Auth from "../services/auth";

    export default {
        ready () {
            console.log(Auth.user());
        }
    };
</script>
