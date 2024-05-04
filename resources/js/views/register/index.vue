<template>
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent">{{ $t('register') }}</div>
                    <div class="card-body">
                        <form @submit.prevent="submitRegister">
                            <div class="">
                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ $t('name') }}</label>
                                    <input v-model="registerForm.name" id="name" type="text" class="form-control" autofocus>
                                    <!-- Validation Errors -->
                                    <div class="text-danger mt-1">
                                        <div v-for="message in validationErrors?.name">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ $t('email') }}</label>
                                    <input v-model="registerForm.email" id="email" type="email" class="form-control" autocomplete="username">
                                    <!-- Validation Errors -->
                                    <div class="text-danger mt-1">
                                        <div v-for="message in validationErrors?.email">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="mb-4">
                                    <label for="password" class="form-label">
                                        {{ $t('password') }}
                                    </label>
                                    <input v-model="registerForm.password" id="password" type="password" class="form-control" autocomplete="current-password">
                                    <!-- Validation Errors -->
                                    <div class="text-danger-600 mt-1">
                                        <div v-for="message in validationErrors?.password">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">
                                        {{ $t('confirm_password') }}
                                    </label>
                                    <input v-model="registerForm.password_confirmation" id="password_confirmation" type="password" class="form-control" autocomplete="current-password">
                                    <!-- Validation Errors -->
                                    <div class="text-danger-600 mt-1">
                                        <div v-for="message in validationErrors?.password_confirmation">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="flex items-center justify-end mt-4">
                                    <button class="btn btn-primary" :class="{ 'opacity-25': processing }" :disabled="processing">
                                        {{ $t('register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!----------------------------------- LO MIO ------------------------------------------>
    <section class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-6 col-xl-6">
                    <div class="createpost-container card p-0">
                        <div class="row g-0" style="border: 1px solid salmon">
                            <div class="d-none d-md-block"> <!-- D-NONE ELIMINA-->
                                <div class="createpost-banner m-0 p-0"></div>
                            </div>
                            <div class=" d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form class="p-5">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="/images/pelipper_icon.png" width="40" height="40">
                                            <!-- <span class="h1 fw-bold mb-0 mx-2 page-title">Create account</span> -->
                                            <span class="h1 fw-bold py-0 my-0 mx-2 pl-10 font-bold bg-gradient-to-r shine text-transparent bg-clip-text">create account</span>
                                        </div>

                                        <h5 class="fw-normal mb-5 pb-3">Welcome to Pelipper.</h5>

                                        <div class="row">
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control form-control-lg createpost-input"
                                                    id="floatingInput" placeholder="name@example.com">
                                                <label class="px-4" for="floatingInput">Nombre</label>
                                            </div>
                                            <div class="text-danger mt-1">
                                                <div v-for="message in validationErrors?.name">
                                                    {{ message }}
                                                </div>
                                            </div>
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control form-control-lg createpost-input"
                                                    id="floatingInput" placeholder="name@example.com">
                                                <label class="px-4" for="floatingInput">Email</label>
                                            </div>
                                            <div class="text-danger mt-1">
                                                <div v-for="message in validationErrors?.email">
                                                    {{ message }}
                                                </div>
                                            </div>
                                            <div class="form-floating mb-4">
                                                <input v-model="a" type="email" class="form-control form-control-lg createpost-input" id="floatingInput" placeholder="{{ profile.email }}" required> <!--value="{{ profile.email }}"-->
                                                <label class="px-4" for="floatingInput">Email</label>
                                                <div class="text-danger mt-1">
                                                </div>
                                            </div>
                                            <div class="text-danger mt-1">
                                                <div v-for="message in validationErrors?.title">
                                                    {{ message }}
                                                </div>
                                            </div>
                                            <div class="form-floating mb-4">
                                                <input type="text" class="form-control form-control-lg createpost-input"
                                                    id="floatingInput" placeholder="name@example.com">
                                                <label class="px-4" for="floatingInput">Nombre</label>
                                            </div>
                                            <div class="text-danger mt-1">
                                                <div v-for="message in validationErrors?.name">
                                                    {{ message }}
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <div class="form-floating mb-4 mx-0" style="width: 100%; border: 0px"> 
                                                </div>

                                                <div class="mb-4 mx-0 border-0 d-flex justify-content-end" style="width: 100%">
                                                    <div class="mb-3"  style="border-radius: 1.25rem !important; width: 100%">
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>

                                        <div class="mt-4 mb-5 mx-0">
                                            <button onclick="" class="simple-button createpost-submit-button p-0 d-flex justify-content-center align-items-center h-100">
                                                <span>Create account</span>
                                            </button>
                                        </div>
        
                                        <a href="#!" class="small text-muted">Community guidelines. </a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <app-footer></app-footer>

</template>

<script setup>
import AppFooter from '@/layouts/AppFooter.vue';
import useAuth from '@/composables/auth'

const { registerForm, validationErrors, processing, submitRegister } = useAuth();

</script>
