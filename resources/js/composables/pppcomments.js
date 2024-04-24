import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useComments() {
    const comments = ref({})
    const comment = ref({})
    
    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    const getComments = async () => {
        axios.get('/api/comments')
        .then(response => {
            comments.value = response.data;
            console.log(response);
            console.log(response.data);
        })
    }    

    const getCommentspost = async (id) => {
        axios.get('/api/commentspost/'+id)
        .then(response => {
            comments.value = response.data.data;
            console.log(response);
            console.log(response.data.data);
            console.log(comments);
        })
    } 

    const storecomment = async (id, comment) => {   
        axios.post('/api/comments/'+ id, comment)
    }
    
    const deleteComment = async (id) => {
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
                    axios.delete('/api/comment/' + id)
                        .then(response => {
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
        comments,
        comment,
        getComments,
        getCommentspost,
        storecomment,
        deleteComment
    }
}
