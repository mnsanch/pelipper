<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between pb-2 mb-2">
                        <h5 class="card-title">Todos los posts</h5>
                        <div>
                            <router-link :to="{name: 'prueba.create'}" class="btn btn-success">Nueva Post</router-link>
                        </div>

                    </div>

                    <table class="table table-hover table-sm">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th width="50" class="text-center">ID</th>
                                <th>Categoria</th>
                                <th>Nombre Usuario</th>
                                <th>Imagen</th>
                                <th>Titulo</th>
                                <th>Post</th>
                                <th>Votos positivos</th>
                                <th>Votos negativos</th>
                                <th>Creado</th>
                                <th class="text-center" width="200">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(post, index) in posts.data" :key="post.id">
                                <td class="text-center">{{post.id}}</td>
                                <td class="text-center"><div v-for="category in post.ID_Category">
                                        {{ category.Category_Name }}
                                    </div></td> 
                                <td class="text-center">{{post.Usuario}}</td>
                                <td>  
                                    <img :src="post.original_image" alt="image" height="70">
                                </td>
                                <td class="text-center">{{post.Title}}</td>
                                <td class="text-center">{{post.Post}}</td>
                                <td class="text-center">{{post.Upvote}}</td>
                                <td class="text-center">{{post.Downvote}}</td>
                                <td class="text-center">{{post.created_at}}</td>
                                <td class="px-6 py-4 text-sm text-center">
                                    <a href="#" v-if="can('post-delete')" @click="deletePost(post.id)"
                                       class="ms-2 badge bg-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
    import {ref, onMounted, watch} from "vue";
    import usePosts from "@/composables/pppposts";
    import useCategories from "@/composables/categories";
    import {useAbility} from '@casl/vue'

    const search_category = ref('')
    const search_id = ref('')
    const search_title = ref('')
    const search_content = ref('')
    const search_global = ref('')
    const orderColumn = ref('created_at')
    const orderDirection = ref('desc')
    const {posts, getPosts, deletePost} = usePosts()
    const {categoryList, getCategoryList} = useCategories()
    const {can} = useAbility();
    onMounted(() => {
        getPosts()
        getCategoryList()
    })



</script>