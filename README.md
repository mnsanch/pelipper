
### Guía de instalación y uso
#### Clonar Repositorio 

```bash
git clone ....
```

#### Instalar vía Composer

```bash
composer install
```

#### Copiar el fichero .env.example a .env edita las credenciales y la url


#### Generar Application Key

```bash
php artisan key:generate
```

#### Migrar base de datos

```bash
php artisan migrate
```

#### Lanzar Seeders

```bash
php artisan db:seed
```

#### Instalar las dependencias de Node

```bash
npm install

npm run dev
```

#### Lanzar a producción

```bash
npm run build or yarn build
```

#### Iniciar servicio
```bash
php artisan serve
```
```bash
npm run dev
```
*Servicio Apache y MySQL en XAMPP iniciado

### Dinámica básica de Laravel 10
Tenemos una ruta la cual conecta con un controlador el cual puede consultar uno o más modelos o realizar consultas a la BBDD y finalmente retorna la vista con los datos en cuestión.

### Crear BD y conectar Laravel
#### .env
Es el archivo de configuración que se utiliza para almacenar información sensible y personalizable sobre la aplicación. (Nombre de la BBDD, puerto, admin, password...)

#### Migraciones
Permite crear, modificar y eliminar tablas y columnas en la BBDD de manera organizada y controlada. Ruta: /database/migrations 
- Crear tabla en laravel: php artisan make:migration create_users_table 
- Migrar a la BBDD: php artisan migrate 
- Realizar rollback: php artisan migrate:rollback

#### Modelo
Un modelo representa a una tabla en la base de datos y permite al desarrollador interactuar con esta tabla. "Puente entre nuestra tabla en la BBDD y la aplicación".

#### Eloquent
Es el ORM (mapeador de datos relacionales) que utiliza Laravel para interactuar con las bases de datos. En lugar de usar SQL directamente utilizamos la sintaxis de php para realizar consultas. Aporta protección contra ataques de inyección SQL. 
Ejemplo: 
- dd( User::all() ); Nos devolverá todos los registros de la tabla de usuarios en forma de array. SELECT * FROM users 
- dd( User::find($user_id) ); En este caso nos devuelve un único ítem. SELECT * FROM users WHERE id = 1;

Y como obtener esto en la vista?
En la funcion realizamos un: ```return view('index', ['userVista' => $user]);```.
En la vista integramos ```<span> {{ $userVista }} </span>``` y nos mostrará el item completo que hace referencia al usuario seleccionado.
Si queremos un campo en específico por ejemplo integramos: ```<span> {{ $user->name }} </span> <span> {{ $user->email }} </span>```.


### VIEWS 
#### HEADER 
C:\xampp\htdocs\laravel\pelipper\resources\js\layouts\Nav.vue
Descripción: Esta vista muestra el header de la página web junto a su menú, principalmente tiene dos estados mediante v-if que nos mostrará un aspecto u otro según estemos logueados o no. Esta vista se integra como un componente en todo el resto de vistas.

#### FOOTER 
C:\xampp\htdocs\laravel\pelipper\resources\js\layouts\AppFooter.vue
Descripción: Esta vista muestra el footer de la web junto un pequeño menú que nos permite navegar a algunas secciones de la web. A diferencia del header, esta vista no aparece siempre a pesar de que se integre en la mayoría de vistas, esto se debe a que hay páginas con cierto estilo de verticalidad que con incompatibles con un footer, para solventar esta carencia utilizan otro tipo de menús; como por ejemplo un aside.

#### HOME 
C:\xampp\htdocs\laravel\pelipper\resources\js\views\home\index.vue 
Descripción: Esta vista es la página principal o índex de la web, en la cual se imprimen por pantalla todos los post mediante un bucle v-for asociada mayormente al id del usuario ya que según esto también nos permitirá interactuar con el post de diferentes maneras según si somos o no el propietario de este.

#### HOME (POPULAR)
C:\xampp\htdocs\laravel\pelipper\resources\js\views\home\indexpopular.vue 
Descripción: Esta vista actúa como índex de la web, pero los post se imprimen por pantalla mediante un bucle v-for pero priorizando por el que más veces ha sido votado, ya sea positiva o negativamente.

#### HOME (MOST HATED)
C:\xampp\htdocs\laravel\pelipper\resources\js\views\home\indexhated.vue 
Descripción: Esta vista actúa como índex de la web, pero los post se imprimen por pantalla mediante un bucle v-for pero priorizando por el que más veces peor ha sido votado, es decir, con peor recepción por los usuarios.

