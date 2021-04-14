<template>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <h1>App Financeiro</h1>
                        </div>

                        <form @submit.prevent="signUp()" >
                            <div v-if="error.any" class="text-center">
                                <p class="text-danger">Verifique os erros abaixo:</p>
                            </div>

                            <div class="form-group">
                                <label for="username">Usuário</label>
                                <input type="text" name="username" class="form-control" v-model="user.username" required autofocus :class="{ 'is-invalid': isInvalid('username') }">
                                <div class="invalid-feedback">
                                    <p v-for="(message, i) in error.messages['username']" :key="i">
                                        {{ message }}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group mb-5">
                                <label for="password">Senha</label>
                                <input type="password" name="password"  class="form-control" v-model="user.password" required :class="{ 'is-invalid': isInvalid('password') }">
                                <div class="invalid-feedback">
                                    <p v-for="(message, i) in error.messages['password']" :key="i">
                                        {{ message }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 mx-auto text-center">
                                <button type="submit" class="btn btn-block btn-primary mb-3">Criar Conta</button>

                                <p>ou</p>

                                <router-link :to="{ name: 'sign_in' }">
                                    Voltar para o login
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
    import Auth from "@/services/auth";

    export default {
        data () {
            return {
                error: {
                    any: false,
                    messages: {}
                },
                user: {
                    username: "",
                    password: ""
                }
            }
        },
        methods: {
            isInvalid (attribute) {
                return attribute in this.error.messages
            },
            signUp () {
                Auth.signUp(this.user.username, this.user.password)
                    .then(() => {
                        this.$router.push({ name: "dashboard" })
                    })
                    .catch((response) => {
                        this.error.any = true
                        this.error.messages = response.data

                        console.log(this.error.messages)
                    });
            }
        }
    };
</script>
