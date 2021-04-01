<template>
    <div class="container">
        <nav>
            <h4 class="left">Tags</h4>

            <router-link :to="{ name: 'tags.create' }">
                Adicionar
            </router-link>
        </nav>

        <br>

        <div class="row">
            <div v-for="(tag, i) in tags" :key="i" class="col s12 m4">
                <div class="card grey lighten-5">
                    <div class="card-content">
                        <span class="card-title">
                            #{{ tag.id }} {{ tag.name }}
                        </span>
                    </div>
                    <div class="card-action">
                        <router-link :to="{ name: 'tags.update', params: { id: tag.id } }">
                            Editar
                        </router-link>

                        <a href="#" @click.prevent="destroy(tag, i)" class="red-text">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import TagsResource from "@/resources/tags.resource"

    export default {
        data () {
            return {
                tags: []
            }
        },
        created () {
            TagsResource.query()
                .then((response) => {
                    this.tags = response.data
                })
        },
        methods: {
            destroy (tag, index) {
                TagsResource.delete({ id: tag.id })
                    .then(() => {
                        this.tags.splice(index)
                    })
            }
        }
    }
</script>