#### USER PAGE 
C:\xampp\htdocs\laravel\pelipper\resources\js\views\home\user.vue 
Descripción: Esta vista muestra el perfil público de cada usuario, mostrando también por pantalla todos los posts creados por este.

#### POST PAGE / COMMENTS 
C:\xampp\htdocs\laravel\pelipper\resources\js\views\admin\prueba\comentario.vue 
Descripción: Esta página básicamente dispone de un formulario para crear un post, en ella podremos definir los valores de este, como puede ser el título, contexto, categorías e incluso una imagen (la cual podremos hasta previsualizar mediante un componente dropzone).

#### EDIT POST 
C:\xampp\htdocs\laravel\pelipper\resources\js\views\admin\prueba\Edit.vue 
Descripción: Esta página básicamente dispone de un formulario con los datos precargados en cada campo sobre el post que hemos elegido editar.

#### EDIT PROFILE 
C:\xampp\htdocs\laravel\pelipper\resources\js\views\profile\edit.vue 
Descripción: Esta página básicamente dispone de un formulario con los datos precargados en cada campo sobre el usuario que hemos elegido editar.

#### REGISTER 
C:\xampp\htdocs\laravel\pelipper\resources\js\views\register\index.vue 
Descripción: Esta vista dispone de un formulario dividido en dos secciones, la primera recoge los datos típicos de registro como puede ser el nombre de usuario, email, contraseña, etc. La segunda se trata de tres preguntas mediante input radio que determinaran cual es la foto del usuario al azar.


#### ERROR 404 
C:\xampp\htdocs\laravel\pelipper\resources\js\views\errors
Descripción: Esta vista solo se muestra cuando el usuario es redirigido a una página o bien no existente o no disponible.





### CONTROLLERS (API)
#### PERMISOS
C:\xampp\htdocs\laravel\pelipper\app\Http\Controllers\Api\PermissionController.php
Descripción: Este controlador es parte de una API en Laravel y se encarga de gestionar los permisos de usuario:

- **index**: Muestra una lista paginada de permisos, con opciones de búsqueda y ordenamiento.

- **store**: Almacena un nuevo permiso en la base de datos.

- **show**: Muestra un permiso específico.

- **update**: Actualiza un permiso existente en la base de datos.

- **destroy**: Elimina un permiso de la base de datos.

- **getRolePermissions**: Obtiene los permisos de un rol específico.

- **updateRolePermissions**: Actualiza los permisos de un rol.

#### CATEGORIAS
C:\xampp\htdocs\laravel\pelipper\app\Http\Controllers\Api\CategoryController.php
Descripción: Este controlador es parte de una API en Laravel y se encarga de gestionar las categorías:

- **index**: Devuelve una colección de recursos de todas las categorías.

- **category**: Devuelve una categoría específica según su ID.

- **store**: Almacena una nueva categoría en la base de datos.

- **update**: Actualiza una categoría existente en la base de datos.

- **destroy**: Elimina una categoría de la base de datos.

#### COMENTARIOS
C:\xampp\htdocs\laravel\pelipper\app\Http\Controllers\Api\commentsController.php
Descripción: Este controlador es parte de una API en Laravel y se encarga de gestionar los comentarios:

- **index**: Devuelve una colección de recursos de todos los comentarios.

- **commentspost**: Devuelve una colección de recursos de comentarios asociados a una publicación específica.

- **store**: Almacena un nuevo comentario asociado a una publicación específica en la base de datos.

- **destroy**: Elimina un comentario de la base de datos.

#### POSTS
C:\xampp\htdocs\laravel\pelipper\app\Http\Controllers\Api\pppPostController.php
Descripción: Este controlador maneja las solicitudes relacionadas con las publicaciones (posts) en una API:

- **index**: Este método devuelve una colección de todas las publicaciones con la información del usuario y el recuento total de votos.

- **indexreverse**: Este método devuelve una colección de todas las publicaciones en orden inverso.

- **indexpositivo**: Este método devuelve una colección de todas las publicaciones ordenadas por el recuento total de votos de manera descendente.

- **indexnegativo**: Este método devuelve una colección de todas las publicaciones ordenadas por el recuento total de votos de manera ascendente.

- **indexodiado**: Este método devuelve una colección de todas las publicaciones ordenadas por la cantidad de votos negativos (Downvotes) de manera ascendente.

- **indexvotado**: Este método devuelve una colección de todas las publicaciones ordenadas por el voto global (Upvotes menos Downvotes) de manera descendente.

- **indexusuario**: Este método devuelve una colección de todas las publicaciones de un usuario específico.

