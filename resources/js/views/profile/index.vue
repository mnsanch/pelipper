<template>
    <div class="card border-0">
        <div class="card-header bg-transparent">
            <h5 class="float-start">Profile</h5>
        </div>
        <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <p>{{profile.name}}</p>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <p>{{profile.email}}</p>
                </div>
                <div><a href="#" class="ms-2 badge bg-danger" @click="deleteuser(userId)">Delete</a></div>
                

                <div class="mt-3">
                    <button style="background-color: green;">
                        <router-link :to="{ name: 'perfil.edit' }" class="dropdown-item">Editar</router-link>
                    </button>
                </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, reactive, watchEffect, ref, inject} from "vue";
import { useForm, useField, defineRule } from "vee-validate";
import { required, min } from "@/validation/rules"
import useProfile from "@/composables/profile";
import { useRouter } from 'vue-router'

defineRule('required', required)
// defineRule('email', email)
defineRule('min', min);

    const schema = {
        name: 'required|min:3',
        email: 'required',
    }
    let userId = ref(0);
    const swal = inject('$swal')
    const router = useRouter()

    // Create a form context with the validation schema
    const { validate, errors } = useForm({ validationSchema: schema })
    // Define actual fields for validation
    const { value: name } = useField('name', null, { initialValue: '' });
    const { value: email } = useField('email', null, { initialValue: '' });
    const { profile: profileData, getProfile, updateProfile, validationErrors, isLoading } = useProfile()
    const profile = reactive({
        name,
        email
    })
    function submitForm() {
        validate().then(form => { if (form.valid) updateProfile(profile) })
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
    


    onMounted(() => {
        getProfile()
        axios.get('/api/id')
        .then(response => {
            userId = response.data.userId;
        })
    })

    watchEffect(() => {
        profile.name = profileData.value.name
        profile.email = profileData.value.email
    })
</script>
