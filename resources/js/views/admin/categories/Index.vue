<template>
    <div class="row justify-content-center my-2">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-transparent">
                    <h5 class="float-start">Categories</h5>
                    <router-link v-if="can('category-create')" :to="{ name: 'categories.create' }" class="btn btn-primary btn-sm float-end">
                        Create Category
                    </router-link>
                </div>
                <div class="card-body shadow-sm">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 text-start">ID</th>
                                <th class="px-6 py-3 text-left">Title</th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="post in categoryList" :key="post.id">
                                <td class="px-6 py-4 text-sm">
                                    {{ post.id }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    {{ post.Category_Name }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <router-link v-if="can('category-edit')"
                                                 :to="{ name: 'categories.edit', params: { id: post.id } }"
                                                 class="badge bg-primary">Edit
                                    </router-link>
                                    <a href="#" v-if="can('category-delete')" @click.prevent="deleteCategory(post.id)"
                                       class="ms-2 badge bg-danger">Delete</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import {ref, onMounted, watch} from "vue";
    import useCategories from "../../../composables/categories";
    import {useAbility} from '@casl/vue'

    const search_id = ref('')
    const search_title = ref('')
    const search_global = ref('')
    const orderColumn = ref('created_at')
    const orderDirection = ref('desc')
    const {categoryList, getCategoryList, deleteCategory} = useCategories()
    const {can} = useAbility()
    onMounted(() => {
        getCategoryList()
    })
    const updateOrdering = (column) => {
        orderColumn.value = column;
        orderDirection.value = (orderDirection.value === 'asc') ? 'desc' : 'asc';
        getCategories(
            1,
            search_id.value,
            search_title.value,
            search_global.value,
            orderColumn.value,
            orderDirection.value
        );
    }
    watch(search_id, (current, previous) => {
        getCategories(
            1,
            current,
            search_title.value,
            search_global.value
        )
    })
    watch(search_title, (current, previous) => {
        getCategories(
            1,
            search_id.value,
            current,
            search_global.value
        )
    })
    watch(search_global, _.debounce((current, previous) => {
        getCategories(
            1,
            search_id.value,
            search_title.value,
            current
        )
    }, 200))
</script>
