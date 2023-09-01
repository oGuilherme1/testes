<?php

namespace App\Http\Controllers\General;

use App\Models\Utils\SearchUtils;
use DB;
use App\Http\Controllers\Controller;
use App\Models\General\Matricula;
use App\Models\General\Cargo;
use App\User;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function GridView(){
        return view('general.matricula.MatriculaGrid');
    }

    public function EditView($id){
        $matricula = Matricula::find($id);
        $cargo = Cargo::all();
        $usuario = User::all();
        $dataDesformatada = date('d/m/Y', strtotime($matricula->data_admissao));


        return view('general.matricula.MatriculaForm', [
            'action' => 'edit',
            'matricula' => $matricula,
            'dataDesformatada' => $dataDesformatada,
            'cargo' => $cargo,
            'usuario' => $usuario
        ]);
    }

    public function AddView(){
        $cargo = Cargo::all();
        $usuario = User::all();

        return view('general.matricula.MatriculaForm', [
            'action' => 'add',
            'cargo' => $cargo,
            'usuario' => $usuario
        ]);
    }

    public function View($id)
    {

        $matricula = Matricula::find($id);
        $cargo = Cargo::all();
        $usuario = User::all();
        $dataDesformatada = date('d/m/Y', strtotime($matricula->data_admissao));
        return view('general.matricula.MatriculaForm', [
            'action' => 'view',
            'matricula' => $matricula,
            'cargo' => $cargo,
            'usuario' => $usuario,
            'dataDesformatada' => $dataDesformatada,

        ]);
    }

    
    public function listar(Request $request)
    {

        $query = DB::table('matricula AS MA')
        ->selectRaw("MA.id, U.name AS nome_usuario, C.nome_cargo, MA.data_admissao, MA.salario_funcionario, MA.ativo, IF(MA.ativo = 1,'Ativo','Inativo') as ativo_escrito")
        ->join('cargo AS C', 'MA.cargo_id', '=', 'C.idcargo')
        ->join('users AS U', 'MA.user_id', '=', 'U.id')
        ->orderBy('id');
    

        $query = SearchUtils::createQuery($request, $query, 'having');

        return $query->get();
    }


    public function insert(Request $request)
    {

        //Validação do Formulário
        $this->validaForm($request);

        $salario_limpo = str_replace(['R$', ','], '', $request->salario_funcionario);
        $dataFormatada = date('Y-d-m', strtotime($request->data_admissao));

        //IMPORTANTE! - INICIALIZA-SE A TRANSAÇÃO
        DB::beginTransaction();
        try {

            $obj = new Matricula();

            $obj->user_id = $request->usuario;
            $obj->cargo_id = $request->cargo;
            $obj->data_admissao = $dataFormatada;
            $obj->salario_funcionario = $salario_limpo;
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

        $salario_limpo = str_replace(['R$', ','], '', $request->salario_funcionario);
        $dataFormatada = date('Y-d-m', strtotime($request->data_admissao));

        //IMPORTANTE! - INICIALIZA-SE A TRANSAÇÃO
        DB::beginTransaction();
        try {

            $obj = Matricula::find($id);

            $obj->user_id = $request->usuario;
            $obj->cargo_id = $request->cargo;
            $obj->data_admissao = $dataFormatada;
            $obj->salario_funcionario = $salario_limpo;
            $obj->ativo = $request->ativo;
            $obj->save();


        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);

        }

        DB::commit();
        return response()->json(['success' => true, 'message' => 'Registro Editado com Sucesso!']);
    }


    public function delete($id)
    {
        DB::beginTransaction();

        $obj = Matricula::find($id);

        try {
            $obj->delete();
            DB::commit();
            return response()->json(['success' => true, 'message' => 'O registro foi deletado com sucesso !']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Não foi possível deletar o registro, verifique se existe algum impedimento no cadastro.', 'type' => 'danger']);
        }
    }







    private  function validaForm(Request $request)
    {


        //INÍCIO DAS VALIDAÇÕES
        $this->validate($request, [
            'usuario' =>'required',
            'cargo' => 'string|required|max:250',
            'data_admissao' =>'required',
            'salario_funcionario' =>'required',
            'ativo' => 'boolean|required',
        ]);
        //FIM DAS VALIDAÇÕES
    }
}
