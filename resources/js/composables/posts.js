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
        axios.get('/api/posts')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }

    const avatrlink = async (id,avatar,nombre) => {
        router.push({ name: 'post.usuario', params: { id: id, avatar: avatar, nombre:nombre } })
    }

    const getreversePosts = async () => {
        axios.get('/api/postsreverse')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }

    const getPostsbestrated = async () => {
        axios.get('/api/postsmasupvote')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }

    const getPostslowestrated = async () => {
        axios.get('/api/postsmasdownvote')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }

    const getPostsmostnegativevotes = async () => {
        axios.get('/api/postsmasodiado')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }

    const getPostsmostvoted = async () => {
        axios.get('/api/postsmasvotado')
        .then(response => {
            posts.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }

    const getPost = async (id) => {
        axios.get('/api/post/' + id)
            .then(response => {
                if (response.data==false) {
                    router.push({ name: 'home'})
                }else{
                    post.value = response.data.data;
                    console.log(response.data.datas);
                }
            })
    }

    const getPostuser = async (id) => {
        axios.get('/api/postuser/' + id)
            .then(response => {
                post.value = response.data.data;
                console.log(response.data.data);
            })
    }

    
    const getPostsuser = async (id) => {
        axios.get('/api/posts/' + id)
            .then(response => {
                posts.value = response.data;
                console.log(response.data);
            })
    }

    const storePost = async (post) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        let serializedPost = new FormData()
        for (let item in post) {
            if (post.hasOwnProperty(item)) {
                serializedPost.append(item, post[item])
            }
        }

        axios.post('/api/posts', serializedPost, {
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
            .catch(error => {serializedPost
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
        let serializedPost = new FormData()
        for (let item in post) {
            if (post.hasOwnProperty(item)) {
                serializedPost.append(item, post[item])
            }
        }
        console.log(post);
        axios.post('/api/posts/update/' + post.id, serializedPost)
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
                    axios.delete('/api/posts/' + id)
                        .then(response => {
                            getPosts()
                            router.push({name: 'posts.index'})
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
                    axios.delete('/api/posts/' + id)
                        .then(response => {
                            getreversePosts()
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
    const deletePosthated = async (id) => {
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
                    axios.delete('/api/posts/' + id)
                        .then(response => {
                            getPostslowestrated()
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
    const deletePostuser = async (id, iduser) => {
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
                    axios.delete('/api/posts/' + id)
                        .then(response => {
                            getPostsuser(iduser)
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
    const deletePostpopular = async (id) => {
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
                    axios.delete('/api/posts/' + id)
                        .then(response => {
                            getPostsbestrated()
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
        axios.put('/api/posts/update/' + post.id, post)
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
            axios.put('/api/posts/'+post.id+'/upvote')  
            .then(response => {
                getreversePosts()
            })
            .catch(error => {
                swal({
                    icon: 'error',
                    title: 'Log in to vote.',
                    timer: 5000,
                    timerProgressBar: true,        
                })
            })
    }

    const restarVoto = async (post) => {
        axios.put('/api/posts/'+post.id+'/downvote')  
        .then(response => {
            getreversePosts()
        })
        .catch(error => {
            swal({
                icon: 'error',
                title: 'Log in to vote',
                timer: 5000,
                timerProgressBar: true,  
            })
        })
    }

    const quitarupvote = async (post) => {
        axios.put('/api/posts/'+post.id+'/quitarupvote')  
        .then(response => {
            getreversePosts()
        }) 
    }

    const quitardownvote = async (post) => {
        axios.put('/api/posts/'+post.id+'/quitardownvote')  
        .then(response => {
            getreversePosts()
        }) 
    }

    const sumarVotousuario = async (post) => {
        axios.put('/api/posts/'+post.id+'/upvote')  
        .then(response => {
            getPostsuser(post.ID_User)
        })
        .catch(error => {
            swal({
                icon: 'error',
                title: 'Log in to vote.',
                timer: 5000,
                timerProgressBar: true,        
            })
        })
    }

    const restarVotousuario = async (post) => {
        axios.put('/api/posts/'+post.id+'/downvote')  
        .then(response => {
            getPostsuser(post.ID_User)
        })
        .catch(error => {
            swal({
                icon: 'error',
                title: 'Log in to vote',
                timer: 5000,
                timerProgressBar: true,  
            })
        })
    }

    const quitarupvoteusuario = async (post) => {
        axios.put('/api/posts/'+post.id+'/quitarupvote')  
        .then(response => {
            getPostsuser(post.ID_User)
        }) 
    }

    const quitardownvoteusuario = async (post) => {
        axios.put('/api/posts/'+post.id+'/quitardownvote')  
        .then(response => {
            getPostsuser(post.ID_User)
        }) 
    }

    const sumarVotopopular = async (post) => {
        axios.put('/api/posts/'+post.id+'/upvote')  
        .then(response => {
            getPostsbestrated()
        })
        .catch(error => {
            swal({
                icon: 'error',
                title: 'Log in to vote.',
                timer: 5000,
                timerProgressBar: true,        
            })
        })
    }

    const restarVotopopular = async (post) => {
        axios.put('/api/posts/'+post.id+'/downvote')  
        .then(response => {
            getPostsbestrated()
        })
        .catch(error => {
            swal({
                icon: 'error',
                title: 'Log in to vote',
                timer: 5000,
                timerProgressBar: true,  
            })
        })
    }

    const quitarupvotepopular = async (post) => {
        axios.put('/api/posts/'+post.id+'/quitarupvote')  
        .then(response => {
            getPostsbestrated()
        }) 
    }

    const quitardownvotepopular = async (post) => {
        axios.put('/api/posts/'+post.id+'/quitardownvote')  
        .then(response => {
            getPostsbestrated()
        }) 
    }

    const sumarVotohated = async (post) => {
        axios.put('/api/posts/'+post.id+'/upvote')  
        .then(response => {
            getPostslowestrated()
        })
        .catch(error => {
            swal({
                icon: 'error',
                title: 'Log in to vote.',
                timer: 5000,
                timerProgressBar: true,        
            })
        })
    }

    const restarVotohated = async (post) => {
        axios.put('/api/posts/'+post.id+'/downvote')  
        .then(response => {
            getPostslowestrated()
        })
        .catch(error => {
            swal({
                icon: 'error',
                title: 'Log in to vote',
                timer: 5000,
                timerProgressBar: true,  
            })
        })
    }

    const quitarupvotehated = async (post) => {
        axios.put('/api/posts/'+post.id+'/quitarupvote')  
        .then(response => {
            getPostslowestrated()
        }) 
    }

    const quitardownvotehated = async (post) => {
        axios.put('/api/posts/'+post.id+'/quitardownvote')  
        .then(response => {
            getPostslowestrated()
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
        deletePosthated,
        deletePostpopular,
        deletePostuser,
        sumarVoto,
        restarVoto,
        quitarupvote,
        quitardownvote,
        sumarVotousuario,
        restarVotousuario,
        quitarupvoteusuario,
        quitardownvoteusuario,
        sumarVotopopular,
        restarVotopopular,
        quitarupvotepopular,
        quitardownvotepopular,
        sumarVotohated,
        restarVotohated,
        quitarupvotehated,
        quitardownvotehated,
        validationErrors,
        isLoading
        
    }
}
