<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Tags</li>
            </ol>

            <router-link :to="{ name: 'tags.create' }" class="btn btn-primary">
                Adicionar
            </router-link>
        </nav>

        <div class="row">
            <div v-for="(tag, i) in tags" :key="i" class="col-md-4 col-lg-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ tag.name }}</h5>

                        <router-link :to="{ name: 'tags.update', params: { id: tag.id } }" class="card-link">
                            Alterar
                        </router-link>

                        <a href="#" @click.prevent="destroy(tag, i)" class="card-link text-danger">Excluir</a>
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
                        this.tags.splice(index, 1)
                    })
            }
        }
    }
</script>
