<template>
        <svg class="react-flowbackground background-puntitos" data-testid="rfbackground"><pattern id="pattern-1undefined" x="0.5" y="17.14712706455481" width="40" height="40" patternUnits="userSpaceOnUse" patternTransform="translate(-1,-1)"><circle cx="0.5" cy="0.5" r="0.5" fill="#91919a"></circle></pattern><rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-1undefined)"></rect></svg>

    <div class="d-flex align-items-center justify-content-center vh-100">

        <div class="text-center">
            <div class="">
                <a class="navbar-brand nav-link text-white" href="">
                    <router-link to="/" class="navbar-brand logo">
                        <img src="/images/logo_pelipper_claro.svg" width="230" height="68">
                    </router-link>
                </a>
            </div>
            <h1 class="display-1 fw-bold">404</h1>

            <p class="fs-3 mb-2"> <span class="text-danger">Opps!</span> Page not found.</p>

            <router-link class="my-2" to="/">
                <button class="simple-button pointer-custom">Go home</button>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "404"
}
</script>

<style scoped>

</style>
