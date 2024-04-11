
<template>
    <form @submit.prevent="submitForm">
        <div class="row my-5">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="exercise-Title" class="form-label">
                                Titulo
                            </label>
                            <input v-model="exercise.Title" id="exercise-title" type="text" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.Title }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.title">
                                    {{ message }}
                                </div>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="mb-3">
                            <label for="exercise-Post" class="form-label">
                                Contenido
                            </label>
                            <textarea v-model="exercise.Post"></textarea>
                            <div class="text-danger mt-1">
                                {{ errors.Post }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.Post">
                                    {{ message }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg> Action
                        </h6>
                        <div class="mt-3 text-center">
                            <button :disabled="isLoading" class="btn btn btn-outline-primary me-2">
                                <div v-show="isLoading" class=""></div>
                                <span v-if="isLoading">Processing...</span>
                                <span v-else>Save Draft</span>
                            </button>
                            <button :disabled="isLoading" class="btn btn-primary">
                                <div v-show="isLoading" class=""></div>
                                <span v-if="isLoading">Processing...</span>
                                <span v-else>Publish</span>
                            </button>
                        </div>



                        <!-- <SpeedDial :model="items" direction="up" :style="{ left: 'calc(50% - 2rem)', bottom: 0 }" />
                        <SpeedDial :model="items" direction="down" :style="{ left: 'calc(50% - 2rem)', top: 0 }" /> -->


<!--------------------------------------------------------------------- CATEGORIA -------------------------------------------------------------->
                        <h6 class="mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg> Categoria
                        </h6>

                        <div class="mb-3">
                            <v-select multiple v-model="exercise.ID_Category" :options="categoryList":reduce="category => category.id" label="name" class="form-control" placeholder="Select category"/>
                            <div class="text-danger mt-1">
                                {{ errors.ID_Category }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.ID_Category">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="form-floating mb-4"> 
                            <v-select multiple v-model="exercise.ID_Category" :options="categoryList":reduce="category => category.id" label="name" class="form-control form-control-lg createpost-input py-2" placeholder="Select category"/>
                            <div class="text-danger mt-1">
                                {{ errors.ID_Category }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.ID_Category">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

<!--------------------------------------------------------------------- IMAGEN -------------------------------------------------------------->
                        <!-- <div class="mb-3">
                            <h6 class="mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                                </svg> Imagen
                            </h6>
                            <DropZone v-model="exercise.thumbnail"/>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.thumbnail">
                                    {{ message }}
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{ exercise }}



    <section class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="createpost-container card p-0">
                        <div class="row g-0">
                            <div class="col-md-12 col-lg-12 d-none d-md-block">
                                <div class="createpost-banner m-0 p-0"></div>
                            </div>
                            <div class="col-md-12 col-lg-12 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form class="p-5">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="/images/pelipper_icon.png" width="40" height="40">
                                            <span class="h1 fw-bold mb-0 mx-2 page-title">create a post</span>
                                        </div>

                                        <h5 class="fw-normal mb-5 pb-3">Tell others what you are thinking about...</h5>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-floating mb-4">
                                                    <input type="text" class="form-control form-control-lg createpost-input"
                                                        id="floatingInput" placeholder="name@example.com">
                                                    <label class="px-4" for="floatingInput">Title</label>
                                                </div>
                                                <div class="form-floating position-relative mb-4">
                                                    <textarea class="form-control form-control-lg createpost-input textarea"
                                                        placeholder="Context" rows="4" maxlength="300"
                                                        style="height: 15rem !important"></textarea>
                                                    <label class="px-4" for="floatingPassword">Context</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating mb-4 mx-0" style="width: 100%; border: 0px"> 
                                                    <v-select multiple v-model="exercise.ID_Category" :options="categoryList":reduce="category => category.id" label="name" 
                                                    class="form-control form-control-lg createpost-input py-2 no-border" placeholder="Select category"/>
                                                    <div class="text-danger mt-1">
                                                        {{ errors.ID_Category }}
                                                    </div>
                                                    <div class="text-danger mt-1">
                                                        <div v-for="message in validationErrors?.ID_Category">
                                                            {{ message }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4 mx-0 border-0 d-flex justify-content-end" style="width: 100%">
                                                    <div class="mb-3"  style="border-radius: 1.25rem !important; width: 100%">
                                                        <!-- <h6 class="mt-3">Imagen</h6> -->
                                                        <DropZone v-model="exercise.thumbnail"  style="border-radius: 1.25rem !important;  height: 15rem !important;" class=""/>
                                                        <div class="text-danger mt-1" style="border-radius: 1.25rem !important;">
                                                            <div v-for="message in validationErrors?.thumbnail">
                                                                {{ message }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 mb-5 mx-0">
                                            <button onclick=""
                                                class="simple-button createpost-submit-button p-0 d-flex justify-content-center align-items-center h-100">
                                                <!-- Crear post form button -->
                                                <span>Post it</span>
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
import {onMounted, reactive, ref} from "vue";
import TextEditorComponent from "@/components/TextEditorComponent.vue";
import DropZone from "@/components/DropZone.vue";
import useCategories from "@/composables/categories";
import usePosts from "@/composables/pppposts";
import {useForm, useField, defineRule} from "vee-validate";
import {required, min, max} from "@/validation/rules"

defineRule('required', required)
defineRule('min', min)
defineRule('max', max);

const dropZoneActive = ref(true)

const schema = {
    // Title: 'required|min:5',
    Post: 'required|min:3|max:300',
    //categories: 'required'
}
const {validate, errors} = useForm({validationSchema: schema})
const {value: Title} = useField('Title', null, {initialValue: ''});
const {value: Post} = useField('Post', null, {initialValue: ''});
const {value: ID_Category} = useField('categories', null, {initialValue: '', label: 'category'});
const {categoryList, getCategoryList} = useCategories()
const {storePost, validationErrors, isLoading} = usePosts()
const exercise = reactive({
    Title,
    Post,
    ID_Category,
    thumbnail: ''
})

const thefile = ref('')

function submitForm() {
    validate().then(form => {
        if (form.valid) storePost(exercise)
    })
}

onMounted(() => {
    getCategoryList()
})

</script>
    