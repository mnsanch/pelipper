import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function usePosts() {
    const posts = ref({})
    const post = ref({
        Title: '',
        Post: '',
        ID_Category: '',
        thumbnail: ''
    })
    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    const getPosts = async () => {
        axios.get('/api/pppposts')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }

    const avatrlink = async (id) => {
        router.push({ name: 'post.usuario', params: { id: id } })
    }

    const getreversePosts = async () => {
        axios.get('/api/ppppostsreverse')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }

    const getPostsbestrated = async () => {
        axios.get('/api/ppppostsmasupvote')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }

    const getPostslowestrated = async () => {
        axios.get('/api/ppppostsmasdownvote')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }

    const getPostsmostnegativevotes = async () => {
        axios.get('/api/ppppostsmasodiado')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }

    const getPostsmostvoted = async () => {
        axios.get('/api/ppppostsmasvotado')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }

    const getPost = async (id) => {
        axios.get('/api/ppppost/' + id)
            .then(response => {
                if (response.data==false) {
                    router.push({ name: 'home'})
                }else{
                    post.value = response.data.data;
                    console.log(response.data.data);
                }
            })
    }

    const getPostuser = async (id) => {
        axios.get('/api/ppppostuser/' + id)
            .then(response => {
                post.value = response.data.data;
                console.log(response.data.data);
            })
    }

    
    const getPostsuser = async (id) => {
        axios.get('/api/pppposts/' + id)
            .then(response => {
                posts.value = response.data;
                console.log(response.data);
            })
    }

    const storePost = async (exercise) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        let serializedExercise = new FormData()
        for (let item in exercise) {
            if (exercise.hasOwnProperty(item)) {
                serializedExercise.append(item, exercise[item])
            }
        }

        axios.post('/api/pppposts', serializedExercise, {
            headers: {
                "content-type": "multipart/form-data"
            }
        })
            .then(response => {
                router.push({ name: 'home' })
                swal({
                    icon: 'success',
                    title: 'Exercise saved successfully'
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    const updatePost = async (post) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}
        console.log(post);
        axios.put('/api/pppposts/update/' + post.id, post)
            .then(response => {
                router.push({name: 'home'})
                swal({
                    icon: 'success',
                    title: 'Post updated successfully'
                })
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    const deletePost = async (id) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this action!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
            .then(result => {
                if (result.isConfirmed) {
                    axios.delete('/api/pppposts/' + id)
                        .then(response => {
                            getPosts()
                            router.push({name: 'prueba.index'})
                            swal({
                                icon: 'success',
                                title: 'Post deleted successfully'
                            })
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: 'Something went wrong'
                            })
                        })
                }
            })

    }

    const deletePosthome = async (id) => {
        swal({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this action!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonColor: '#ef4444',
            timer: 20000,
            timerProgressBar: true,
            reverseButtons: true
        })
            .then(result => {
                if (result.isConfirmed) {
                    axios.delete('/api/pppposts/' + id)
                        .then(response => {
                            getPosts()
                            swal({
                                icon: 'success',
                                title: 'Post deleted successfully'
                            })
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: 'Something went wrong'
                            })
                        })
                }
            })

    }

    const upvote = async (post) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}
        console.log(post);
        axios.put('/api/pppposts/update/' + post.id, post)
            .then(response => {
                console.log('si',response.data.data);
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    const sumarVoto = async (post) => {
            axios.put('/api/pppposts/'+post.id+'/upvote')  
            .then(response => {
                console.log(response.data.message);
                post.Upvote++;;
                post.Totalvotes++;;
            })
    }

    const restarVoto = async (post) => {
        axios.put('/api/pppposts/'+post.id+'/downvote')  
        .then(response => {
            console.log(response.data.message);
            post.Downvote--;;
            post.Totalvotes--;;
        })
}

    
    

    return {
        posts,
        post,
        getPosts,
        avatrlink,
        getreversePosts,
        getPostsbestrated,
        getPostslowestrated,
        getPostsmostnegativevotes,
        getPostsmostvoted,
        getPost,
        getPostuser,
        getPostsuser,
        storePost,
        updatePost,
        deletePost,
        deletePosthome,
        validationErrors,
        isLoading,
        sumarVoto,
        restarVoto
    }
}
