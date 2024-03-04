<template>    
    <section class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="login-container card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="" alt="login form" width="447px" height="632px" class="img-fluid" style="border-radius: 1rem 0 0 1rem; opacity: 0.5;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form>
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img src="" width="40" height="40">
                                        <span class="h1 fw-bold mb-0 mx-2">Log in</span>
                                    </div>

                                    <h5 class="fw-normal mb-5 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control form-control-lg" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" class="form-control form-control-lg" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>

                                    <div class="mt-4 mb-5 mx-0" style="height: 40px; width: 100px; margin-left: 4px; margin-right: 4px">
                                        <button onclick="" class="simple-button p-0 d-flex justify-content-center align-items-center">
                                            <!-- Iniciar sesion form button -->
                                            <span>Log in</span>
                                        </button>
                                    </div>

                                    <!--<a class="small text-muted" href="#!">Forgot password?</a>-->
                                    <p class="mb-3 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!" style="color: #393f81;">Register here</a></p>
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

const { registerForm, validationErrors, processing, submitRegister } = useAuth();

</script>
