<template>
    <svg class="react-flowbackground" data-testid="rfbackground" style="position: absolute; z-index: -1; width: 100%; height: 100%; top: 0px; left: 0px;"><pattern id="pattern-1undefined" x="0.5" y="17.14712706455481" width="40" height="40" patternUnits="userSpaceOnUse" patternTransform="translate(-1,-1)"><circle cx="0.5" cy="0.5" r="0.5" fill="#91919a"></circle></pattern><rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-1undefined)"></rect></svg>
    <section class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="createpost-container card p-0">
                        <div class="row g-0">
                            <div class="col-md-12 col-lg-12 d-none d-md-block" >
                                <!-- <div class="createpost-banner m-0 p-0"></div> -->
                                <img src="/images/createpost_banner.svg" class="m-0 p-0" style="width: 100%; height: auto; background-color: transparent">
                            </div>
                            <div class="col-md-12 col-lg-12 d-flex align-items-center" style="border: 1px solid gainsboro">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form @submit.prevent="submitForm" class="p-5">
                                        <div class="d-flex align-items-center mb-3 p-0">
                                            <img src="/images/logo_pelipper_banner.PNG" width="40" height="40" class="p-0 m-0">
                                            <!-- <span class="h1 fw-bold mx-2 my-0 p-0 page-title">create a post</span> -->
                                            <span class="h1 fw-bold py-0 my-0 mx-2 pl-10 font-bold bg-gradient-to-r shine text-transparent bg-clip-text">Edit your post</span>
                                        </div>

                                        <h5 class="fw-normal mb-5 pb-3">Errors happen, here you can fix them...</h5>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-floating mb-4">
                                                    <input v-model="post.Title" type="text" class="form-control form-control-lg createpost-input"
                                                        id="floatingInput" placeholder="name@example.com">
                                                    <label class="px-4" for="floatingInput">Title</label>
                                                    <div class="text-danger mt-1">
                                                        {{ errors.Title }}
                                                    </div>
                                                    <div class="text-danger mt-1">
                                                        <div v-for="message in validationErrors?.title">
                                                            {{ message }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-floating position-relative mb-4">
                                                    <textarea v-model="post.Post" class="form-control form-control-lg createpost-input textarea"
                                                        placeholder="Context" rows="4" maxlength="300"
                                                        style="height: 15rem !important"></textarea>
                                                    <label class="px-4" for="floatingPassword">Context</label>
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
                                            <div class="col-md-4">
                                                <div class="form-floating mb-4 mx-0" style="width: 100%; border: 0px"> 
                                                    <v-select multiple v-model="post.ID_Category" :options="categoryList":reduce="category => category.id" label="Category_Name" 
                                                    class="form-control form-control-lg createpost-input py-2 no-border" placeholder="Select category"/>
                                                    <div class="text-danger mt-1">
                                                        {{ errors.categories }}
                                                    </div>
                                                    <div class="text-danger mt-1">
                                                        <div v-for="message in validationErrors?.categories">
                                                            {{ message }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4 mx-0 border-0 d-flex justify-content-end" style="width: 100%">
                                                    <div class="mb-3"  style="border-radius: 1.25rem !important; width: 100%">
                                                        <!-- <h6 class="mt-3">Imagen</h6> -->
                                                        <DropZone v-model="post.thumbnail"  style="border-radius: 1.25rem !important;  height: 15rem !important;" class=""/>
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
        
                                        <a href="#!" class="small text-muted">Communeity guidelines. </a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <app-footer></app-footer>
</template>
<script setup>
    import AppFooter from '@/layouts/AppFooter.vue';
    import { onMounted, reactive, watchEffect } from "vue";
    import { useRoute } from "vue-router";
    import useCategories from "@/composables/categories";
    import usePosts from "@/composables/pppposts";
    import { useForm, useField, defineRule } from "vee-validate";
    import { required, min, max } from "@/validation/rules"
    import TextEditorComponent from "@/components/TextEditorComponent.vue";
    import DropZone from "@/components/DropZone.vue";
    defineRule('required', required)
    defineRule('min', min);
    defineRule('max', max);

    // Define a validation schema
    const schema = {
    Title: 'required',
    Post: 'required|min:3|max:300',
    ID_Category: 'required'
}
    // Create a form context with the validation schema
    const { validate, errors, resetForm } = useForm({ validationSchema: schema })
    // Define actual fields for validation
    const { value: Title } = useField('Title', null, { initialValue: '' });
    const { value: Post } = useField('Post', null, { initialValue: '' });
    const { value: ID_Category } = useField('ID_Category', null, { initialValue: '', label: 'category' });
    const { categoryList, getCategoryList } = useCategories()
    const { post: postData, getPost, updatePost, validationErrors, isLoading } = usePosts()
    const post = reactive({
        Title,
        Post,
        ID_Category,
        thumbnail: ''
    })
    const route = useRoute()
    function submitForm() {
        validate().then(form => { if (form.valid) updatePost(post) })
    }
    onMounted(() => {
        getPost(route.params.id)
        getCategoryList()
        console.log(route.params.id);
        console.log(route.params.id);
    })
    // https://vuejs.org/api/reactivity-core.html#watcheffect
    watchEffect(() => {
        post.id = postData.value.id
        post.Title = postData.value.Title
        post.Post = postData.value.Post
        post.thumbnail = postData.value.original_image
        post.ID_Category = postData.value.ID_Category
    })
</script>
