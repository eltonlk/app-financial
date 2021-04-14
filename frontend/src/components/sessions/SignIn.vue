<template>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <h1>App Financeiro</h1>
                        </div>

                        <form @submit.prevent="signIn()">
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

                            <div class="col-md-6 mx-auto text-center">
                                <button type="submit" class="btn btn-block btn-primary mb-3">Entrar</button>

                                <p>ou</p>

                                <router-link :to="{ name: 'sign_up' }">
                                    Criar Conta
                                </router-link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import Auth from "@/services/auth"

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
            signIn () {
                Auth.signIn(this.user.username, this.user.password)
                    .then(() => {
                        this.$router.push({ name: "dashboard" })
                    })
                    .catch(() => {
                        this.error.any = true

                        this.error.message = "Usuário ou senha inválidos."
                    });
            }
        }
    };
</script>
