<template>
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form @submit.prevent="submitForm">

                        <div class="mb-3">
                            <label for="post-title" class="form-label">
                                Title
                            </label>
                            <input v-model="category.Category_Name" id="post-title" type="text" class="form-control">
                            <div class="text-danger mt-1">
                                {{ errors.Category_Name }}
                            </div>
                            <div class="text-danger mt-1">
                                <div v-for="message in validationErrors?.Category_Name">
                                    {{ message }}
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button :disabled="isLoading" class="btn btn-primary">
                                <div v-show="isLoading" class=""></div>
                                <span v-if="isLoading">Processing...</span>
                                <span v-else>Save</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { onMounted, reactive, watchEffect } from "vue";
import { useRoute } from "vue-router";
import useCategories from "../../../composables/categories";
import { useForm, useField, defineRule } from "vee-validate";
import { required, min } from "@/validation/rules"
defineRule('required', required)
defineRule('min', min);

    const schema = {
        Category_Name: 'required|min:3'
    }

    const { validate, errors, resetForm } = useForm({ validationSchema: schema })
    const { value: Category_Name } = useField('Category_Name', null, { initialValue: '' });
    const { category: postData, getCategory, updateCategory, validationErrors, isLoading } = useCategories()
    const category = reactive({
        Category_Name
    })
    const route = useRoute()
    function submitForm() {
        validate().then(form => { if (form.valid) updateCategory(category) })
    }
    onMounted(() => {
        getCategory(route.params.id)
    })
    
    // https://vuejs.org/api/reactivity-core.html#watcheffect
    watchEffect(() => {
        category.id = postData.value.id
        category.Category_Name = postData.value.Category_Name
    })
</script>
