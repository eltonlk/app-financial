<template>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <h1>Login</h1>
                        </div>

                        <form @submit.prevent="login()">
                            <div class="text-center">
                                <p class="text-danger">{{ error.message }}</p>
                            </div>

                            <div class="form-group">
                                <label for="username">Usuário</label>
                                <input type="text" name="username" class="form-control" v-model="user.username" required autofocus>
                            </div>

                            <div class="form-group mb-5">
                                <label for="password">Senha</label>
                                <input type="password" name="password"  class="form-control" v-model="user.password" required>
                            </div>

                            <div class="col-md-6 mx-auto">
                                <button type="submit" class="btn btn-block btn-primary">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import Auth from "@/services/auth";

    export default {
        data () {
            return {
                error: {
                    any: false,
                    message: ''
                },
                user: {
                    username: "",
                    password: ""
                }
            }
        },
        methods: {
            login () {
                Auth.login(this.user.username, this.user.password)
                    .then(() => {
                        this.$router.push({ name: "dashboard" });
                    })
                    .catch((response) => {
                        this.error.any = true;

                        switch (response.status) {
                            case 401:
                                this.error.message = response.data.detail;
                                break;
                            default:
                                this.error.message = "Usuário ou senha inválidos.";
                        }
                    });
            }
        }
    };
</script>
