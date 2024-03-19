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

    const getPost = async (id) => {
        axios.get('/api/posts/' + id)
            .then(response => {
                post.value = response.data.data;
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
                router.push({ name: 'prueba.index' })
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
        axios.put('/api/posts/' + post.id, post)
            .then(response => {
                router.push({name: 'posts.index'})
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

    return {
        posts,
        post,
        getPosts,
        getPost,
        storePost,
        updatePost,
        deletePost,
        validationErrors,
        isLoading
    }
}
