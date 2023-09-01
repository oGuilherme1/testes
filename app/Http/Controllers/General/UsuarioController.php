<?php

namespace App\Http\Controllers\General;

use App\Models\General\PerfilUsuario;
use App\Models\Utils\SearchUtils;
use DB;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{

    public function GridView()
    {
        return view('general.usuario.UsuarioGrid', [

        ]);
    }


    public function AddView()
    {
        $perfis = PerfilUsuario::all();
        return view('general.usuario.UsuarioForm', [
            'action' => 'add',
            'perfis' => $perfis
        ]);
    }

    public function EditView($id)
    {

        $usuario = User::find($id);
        $dataDesformatada = date('d/m/Y', strtotime($usuario->data_nascimento));

        if ($usuario->id == 1){
            return response()->json(['success' => false,'message' => 'Este usuário NÃO pode ser editado!']);
        }
        $perfis = PerfilUsuario::all();
        return view('general.usuario.UsuarioForm', [
            'action' => 'edit',
            'usuario' => $usuario,
            'perfis' => $perfis,
            'dataDesformatada' => $dataDesformatada

        ]);
    }


    public function View($id)
    {

        $usuario = User::find($id);
        $perfis = PerfilUsuario::all();
        $dataDesformatada = date('d/m/Y', strtotime($usuario->data_nascimento));
        return view('general.usuario.UsuarioForm', [
            'action' => 'view',
            'usuario' => $usuario,
            'perfis' => $perfis,
            'dataDesformatada' => $dataDesformatada

        ]);
    }


    public function insert(Request $request)
    {

        //Validação do Formulário
        $this->validaForm($request);

        if (!$request->senha){
            return response()->json(['success' => false, 'message' => 'Informe a senha.']);
        }

        if ($request->senha != $request->senha_confirm){
            return response()->json(['success' => false, 'message' => 'As senhas não conferem. Por favor, informe a nova senha.']);
        }

        $tmp = User::whereEmail($request->email)->first();
        if ($tmp){
            return response()->json(['success' => false, 'message' => 'O email informado pertence à outro usuário.']);
        }

        $cpf = User::where('cpf', $request->cpf)->first();
        if ($cpf) {
            return response()->json(['success' => false, 'message' => 'O CPF informado pertence a outro usuário.']);
        }
        
        $dataFormatada = date('Y-d-m', strtotime($request->data_nascimento));
        //IMPORTANTE! - INICIALIZA-SE A TRANSAÇÃO
        DB::beginTransaction();
        try {

            $obj = new User();

            $obj->name = $request->nome;
            $obj->password = Hash::make($request->senha);
            $obj->email = $request->email;
            $obj->cpf = $request->cpf;
            $obj->data_nascimento = $dataFormatada;
            $obj->nome_da_mae = $request->nome_da_mae;
            $obj->ativo = 1;
            $obj->perfil_id = $request->perfil_id;
            $obj->ativo = $request->ativo;
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

        if ($request->senha && $request->senha != $request->senha_confirm){
            return response()->json(['success' => false, 'message' => 'As senhas não conferem. Por favor, informe a nova senha.']);
        }

        $tmp = User::whereEmail($request->email)->first();
        if ($tmp && $tmp->id != $id){
            return response()->json(['success' => false, 'message' => 'O email informado pertence à outro usuário.']);
        }

        $dataFormatada = date('Y-d-m', strtotime($request->data_nascimento));
        //IMPORTANTE! - INICIALIZA-SE A TRANSAÇÃO
        DB::beginTransaction();
        try {

            $obj = User::find($id);

            $obj->name = $request->nome;

            if ($request->senha){
                $obj->password = Hash::make($request->senha);
            }

            $obj->cpf = $request->cpf;
            $obj->data_nascimento = $dataFormatada;
            $obj->nome_da_mae = $request->nome_da_mae;
            $obj->email = $request->email;
            $obj->ativo = 1;
            $obj->perfil_id = $request->perfil_id;
            $obj->ativo = $request->ativo;
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

        $obj = User::find($id);

        if ($obj->id == 1){
            return response()->json(['success' => false,'message' => 'Este usuário NÃO pode ser apagado!']);
        }

        if ($obj->id == Auth::user()->id){
            return response()->json(['success' => false,'message' => 'Este usuário está logado no sistema. O mesmo não pode ser apagado.']);
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


        $query = DB::table('users AS USU')
                ->selectRaw("
                    USU.id, USU.name as nome_usuario, USU.email, USU.cpf, USU.data_nascimento, USU.nome_da_mae, PU.nome as nome_perfil,
                    USU.ativo, IF(USU.ativo = 1,'Ativo','Inativo') as ativo_escrito
                ")
                ->join('perfil_usuario AS PU','USU.perfil_id','=','PU.id')
                ->orderBy('id');

        $query = SearchUtils::createQuery($request, $query, 'having');

        return $query->get();
    }

    private  function validaForm(Request $request)
    {


        //INÍCIO DAS VALIDAÇÕES
        $this->validate($request, [
            'nome' => 'string|required|max:250',
            'email' => 'email|required|max:1000',
            'cpf' => 'required|max:15',
            'data_nascimento' => 'date|required',
            'nome_da_mae' => 'string|required|max:150',
            'perfil_id' => 'integer|required|min:1',
            'senha' => 'string|nullable|max:250',
            'senha_confirm' => 'string|nullable|max:250',
            'ativo' => 'boolean|required',
        ]);
        //FIM DAS VALIDAÇÕES
    }

}
