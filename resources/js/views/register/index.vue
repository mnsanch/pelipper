<template>
    <!-- <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent">{{ $t('register') }}</div>
                    <div class="card-body">
                        <form @submit.prevent="submitRegister">
                            <div class="">

                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ $t('name') }}</label>
                                    <input v-model="registerForm.name" id="name" type="text" class="form-control" autofocus>

                                    <div class="text-danger mt-1">
                                        <div v-for="message in validationErrors?.name">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ $t('email') }}</label>
                                    <input v-model="registerForm.email" id="email" type="email" class="form-control" autocomplete="username">

                                    <div class="text-danger mt-1">
                                        <div v-for="message in validationErrors?.email">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label">
                                        {{ $t('password') }}
                                    </label>
                                    <input v-model="registerForm.password" id="password" type="password" class="form-control" autocomplete="current-password">

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

                                    <div class="text-danger-600 mt-1">
                                        <div v-for="message in validationErrors?.password_confirmation">
                                            {{ message }}
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <p>Please select your favorite Web language:</p>
                                        <input type="radio" id="html" name="fav_language" value="HTML">
                                        <label for="html">HTML</label><br>
                                        <input type="radio" id="css" name="fav_language" value="CSS">
                                        <label for="css">CSS</label><br>
                                        <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                                        <label for="javascript">JavaScript</label>
                                </div>


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
    </div> -->

    <!----------------------------------- LO MIO ------------------------------------------>
    <svg class="react-flowbackground" data-testid="rfbackground" style="position: absolute; z-index: -1; width: 100%; height: 100%; top: 0px; left: 0px;"><pattern id="pattern-1undefined" x="0.5" y="17.14712706455481" width="40" height="40" patternUnits="userSpaceOnUse" patternTransform="translate(-1,-1)"><circle cx="0.5" cy="0.5" r="0.5" fill="#91919a"></circle></pattern><rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-1undefined)"></rect></svg>

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
                                            <img src="/images/logo_pelipper.svg" width="40" height="40">
                                            <!-- <span class="h1 fw-bold mb-0 mx-2 page-title">Create account</span> -->
                                            <span class="h1 fw-bold py-0 my-0 mx-2 pl-10 font-bold bg-gradient-to-r shine text-transparent bg-clip-text">Sign up</span>
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

                                            <div class="p-0 mt-4 m-0 register-question-container">
                                                <div class="row my-4">
                                                    <span class="">*Choose wiselly, this will define your profile picture and can’t be changed:</span>
                                                </div>
                                                <p class="m-0 p-0 register-question-title">You discover a treasure:</p>
                                                <div class="row mx-0 mb-4">
                                                    <div class=" col-4">
                                                        <input type="radio" name="firstQuestion">
                                                        <label for="html" class="ml-2 register-question-answer">I run to tell my friends</label>
                                                    </div>
                                                    <div class=" col-4">
                                                        <input type="radio" name="firstQuestion">
                                                        <label for="html" class="ml-2 register-question-answer">I keep it in secret</label>
                                                    </div>
                                                    <div class=" col-4">
                                                        <input type="radio" name="firstQuestion">
                                                        <label for="html" class="ml-2 register-question-answer">I look for the owner</label>
                                                    </div>
                                                </div>
                                                <p class="m-0 p-0 register-question-title">Someone talks to you loudly:</p>
                                                <div class="row mx-0 mb-4">
                                                    <div class=" col-4">
                                                        <input type="radio" name="secondQuestion">
                                                        <label for="html" class="ml-2 register-question-answer">I cry</label>
                                                    </div>
                                                    <div class=" col-4">
                                                        <input type="radio" name="secondQuestion">
                                                        <label for="html" class="ml-2 register-question-answer">I get angry</label>
                                                    </div>
                                                    <div class=" col-4">
                                                        <input type="radio" name="secondQuestion">
                                                        <label for="html" class="ml-2 register-question-answer">I talk to him louder</label>
                                                    </div>
                                                </div>
                                                
                                                <p class="m-0 p-0 register-question-title">Let’s going a trip with your friends:</p>
                                                <div class="row mx-0">
                                                    <div class=" col-4">
                                                        <input type="radio" name="thirdQuestion">
                                                        <label for="html" class="ml-2 register-question-answer">Mountain</label>
                                                    </div>
                                                    <div class=" col-4">
                                                        <input type="radio" name="thirdQuestion">
                                                        <label for="html" class="ml-2 register-question-answer">Beach</label>
                                                    </div>
                                                    <div class=" col-4">
                                                        <input type="radio" name="thirdQuestion">
                                                        <label for="html" class="ml-2 register-question-answer">No place like home...</label>
                                                    </div>
                                                </div>
                                            </div>
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

</template>

<script setup>
import AppFooter from '@/layouts/AppFooter.vue';
import useAuth from '@/composables/auth'

const { registerForm, validationErrors, processing, submitRegister } = useAuth();

</script>
