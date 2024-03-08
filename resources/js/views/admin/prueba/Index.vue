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
                                <th>Post</th>
                                <th>Votos positivos</th>
                                <th>Votos negativos</th>
                                <th>creado</th>
                                <th class="text-center" width="200">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(post,index) in posts">
                                <td class="text-center">{{post.id}}</td>
                                <td>{{post.ID_Category}}</td>
                                <td>{{post.ID_User}}</td>
                                <td>{{post.Image}}</td>
                                <th>{{post.Post}}</th>
                                <th>{{post.Upvote}}</th>
                                <th>{{post.Downvote}}</th>
                                <th>{{post.created_at}}</th>
                                <td class="text-center">
                                    <a class="btn btn-warning mr-1">Edit</a>
                                    <button class="btn btn-danger" @click="deletepost(post.id, index)">Delete</button>
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
    import axios from "axios";
    import {ref, onMounted, inject} from "vue"
    const posts = ref();
    const swal = inject('$swal');

    onMounted(()=>{
        // console.log('mi vista esta montada');

        axios.get('/api/pppposts')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    })

    const deletepost = (id,index)=>{
        axios.delete('/api/pppposts/'+id)
        .then(response =>{
            posts.value.splice(index,1)
            swal({
                icon:'success',
                title:'Tarea eliminada correctamente'
            })
        }).catch( error =>{
            console.log(error)
            swal({
                icon:'error',
                title:'No se ha podido eliminar la tarea'
            })
        });
    }

</script>
    

<style>


</style>