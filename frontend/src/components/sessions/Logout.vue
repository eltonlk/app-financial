<template>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="mb-3">Efetuando Logout...</h4>

                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import Auth from "@/services/auth";

    export default {
        methods: {
            logout () {
                let goToLogin = () => this.$router.push({ name: "login" });

                Auth.logout()
                    .then(goToLogin());
            }
        },
        mounted () {
            setTimeout(() => {
                this.logout();
            }, 1000);
        }
    };
</script>
