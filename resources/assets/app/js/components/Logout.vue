<template>
    <div class="container">
        <div class="row">
            <div class="card-panel col s8 offset-s2 z-depth-2">
                <h3 class="center">Efetuando Logout...</h3>

                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import Auth from "../services/auth";

    export default {
        methods: {
            logout () {
                let goToLogin = () => this.$router.go({ name: "auth.login" });

                Auth.logout()
                    .then(goToLogin)
                    .catch(goToLogin);
            }
        },
        ready () {
            setTimeout(() => {
                this.logout();
            }, 1000);
        }
    };
</script>
