<template>
    <section class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 mx-0">
            <div class="col-10 col-xl-10">
                <div class="login-container p-0 card">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <div class="login-banner m-0 p-0"></div>
                        </div>
                        <div class="col-md-6 col-lg-7 px-5 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form @submit.prevent="submitLogin">
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img class="py-0 my-0" src="/images/pelipper_icon.png" width="40" height="40">
                                        <span class="h1 fw-bold py-0 my-0 mx-2 page-title">Log in</span>
                                    </div>

                                    <h5 class="fw-normal mb-5 pb-3">Sign into your account</h5>

                                    <div class="form-floating mb-4">
                                        <input v-model="loginForm.email" type="email" class="form-control form-control-lg login-input" id="floatingInput" placeholder="name@example.com" required>
                                        <label class="px-4" for="floatingInput">Email address</label>
                                        <div class="text-danger mt-1">
                                            <div v-for="message in validationErrors?.email">
                                                {{ message }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating position-relative">
                                        <input v-model="loginForm.password" type="password" class="form-control form-control-lg login-input" id="floatingPassword" placeholder="Password" required>
                                        <label class="px-4" for="floatingPassword">Password</label>
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
                                    
                                    
                                    <div class="mt-4 mb-5 mx-0">
                                        <button onclick="" class="simple-button login-submit-button p-0 d-flex justify-content-center align-items-center h-100">
                                            <!-- Iniciar sesion form button -->
                                            <span>Log in</span>
                                        </button>
                                    </div>

                                    <!--<a class="small text-muted" href="#!">Forgot password?</a>-->
                                    <router-link class="nav-link mb-3 pb-lg-2" to="/register" >Don't have an account? <a href="#!">Register here</a></router-link>
                                    <a href="#!" class="small text-muted">Terms of use.  </a>
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

import useAuth from '@/composables/auth'

const { loginForm, validationErrors, processing, submitLogin } = useAuth();

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

</script>
