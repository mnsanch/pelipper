<script setup>
import { useLayout } from '../composables/layout';
import { computed } from 'vue';

const { layoutConfig } = useLayout();

const logoUrl = computed(() => {
    return `layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});
</script>

<template>
    <footer class="footer-snipet">
        <div class="container-fluid footer-separator d-flex justify-content-center align-items-center h-57px">
            <div class="row h-57px">
                <div class="col-3 p-0 d-flex flex-row align-items-center h-57px">
                    <div class="box-40 mx-2">
                        <button onclick="" class="circular-button p-0 d-flex justify-content-center align-items-center">
                            <!-- Logo -->
                            <!-- <img class="py-0 my-0" src="/images/logo_pelipper.svg" width="30" height="30"> -->
                            <div class="appfooter-logo-pelipper"></div>
                        </button>
                    </div>
                    <div class="box-40 mx-2">
                        <button onclick="" class="circular-button p-0 d-flex justify-content-center align-items-center">
                            <!-- Advertise icon -->
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" icon-name="topic-activism-outline" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.175 13.11c-.237.462-.428.6-.514.627l-.133-.035c-.439-.238-1.278-2.03-1.278-5.2 0-2.95.729-4.718 1.184-5.144l.245-.087c.095.042.276.192.5.62l.284.556 1.113-.57-.285-.556c-.541-1.057-1.17-1.3-1.618-1.316h-.044a1.4 1.4 0 0 0-.754.23L3.7 5.852c-.915-.552-1.847-.991-2.61-.58C.237 5.735.044 6.98 0 9c.047 2 .24 3.245 1.093 3.7.783.423 1.754-.06 2.7-.637.288.1.685.218 1.224.37v4.347a1.122 1.122 0 0 0 1.121 1.12h2.75a1.123 1.123 0 0 0 1.122-1.12v-3l4.028 1.075c.183.088.384.134.587.135.45 0 1.1-.23 1.661-1.32l.285-.555-1.113-.57-.283.566Zm-11.882-2.2c-1.247.782-1.546.734-1.607.7C1.6 11.56 1.3 11.229 1.25 9c.049-2.25.345-2.582.434-2.63.064-.033.361-.081 1.61.7a.624.624 0 0 0 .54.058l8.838-3.146A13.9 13.9 0 0 0 12 8.5c-.034 1.608.221 3.21.754 4.728L3.79 10.834a.622.622 0 0 0-.497.073v.004Zm2.97 5.753v-3.877c.678.184 1.507.405 2.5.67v3.2l-2.5.007ZM19.25 8v1.25H16V8h3.25Zm-3.477-2.674 2.82-1.594.615 1.088-2.819 1.594-.616-1.088Zm.616 5.26 2.819 1.594-.615 1.088-2.82-1.594.616-1.088Z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="box-40 mx-2">
                        <button onclick="" class="circular-button p-0 d-flex justify-content-center align-items-center">
                            <!-- Help icon -->
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" icon-name="help-outline" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 20a10 10 0 1 1 10-10 10.011 10.011 0 0 1-10 10Zm0-18.75A8.75 8.75 0 1 0 18.75 10 8.76 8.76 0 0 0 10 1.25Zm1.611 4.058a2.4 2.4 0 0 1 .994.861c.241.375.366.812.359 1.258a2.04 2.04 0 0 1-.167.854c-.1.229-.238.439-.407.622-.2.208-.413.404-.636.588-.223.188-.4.348-.533.483a1.754 1.754 0 0 0-.328.464 1.326 1.326 0 0 0-.13.591v.78H9.328v-.759a2.216 2.216 0 0 1 .601-1.572c.204-.21.421-.406.65-.588.209-.173.373-.316.492-.431a1.52 1.52 0 0 0 .3-.4 1.154 1.154 0 0 0-.058-1.128 1.192 1.192 0 0 0-.485-.421 1.525 1.525 0 0 0-.677-.151 1.545 1.545 0 0 0-.721.168 1.3 1.3 0 0 0-.713 1.131H7.256a2.628 2.628 0 0 1 1.381-2.293A3.132 3.132 0 0 1 10.175 5c.496-.008.987.097 1.436.308Zm-2.164 9.843a1.088 1.088 0 0 1-.386-.385 1.034 1.034 0 0 1-.144-.537c-.002-.186.048-.37.144-.53.094-.16.227-.293.386-.387a1.03 1.03 0 0 1 .53-.143 1.062 1.062 0 0 1 .926 1.597c-.096.159-.23.291-.389.385a1.034 1.034 0 0 1-.537.144 1.021 1.021 0 0 1-.53-.144Z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="box-40 mx-2">
                        <button onclick="" class="circular-button p-0 d-flex justify-content-center align-items-center">
                            <!-- Blog icon -->
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" icon-name="topic-reading-outline" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.375 2h-7.292A2.688 2.688 0 0 0 10 3a2.688 2.688 0 0 0-2.083-1H.625A.625.625 0 0 0 0 2.625v14.75A.625.625 0 0 0 .625 18h7.917v-1.25H1.25V3.25h6.667a1.465 1.465 0 0 1 1.458 1.469v11.093h1.25V4.719a1.465 1.465 0 0 1 1.458-1.469h6.667v13.5h-6.667a2.64 2.64 0 0 0-2.708 2.625V20h1.25v-.625A1.388 1.388 0 0 1 12.083 18h7.292a.624.624 0 0 0 .625-.625V2.625A.625.625 0 0 0 19.375 2Z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="box-40 mx-2">
                        <button onclick="" class="circular-button p-0 d-flex justify-content-center align-items-center">
                            <!-- Careers icon -->
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" icon-name="topic-careers-outline" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.784 12.331a7 7 0 0 0 1.165.6l-6.174 6.178a2.747 2.747 0 0 1-3.883-3.884l6.18-6.181c.162.409.362.8.6 1.171l-5.897 5.894a1.5 1.5 0 0 0 0 2.116 1.533 1.533 0 0 0 2.118 0l5.891-5.894Zm4.481-.309a5.7 5.7 0 0 0 4.671-3.953 5.372 5.372 0 0 0-.1-3.538 1.116 1.116 0 0 0-.813-.7 1.127 1.127 0 0 0-1.039.305L14.118 7A.807.807 0 0 1 13 7a.79.79 0 0 1 0-1.116l2.864-2.863a1.127 1.127 0 0 0 .3-1.04 1.112 1.112 0 0 0-.7-.812 5.363 5.363 0 0 0-3.539-.1 5.7 5.7 0 0 0-3.946 4.666 5.627 5.627 0 0 0 6.287 6.287Zm.58-9.75L12.117 5a2.043 2.043 0 0 0 0 2.884 2.088 2.088 0 0 0 2.883 0l2.727-2.726c.271.825.276 1.714.013 2.542a4.432 4.432 0 0 1-3.628 3.079A4.377 4.377 0 0 1 9.22 5.887a4.429 4.429 0 0 1 4.342-3.822c.437 0 .87.07 1.284.207Z"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="box-40 mx-2">
                        <button onclick="" class="circular-button p-0 d-flex justify-content-center align-items-center">
                            <!-- Press icon -->
                            <svg xmlns:xlink="http://www.w3.org/1999/xlink"  rpl="" fill="currentColor" height="20" icon-name="author-outline" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.128 0a4.78 4.78 0 0 0-4.774 4.774c.007.214.029.427.065.638l-.137-.138a1.143 1.143 0 0 0-1.719.126L.461 16.2a2.315 2.315 0 0 0 3.241 3.24l10.8-8.1a1.14 1.14 0 0 0 .122-1.718l-.138-.138c.212.036.426.058.64.065a4.773 4.773 0 1 0 0-9.547L15.128 0ZM2.955 18.445a1.07 1.07 0 0 1-1.5-1.5L9.487 6.239l4.175 4.176-10.707 8.03ZM15.128 8.3a3.53 3.53 0 1 1 0-7.06 3.53 3.53 0 0 1 0 7.06Zm-7.186 2.78L10.018 9l.88.88-2.077 2.08-.879-.88Z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid d-flex justify-content-center align-items-center h-35px">
            <!-- Copyright -->
            <div class="text-center">
                <span class="mx-1 font-size-12">Terms of use.</span>
                <span class="mx-1 font-size-12">Privacy policy</span>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center align-items-center h-35px">
            <!-- Copyright -->
            <div class="text-center">
                <span class="font-size-12">Pelipper © 2024. All rights reserved.</span>
            </div>
        </div>

    </footer>
</template>
<style lang="scss" scoped></style>
