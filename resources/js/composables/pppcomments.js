import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useComments() {
    const comments = ref({})
    
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
    

    return {
        comments,
        getComments,
        getCommentspost
    }
}
