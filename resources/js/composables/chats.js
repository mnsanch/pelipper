import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'

export default function useChats() {
    const chats = ref({})
    const chat = ref({})

    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    const getchat = async (id) => {
        axios.get('/api/chat/'+id)
        .then(response => {
            chats.value = response.data.data;
            console.log(response.data.data);
            console.log(chats);
        })
    } 

    const getuserchat = async () => {
        axios.get('/api/id')
            .then(response => {
                axios.get('/api/userchat/'+response.data)
                .then(response => {
                    chats.value = response.data.data;
                    console.log(response.data.data);
                    console.log(chats);
                })
            })
    }


    const storechat = async (id, chat) => {
        axios.post('/api/chat', chat)
        .then(response => {
            getchat(id)
        }) 
        .catch(error => {
            swal({
                icon: 'error',
                title: 'You must be logged',
                timer: 5000,
                timerProgressBar: true,  
            })
        })
    }

    return {
        chats,
        chat,
        getchat,
        getuserchat,
        storechat
    }
}