- **destroy**: Este método elimina una publicación específica.

- **store**: Este método crea una nueva publicación.

- **getPost**: Este método devuelve una publicación específica.

- **getPostedit**: Este método devuelve una publicación específica solo si el usuario autenticado es el propietario de la publicación.

- **update**: Este método actualiza una publicación específica.

- **upvote**: Este método registra un voto positivo (Upvote) para una publicación.

- **downvote**: Este método registra un voto negativo (Downvote) para una publicación.

- **quitarupvote**: Este método elimina un voto positivo (Upvote) de una publicación.

- **quitardownvote**: Este método elimina un voto negativo (Downvote) de una publicación.
#### USER PROFILE
C:\xampp\htdocs\laravel\pelipper\app\Http\Controllers\Api\ProfileController.php
Descripción: Este controlador es responsable de manejar las solicitudes relacionadas con el perfil de usuario en una API:

- **update**: Este método actualiza el perfil del usuario. Toma un objeto `UpdateProfileRequest`, que contiene los datos que el usuario desea actualizar en su perfil. Luego, actualiza el nombre, el correo electrónico y la contraseña del usuario (si se proporciona una nueva contraseña y coincide con la confirmación de la contraseña). Finalmente, devuelve una respuesta de éxito con el perfil actualizado o una respuesta JSON con un estado 403 si la actualización falla.

-  **user**: Este método devuelve el usuario autenticado actualmente. Toma una solicitud (`Request`) y devuelve una respuesta de éxito con el usuario encontrado.


#### ROLES
C:\xampp\htdocs\laravel\pelipper\app\Http\Controllers\Api\RoleController.php
Descripción: Este controlador es parte de una API en Laravel y se encarga de gestionar los roles de usuario:

- **index**: Muestra una lista paginada de roles, con opciones de búsqueda y ordenamiento.

- **store**: Almacena un nuevo rol en la base de datos.

- **show**: Muestra un rol específico.

- **update**: Actualiza un rol existente en la base de datos.

- **destroy**: Elimina un rol de la base de datos.

- **getList**: Obtiene una lista de todos los roles sin paginar.

#### USER
C:\xampp\htdocs\laravel\pelipper\app\Http\Controllers\Api\UserController.php
Descripción: Este controlador es responsable de manejar las solicitudes relacionadas con los usuarios en una API:

- **index**: Este método devuelve una colección paginada de usuarios. Permite buscar usuarios por ID o nombre y ordenarlos por columna y dirección específicas. 

- **store**: Este método crea un nuevo usuario en la base de datos. Toma un objeto `StoreUserRequest` que contiene los datos del nuevo usuario, crea el usuario, asigna el rol especificado y devuelve una respuesta con el nuevo usuario creado.

- **show**: Este método devuelve un usuario específico junto con sus roles. Toma un objeto de usuario y devuelve una respuesta con los detalles del usuario.

- **update**: Este método actualiza un usuario existente en la base de datos. Toma un objeto `UpdateUserRequest` que contiene los datos actualizados del usuario, actualiza los detalles del usuario y sus roles asociados, y devuelve una respuesta con el usuario actualizado.

- **destroy**: Este método elimina un usuario de la base de datos junto con sus publicaciones y comentarios asociados. Toma el ID del usuario a eliminar, elimina sus publicaciones y comentarios, luego elimina el usuario y devuelve una respuesta de éxito.

- **getAvatar**: Este método devuelve la URL del avatar del usuario con el ID especificado.

- **getID**: Este método devuelve el ID del usuario autenticado actualmente.

- **getNombre**: Este método devuelve el nombre del usuario con el ID especificado.
### MODELS

#### CATEGORIAS
C:\xampp\htdocs\laravel\pelipper\app\Models\categories.php
Descripción: Este modelo de Laravel define el modelo `Category`, que representa una categoría en la aplicación. Tiene una relación de muchos a muchos con el modelo `Post`, a través de la tabla pivot `post_categories`.

#### COMENTARIOS
C:\xampp\htdocs\laravel\pelipper\app\Models\comments.php
Descripción: Este modelo de Laravel representa la tabla de comentarios en la base de datos. Tiene una relación de pertenencia con el modelo de usuario, lo que significa que cada comentario pertenece a un usuario específico. En este modelo, `Comment`, se define la relación `belongsTo` con el modelo `User` a través de la columna `ID_User`, y la relación `belongsTo` con el modelo `Post` a través de la columna `ID_Post`.

