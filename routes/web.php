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


/**Cargos */
route::post('Cargo/GridView', ['as' => 'cargo.gridView','uses' => 'General\CargoController@GridView']);
route::post('Cargo/Editar/{id}', ['as' => 'cargo.editView','uses' => 'General\CargoController@EditView']);
route::post('Cargo/Adicionar', ['as' => 'cargo.addView','uses' => 'General\CargoController@AddView']);
route::post('Cargo/View/{id}', ['as' => 'cargo.view','uses' => 'General\CargoController@View']);

route::post('Cargo/Inserir', ['as' => 'cargo.insert','uses' => 'General\CargoController@insert']);
route::post('Cargo/Update/{id}', ['as' => 'cargo.update','uses' => 'General\CargoController@update']);
route::post('Cargo/Listar', ['as' => 'cargo.listar','uses' => 'General\CargoController@listar']);
route::post('Cargo/Deletar/{id}', ['as' => 'cargo.delete','uses' => 'General\CargoController@delete']);


/**Matricula */
route::post('Matricula/GridView', ['as' => 'matricula.gridView','uses' => 'General\MatriculaController@GridView']);
route::post('Matricula/Editar/{id}', ['as' => 'matricula.editView','uses' => 'General\MatriculaController@EditView']);
route::post('Matricula/Adicionar', ['as' => 'matricula.addView','uses' => 'General\MatriculaController@AddView']);
route::post('Matricula/View/{id}', ['as' => 'matricula.view','uses' => 'General\MatriculaController@View']);

route::post('Matricula/Inserir', ['as' => 'matricula.insert','uses' => 'General\MatriculaController@insert']);
route::post('Matricula/Update/{id}', ['as' => 'matricula.update','uses' => 'General\MatriculaController@update']);
route::post('Matricula/Listar', ['as' => 'matricula.listar','uses' => 'General\MatriculaController@listar']);
route::post('Matricula/Deletar/{id}', ['as' => 'matricula.delete','uses' => 'General\MatriculaController@delete']);




/**Atividade 1**/
route::post('Atividades/FormView/{atividade}', ['as' => 'atividades.FormView','uses' => 'General\AtividadesController@FormView']);
route::post('Atividades/ResolucaoPendente', ['as' => 'atividades.ResolucaoPendente','uses' => 'General\AtividadesController@ResolucaoPendente']);


// RESOLUÇÂO
route::post('Atividades/Resolucao1', ['as' => 'atividades.resolucao1','uses' => 'General\UsuarioController@GridView']);

route::post('Atividades/Resolucao2', ['as' => 'atividades.resolucao2','uses' => 'General\formMsg@verForm']);

route::post('Atividades/Resolucao3', ['as' => 'atividades.resolucao3','uses' => 'General\CargoController@GridView']);

route::post('Atividades/Resolucao4', ['as' => 'atividades.resolucao4','uses' => 'General\MatriculaController@GridView']);






