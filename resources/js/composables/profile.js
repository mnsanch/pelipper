import { ref, inject } from 'vue'
import { useRouter } from 'vue-router'
import store from "../store";

export default function useProfile() {
    const profile = ref({
        name: '',
        email: '',
    })

    const router = useRouter()
    const validationErrors = ref({})
    const isLoading = ref(false)
    const swal = inject('$swal')

    const getProfile = async () => {
        profile.value = store.getters["auth/user"]
        // axios.get('/api/user')
        //     .then(({data}) => {
        //         profile.value = data.data;
        //     })
    }

    const updateProfile = async (profile) => {
        if (isLoading.value) return;

        isLoading.value = true
        validationErrors.value = {}

        axios.put('/api/user', profile)
            .then(({data}) => {
                if (data.success) {
                    store.commit('auth/SET_USER', data.data)
                    router.push({name: 'perfil.index'})
                    swal({
                        icon: 'success',
                        title: 'Profile updated successfully'
                    })
                    console.log(data)
                }
            })
            .catch(error => {
                if (error.response?.data) {
                    validationErrors.value = error.response.data.errors
                }
            })
            .finally(() => isLoading.value = false)
    }

    const deleteuser = (userId) => {
        console.log(userId);
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
                    console.log(userId);
                    axios.delete('/api/deleteuser/'+ userId)
                        .then(response => {
                            swal({
                                icon: 'success',
                                title: 'Post deleted successfully'
                            })
                            router.push({name: 'home'})
                            location.reload();
                        })
                        .catch(error => {
                            swal({
                                icon: 'error',
                                title: 'Something went wrong'
                            })
                        })

                }
            })
            
};

    return {
        profile,
        getProfile,
        updateProfile,
        deleteuser,
        validationErrors,
        isLoading
    }
}
