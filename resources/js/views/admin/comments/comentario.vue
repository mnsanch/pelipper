<template>

    <body>
    
    <br>
    
    <div class="home-main-container mt-78px">

    
        <!-- Menú lateral izquierdo -->
        <aside class="aside-main-left block-disapear">
        <div class="block-disapear aside-container-left">
            <!-- Aquí va el menú izquierdo -->
            <ul class="block-disapear aside-ul-container-left">
                <router-link :to="{ name: 'home' }" class="d-flex align-items-center aside-menu-nav-element-marked pointer-custom">
                    <svg rpl="" fill="currentColor" height="20" icon-name="home-outline" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg" class="position-absolute">
                            <path d="m17.71 8.549 1.244.832v8.523a1.05 1.05 0 0 1-1.052 1.046H12.73a.707.707 0 0 1-.708-.707v-4.507c0-.76-1.142-1.474-2.026-1.474-.884 0-2.026.714-2.026 1.474v4.507a.71.71 0 0 1-.703.707H2.098a1.046 1.046 0 0 1-1.052-1.043V9.381l1.244-.835v9.158h4.44v-3.968c0-1.533 1.758-2.72 3.27-2.72s3.27 1.187 3.27 2.72v3.968h4.44V8.549Zm2.04-1.784L10.646.655a1.12 1.12 0 0 0-1.28-.008L.25 6.765l.696 1.036L10 1.721l9.054 6.08.696-1.036Z"></path>
                        </svg>
                        <li class="aside-list-element ">Home</li>
                </router-link>
                <router-link :to="{ name: 'homepopular' }" class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="position-absolute">
                        <path d="M10 0a10 10 0 1 0 10 10A10.01 10.01 0 0 0 10 0Zm0 18.75a8.7 8.7 0 0 1-5.721-2.145l8.471-8.471v4.148H14V6.638A.647.647 0 0 0 13.362 6H7.718v1.25h4.148L3.4 15.721A8.739 8.739 0 1 1 10 18.75Z"></path>
                    </svg>
                    <li class="aside-list-element ">Popular</li>
                </router-link>
                <router-link :to="{ name: 'homehated' }" class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <svg rpl="" fill="currentColor" width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" transform="matrix(-1,0,0,1,0,0)" class="position-absolute">
                        <path d="M10 0a10 10 0 1 0 10 10A10.01 10.01 0 0 0 10 0Zm5 17.171V6h-1.25v11.894a8.66 8.66 0 0 1-2.75.794V10H9.75v8.737A8.684 8.684 0 0 1 6.47 18H7v-4H5.75v3.642a8.753 8.753 0 1 1 9.25-.471Z"></path>
                    </svg>
                    <li class="aside-list-element ">Most hated</li>
                </router-link>
                <hr>
                <li class="aside-title">CATEGORIES</li>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <img src="/images/riot_logo.png" class="m-0 p-0 community-icon">
                    <li class="aside-list-c-element">riot</li>
                </div>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <img src="/images/memes_logo.jpg" class="m-0 p-0 community-icon">
                    <li class="aside-list-c-element">memes</li>
                </div>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <img src="/images/warcraft_logo.jpg" class="m-0 p-0 community-icon">
                    <li class="aside-list-c-element">warcraft</li>
                </div>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <img src="/images/twitch_logo.png" class="m-0 p-0 community-icon">
                    <li class="aside-list-c-element">twitch</li>
                </div>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <img src="/images/programming_logo.png" class="m-0 p-0 community-icon">
                    <li class="aside-list-c-element">programming</li>
                </div>
                <hr>
                <li class="aside-title">RESOURCES</li>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <div class="py-0 my-0 position-absolute aside-logo-pelipper"></div>
                    <li class="aside-list-element ">About Pelipper</li>
                </div>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg" class="position-absolute">
                        <path d="M15.175 13.11c-.237.462-.428.6-.514.627l-.133-.035c-.439-.238-1.278-2.03-1.278-5.2 0-2.95.729-4.718 1.184-5.144l.245-.087c.095.042.276.192.5.62l.284.556 1.113-.57-.285-.556c-.541-1.057-1.17-1.3-1.618-1.316h-.044a1.4 1.4 0 0 0-.754.23L3.7 5.852c-.915-.552-1.847-.991-2.61-.58C.237 5.735.044 6.98 0 9c.047 2 .24 3.245 1.093 3.7.783.423 1.754-.06 2.7-.637.288.1.685.218 1.224.37v4.347a1.122 1.122 0 0 0 1.121 1.12h2.75a1.123 1.123 0 0 0 1.122-1.12v-3l4.028 1.075c.183.088.384.134.587.135.45 0 1.1-.23 1.661-1.32l.285-.555-1.113-.57-.283.566Zm-11.882-2.2c-1.247.782-1.546.734-1.607.7C1.6 11.56 1.3 11.229 1.25 9c.049-2.25.345-2.582.434-2.63.064-.033.361-.081 1.61.7a.624.624 0 0 0 .54.058l8.838-3.146A13.9 13.9 0 0 0 12 8.5c-.034 1.608.221 3.21.754 4.728L3.79 10.834a.622.622 0 0 0-.497.073v.004Zm2.97 5.753v-3.877c.678.184 1.507.405 2.5.67v3.2l-2.5.007ZM19.25 8v1.25H16V8h3.25Zm-3.477-2.674 2.82-1.594.615 1.088-2.819 1.594-.616-1.088Zm.616 5.26 2.819 1.594-.615 1.088-2.82-1.594.616-1.088Z"></path>
                    </svg>
                    <li class="aside-list-element ">Advertise</li>
                </div>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg" class="position-absolute">
                        <path d="M10 20a10 10 0 1 1 10-10 10.011 10.011 0 0 1-10 10Zm0-18.75A8.75 8.75 0 1 0 18.75 10 8.76 8.76 0 0 0 10 1.25Zm1.611 4.058a2.4 2.4 0 0 1 .994.861c.241.375.366.812.359 1.258a2.04 2.04 0 0 1-.167.854c-.1.229-.238.439-.407.622-.2.208-.413.404-.636.588-.223.188-.4.348-.533.483a1.754 1.754 0 0 0-.328.464 1.326 1.326 0 0 0-.13.591v.78H9.328v-.759a2.216 2.216 0 0 1 .601-1.572c.204-.21.421-.406.65-.588.209-.173.373-.316.492-.431a1.52 1.52 0 0 0 .3-.4 1.154 1.154 0 0 0-.058-1.128 1.192 1.192 0 0 0-.485-.421 1.525 1.525 0 0 0-.677-.151 1.545 1.545 0 0 0-.721.168 1.3 1.3 0 0 0-.713 1.131H7.256a2.628 2.628 0 0 1 1.381-2.293A3.132 3.132 0 0 1 10.175 5c.496-.008.987.097 1.436.308Zm-2.164 9.843a1.088 1.088 0 0 1-.386-.385 1.034 1.034 0 0 1-.144-.537c-.002-.186.048-.37.144-.53.094-.16.227-.293.386-.387a1.03 1.03 0 0 1 .53-.143 1.062 1.062 0 0 1 .926 1.597c-.096.159-.23.291-.389.385a1.034 1.034 0 0 1-.537.144 1.021 1.021 0 0 1-.53-.144Z"></path>
                    </svg>
                    <li class="aside-list-element ">Help</li>
                </div>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg" class="position-absolute">
                        <path d="M19.375 2h-7.292A2.688 2.688 0 0 0 10 3a2.688 2.688 0 0 0-2.083-1H.625A.625.625 0 0 0 0 2.625v14.75A.625.625 0 0 0 .625 18h7.917v-1.25H1.25V3.25h6.667a1.465 1.465 0 0 1 1.458 1.469v11.093h1.25V4.719a1.465 1.465 0 0 1 1.458-1.469h6.667v13.5h-6.667a2.64 2.64 0 0 0-2.708 2.625V20h1.25v-.625A1.388 1.388 0 0 1 12.083 18h7.292a.624.624 0 0 0 .625-.625V2.625A.625.625 0 0 0 19.375 2Z"></path>
                    </svg>
                    <li class="aside-list-element ">Blog</li>
                </div>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg" class="position-absolute">
                        <path d="M9.784 12.331a7 7 0 0 0 1.165.6l-6.174 6.178a2.747 2.747 0 0 1-3.883-3.884l6.18-6.181c.162.409.362.8.6 1.171l-5.897 5.894a1.5 1.5 0 0 0 0 2.116 1.533 1.533 0 0 0 2.118 0l5.891-5.894Zm4.481-.309a5.7 5.7 0 0 0 4.671-3.953 5.372 5.372 0 0 0-.1-3.538 1.116 1.116 0 0 0-.813-.7 1.127 1.127 0 0 0-1.039.305L14.118 7A.807.807 0 0 1 13 7a.79.79 0 0 1 0-1.116l2.864-2.863a1.127 1.127 0 0 0 .3-1.04 1.112 1.112 0 0 0-.7-.812 5.363 5.363 0 0 0-3.539-.1 5.7 5.7 0 0 0-3.946 4.666 5.627 5.627 0 0 0 6.287 6.287Zm.58-9.75L12.117 5a2.043 2.043 0 0 0 0 2.884 2.088 2.088 0 0 0 2.883 0l2.727-2.726c.271.825.276 1.714.013 2.542a4.432 4.432 0 0 1-3.628 3.079A4.377 4.377 0 0 1 9.22 5.887a4.429 4.429 0 0 1 4.342-3.822c.437 0 .87.07 1.284.207Z"></path>
                    </svg>
                    <li class="aside-list-element ">Careers</li>
                </div>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg" class="position-absolute">
                        <path d="M15.128 0a4.78 4.78 0 0 0-4.774 4.774c.007.214.029.427.065.638l-.137-.138a1.143 1.143 0 0 0-1.719.126L.461 16.2a2.315 2.315 0 0 0 3.241 3.24l10.8-8.1a1.14 1.14 0 0 0 .122-1.718l-.138-.138c.212.036.426.058.64.065a4.773 4.773 0 1 0 0-9.547L15.128 0ZM2.955 18.445a1.07 1.07 0 0 1-1.5-1.5L9.487 6.239l4.175 4.176-10.707 8.03ZM15.128 8.3a3.53 3.53 0 1 1 0-7.06 3.53 3.53 0 0 1 0 7.06Zm-7.186 2.78L10.018 9l.88.88-2.077 2.08-.879-.88Z"></path>
                    </svg>
                    <li class="aside-list-element ">Press</li>
                </div>
                <hr>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg" class="position-absolute">
                        <path d="M19.375 1H18.25V0H17v1h-1.375a.625.625 0 0 0-.625.625V3H5V1.625A.625.625 0 0 0 4.375 1H3.25V0H2v1H.625A.625.625 0 0 0 0 1.625v16.75A.625.625 0 0 0 .625 19H2v1h1.25v-1h1.125A.625.625 0 0 0 5 18.375V17h10v1.375a.624.624 0 0 0 .625.625H17v1h1.25v-1h1.125a.624.624 0 0 0 .625-.625V1.625A.625.625 0 0 0 19.375 1ZM3.75 17.75h-2.5V2.25h2.5v15.5Zm1.25-2V4.25h10v11.5H5Zm13.75 2h-2.5V2.25h2.5v15.5ZM7.782 7.025h4.436v1.25H7.782v-1.25Zm0 4h4.436v1.25H7.782v-1.25Z"></path>
                    </svg>
                    <li class="aside-list-element ">Content Policy</li>
                </div>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg" class="position-absolute">
                        <path d="M2.3 8.625 3.621 5.31l1.324 3.315h1.346L4.256 3.53a1.37 1.37 0 0 1 1.362-1.28h8.764a1.37 1.37 0 0 1 1.362 1.28l-2.035 5.1h1.346l1.324-3.32L17.7 8.625h1.346l-2.061-5.16A2.62 2.62 0 0 0 14.382 1H5.618a2.62 2.62 0 0 0-2.606 2.465L.951 8.625H2.3Z"></path><path d="M6.617 10H.625a.625.625 0 0 0-.625.625 3.62 3.62 0 1 0 7.242 0A.625.625 0 0 0 6.617 10Zm-3 3a2.376 2.376 0 0 1-2.288-1.75h4.58A2.376 2.376 0 0 1 3.621 13h-.004Z"></path><path d="M19.375 10h-5.992a.624.624 0 0 0-.625.625 3.622 3.622 0 0 0 6.966 1.386c.182-.44.276-.91.276-1.386a.624.624 0 0 0-.625-.625Zm-3 3a2.376 2.376 0 0 1-2.288-1.75h4.576A2.375 2.375 0 0 1 16.379 13h-.004Z"></path><path d="M10.625 5h-1.25v12.7H6.479v1.25h7.042V17.7h-2.896V5Z"></path>
                    </svg>
                    <li class="aside-list-element ">Privacy Policy</li>
                </div>
                <div class="d-flex align-items-center aside-menu-nav-element pointer-custom">
                    <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg" class="position-absolute">
                        <path d="M7.35 7.333H5.733V6.77h.48V5.23a1.232 1.232 0 0 1-.47.111v-.507c.178.01.353-.05.487-.167h.7v2.1h.419l.003.566Zm-.767 1.92c.164 0 .258.082.258.23 0 .22-.115.276-.516.522-.7.422-.768.806-.768 1.185v.143h1.975v-.564H6.374c.039-.106.149-.236.483-.424.538-.29.659-.581.659-.878 0-.488-.3-.8-.916-.8a1.171 1.171 0 0 0-1.05.633l.479.345a.708.708 0 0 1 .554-.392Zm.536 4.66a.544.544 0 0 0 .383-.545c0-.438-.313-.7-.9-.7a1.435 1.435 0 0 0-1.01.4l.369.427a.824.824 0 0 1 .588-.26c.178 0 .275.081.275.211 0 .156-.1.253-.448.253h-.218v.482h.205c.356 0 .507.086.507.307 0 .162-.1.28-.383.28a.7.7 0 0 1-.566-.334L5.5 14.8a1.22 1.22 0 0 0 1.047.529c.626 0 1.036-.286 1.036-.826a.581.581 0 0 0-.464-.59Zm1.88-3.288h6v-1.25H9v1.25Zm0 4h6v-1.25H9v1.25Zm0-8h6v-1.25H9v1.25Zm9-5.014v17.271A1.123 1.123 0 0 1 16.876 20h-12.7a1.123 1.123 0 0 1-1.125-1.118V4.25h-.875A1.127 1.127 0 0 1 1.05 3.125v-1.5A1.627 1.627 0 0 1 2.675 0h13.7A1.62 1.62 0 0 1 18 1.611ZM2.3 3h.75V1.625a.375.375 0 0 0-.75 0V3Zm14.45-1.389a.369.369 0 0 0-.374-.361H4.252a1.6 1.6 0 0 1 .048.375V18.75h12.45V1.611Z"></path>
                    </svg>
                    <li class="aside-list-element ">User Agreement</li>
                </div>
            
                <div class="aside-copyright">
                    <span>Pelipper © 2024. All rights reserved.</span>
                </div>
            </ul>
        </div>
    </aside>
    
        <!-- Mid container -->
        <div class="container p-0 block-expand home-mid-main-container">
    
            <!-- Banner principal -->
            <div class="row p-0 m-0 home-banner-container">
                <div class="row justify-content-end p-0 m-0">
                    <div class="home-banner-element-a">
                        <p></p>
                        <!-- <img src="/images/main_banner_pelipper.svg" class="home-banner-element-a w-100"> -->
                    </div>
                </div>
                <div class="row p-0 m-0 home-banner-subcontainer">
                    <div class="col-1 m-0 home-banner-element-b">
                        <!-- <div class="px-2 mx-4 home-banner-element-c"></div> -->
                        <img src="/images/logo_pelipper_banner.PNG" class="mx-4 home-banner-element-c">
                    </div>
                    <div class="col mx-2">
                        <h2 class="h1 fw-bold py-0 my-0 mx-2 pl-10 font-bold bg-gradient-to-r shine text-transparent bg-clip-text">pelipper community</h2>
                    </div>
                </div>
            </div>
    
    
    
    
    
            <div class="row p-0 mx-0 my-5">
                <main class="col-9 home-main-snippet">
                    <!-- Contenido central -->
                    <div class="m-0 p-0 w-100 h-100">
                        <div class="post-container">
                        <!-- User data -->
                        <div class="d-flex align-items-center post-user-data">
                            <div class="p-0 avatar-image">  
                                <Avatar :image="'https://raw.githubusercontent.com/PMDCollab/SpriteCollab/master/portrait/' + post.Avatar + '/Normal.png'" class="nav-link dropdown-toggle post-profile-picture p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" shape="circle" @click="avatrlink(post.ID_User,post.Avatar,post.Usuario)"/>
                            </div>
                            <span  class="mx-2 post-user-data pointer-custom" @click="avatrlink(post.ID_User,post.Avatar,post.Usuario)">{{post.Usuario}}</span>
                            <span class="post-user-data-separator"> · </span>
                            <span v-for="category in post.ID_Category" class="mx-2 post-user-data post-category">{{ category.Category_Name }}</span>
                            <span class="post-user-data-separator"> · </span>
                            <span class="mx-2 post-user-data">{{post.created_at}}</span>
                        </div>

                        <!-- Post content -->
                        <div class="h-fit-content">
                            <h3 class="post-title block-disapear">{{post.Title}}</h3>
                            <p class="post-context">{{post.Post}}</p>
                            <div class="px-0 d-flex align-items-center justify-content-center post-original-image"  v-if="(post.original_image!=null)"> 
                                <img :src='post.original_image'>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row">
                        </div>
                    </div>
                    <form @submit.prevent="submitForm">
                        <div class="mt-3 mb-3">
                            <textarea v-model="comentario.Comment" id="post-Comment" type="text" class="form-control createpost-input h-100px" placeholder="Say something!"></textarea> 
                            <div class="text-danger mt-1">
                                {{ errors.Comment }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.Comment">
                                    {{ message }}
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="simple-button">Publish</button>
                        </div>
                    </form>
                    </div>

                    <div class="m-0 p-0 w-100 h-100" v-for="comment in comments.data">
                        <div class="comment my-3">
                            <div>
                                <div v-if="comment.ID_User==user.id" @click="deleteComment(comment.id, route.params.id)">
                                    <div class="d-flex justify-content-center align-items-center delete-comment-button pointer-custom">x</div>
                                </div>
                                <div class="comment-info d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div>                                           
                                            <div class="p-0 avatar-image">  
                                                <Avatar :image="'https://raw.githubusercontent.com/PMDCollab/SpriteCollab/master/portrait/' + comment.user.avatar + '/Normal.png'" class="nav-link dropdown-toggle post-profile-picture p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" shape="circle" @click="avatrlink(comment.ID_User,comment.user.avatar, comment.user.name)"/>
                                            </div>
                                        </div>
                                        <router-link :to="{ name: 'post.usuario', params: { id: comment.ID_User, avatar: comment.user.avatar, nombre:comment.user.name } }">
                                            <p class="my-0 mx-2 p-0">{{ comment.user.name }}</p>
                                        </router-link>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="m-0 p-0">23/04/2024</p>
                                    </div>
                                </div>
                                <hr>
                                <p class="comment-context">{{ comment.Comment }}</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </main>
    
                <aside class="col-3 px-0 mx-0 sticky-aside block-disapear aside-container-right">
                    <div class="right-aside-container-bg aside-container-right">
                        <ul class="m-0 aside-ul-container-right">
                            <li class="scoreboard-title">TOP MONTHLY USERS</li>
                            <li class="scoreboard-top-users">#1 <span class="px-2">Panda2000</span></li>
                            <li class="scoreboard-top-users">#2 <span class="px-2">Davido</span></li>
                            <li class="scoreboard-top-users">#3 <span class="px-2">CuteFatDuck</span></li>
                            <li class="scoreboard-users">#4 <span class="px-2">alansitooo</span></li>
                            <li class="scoreboard-users">#5 <span class="px-2">Sucralosa01</span></li>
                            <li class="scoreboard-users">#6 <span class="px-2">DwightSchrute</span></li>
                            <li class="scoreboard-users">#7 <span class="px-2">Pepitogrillo</span></li>
                            <li class="scoreboard-users">#8 <span class="px-2">wake_up_samurai</span></li>
                            <li class="scoreboard-users">#9 <span class="px-2">anonymouse</span></li>
                            <li class="scoreboard-users">#10 <span class="px-2">xXxGoku666xXx</span></li>
                        </ul>
                    </div>
                    <br>
                    <div class="right-aside-container-bg aside-container-right">
                        <ul class="m-0 aside-ul-container-right">
                            <li class="guidelines-title">OFFICIAL GUIDELINES</li>
                            <li class="guidelines-text">The rules of Pelipper include no harassing, no spamming, no posting illegal content, no sharing personal information without consent, and respecting copyright.</li>
                            <li class="guidelines-text">Users are expected to follow the rules.</li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    </body>
</template>
<style>
</style>
<script setup>
    import {onMounted,reactive, ref, computed} from "vue";
    import usePosts from "@/composables/posts";
    import useComments from "@/composables/comments";
    import useCategories from "@/composables/categories";
    import { useRoute } from "vue-router";
    import { useStore } from 'vuex';

    
    import { useForm, useField, defineRule } from "vee-validate";
    import { required, min, max } from "@/validation/rules"


    defineRule('required', required)
    defineRule('min', min);
    defineRule('max', max);
    import {useAbility} from '@casl/vue'
    
    const schema = {
    Comment: 'min:1|max:400',
}
    const { validate, errors, resetForm } = useForm({ validationSchema: schema })

    const { value: Comment } = useField('Comment', null, { initialValue: '' });
    const {comments, storecomment, deleteComment, getCommentspost} = useComments()
    const comentario = reactive({
        Comment
})

    function submitForm() {
        console.log(route.params.id)
        storecomment(route.params.id,comentario)
    }

    const {post, getPostuser, sumarVoto, restarVoto, avatrlink} = usePosts()
    const {categoryList, getCategoryList} = useCategories()
    const {can} = useAbility();
    const route = useRoute()

    const store = useStore();
    const user = computed(() => store.state.auth.user)

    onMounted(() => {
        getPostuser(route.params.id)
        getCategoryList()
        getCommentspost(route.params.id)
    })
    
</script>

<style scoped>
body {
    font-family: 'Nunito', sans-serif;
}
/*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
</style>
