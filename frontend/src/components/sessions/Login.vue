<template>
    <div class="container">
        <div class="row">
            <div class="col s8 offset-s2 z-depth-2">
                <h3 class="center">Login</h3>

                <div class="row" v-if="error.any">
                    <div class="col s12">
                        <div class="card-panel red">
                            <span class="white-text">{{ error.message }}</span>
                        </div>
                    </div>
                </div>

                <form @submit.prevent="login()">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="username" type="text" name="username" v-model="user.username" required autofocus>
                            <label for="username" class="active">Usuário</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" name="password" v-model="user.password" required>
                            <label for="password" class="active">Senha</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="btn">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import Auth from "../../services/auth";
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
                        this.$router.go({ name: "dashboard" });
                    })
                    .catch((response) => {
                        this.error.any = true;
                        switch (response.status) {
                            case 401:
                                this.error.message = response.data.detail;
                                break;
                            default:
                                this.error.message = "Login failed.";
                        }
                    });
            }
        }
    };
</script>
