<?php

namespace App\Http\Controllers\General;

use App\Models\Utils\SearchUtils;
use DB;
use App\Http\Controllers\Controller;
use App\Models\General\PerfilUsuario;
use Illuminate\Http\Request;
use PEAR2\Net\RouterOS;


class PerfilUsuarioController extends Controller
{

    public function GridView()
    {


        return view('general.perfil_usuario.PerfilUsuarioGrid', [



        ]);
    }


    public function AddView()
    {

        return view('general.perfil_usuario.PerfilUsuarioForm', [
            'action' => 'add'
        ]);
    }

    public function EditView($id)
    {

        $perfil = PerfilUsuario::find($id);

        if ($perfil->super){
            return response()->json(['success' => false,'message' => 'O perfil de SuperUsuário NÃO pode ser editado']);
        }


        return view('general.perfil_usuario.PerfilUsuarioForm', [
            'action' => 'edit',
            'perfil' => $perfil

        ]);
    }


    public function View($id)
    {

        $perfil = PerfilUsuario::find($id);
        return view('general.perfil_usuario.PerfilUsuarioForm', [
            'action' => 'view',
            'perfil' => $perfil

        ]);
    }

    /*
     * SEÇÃO 2
     * Métodos de CRUD, listagem, validação e outros
     */

    /**
     * Método que Insere uma nova ação
     * @param Request $request
     * @return type
     */
    public function insert(Request $request)
    {

        //Validação do Formulário
        $this->validaForm($request);

        //IMPORTANTE! - INICIALIZA-SE A TRANSAÇÃO
        DB::beginTransaction();
        try {

            $obj = new PerfilUsuario();

            $obj->nome = $request->nome;
            $obj->descricao = ($request->descricao)?$request->descricao:"";
            $obj->save();


        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);

        }

        DB::commit();
        return response()->json(['success' => true, 'message' => 'Registro Cadastrado com Sucesso!']);
    }

    public  function update(Request $request, $id)
    {
        //Validação do Formulário
        $this->validaForm($request);

        //IMPORTANTE! - INICIALIZA-SE A TRANSAÇÃO
        DB::beginTransaction();
        try {

            $obj = PerfilUsuario::find($id);

            $obj->nome = $request->nome;
            $obj->descricao = ($request->descricao)?$request->descricao:"";
            $obj->save();


        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);

        }

        DB::commit();
        return response()->json(['success' => true, 'message' => 'Registro Editado com Sucesso!']);
    }

    /**
     * Método de Deleção
     * @param type $id
     * @return type
     */
    public function delete($id)
    {
        DB::beginTransaction();
        $obj = PerfilUsuario::find($id);

        if ($obj->super){
            return response()->json(['success' => false,'message' => 'O perfil de SuperUsuário NÃO pode ser apagado']);
        }

        try {
            $obj->delete();
            DB::commit();
            return response()->json(['success' => true, 'message' => 'O registro foi deletado com sucesso !']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Não foi possível deletar o registro, verifique se existe algum impedimento no cadastro.', 'type' => 'danger']);
        }
    }

    public function listar(Request $request)
    {


        $query = DB::table('perfil_usuario')
                ->selectRaw('id, nome,descricao')
                ->orderBy('id');

        $query = SearchUtils::createQuery($request, $query, 'having');

        return $query->get();
    }

    private  function validaForm(Request $request)
    {


        //INÍCIO DAS VALIDAÇÕES
        $this->validate($request, [
            'nome' => 'string|required|max:250',
            'descricao' => 'string|nullable|max:1000',
        ]);
        //FIM DAS VALIDAÇÕES
    }

}
