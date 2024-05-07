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
                                <th>Nombre Usuario</th>
                                <th>Commentario</th>
                                <th>Creado</th>
                                <th class="text-center" width="200">Acciones</th>
                            </tr>
                        </thead>
                        <!-- {{ comments }} -->
                        <tbody>
                            <tr v-for="(comment, index) in comments.data">
                                <td class="text-center">{{comment.id}}</td>
                                <td class="text-center">{{comment.user.name}}</td>
                                <td class="text-center">{{comment.Comment}}</td>
                                <td class="text-center">{{comment.created_at}}</td>
                                <td class="px-6 py-4 text-sm  text-center">
                                    <a href="#" v-if="can('post-delete')" @click="deleteCommentadmin(comment.id, comment.ID_Post)"
                                       class="ms-2 badge bg-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{ posts }}

        </div>
    </div>
</template>


<script setup>
    import {ref, onMounted, watch} from "vue";
    import useComments from "@/composables/pppcomments";
    import {useAbility} from '@casl/vue'

    const search_category = ref('')
    const search_id = ref('')
    const search_title = ref('')
    const search_content = ref('')
    const search_global = ref('')
    const orderColumn = ref('created_at')
    const orderDirection = ref('desc')
    const {comments, getComments, deleteCommentadmin} = useComments()
    const {can} = useAbility();
    onMounted(() => {
        getComments()
    })



</script>