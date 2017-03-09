<template>
    <ul class="pagination center-align">
        <li :class="{'disabled': currentPage == 1}">
            <a @click.prevent="previusPage" href="#">
                <i class="material-icons">chevron_left</i>
            </a>
        </li>

        <li v-for="o in totalPages" class="waves-effect" :class="{'active': currentPage == o + 1}">
            <a @click.prevent="setCurrentPage(o + 1)" href="#">
                {{ o + 1 }}
            </a>
        </li>

        <li :class="{'disabled': currentPage == totalPages}">
            <a @click.prevent="nextPage" href="#">
                <i class="material-icons">chevron_right</i>
            </a>
        </li>
    </ul>
</template>

<script type="text/javascript">
    export default {
        props: {
            currentPage: {
                type: Number,
                'default': 0
            },
            perPage: {
                type: Number,
                required: true
            },
            total: {
                type: Number,
                required: true
            }
        },
        computed: {
            totalPages () {
                let total = Math.ceil(this.total / this.perPage);

                return Math.max(total, 1);
            }
        },
        methods: {
            nextPage () {
                if (this.currentPage < this.totalPages) {
                    this.currentPage++;
                }
            },
            previusPage () {
                if (this.currentPage > 1) {
                    this.currentPage--;
                }
            },
            setCurrentPage (pageNumber) {
                this.currentPage = pageNumber;
            }
        },
        watch: {
            currentPage (newValue) {
                this.$dispatch('pagination::changed', newValue);
            }
        }
    }
</script>
