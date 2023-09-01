<?php

namespace App\Http\Controllers\General;

use App\Models\Utils\SearchUtils;
use DB;
use App\Http\Controllers\Controller;
use App\Models\General\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CargoController extends Controller
{
    public function GridView()
    {
        return view('general.cargo.CargoGrid');
    }

    public function EditView($id){
        $cargo = Cargo::find($id);

        return view('general.cargo.CargoForm', [
            'action' => 'edit',
            'cargo' => $cargo

        ]);
    }

    public function AddView(){
        return view('general.cargo.CargoForm', [
            'action' => 'add'
        ]);
    }

    public function View($id)
    {

        $cargo = Cargo::find($id);
        return view('general.cargo.CargoForm', [
            'action' => 'view',
            'cargo' => $cargo,

        ]);
    }

    
    public function listar(Request $request)
    {

        $query = DB::table('cargo AS C')
            ->selectRaw("C.idcargo, C.nome_cargo, C.ativo, IF(C.ativo = 1,'Ativo','Inativo') as ativo_escrito")
            ->orderBy('idcargo');

        $query = SearchUtils::createQuery($request, $query, 'having');

        return $query->get();
    }


    public function insert(Request $request)
    {

        //Validação do Formulário
        $this->validaForm($request);

        //IMPORTANTE! - INICIALIZA-SE A TRANSAÇÃO
        DB::beginTransaction();
        try {

            $obj = new Cargo();

            $obj->nome_cargo = $request->cargo;
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

        //IMPORTANTE! - INICIALIZA-SE A TRANSAÇÃO
        DB::beginTransaction();
        try {

            $obj = Cargo::find($id);

            $obj->nome_cargo = $request->cargo;
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

        $obj = Cargo::find($id);

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
            'cargo' => 'string|required|max:250',
            'ativo' => 'boolean|required',
        ]);
        //FIM DAS VALIDAÇÕES
    }

}
