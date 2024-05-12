<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\User;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_ver_todos_los_posts()
    {
        $response = $this->get('/api/posts');

        $response->assertStatus(200); 
    }

    public function test_ver_todos_los_posts_de_un_usuario()
    {
        $response = $this->get('/api/posts/1');

        $response->assertStatus(200); 
    }

    public function test_ver_un_solo_post()
    {
        $response = $this->get('/api/postuser/1');

        $response->assertStatus(200); 
    }
    
    public function test_crear_posts()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = [
            'Title' => 'Test Post',
            'Post' => 'This is a test post content',
            'ID_Category' => implode(',', [1]),
        ];

        $response = $this->post('/api/posts', $post);

        $response->assertStatus(201); 
    }

    public function test_editar_posts()
    {
        $post = [
            'Title' => 'Test Post',
            'Post' => 'This is a edit post content',
            'ID_Category' => implode(',', [1]),
        ];

        $response = $this->post('/api/posts/update/1', $post);

        $response->assertStatus(200); 
    }

    public function test_upvote()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->put('/api/posts/1/upvote');

        $response->assertStatus(200); 
    }

    public function test_downvote()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->put('/api/posts/1/downvote');

        $response->assertStatus(200); 
    }

    public function test_crear_comment()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $comentario = [
            'Comment' => 'Comentario unitario'
        ];

        $response = $this->post('/api/comments/1', $comentario);

        $response->assertStatus(201); 
    }

    public function test_borrar_post()
    {
        $response = $this->delete('/api/posts/1');

        $response->assertStatus(200); 
    }

    public function test_crear_categoria()
    {
        $user = User::factory()->create();
        $user->givePermissionTo('category-create');
        $this->actingAs($user);
        $categoria = [
            'Category_Name' => 'test unitario',
        ];

        $response = $this->post('/api/categories', $categoria);

        $response->assertStatus(201); 
    }

    public function test_editar_categoria()
    {
        $categoria = [
            'Category_Name' => 'test unitario editado',
        ];
        $response = $this->put('/api/categories/update/2', $categoria);
        $response->assertStatus(200); 
    }
    public function test_eliminar_categoria()
    {
        $response = $this->delete('/api/categories/delete/2');

        $response->assertStatus(200); 
    }
}

