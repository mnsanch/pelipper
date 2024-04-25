<template>
            <section class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 mx-0">
            <div class="col-10 col-xl-6">
                <div class="login-container p-0 card">
                    <div class="row g-0">
                        <!-- <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <div class="login-banner m-0 p-0"></div>
                        </div> -->
                        <div class="col-md-12 col-lg-12 px-5 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form @submit.prevent="submitLogin">
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img class="py-0 my-0" src="/images/logo_pelipper_banner.png" width="40" height="40">
                                        <span class="h1 fw-bold py-0 my-0 mx-2 page-title">Log in</span>
                                    </div>

                                    <h5 class="fw-normal mb-5 pb-3">Edit your account profile</h5>

                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control form-control-lg login-input" id="floatingInput" placeholder="name@example.com" required>
                                        <label class="px-4" for="floatingInput">{{profile.name}}</label>
                                        <div class="text-danger mt-1">
                                        </div>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control form-control-lg login-input" id="floatingInput" placeholder="name@example.com" required>
                                        <label class="px-4" for="floatingInput">{{profile.email}}</label>
                                        <div class="text-danger mt-1">
                                        </div>
                                    </div>
                                    <div class="form-floating position-relative">
                                        <input  type="password" class="form-control form-control-lg login-input" id="floatingPassword" placeholder="Password" required>
                                        <label class="px-4" for="floatingPassword">Nueva contraseña</label>
                                        <button type="button" id="togglePassword" class="btn-login-password" @click="togglePasswordVisibility('floatingPassword')">
                                            <!-- SVG por defecto -->
                                            <svg id="showIcon" width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                <path class="svg-background-color" d="M1 10c0-3.9 3.1-7 7-7s7 3.1 7 7h-1c0-3.3-2.7-6-6-6s-6 2.7-6 6H1zm4 0c0-1.7 1.3-3 3-3s3 1.3 3 3-1.3 3-3 3-3-1.3-3-3zm1 0c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2z"/>
                                            </svg>
                                        </button>
                                        <div class="text-danger-600 mt-1">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="mt-4 mb-5 mx-0 d-flex">
                                        <button onclick="" class="simple-button login-submit-button py-0 px-2 d-flex justify-content-center align-items-center h-100" style=" width: fit-content">
                                            <!-- Iniciar sesion form button -->
                                            <span>Confirm changes</span>
                                        </button>
                                        <button onclick="" class="simple-button login-submit-button py-0 px-2 d-flex justify-content-center align-items-center h-100" style="background-color: salmon; width: fit-content">
                                            <!-- Iniciar sesion form button -->
                                            <span>Delete account</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    <div class="card border-0">
        <div class="card-header bg-transparent">
            <h5 class="float-start">Profile</h5>
        </div>
        <div class="card-body">
            <form @submit.prevent="submitForm">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" v-model="profile.name" class="form-control" id="name">
                    <div class="text-danger mt-1">
                        {{ errors.name }}
                    </div>
                    <div class="text-danger mt-1">
                        <div v-for="message in validationErrors?.name">
                            {{ message }}
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" v-model="profile.email" class="form-control" id="email">
                    <div class="text-danger mt-1">
                        {{ errors.email }}
                    </div>
                    <div class="text-danger mt-1">
                        <div v-for="message in validationErrors?.email">
                            {{ message }}
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <button :disabled="isLoading" class="btn btn-primary">
                        <div v-show="isLoading" class=""></div>
                        <span v-if="isLoading">Processing...</span>
                        <span v-else>Update</span>
                    </button>
                </div>
            </form>
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