#### POSTS
C:\xampp\htdocs\laravel\pelipper\app\Models\posts.php
Descripción: Este modelo de Laravel, llamado "posts", representa los posts en la aplicación. Tiene relaciones definidas con usuarios, categorías, comentarios y votos. Además, utiliza la biblioteca Spatie MediaLibrary para gestionar archivos multimedia asociados a los posts.

En este modelo, `Posts`, se definen las siguientes relaciones:
1. `belongsTo` con el modelo `User` a través de la columna `ID_User`.
2. `belongsToMany` con el modelo `Categories` a través de la tabla pivot `post_categories`.
3. `hasMany` con el modelo `Comments` a través de la columna `ID_Post`.
4. `belongsToMany` con el modelo `Users` a través de la tabla pivot `votes`.

#### VOTOS
C:\xampp\htdocs\laravel\pelipper\app\Models\vote.php
Descripción: En este modelo, `Votes`, se define la relación `belongsToMany` con el modelo `Posts` y el modelo `User`, para representar los votos de los usuarios en los posts.

#### ROLES
C:\xampp\htdocs\laravel\pelipper\app\Models\rols.php
Descripción: En este modelo, `Rols`, parece que representas los roles de usuario en la aplicación. Sin embargo, parece que hay un error tipográfico en el nombre de la clase.

#### USER
C:\xampp\htdocs\laravel\pelipper\app\Models\User.php
Descripción: En este modelo, `User`, se define el modelo de usuario de la aplicación. Utiliza la autenticación de Laravel y tiene las siguientes características:

- Utiliza la funcionalidad de tokens API con `HasApiTokens`.
- Utiliza el trait `HasRoles` de Spatie para gestionar los roles de usuario.
- Tiene una relación `hasMany` con el modelo `Posts`.


### RESOURCES
#### POST
C:\xampp\htdocs\laravel\pelipper\app\Http\Resources\PostResource.php
Descripción: Este recurso, `PostResource`, se utiliza para formatear la respuesta JSON de un post. En este caso, la respuesta JSON contendrá los siguientes campos:
- `id`: El ID del post.
- `title`: El título del post.
- `categories`: Las categorías asociadas al post.
- `content`: El contenido del post.
- `original_image`: La URL de la imagen original asociada al post, si existe.
- `resized_image`: La URL de la imagen redimensionada asociada al post, si existe.
- `created_at`: La fecha de creación del post en formato de cadena de texto.

#### CATEGORIA
C:\xampp\htdocs\laravel\pelipper\app\Http\Resources\CategoryResource.php
Descripción: Este recurso, `CategoryResource`, se utiliza para formatear la respuesta JSON de una categoría. En este caso, la respuesta JSON contendrá solo dos campos: `id` y `Category_Name`.
#### USER
C:\xampp\htdocs\laravel\pelipper\app\Http\Resources\UserResource.php
Descripción: Este recurso, `UserResource`, se utiliza para formatear la respuesta JSON de un usuario. En este caso, la respuesta JSON contendrá los siguientes campos:
- `id`: El ID del usuario.
- `name`: El nombre del usuario.
- `email`: El correo electrónico del usuario.
- `role_id`: El ID del rol del usuario.
- `roles`: Los roles asignados al usuario.
- `created_at`: La fecha de creación del usuario en formato de cadena de texto.

#### COMMENTS
C:\xampp\htdocs\laravel\pelipper\app\Http\Resources\commentresource.php
Descripción: Este recurso, `CommentResource`, se utiliza para formatear la respuesta JSON de un comentario. En este caso, la respuesta JSON contendrá los siguientes campos:

- `id`: El ID del comentario.
- `ID_User`: El ID del usuario que realizó el comentario.
- `ID_Post`: El ID del post al que pertenece el comentario.
- `Comment`: El contenido del comentario.
- `created_at`: La fecha de creación del comentario en formato de cadena de texto.
- `user`: La información del usuario que realizó el comentario.

### REQUEST

#### Login
C:\xampp\htdocs\laravel\pelipper\app\Http\Requests\Auth\LoginRequest.php
Descripción: Este formulario de solicitud (Request) llamado `LoginRequest`, que se utiliza para validar las credenciales de inicio de sesión de un usuario. Tiene reglas de validación para el campo `email` y el campo `password`..

#### Register
C:\xampp\htdocs\laravel\pelipper\app\Http\Requests\Auth\RegisterRequest.php
Descripción: Este formulario de solicitud (Request) llamado `RegisterRequest` se utiliza para validar los datos enviados al registrarse un nuevo usuario en la aplicación. Tiene reglas de validación para los campos `name`, `email` y `password`.
