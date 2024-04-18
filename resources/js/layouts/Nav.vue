<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-0" style="z-index: 99999 !important; position: fixed">
        <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 6dvh; padding-left: 2dvw; padding-right: 2dvw">
            <div class="row header-separator" style="height: 6dvh; width: 98dvw; padding-left: 1dvw; padding-right: 1dvw;">
                <!-- LOGO: Pendiente incluir el H1 y el enlace al logo -->
                <div class="col-2 p-0 container-fluid d-flex flex-row align-items-center" style="height: 6dvh">
                    <router-link to="/" class="navbar-brand logo">
                        <img src="images/logo_pelipper_claro.svg" width="115" height="34">
                    </router-link>
                </div>
                <!-- <ul class="col-1 navbar-nav mt-2 mt-lg-0 me-auto mb-2 mb-lg-0">
                    <LocaleSwitcher />
                </ul> -->
                <!-- SEARCHBAR -->
                <div class="col-6 p-0 container-fluid d-flex flex-row align-items-center" style="height: 6dvh" id="searchContainer">
                    <div class="container-fluid d-flex flex-row align-items-center searchbar">
                        <form action="" method="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="none">
                                <path class="svg-background-color" d="M19.5 18.616 14.985 14.1a8.528 8.528 0 1 0-.884.884l4.515 4.515.884-.884ZM1.301 8.553a7.253 7.253 0 1 1 7.252 7.253 7.261 7.261 0 0 1-7.252-7.253Z">
                                </path>
                            </svg>
                            <input type="text" placeholder="Search in..." name="searchbar" style="background-color: transparent; border: none; outline: none;">
                        </form>
                    </div>
                </div>
                <template v-if="!user?.name">

                    <div class="col-3 p-0 d-flex flex-row justify-content-end align-items-center" style="height: 6dvh; padding-left: 8px; padding-right: 8px;">
                        <div style="height: 40px; width: 100px; margin-left: 4px; margin-right: 4px">
                            <button class="simple-button p-0 d-flex justify-content-center align-items-center nav-item">
                                <router-link class="nav-link" to="/register" style="margin-left: 5px; margin-right: 5px">Sign up</router-link>
                            </button>
                        </div>
                        <div style="height: 40px; width: auto; margin-left: 4px; margin-right: 4px">
                            <button onclick="" class="special-button p-0 d-flex justify-content-center align-items-center nav-item">
                                <!-- Log in button -->
                                <router-link class="nav-a-link" to="/login" style="margin-left: 5px; margin-right: 5px"> Log in </router-link>
                            </button>
                        </div>
                        <div style="height: 40px; width: 40px; margin-left: 4px; margin-right: 4px">
                            <button onclick="toggleDarkMode()" class="circular-button p-0 d-flex justify-content-center align-items-center">
                                <!-- Dark mode icon-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path class="svg-background-color" d="M9.875 19a9.073 9.073 0 0 1-8.48-5.78 1.094 1.094 0 0 1 .247-1.191 1.145 1.145 0 0 1 1.232-.255c1.13.449 2.361.587 3.564.4A6.89 6.89 0 0 0 12.17 6.44a6.806 6.806 0 0 0-.394-3.564 1.148 1.148 0 0 1 .255-1.231 1.1 1.1 0 0 1 1.193-.248 9.082 9.082 0 0 1 5.746 9.254 9.184 9.184 0 0 1-8.32 8.32 11.93 11.93 0 0 1-.775.028Zm-7.206-5.967A7.871 7.871 0 1 0 13.033 2.668 8.116 8.116 0 0 1 2.669 13.033Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </template>
                <template v-if="user?.name" class="nav-item dropdown">
                    <div class="col-3 p-0 d-flex flex-row justify-content-end align-items-center" style="height: 6dvh; padding-left: 8px; padding-right: 8px">
                        <div style="height: 40px; width: 40px">
                            <router-link :to="{name: 'prueba.create'}" class="circular-button p-0 d-flex justify-content-center align-items-center">
                                <!-- Add post icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path class="svg-background-color" d="M19 9.375h-8.375V1h-1.25v8.375H1v1.25h8.375V19h1.25v-8.375H19v-1.25Z"></path>
                                </svg>
                            </router-link>
                        </div>
                        <div style="height: 40px; width: 40px">
                            <button onclick="toggleDarkMode()"
                                class="circular-button p-0 d-flex justify-content-center align-items-center">
                                <!-- Dark mode icon-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path class="svg-background-color"
                                        d="M9.875 19a9.073 9.073 0 0 1-8.48-5.78 1.094 1.094 0 0 1 .247-1.191 1.145 1.145 0 0 1 1.232-.255c1.13.449 2.361.587 3.564.4A6.89 6.89 0 0 0 12.17 6.44a6.806 6.806 0 0 0-.394-3.564 1.148 1.148 0 0 1 .255-1.231 1.1 1.1 0 0 1 1.193-.248 9.082 9.082 0 0 1 5.746 9.254 9.184 9.184 0 0 1-8.32 8.32 11.93 11.93 0 0 1-.775.028Zm-7.206-5.967A7.871 7.871 0 1 0 13.033 2.668 8.116 8.116 0 0 1 2.669 13.033Z" />
                                </svg>
                            </button>
                        </div>
                        <div style="height: 40px; width: 40px">
                            <button onclick="" class="circular-button p-0 d-flex justify-content-center align-items-center">
                                <!-- Log out icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" href="javascript:void(0)" @click="logout">
                                    <path class="svg-background-color" d="M11.991 10.625H1v-1.25h10.991l-1.933-1.933.884-.884 3 3a.624.624 0 0 1 0 .884l-3 3-.884-.884 1.933-1.933ZM15.375 1h-9.75A2.629 2.629 0 0 0 3 3.625v.792h1.25v-.792A1.377 1.377 0 0 1 5.625 2.25h9.75a1.377 1.377 0 0 1 1.375 1.375v12.75a1.377 1.377 0 0 1-1.375 1.375h-9.75a1.377 1.377 0 0 1-1.375-1.375v-.792H3v.792A2.63 2.63 0 0 0 5.625 19h9.75A2.63 2.63 0 0 0 18 16.375V3.625A2.63 2.63 0 0 0 15.375 1Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div style="height: 40px; width: 40px; margin-left: 8px; margin-right: 8px">
                            <!-- Profile picture example -->
                            <li class="circular-button p-0 d-flex justify-content-center align-items-center nav-item dropdown"
                                style="background-color: white">
                                <!-- <img src="https://www.svgrepo.com/show/316857/profile-simple.svg" width="30" height="30" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> -->

                                <Avatar :image="'https://raw.githubusercontent.com/PMDCollab/SpriteCollab/master/portrait/' + numero + '/Normal.png'" class=" nav-link dropdown-toggle p-0 box-40" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" shape="circle" style="background-color: white"/>
                                <!-- <img src="imagen&quot; + valor_js + &quot;.jpg" alt="Tres cosas"> -->


                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><router-link class="dropdown-item" to="/admin">Admin</router-link></li>
                                    <li><router-link to="/admin/posts" class="dropdown-item">Post</router-link></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" @click="logout">Logout</a></li>
                                    <router-link :to="{ name: 'perfil.index' }" class="dropdown-item">Perfil</router-link>
                                </ul>
                            </li>
                        </div>
                    </div>
                </template>


            </div>
        </div>
    </nav>
</template>

<script setup>
import { useStore} from "vuex";
import useAuth from "@/composables/auth";
import {computed, onMounted, ref, inject} from "vue";
import axios from "axios";
import LocaleSwitcher from "../components/LocaleSwitcher.vue";
import { useRouter } from 'vue-router'

    const store = useStore();
    const user = computed(() => store.getters["auth/user"])
    const { processing, logout } = useAuth();
    const numero = ref(0);
    const userId = ref('');
    const swal = inject('$swal')
    const router = useRouter()

    
    onMounted(() => {

    axios.get('/api/id')
    .then(response => {
        userId.value = response.data;
        // Ahora, puedes usar userId en tu solicitud para obtener el avatar
        axios.get('/api/avatar/' + userId.value)
            .then(response => {
                console.log(response.data);
                console.log(userId);
                numero.value = response.data;
            });
    })

    
});
</script>
