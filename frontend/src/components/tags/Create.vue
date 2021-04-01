<template>
    <div class="container">
        <nav>
            <h4 class="left">Adicionar Tag</h4>

            <router-link :to="{ name: 'tags' }">
                Voltar
            </router-link>
        </nav>

        <br>

        <div class="row">
            <div class="col m8 offset-m2 z-depth-1">
                <form>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="name" v-model="tag.name">
                            <label for="name" class="active">Nome</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <p class="center-align">
                                <button class="btn btn-large btn-default" type="button" @click="submit()">Adicionar</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import TagsResource from "@/resources/tags.resource"

    export default {
        data () {
            return {
                tag: {
                    name: ''
                }
            }
        },
        methods: {
            submit () {
                TagsResource.save(this.tag)
                    .then(() => {
                        this.$router.push({ name: 'tags' })
                    })
            }
        }
    }
</script>
