<template>
    <nav v-if="user?.name" class="navbar navbar-expand-lg bg-black display-mode-off-dos w-100 header-small bg-color-default" style="z-index: 999999; position: fixed; border-bottom: 1px solid gainsboro">
            <div class="container-fluid d-flex justify-content-between">
                
                <div class="nav-item box-40 d-flex justify-content-center align-items-center " style="margin-left: 8px; margin-right: 8px">
                    <button class="navbar-toggler my-3 d-flex justify-content-center align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                            <path d="M 3 9 A 1.0001 1.0001 0 1 0 3 11 L 47 11 A 1.0001 1.0001 0 1 0 47 9 L 3 9 z M 3 24 A 1.0001 1.0001 0 1 0 3 26 L 47 26 A 1.0001 1.0001 0 1 0 47 24 L 3 24 z M 3 39 A 1.0001 1.0001 0 1 0 3 41 L 47 41 A 1.0001 1.0001 0 1 0 47 39 L 3 39 z"></path>
                        </svg>
                    </button>
                </div>

                <a class="navbar-brand nav-link text-white" href="">
                    <router-link to="/" class="navbar-brand logo">
                        <img src="/images/logo_pelipper_claro.svg" width="153" height="45">
                    </router-link>
                </a>

                <div class="d-flex">
                    <div class="box-40 mx-1">
                        <router-link :to="{name: 'prueba.create'}" class="circular-button p-0 d-flex justify-content-center align-items-center">
                            <!-- Add post icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="fuchsia" class="brand-color">
                                <path class="" d="M19 9.375h-8.375V1h-1.25v8.375H1v1.25h8.375V19h1.25v-8.375H19v-1.25Z"></path>
                            </svg>
                        </router-link>
                    </div>
                    <div class="box-40 m-0 p-0 d-flex justify-content-center align-items-center" style="margin-left: 8px; margin-right: 8px">
                        <!-- Profile picture example -->
                            <router-link :to="{ name: 'perfil.index' }" class="d-flex justify-content-center align-items-center">
                                <Avatar :image="'https://raw.githubusercontent.com/PMDCollab/SpriteCollab/master/portrait/' + numero + '/Normal.png'" class="box-40 m-0 p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" shape="circle" style="border: 1px solid black; border-radius: 90px"/>
                            </router-link>
                    </div>
                </div>

                <div class="collapse navbar-collapse bg-color-default" id="navbarSupportedContent" style="border-bottom: 1px solid gainsboro">
                    <div class="container-fluid border searchbar-dos my-4">
                        <form action="" method="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="none">
                                <path class="svg-background-color" d="M19.5 18.616 14.985 14.1a8.528 8.528 0 1 0-.884.884l4.515 4.515.884-.884ZM1.301 8.553a7.253 7.253 0 1 1 7.252 7.253 7.261 7.261 0 0 1-7.252-7.253Z">
                                </path>
                            </svg>
                            <input type="text" placeholder="Search in..." name="searchbar" class="mx-2" style="background-color: transparent; border: none; outline: none;">
                        </form>
                    </div>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center bg-color-default">
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Home</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Popular</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Most hated</span></button></a></li>
                        <li>
                        <hr class="dropdown-divider">
                        </li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Create post</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Account</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Log out</span></button></a></li>
                        <li>
                        <hr class="dropdown-divider">
                        </li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Dark mode</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100" type="submit"><span>About Pelipper</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100" type="submit"><span>Advertise</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100" type="submit"><span>Help</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100" type="submit"><span>Blog</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100" type="submit"><span>Careers</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100" type="submit"><span>Press</span></button></a></li>
                    </ul>
                </div>
        </div>
    </nav>
    <nav v-if="!user?.name" class="navbar navbar-expand-lg bg-black display-mode-off-dos w-100 header-small bg-color-default" style="z-index: 999999; position: fixed; border-bottom: 1px solid gainsboro">
            <div class="container-fluid d-flex justify-content-between">
                <div style="width: 150px">
                    <div class="nav-item box-40 d-flex justify-content-center align-items-center " style="margin-left: 8px; margin-right: 8px">
                        <button class="navbar-toggler my-3 d-flex justify-content-center align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                                <path d="M 3 9 A 1.0001 1.0001 0 1 0 3 11 L 47 11 A 1.0001 1.0001 0 1 0 47 9 L 3 9 z M 3 24 A 1.0001 1.0001 0 1 0 3 26 L 47 26 A 1.0001 1.0001 0 1 0 47 24 L 3 24 z M 3 39 A 1.0001 1.0001 0 1 0 3 41 L 47 41 A 1.0001 1.0001 0 1 0 47 39 L 3 39 z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div style="width: 150px">
                <a class="navbar-brand nav-link text-white" style="align-self: center;" href="127.0.0.1:8000">
                    <router-link to="/" class="navbar-brand logo">
                        <img src="/images/logo_pelipper_claro.svg" width="153" height="45">
                    </router-link>
                </a>
            </div>
            <div style="width: 150px">
                <div class="d-flex justify-content-end">
                    <div style="height: 40px; width: auto; margin-left: 4px; margin-right: 4px">
                            <button onclick="" class="special-button p-0 d-flex justify-content-center align-items-center nav-item">
                                <!-- Log in button -->
                                <router-link class="nav-a-link" to="/login" style="margin-left: 5px; margin-right: 5px"> Log in </router-link>
                            </button>
                        </div>
                </div>
            </div>

                <div class="collapse navbar-collapse bg-color-default" id="navbarSupportedContent" style="border-bottom: 1px solid gainsboro">
                    <div class="container-fluid border searchbar-dos my-4">
                        <form action="" method="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="none">
                                <path class="svg-background-color" d="M19.5 18.616 14.985 14.1a8.528 8.528 0 1 0-.884.884l4.515 4.515.884-.884ZM1.301 8.553a7.253 7.253 0 1 1 7.252 7.253 7.261 7.261 0 0 1-7.252-7.253Z">
                                </path>
                            </svg>
                            <input type="text" placeholder="Search in..." name="searchbar" class="mx-2" style="background-color: transparent; border: none; outline: none;">
                        </form>
                    </div>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center bg-color-default">
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Home</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Popular</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Most hated</span></button></a></li>
                        <li>
                        <hr class="dropdown-divider">
                        </li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Create post</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>My account</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Log out</span></button></a></li>
                        <li>
                        <hr class="dropdown-divider">
                        </li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100" type="submit"><span>Dark mode</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100" type="submit"><span>About Pelipper</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100" type="submit"><span>Advertise</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100" type="submit"><span>Help</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100" type="submit"><span>Blog</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100" type="submit"><span>Careers</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100" type="submit"><span>Press</span></button></a></li>
                    </ul>
                </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light py-0 header-main-container header-big">
        <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 6dvh; padding-left: 2dvw; padding-right: 2dvw">
            <div class="row header-separator" style="height: 6dvh; width: 98dvw; padding-left: 1dvw; padding-right: 1dvw;">
                <!-- LOGO: Pendiente incluir el H1 y el enlace al logo -->
                <div class="col-2 p-0 container-fluid d-flex flex-row align-items-center m-0" style="height: 57px">
                    <router-link to="/" class="navbar-brand logo h-100 m-0 p-0 d-flex align-items-center">
                        <img src="/images/logo_pelipper_claro.svg" width="153" height="45">
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
                                <router-link class="nav-link" to="/register" style="margin-left: 5px; margin-right: 5px"><span>Sign up</span></router-link>
                            </button>
                        </div>
                        <div style="height: 40px; width: auto; margin-left: 4px; margin-right: 4px">
                            <button onclick="" class="special-button p-0 d-flex justify-content-center align-items-center nav-item">
                                <!-- Log in button -->
                                <router-link class="nav-a-link" to="/login" style="margin-left: 5px; margin-right: 5px"> Log in </router-link>
                            </button>
                        </div>
                        <div class="box-40" style="margin-left: 4px; margin-right: 4px">
                            <button @click="toggleDarkMode" class="circular-button p-0 d-flex justify-content-center align-items-center">
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
                        <div class="box-40">
                            <router-link :to="{name: 'prueba.create'}" class="circular-button p-0 d-flex justify-content-center align-items-center">
                                <!-- Add post icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="fuchsia" class="brand-color">
                                    <path class="" d="M19 9.375h-8.375V1h-1.25v8.375H1v1.25h8.375V19h1.25v-8.375H19v-1.25Z"></path>
                                </svg>
                            </router-link>
                        </div>
                        <div class="box-40">
                            <button @click="toggleDarkMode" class="circular-button p-0 d-flex justify-content-center align-items-center">
                                <!-- Dark mode icon-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path class="svg-background-color"
                                        d="M9.875 19a9.073 9.073 0 0 1-8.48-5.78 1.094 1.094 0 0 1 .247-1.191 1.145 1.145 0 0 1 1.232-.255c1.13.449 2.361.587 3.564.4A6.89 6.89 0 0 0 12.17 6.44a6.806 6.806 0 0 0-.394-3.564 1.148 1.148 0 0 1 .255-1.231 1.1 1.1 0 0 1 1.193-.248 9.082 9.082 0 0 1 5.746 9.254 9.184 9.184 0 0 1-8.32 8.32 11.93 11.93 0 0 1-.775.028Zm-7.206-5.967A7.871 7.871 0 1 0 13.033 2.668 8.116 8.116 0 0 1 2.669 13.033Z" />
                                </svg>
                            </button>
                        </div>
                        <div class="box-40">
                            <button onclick="" class="circular-button p-0 d-flex justify-content-center align-items-center">
                                <!-- Log out icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" href="javascript:void(0)" @click="logout">
                                    <path class="svg-background-color" d="M11.991 10.625H1v-1.25h10.991l-1.933-1.933.884-.884 3 3a.624.624 0 0 1 0 .884l-3 3-.884-.884 1.933-1.933ZM15.375 1h-9.75A2.629 2.629 0 0 0 3 3.625v.792h1.25v-.792A1.377 1.377 0 0 1 5.625 2.25h9.75a1.377 1.377 0 0 1 1.375 1.375v12.75a1.377 1.377 0 0 1-1.375 1.375h-9.75a1.377 1.377 0 0 1-1.375-1.375v-.792H3v.792A2.63 2.63 0 0 0 5.625 19h9.75A2.63 2.63 0 0 0 18 16.375V3.625A2.63 2.63 0 0 0 15.375 1Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="box-40" style="margin-left: 8px; margin-right: 8px">
                            <!-- Profile picture example -->
                            <li class="circular-button p-0 d-flex justify-content-center align-items-center nav-item dropdown">
                                <!-- <img src="https://www.svgrepo.com/show/316857/profile-simple.svg" width="30" height="30" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> -->

                                <Avatar :image="'https://raw.githubusercontent.com/PMDCollab/SpriteCollab/master/portrait/' + user.avatar + '/Normal.png'" class=" nav-link dropdown-toggle p-0 box-40" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" shape="circle" style="background-color: white; border: 1px solid black; border-radius: 90px"/>
                                <!-- <img src="imagen&quot; + valor_js + &quot;.jpg" alt="Tres cosas"> -->


                                <ul class="dropdown-menu dropdown-menu-end user-dropdown">
                                    <li><router-link class="dropdown-item user-dropdown-text" to="/admin">Admin</router-link></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><router-link :to="{ name: 'post.usuario', params: { id: user.id, avatar:user.avatar, nombre:user.name  } }" class="dropdown-item user-dropdown-text">Mis Posts</router-link></li>
                                    <li><router-link :to="{ name: 'perfil.index' }" class="dropdown-item user-dropdown-text">Perfil</router-link></li>
                                    <li><a class="dropdown-item user-dropdown-text" href="javascript:void(0)" @click="logout">Logout</a></li>
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
import { useRouter } from 'vue-router';

    const store = useStore();
    const user = computed(() => store.getters["auth/user"])
    const { processing, logout } = useAuth();
    const userId = ref('');
    const swal = inject('$swal')
    const router = useRouter()

    // const test = () => {
    //     console.log('hola')
    // }

    const toggleDarkMode = () => {
    var element = document.body;
    var modeToggleBtn = document.querySelector('button');
    
    // Toggle dark mode class
    element.classList.toggle("dark-mode");

    // Update button text and localStorage
    if (element.classList.contains("dark-mode")) {
        localStorage.setItem('darkModeEnabled', 'true');
    } else {
        localStorage.removeItem('darkModeEnabled');
    }
}

// Check if dark mode is enabled on page load
window.onload = function() {
    var darkModeEnabled = localStorage.getItem('darkModeEnabled');
    if (darkModeEnabled === 'true') {
        document.body.classList.add("dark-mode");
    }
};

    
    onMounted(() => {
    
    });


</script>
