import Cookies from 'js-cookie'
import store from "../store";

const AuthenticatedLayout = () => import('../layouts/Authenticated.vue')
const GuestLayout = ()  => import('../layouts/Guest.vue');

const Prueba  = ()  => import('../views/admin/prueba/Index.vue');
const PruebaCreate  = ()  => import('../views/admin/prueba/Create.vue');
const PruebaEdit  = ()  => import('../views/admin/prueba/Edit.vue');
const PerfilEdit  = ()  => import('../views/profile/edit.vue');
const PostUsuario  = ()  => import('../views/home/user.vue');
const PostComentario = ()  => import('../views/admin/comments/comentario.vue');
const Comentario = ()  => import('../views/admin/comments/Index.vue');



function requireLogin(to, from, next) {
    let isLogin = false;
    isLogin = !!store.state.auth.authenticated;

    if (isLogin) {
        next()
    } else {
        next('/login')
    }
}

function guest(to, from, next) {
    let isLogin;
    isLogin = !!store.state.auth.authenticated;

    if (isLogin) {
        next('/')
    } else {
        next()
    }
}

export default [
    {
        path: '/',
        // redirect: { name: 'login' },
        component: GuestLayout,
        children: [
            {
                path: '/',
                name: 'home',
                component: () => import('../views/home/index.vue'),
            },
            {
                path: 'popular',
                name: 'homepopular',
                component: () => import('../views/home/indexpopular.vue'),
            },
            {
                path: 'hated',
                name: 'homehated',
                component: () => import('../views/home/indexhated.vue'),
            },
            {
                path: 'posts',
                name: 'public-posts.index',
                component: () => import('../views/posts/index.vue'),
            },
            {
                path: 'posts/:id',
                name: 'public-posts.details',
                component: () => import('../views/posts/details.vue'),
            },
            {
                path: 'category/:id',
                name: 'category-posts.index',
                component: () => import('../views/category/posts.vue'),
            },
            {
                path: 'login',
                name: 'auth.login',
                component: () => import('../views/login/Login.vue'),
                beforeEnter: guest,
            },
            {
                path: 'register',
                name: 'auth.register',
                component: () => import('../views/register/index.vue'),
                beforeEnter: guest,
            },
            {
                path: 'forgot-password',
                name: 'auth.forgot-password',
                component: () => import('../views/auth/passwords/Email.vue'),
                beforeEnter: guest,
            },
            {
                path: 'reset-password/:token',
                name: 'auth.reset-password',
                component: () => import('../views/auth/passwords/Reset.vue'),
                beforeEnter: guest,
            },
            {
                name: 'perfil.index',
                path: 'perfil',
                component: PerfilEdit,
            },
            {
                name: 'post.usuario',
                path: 'usuario/:id/:avatar/:nombre',
                component: PostUsuario,
            },{
                name: 'post.comentario',
                path: 'post/:id',
                component: PostComentario,
            },
            {
                name: 'prueba.edit',
                path: 'edit/:id',
                component: PruebaEdit,
                meta: { breadCrumb: 'Editar pruebas' }
            },
            {
                name: 'prueba.create',
                path: 'create',
                component: PruebaCreate,
                meta: { breadCrumb: 'Crear pruebas' }
            }
        ]
    },
    {
        path: '/admin',
        component: AuthenticatedLayout,
        // redirect: {
        //     name: 'admin.index'
        // },
        beforeEnter: requireLogin,
        meta: { breadCrumb: 'Dashboard' },
        children: [
            {
                name: 'admin.index',
                path: '',
                component: () => import('../views/admin/index.vue'),
                meta: { breadCrumb: 'Admin' }
            },
            {
                name: 'comments',
                path: 'comments',
                children: [
                    {
                        name: 'comments.index',
                        path: '',
                        component: Comentario,
                    },
                ]
            },
            {
                name: 'prueba',
                path: 'prueba',
                meta: { breadCrumb: 'Pruebas'},
                children: [
                    {
                        name: 'prueba.index',
                        path: '',
                        component: Prueba,
                        meta: { breadCrumb: 'Listado pruebas' }
                    },
                    // {
                    //     name: 'prueba.create',
                    //     path: 'create',
                    //     component: PruebaCreate,
                    //     meta: { breadCrumb: 'Crear pruebas' }
                    // }
                    // {
                    //     name: 'prueba.edit',
                    //     path: 'edit/:id',
                    //     component: PruebaEdit,
                    //     meta: { breadCrumb: 'Editar pruebas' }
                    // }
                ]
            },
            {
                name: 'categories',
                path: 'categories',
                meta: { breadCrumb: 'Categories'},
                children: [
                    {
                        name: 'categories.index',
                        path: '',
                        component: () => import('../views/admin/categories/Index.vue'),
                        meta: { breadCrumb: 'View category' }
                    },
                    {
                        name: 'categories.create',
                        path: 'create',
                        component: () => import('../views/admin/categories/Create.vue'),
                        meta: { 
                            breadCrumb: 'Add new category' ,
                            linked: false, 
                        }
                    },
                    {
                        name: 'categories.edit',
                        path: 'edit/:id',
                        component: () => import('../views/admin/categories/Edit.vue'),
                        meta: {
                            breadCrumb: 'Edit category',
                            linked: false,
                        }
                    }
                ]
            },

            {
                name: 'permissions',
                path: 'permissions',
                meta: { breadCrumb: 'Permisos'},
                children: [
                    {
                        name: 'permissions.index',
                        path: '',
                        component: () => import('../views/admin/permissions/Index.vue'),
                        meta: { breadCrumb: 'Permissions' }
                    },
                    {
                        name: 'permissions.create',
                        path: 'create',
                        component: () => import('../views/admin/permissions/Create.vue'),
                        meta: { 
                            breadCrumb: 'Create Permission',
                            linked: false,  
                        }
                    },
                    {
                        name: 'permissions.edit',
                        path: 'edit/:id',
                        component: () => import('../views/admin/permissions/Edit.vue'),
                        meta: { 
                            breadCrumb: 'Permission Edit',
                            linked: false,
                        }
                    }
                ]
            },

            //TODO Organizar rutas
            {
                name: 'roles.index',
                path: 'roles',
                component: () => import('../views/admin/roles/Index.vue'),
                meta: { breadCrumb: 'Roles' }
            },
            {
                name: 'roles.create',
                path: 'roles/create',
                component: () => import('../views/admin/roles/Create.vue'),
                meta: { breadCrumb: 'Create Role' }
            },
            {
                name: 'roles.edit',
                path: 'roles/edit/:id',
                component: () => import('../views/admin/roles/Edit.vue'),
                meta: { breadCrumb: 'Role Edit' }
            },
            {
                name: 'users.index',
                path: 'users',
                component: () => import('../views/admin/users/Index.vue'),
                meta: { breadCrumb: 'Users' }
            },
            {
                name: 'users.create',
                path: 'users/create',
                component: () => import('../views/admin/users/Create.vue'),
                meta: { breadCrumb: 'Add New' }
            },
            {
                name: 'users.edit',
                path: 'users/edit/:id',
                component: () => import('../views/admin/users/Edit.vue'),
                meta: { breadCrumb: 'User Edit' }
            },
        ]
    },
    {
        path: "/:pathMatch(.*)*",
        name: 'NotFound',
        component: () => import("../views/errors/404.vue"),
    },
];
