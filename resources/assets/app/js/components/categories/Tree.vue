<template>
    <ul class="category-tree">
        <li v-for="(index, category) in categories" class="category-child">
            <div class="valign-wrapper">
                <a href="#" class="category-symbol" :class="categoryChildClass(category)">
                    <i class="material-icons">{{ categoryIcon(category) }}</i>
                </a>
                <span class="valign">{{{ categoryText(category) }}}</span>
            </div>

            <tree-component :categories="category.children.data"></tree-component>
         </li>
    </ul>
</template>

<script type="text/javascript">
    export default {
        name: 'tree-component',
        props: {
            categories: {
                type: Array,
                required: true
            }
        },
        methods: {
            categoryText (category) {
                if (category.children.data.length > 0) {
                    return `<strong>${category.name}</strong>`;
                } else {
                    return category.name;
                }
            },
            categoryIcon (category) {
                if (category.children.data.length > 0) {
                    return 'folder';
                } else {
                    return 'label';
                }
            },
            categoryChildClass (category) {
                if (category.children.data.length > 0) {
                    return 'green-text';
                } else {
                    return 'grey-text';
                }
            }
        }
    }
</script>
