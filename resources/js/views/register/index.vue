<template>

    <svg class="react-flowbackground background-puntitos" data-testid="rfbackground"><pattern id="pattern-1undefined" x="0.5" y="17.14712706455481" width="40" height="40" patternUnits="userSpaceOnUse" patternTransform="translate(-1,-1)"><circle cx="0.5" cy="0.5" r="0.5" fill="#91919a"></circle></pattern><rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-1undefined)"></rect></svg>

    <section class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-6 col-xl-6">
                    <div class="createpost-container card p-0 my-6">
                        <div class="row g-0 mt-5 register-container-border ">
                            <!-- <div class="d-none d-md-block"> 
                                <div class="createpost-banner m-0 p-0"></div>
                            </div> -->
                            <div class=" d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form @submit.prevent="submitRegister" class="p-5">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <div class="title-logo-pelipper p-0 m-0"></div>
                                            <!-- <span class="h1 fw-bold mb-0 mx-2 page-title">Create account</span> -->
                                            <span class="h1 fw-bold py-0 my-0 mx-2 pl-10 font-bold bg-gradient-to-r shine text-transparent bg-clip-text">Sign up</span>
                                        </div>

                                        <h5 class="fw-normal mb-5 pb-3">Welcome to Pelipper.</h5>

                                        <div class="row">
                                            <div class="form-floating mb-4">
                                                <input v-model="registerForm.name" type="text" class="form-control form-control-lg createpost-input"
                                                    id="floatingInput" placeholder="name@example.com">
                                                <label class="px-4" for="floatingInput">Name</label>
                                                <div class="text-danger mt-1">
                                                    <div v-for="message in validationErrors?.name">
                                                        {{ message }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-4">
                                                <input v-model="registerForm.email" type="text" class="form-control form-control-lg createpost-input"
                                                    id="floatingInput" placeholder="name@example.com">
                                                <label class="px-4" for="floatingInput">Email</label>
                                                <div class="text-danger mt-1">
                                                    <div v-for="message in validationErrors?.email">
                                                        {{ message }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating position-relative mb-4">
                                            <input v-model="registerForm.password" type="password" class="form-control form-control-lg createpost-input" id="floatingPassword" placeholder="Password">
                                            <label class="px-4" for="floatingPassword">Password</label>
                                            <button type="button" id="togglePassword" class="btn-login-password" @click="togglePasswordVisibility('floatingPassword','togglePassword')">
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
                                            <input v-model="registerForm.password_confirmation" type="password" class="form-control form-control-lg createpost-input" id="floatingPassword2" placeholder="Password">
                                            <label class="px-4" for="floatingPassword2">Confirm password</label>
                                            <button type="button" id="togglePassword2" class="btn-login-password" @click="togglePasswordVisibility('floatingPassword2','togglePassword2')">
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


                                            <div class="p-4 mt-4 m-0 register-question-container">
                                                <div class="row mt-2 mb-4">
                                                    <span class="">*Choose wiselly, this will define your profile picture and can’t be changed:</span>
                                                </div>
                                                <p class="m-0 p-0 register-question-title">You discover a treasure:</p>
                                                <div class="row mx-0 mb-4">
                                                    <div class=" col-4">
                                                        <input type="radio" name="firstQuestion" required>
                                                        <label for="html" class="ml-2 register-question-answer">I run to tell my friends</label>
                                                    </div>
                                                    <div class=" col-4">
                                                        <input type="radio" name="firstQuestion" required>
                                                        <label for="html" class="ml-2 register-question-answer">I keep it in secret</label>
                                                    </div>
                                                    <div class=" col-4">
                                                        <input type="radio" name="firstQuestion" required>
                                                        <label for="html" class="ml-2 register-question-answer">I look for the owner</label>
                                                    </div>
                                                </div>
                                                <p class="m-0 p-0 register-question-title">Someone talks to you loudly:</p>
                                                <div class="row mx-0 mb-4">
                                                    <div class=" col-4">
                                                        <input type="radio" name="secondQuestion" required>
                                                        <label for="html" class="ml-2 register-question-answer">I cry</label>
                                                    </div>
                                                    <div class=" col-4">
                                                        <input type="radio" name="secondQuestion" required>
                                                        <label for="html" class="ml-2 register-question-answer">I get angry</label>
                                                    </div>
                                                    <div class=" col-4">
                                                        <input type="radio" name="secondQuestion" required>
                                                        <label for="html" class="ml-2 register-question-answer">I talk to him louder</label>
                                                    </div>
                                                </div>
                                                
                                                <p class="m-0 p-0 register-question-title">Let’s going a trip with your friends:</p>
                                                <div class="row mx-0">
                                                    <div class=" col-4">
                                                        <input type="radio" name="thirdQuestion" required>
                                                        <label for="html" class="ml-2 register-question-answer">Mountain</label>
                                                    </div>
                                                    <div class=" col-4">
                                                        <input type="radio" name="thirdQuestion" required>
                                                        <label for="html" class="ml-2 register-question-answer">Beach</label>
                                                    </div>
                                                    <div class=" col-4">
                                                        <input type="radio" name="thirdQuestion" required>
                                                        <label for="html" class="ml-2 register-question-answer">No place like home...</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-5 mx-0 p-0">
                                        <button onclick="" class="simple-button login-submit-button mx-0 p-0 d-flex justify-content-center align-items-center h-100">
                                            <span>Register</span>
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
        <app-footer class="mt-0 position-static"></app-footer>
</template>

<script setup>
import AppFooter from '@/layouts/AppFooter.vue';
import useAuth from '@/composables/auth'

const { registerForm, validationErrors, processing, submitRegister } = useAuth();

const togglePasswordVisibility = (id,id2)=> {
  var passwordInput = document.getElementById(id);
  var button = document.getElementById(id2);
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
</script>
