<template>
    <form @submit.prevent="submitForm">
        <div class="row my-5">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="post-Title" class="form-label">
                                Titulo
                            </label>
                            <input v-model="post.Title" id="post-title" type="text" class="form-control">
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
                            <label for="post-Post" class="form-label">
                                Contenido
                            </label>
                            <textarea v-model="post.Post"></textarea>
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
                        <h6 class="mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg> Categoria
                        </h6>

                        <div class="mb-3">
                            <v-select multiple v-model="post.ID_Category" :options="categoryList"
                                      :reduce="category => category.id" label="name" class="form-control" placeholder="Select category"/>
                            <div class="text-danger mt-1">
                                {{ errors.ID_Category }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.ID_Category">
                                    {{ message }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6 class="mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                                </svg> Imagen
                            </h6>
                            <DropZone v-model="post.thumbnail"/>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.thumbnail">
                                    {{ message }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{ post }}
</template>
<script setup>
    import { onMounted, reactive, watchEffect } from "vue";
    import { useRoute } from "vue-router";
    import useCategories from "@/composables/categories";
    import usePosts from "@/composables/pppposts";
    import { useForm, useField, defineRule } from "vee-validate";
    import { required, min } from "@/validation/rules"
    import TextEditorComponent from "@/components/TextEditorComponent.vue";
    import DropZone from "@/components/DropZone.vue";
    defineRule('required', required)
    defineRule('min', min);

    // Define a validation schema
    const schema = {
        Title: 'required|min:5',
        Post: 'required|min:50',
        categories: 'required'
    }
    // Create a form context with the validation schema
    const { validate, errors, resetForm } = useForm({ validationSchema: schema })
    // Define actual fields for validation
    const { value: Title } = useField('Title', null, { initialValue: '' });
    const { value: Post } = useField('Post', null, { initialValue: '' });
    const { value: categories } = useField('categories', null, { initialValue: '', label: 'category' });
    const { categoryList, getCategoryList } = useCategories()
    const { post: postData, getPost, updatePost, validationErrors, isLoading } = usePosts()
    const post = reactive({
        Title,
        Post,
        categories,
        thumbnail: ''
    })
    const route = useRoute()
    function submitForm() {
        validate().then(form => { if (form.valid) updatePost(post) })
    }
    onMounted(() => {
        getPost(route.params.id)
        getCategoryList()
    })
    // https://vuejs.org/api/reactivity-core.html#watcheffect
    watchEffect(() => {
        post.id = postData.value.id
        post.Title = postData.value.Title
        post.Post = postData.value.Post
        post.thumbnail = postData.value.original_image
        post.categories = postData.value.categories
    })
</script>
