<?php
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()){
        return view('home');
    }

    return view('auth.login');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('Login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('Login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);


/*ROTAS DA APLICAÇÃO*/
/**Perfil de Usuário*/
route::post('PerfilUsuario/GridView', ['as' => 'perfil_usuario.GridView','uses' => 'General\PerfilUsuarioController@GridView']);
route::post('PerfilUsuario/Novo', ['as' => 'perfil_usuario.AddView','uses' => 'General\PerfilUsuarioController@AddView']);
route::post('PerfilUsuario/Editar/{id}', ['as' => 'perfil_usuario.EditView','uses' => 'General\PerfilUsuarioController@EditView']);
route::post('PerfilUsuario/Visualizar/{id}', ['as' => 'perfil_usuario.View','uses' => 'General\PerfilUsuarioController@View']);
route::post('PerfilUsuario/Salvar', ['as' => 'perfil_usuario.insert','uses' => 'General\PerfilUsuarioController@insert']);
route::post('PerfilUsuario/Atualizar/{id}', ['as' => 'perfil_usuario.update','uses' => 'General\PerfilUsuarioController@update']);
route::post('PerfilUsuario/Deletar/{id}', ['as' => 'perfil_usuario.delete','uses' => 'General\PerfilUsuarioController@delete']);
route::post('PerfilUsuario/Listar', ['as' => 'perfil_usuario.listar','uses' => 'General\PerfilUsuarioController@listar']);


/**Usuario*/
route::post('Usuario/GridView', ['as' => 'usuario.GridView','uses' => 'General\UsuarioController@GridView']);
route::post('Usuario/Novo', ['as' => 'usuario.AddView','uses' => 'General\UsuarioController@AddView']);
route::post('Usuario/Editar/{id}', ['as' => 'usuario.EditView','uses' => 'General\UsuarioController@EditView']);
route::post('Usuario/Visualizar/{id}', ['as' => 'usuario.View','uses' => 'General\UsuarioController@View']);
route::post('Usuario/Salvar', ['as' => 'usuario.insert','uses' => 'General\UsuarioController@insert']);
route::post('Usuario/Atualizar/{id}', ['as' => 'usuario.update','uses' => 'General\UsuarioController@update']);
route::post('Usuario/Deletar/{id}', ['as' => 'usuario.delete','uses' => 'General\UsuarioController@delete']);
route::post('Usuario/Listar', ['as' => 'usuario.listar','uses' => 'General\UsuarioController@listar']);

/**Atividade 1**/
route::post('Atividades/FormView/{atividade}', ['as' => 'atividades.FormView','uses' => 'General\AtividadesController@FormView']);
route::post('Atividades/ResolucaoPendente', ['as' => 'atividades.ResolucaoPendente','uses' => 'General\AtividadesController@ResolucaoPendente']);





