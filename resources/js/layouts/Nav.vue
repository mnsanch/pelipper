<template>
    <nav v-if="user?.name" class="row navbar navbar-expand-lg bg-black display-mode-off-dos w-100 header-small bg-color-default main-nav-header">
            <div class="container-fluid d-flex justify-content-between">
                
                <div class="nav-item box-40 d-flex justify-content-center align-items-center mx-8px">
                    <button class="navbar-toggler my-3 d-flex justify-content-center align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                            <path d="M 3 9 A 1.0001 1.0001 0 1 0 3 11 L 47 11 A 1.0001 1.0001 0 1 0 47 9 L 3 9 z M 3 24 A 1.0001 1.0001 0 1 0 3 26 L 47 26 A 1.0001 1.0001 0 1 0 47 24 L 3 24 z M 3 39 A 1.0001 1.0001 0 1 0 3 41 L 47 41 A 1.0001 1.0001 0 1 0 47 39 L 3 39 z"></path>
                        </svg>
                    </button>
                </div>

                <a class="navbar-brand nav-link text-white" href="">
                    <router-link to="/" class="m-0 py-0">
                        <div class="header-logo-pelipper"></div>
                        <!-- <img src="/images/logo_pelipper_claro.svg" width="153" height="45"> -->
                    </router-link>
                </a>

                <div class="d-flex">
                    <div class="box-40 mx-1">
                        <router-link :to="{name: 'posts.create'}" class="circular-button p-0 d-flex justify-content-center align-items-center">
                            <!-- Add post icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="fuchsia" class="brand-color">
                                <path class="" d="M19 9.375h-8.375V1h-1.25v8.375H1v1.25h8.375V19h1.25v-8.375H19v-1.25Z"></path>
                            </svg>
                        </router-link>
                    </div>
                    <div class="box-40 m-0 p-0 d-flex justify-content-center align-items-center mx-8px">
                        <!-- Profile picture example -->
                        <li class="circular-button p-0 d-flex justify-content-center align-items-center nav-item dropdown">
                                <!-- <img src="https://www.svgrepo.com/show/316857/profile-simple.svg" width="30" height="30" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> -->

                                <Avatar :image="'https://raw.githubusercontent.com/PMDCollab/SpriteCollab/master/portrait/' + usuario.avatar + '/Normal.png'" class=" nav-link dropdown-toggle p-0 box-40 avatar-header-circle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" shape="circle"/>
                                <!-- <img src="imagen&quot; + valor_js + &quot;.jpg" alt="Tres cosas"> -->


                                <ul class="dropdown-menu dropdown-menu-end user-dropdown">
                                    <div v-for="roles in user.roles">
                                        <li v-if="roles.name=='admin'"><router-link class="dropdown-item user-dropdown-text" to="/admin">Admin</router-link></li>
                                        <li v-if="roles.name=='admin'"><hr class="dropdown-divider"></li>
                                    </div>
                                    <li><router-link :to="{ name: 'post.usuario', params: { id: usuario.id, avatar:usuario.avatar, nombre:usuario.name  } }" class="dropdown-item user-dropdown-text">Mis Posts</router-link></li>
                                    <li><router-link :to="{ name: 'perfil.index' }" class="dropdown-item user-dropdown-text">Perfil</router-link></li>
                                    <li><a class="dropdown-item user-dropdown-text" href="javascript:void(0)" @click="logout">Logout</a></li>
                                </ul>
                            </li>
                    </div>
                </div>

                <div class="collapse navbar-collapse bg-color-default w-100" id="navbarSupportedContent">
                    <div class="container-fluid border searchbar-dos my-4">
                        <form action="" method="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="none">
                                <path class="svg-background-color" d="M19.5 18.616 14.985 14.1a8.528 8.528 0 1 0-.884.884l4.515 4.515.884-.884ZM1.301 8.553a7.253 7.253 0 1 1 7.252 7.253 7.261 7.261 0 0 1-7.252-7.253Z">
                                </path>
                            </svg>
                            <input type="text" placeholder="Search in..." name="searchbar" class="mx-2 search-input">
                        </form>
                    </div>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center bg-color-default w-100">
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100"><span>Home</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100"><span>Popular</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100"><span>Most hated</span></button></a></li>
                        <li>
                        <hr class="dropdown-divider">
                        </li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100"><span>Create post</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100"><span>Account</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100"><span>Log out</span></button></a></li>
                        <li>
                        <hr class="dropdown-divider">
                        </li>
                        <li class="nav-item"><button @click="toggleDarkMode"class="btn text-white header-menu-link w-100"><span>Dark mode</span></button></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100"><span>About Pelipper</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100"><span>Advertise</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100"><span>Help</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100"><span>Blog</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100"><span>Careers</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100"><span>Press</span></button></a></li>
                    </ul>
                </div>
        </div>
    </nav>
    <nav v-if="!user?.name" class="navbar navbar-expand-lg bg-black display-mode-off-dos w-100 header-small bg-color-default main-nav-header">
            <div class="container-fluid d-flex justify-content-between">
                <div class="m-0 p-0 w-fit-content">
                    <div class="nav-item box-40 d-flex justify-content-center align-items-center mx-8px">
                        <button class="navbar-toggler my-3 d-flex justify-content-center align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                                <path d="M 3 9 A 1.0001 1.0001 0 1 0 3 11 L 47 11 A 1.0001 1.0001 0 1 0 47 9 L 3 9 z M 3 24 A 1.0001 1.0001 0 1 0 3 26 L 47 26 A 1.0001 1.0001 0 1 0 47 24 L 3 24 z M 3 39 A 1.0001 1.0001 0 1 0 3 41 L 47 41 A 1.0001 1.0001 0 1 0 47 39 L 3 39 z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="m-0 p-0 w-fit-content">
                <a class="navbar-brand nav-link text-white align-selfcenter" href="127.0.0.1:8000">
                    <router-link to="/" class="navbar-brand logo">
                        <div class="header-logo-pelipper"></div>
                        <!-- <img src="/images/logo_pelipper_claro.svg" width="153" height="45"> -->
                    </router-link>
                </a>
                </div>
                <div class="m-0 p-0 w-fit-content">
                <div class="d-flex justify-content-end">
                    <div class="loginbutton-container">
                            <button onclick="" class="special-button p-0 d-flex justify-content-center align-items-center nav-item">
                                <!-- Log in button -->
                                <router-link class="nav-a-link mx-5px" to="/login"> Log in </router-link>
                            </button>
                        </div>
                </div>
            </div>

                <div class="collapse navbar-collapse bg-color-default w-100 border-bottom-gainsboro" id="navbarSupportedContent">
                    <div class="container-fluid border searchbar-dos mt-4 p-0 mx-0 mb-0 w-100 ">
                        <form action="" method="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="none">
                                <path class="svg-background-color" d="M19.5 18.616 14.985 14.1a8.528 8.528 0 1 0-.884.884l4.515 4.515.884-.884ZM1.301 8.553a7.253 7.253 0 1 1 7.252 7.253 7.261 7.261 0 0 1-7.252-7.253Z">
                                </path>
                            </svg>
                            <input type="text" placeholder="Search in..." name="searchbar" class="mx-2 search-input">
                        </form>
                    </div>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center bg-color-default w-100">
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100"><span>Home</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100"><span>Popular</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100"><span>Most hated</span></button></a></li>
                        <li>
                        <hr class="dropdown-divider">
                        </li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100"><span>Create post</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100"><span>My account</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href=""><button class="btn text-white header-menu-link w-100"><span>Log out</span></button></a></li>
                        <li>
                        <hr class="dropdown-divider">
                        </li>
                        <li class="nav-item"><button @click="toggleDarkMode"class="btn text-white header-menu-link w-100"><span>Dark mode</span></button></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100"><span>About Pelipper</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100"><span>Advertise</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100"><span>Help</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100"><span>Blog</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100"><span>Careers</span></button></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"><button class="btn text-white header-menu-link w-100"><span>Press</span></button></a></li>
                    </ul>
                </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light py-0 header-main-container header-big">
        <div class="container-fluid d-flex justify-content-center align-items-center header-submain-container">
            <div class="row header-separator nav-row-mid">
                <!-- LOGO: Pendiente incluir el H1 y el enlace al logo -->
                <div class="col-2 p-0 container-fluid d-flex flex-row align-items-center m-0 h-57px">
                    <router-link to="/" class="navbar-brand logo h-100 m-0 p-0 d-flex align-items-center">
                        <div class="header-logo-pelipper"></div>
                        <!-- <img src="/images/logo_pelipper_claro.svg" width="153" height="45"> -->
                    </router-link>
                </div>
                <!-- <ul class="col-1 navbar-nav mt-2 mt-lg-0 me-auto mb-2 mb-lg-0">
                    <LocaleSwitcher />
                </ul> -->
                <!-- SEARCHBAR -->
                <div class="col-6 p-0 container-fluid d-flex flex-row align-items-center h-6dvh" id="searchContainer">
                    <div class="container-fluid d-flex flex-row align-items-center searchbar">
                        <form action="" method="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 20 20" fill="none">
                                <path class="svg-background-color" d="M19.5 18.616 14.985 14.1a8.528 8.528 0 1 0-.884.884l4.515 4.515.884-.884ZM1.301 8.553a7.253 7.253 0 1 1 7.252 7.253 7.261 7.261 0 0 1-7.252-7.253Z">
                                </path>
                            </svg>
                            <input type="text" placeholder="Search in..." name="searchbar" class="search-input">
                        </form>
                    </div>
                </div>
                <template v-if="!usuario?.name">
                    <div class="col-3 p-0 d-flex flex-row justify-content-end align-items-center px-8px">
                        <div class="signinbutton-container">
                            <button class="simple-button p-0 d-flex justify-content-center align-items-center nav-item">
                                <router-link class="nav-link mx-5px" to="/register"><span>Sign up</span></router-link>
                            </button>
                        </div>
                        <div class="loginbutton-container">
                            <button onclick="" class="special-button p-0 d-flex justify-content-center align-items-center nav-item">
                                <!-- Log in button -->
                                <router-link class="nav-a-link mx-5px" to="/login"> Log in </router-link>
                            </button>
                        </div>
                        <div class="box-40 mx-4px" >
                            <button @click="toggleDarkMode" class="circular-button p-0 d-flex justify-content-center align-items-center">
                                <!-- Dark mode icon-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path class="svg-background-color" d="M9.875 19a9.073 9.073 0 0 1-8.48-5.78 1.094 1.094 0 0 1 .247-1.191 1.145 1.145 0 0 1 1.232-.255c1.13.449 2.361.587 3.564.4A6.89 6.89 0 0 0 12.17 6.44a6.806 6.806 0 0 0-.394-3.564 1.148 1.148 0 0 1 .255-1.231 1.1 1.1 0 0 1 1.193-.248 9.082 9.082 0 0 1 5.746 9.254 9.184 9.184 0 0 1-8.32 8.32 11.93 11.93 0 0 1-.775.028Zm-7.206-5.967A7.871 7.871 0 1 0 13.033 2.668 8.116 8.116 0 0 1 2.669 13.033Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </template>
                <template v-if="usuario?.name" class="nav-item dropdown">
                    <div class="col-3 p-0 d-flex flex-row justify-content-end align-items-center px-8px">
                        <div class="box-40">
                            <router-link :to="{name: 'posts.create'}" class="circular-button p-0 d-flex justify-content-center align-items-center">
                                <!-- Add post icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="fuchsia" class="brand-color">
                                    <path class="" d="M19 9.375h-8.375V1h-1.25v8.375H1v1.25h8.375V19h1.25v-8.375H19v-1.25Z"></path>
                                </svg>
                            </router-link>
                        </div>
                        <div class="box-40">
                            <router-link :to="{name: 'chat.index'}" class="circular-button p-0 d-flex justify-content-center align-items-center"> <!--:to="{name: 'chat', params: '{ id: route.params.id }' }"-->
                                <!-- Chat icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path class="svg-background-color" d="M11.61 19.872a10.013 10.013 0 0 0 6.51-4.035A9.999 9.999 0 0 0 12.275.264c-1.28-.3-2.606-.345-3.903-.132a10.05 10.05 0 0 0-8.25 8.311 9.877 9.877 0 0 0 1.202 6.491l-1.24 4.078a.727.727 0 0 0 .178.721.72.72 0 0 0 .72.19l4.17-1.193A9.87 9.87 0 0 0 9.998 20c.54 0 1.079-.043 1.612-.128ZM1.558 18.458l1.118-3.69-.145-.24A8.647 8.647 0 0 1 1.36 8.634a8.778 8.778 0 0 1 7.21-7.27 8.765 8.765 0 0 1 8.916 3.995 8.748 8.748 0 0 1-2.849 12.09 8.763 8.763 0 0 1-3.22 1.188 8.68 8.68 0 0 1-5.862-1.118l-.232-.138-3.764 1.076ZM6.006 9a1.001 1.001 0 0 0-.708 1.707A1 1 0 1 0 6.006 9Zm4.002 0a1.001 1.001 0 0 0-.195 1.981 1 1 0 1 0 .195-1.98Zm4.003 0a1.001 1.001 0 1 0 0 2.003 1.001 1.001 0 0 0 0-2.003Z"></path>
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
                        <div class="box-40 mx-8px">
                            <!-- Profile picture example -->
                            <li class="circular-button p-0 d-flex justify-content-center align-items-center nav-item dropdown">
                                <!-- <img src="https://www.svgrepo.com/show/316857/profile-simple.svg" width="30" height="30" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> -->

                                <Avatar :image="'https://raw.githubusercontent.com/PMDCollab/SpriteCollab/master/portrait/' + usuario.avatar + '/Normal.png'" class=" nav-link dropdown-toggle p-0 box-40 avatar-header-circle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" shape="circle"/>
                                <!-- <img src="imagen&quot; + valor_js + &quot;.jpg" alt="Tres cosas"> -->


                                <ul class="dropdown-menu dropdown-menu-end user-dropdown">
                                    <div v-for="roles in user.roles">
                                        <li v-if="roles.name=='admin'"><router-link class="dropdown-item user-dropdown-text" to="/admin">Admin</router-link></li>
                                        <li v-if="roles.name=='admin'"><hr class="dropdown-divider"></li>
                                    </div>
                                    <li><router-link :to="{ name: 'post.usuario', params: { id: usuario.id, avatar:usuario.avatar, nombre:usuario.name  } }" class="dropdown-item user-dropdown-text">Mis Posts</router-link></li>
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
import useUsers from "@/composables/users";
import {computed, onMounted, ref, inject} from "vue";
import axios from "axios";
import LocaleSwitcher from "../components/LocaleSwitcher.vue";
import { useRouter } from 'vue-router';

    const store = useStore();
    const usuario = computed(() => store.getters["auth/user"])
    const { processing, logout } = useAuth();
    const { user, getUserhome } = useUsers();
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
        console.log(usuario.id)
        getUserhome()
    });


</script>
