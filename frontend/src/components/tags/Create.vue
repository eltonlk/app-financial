<template>
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'tags' }">
                        Tags
                    </router-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Adicionar Tag</li>
            </ol>
        </nav>

        <form @submit.prevent="submit()" >
            <div v-if="error.any" class="text-center">
                <p class="text-danger">Verifique os erros abaixo:</p>
            </div>

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control" v-model="tag.name" required autofocus :class="{ 'is-invalid': isInvalid('name') }">
                <div class="invalid-feedback">
                    <p v-for="(message, i) in error.messages['name']" :key="i">
                        {{ message }}
                    </p>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>
</template>

<script>
    import TagsResource from "@/resources/tags.resource"

    export default {
        data () {
            return {
                error: {
                    any: false,
                    messages: {}
                },
                tag: {
                    name: ''
                }
            }
        },
        methods: {
            isInvalid (attribute) {
                return attribute in this.error.messages
            },
            submit () {
                TagsResource.save(this.tag)
                    .then(() => {
                        this.$router.push({ name: 'tags' })
                    })
            }
        }
    }
</script>
