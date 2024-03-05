<template>
        <section class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="login-container card">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <div class="login-banner m-0 p-0"></div>
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form>
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="/images/pelipper_icon.png" width="40" height="40">
                                            <span class="h1 fw-bold mb-0 mx-2 page-title">Log in</span>
                                        </div>

                                        <h5 class="fw-normal mb-5 pb-3">Sign into your account</h5>

                                        <div class="form-floating mb-4">
                                            <input type="email" class="form-control form-control-lg login-input" id="floatingInput" placeholder="name@example.com">
                                            <label class="px-4" for="floatingInput">Email address</label>
                                        </div>
                                        <div class="form-floating position-relative">
                                            <input type="password" class="form-control form-control-lg login-input" id="floatingPassword" placeholder="Password">
                                            <label class="px-4" for="floatingPassword">Password</label>
                                            <button type="button" id="togglePassword" class="btn-login-password" onclick="togglePasswordVisibility()">
                                                <!-- SVG por defecto -->
                                                <svg id="showIcon" width="20px" height="20px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                    <path class="svg-background-color" d="M1 10c0-3.9 3.1-7 7-7s7 3.1 7 7h-1c0-3.3-2.7-6-6-6s-6 2.7-6 6H1zm4 0c0-1.7 1.3-3 3-3s3 1.3 3 3-1.3 3-3 3-3-1.3-3-3zm1 0c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        
                                        <div class="mt-4 mb-5 mx-0">
                                            <button onclick="" class="simple-button login-submit-button p-0 d-flex justify-content-center align-items-center h-100">
                                                <!-- Iniciar sesion form button -->
                                                <span>Log in</span>
                                            </button>
                                        </div>

                                        <!--<a class="small text-muted" href="#!">Forgot password?</a>-->
                                        <p class="mb-3 pb-lg-2">Don't have an account? <a href="#!">Register here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
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

</script>
