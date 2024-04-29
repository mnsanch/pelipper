<template>
    <section class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100 border-0">
                <div class="createpost-container p-0 w-50" style="margin: 21px"> <!--card-->
                    <div class="row g-0">
                        <div class="row d-none d-md-block p-0 m-0" >
                            <!-- <div class="createpost-banner m-0 p-0"></div> -->
                            <img src="/images/createpost_banner.svg" class="m-0 p-0" style="width: 100%; height: auto; background-color: transparent">
                        </div>
                        <div class="row d-flex align-items-center p-0 m-0">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form @submit.prevent="submitForm" class="p-5">
                                    <div class="d-flex align-items-center mb-3 p-0">
                                        <img src="/images/logo_pelipper_banner.PNG" width="40" height="40" class="p-0 m-0">
                                        <!-- <span class="h1 fw-bold mx-2 my-0 p-0 page-title">profile</span> -->
                                        <span class="h1 fw-bold py-0 my-0 mx-2 pl-10 font-bold bg-gradient-to-r shine text-transparent bg-clip-text">profile</span>
                                    </div>

                                    <h5 class="fw-normal mb-5 pb-3">Edit your profile.</h5>

                                    <div class="row d-flex justify-items-center">
                                        <div class="form-floating mb-4">
                                            <input v-model="profile.name" type="text" class="form-control form-control-lg createpost-input" id="floatingInput" required>
                                            <label class="px-4 bg-transparent" for="floatingInput">Username</label>
                                            <div class="text-danger mt-1">
                                                {{ errors.Title }}
                                            </div>
                                            <div class="text-danger mt-1">
                                                <div v-for="message in validationErrors?.title">
                                                    {{ message }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input v-model="profile.email" type="email" class="form-control form-control-lg createpost-input" id="floatingInput" required>
                                            <label class="px-4" for="floatingInput">Email</label>
                                            <div class="text-danger mt-1">
                                                {{ errors.Title }}
                                            </div>
                                            <div class="text-danger mt-1">
                                                <div v-for="message in validationErrors?.title">
                                                    {{ message }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating position-relative mb-4">
                                            <input v-model="a" type="password" class="form-control form-control-lg createpost-input" id="floatingPassword" placeholder="Password" required>
                                            <label class="px-4" for="floatingPassword">New password</label>
                                            <button type="button" id="togglePassword" class="btn-login-password" @click="togglePasswordVisibility('floatingPassword')">
                                                <!-- SVG por defecto -->
                                                <svg id="showIcon" width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                    <path class="svg-background-color" d="M1 10c0-3.9 3.1-7 7-7s7 3.1 7 7h-1c0-3.3-2.7-6-6-6s-6 2.7-6 6H1zm4 0c0-1.7 1.3-3 3-3s3 1.3 3 3-1.3 3-3 3-3-1.3-3-3zm1 0c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2z"/>
                                                </svg>
                                            </button>
                                            <div class="text-danger-600 mt-1">
                                                <div v-for="message in validationErrors?.password">
                                                    {{ message }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating position-relative">
                                            <input v-model="a" type="password" class="form-control form-control-lg createpost-input" id="floatingPassword" placeholder="Password" required>
                                            <label class="px-4" for="floatingPassword">Confirm password</label>
                                            <button type="button" id="togglePassword" class="btn-login-password" @click="togglePasswordVisibility('floatingPassword')">
                                                <!-- SVG por defecto -->
                                                <svg id="showIcon" width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                    <path class="svg-background-color" d="M1 10c0-3.9 3.1-7 7-7s7 3.1 7 7h-1c0-3.3-2.7-6-6-6s-6 2.7-6 6H1zm4 0c0-1.7 1.3-3 3-3s3 1.3 3 3-1.3 3-3 3-3-1.3-3-3zm1 0c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2z"/>
                                                </svg>
                                            </button>
                                            <div class="text-danger-600 mt-1">
                                                <div v-for="message in validationErrors?.password">
                                                    {{ message }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 mb-5 mx-0 d-flex justify-content-between">
                                        <button :disabled="isLoading" class="simple-button login-submit-button mx-0 py-0 px-2 d-flex justify-content-center align-items-center h-100" style=" width: fit-content">
                                            <div v-show="isLoading" class=""></div>
                                            <!-- Iniciar sesion form button -->
                                            <span v-if="isLoading">Processing...</span>
                                            <span v-else>Confirm changes</span>
                                        </button>

                                        <div  @click="deleteuser(user.id)" onclick="" class="simple-button login-submit-button mx-0 py-0 px-2 d-flex justify-content-center align-items-center h-100" style="background-color:  salmon; cursor: pointer;width: fit-content">
                                            <!-- Iniciar sesion form button -->
                                            <span>Delete account</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    <!-- <div class="card border-0">
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
    </div> -->
</template>

<script setup>
import { onMounted, reactive, watchEffect, ref, inject, computed} from "vue";
import { useForm, useField, defineRule } from "vee-validate";
import { required, min } from "@/validation/rules"
import useProfile from "@/composables/profile";
import { useRouter } from 'vue-router'
import { useStore } from 'vuex';


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
    const store = useStore();
    const user = computed(() => store.state.auth.user)


    // Create a form context with the validation schema
    const { validate, errors } = useForm({ validationSchema: schema })
    // Define actual fields for validation
    const { value: name } = useField('name', null, { initialValue: '' });
    const { value: email } = useField('email', null, { initialValue: '' });
    const { profile: profileData, getProfile, updateProfile, validationErrors, isLoading, deleteuser } = useProfile()
    const profile = reactive({
        name,
        email
    })
    function submitForm() {
        validate().then(form => { if (form.valid) updateProfile(profile) })
    }
    


const togglePasswordVisibility = (id)=> {
  var passwordInput = document.getElementById(id);
  var button = document.getElementById('togglePassword');
  var showIcon = '<svg id="showIcon" width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path class="svg-background-color" fill-rule="evenodd" clip-rule="evenodd" d="M1 10c0-3.9 3.1-7 7-7s7 3.1 7 7h-1c0-3.3-2.7-6-6-6s-6 2.7-6 6H1zm4 0c0-1.7 1.3-3 3-3s3 1.3 3 3-1.3 3-3 3-3-1.3-3-3zm1 0c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2z"/></svg>';
  var hideIcon = '<svg id="hideIcon" width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path class="svg-background-color" fill-rule="evenodd" clip-rule="evenodd" d="M8 2c-1.5 0-2.8.4-3.9 1.2l.8.7C5.8 3.3 6.8 3 8 3c3.3 0 6 2.7 6 6h1c0-3.9-3.1-7-7-7zM1 3l1.6 1.5C1.6 5.7 1 7.3 1 9h1c0-1.5.5-2.8 1.4-3.8l2.2 2C5.2 7.7 5 8.3 5 9c0 1.7 1.3 3 3 3 .8 0 1.5-.3 2-.8l3 2.8.7-.7-12-11L1 3zm5.3 4.9l2.9 2.7c-.3.2-.7.4-1.2.4-1.1 0-2-.9-2-2 0-.4.1-.8.3-1.1zM11 9.5l-1-.9c-.2-.8-.9-1.5-1.8-1.6l-1-.9c.3-.1.5-.1.8-.1 1.7 0 3 1.3 3 3v.5z"/></svg>';

  if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      button.innerHTML = hideIcon;
  } else {
      passwordInput.type = 'password';
      button.innerHTML = showIcon;
  }
}

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
