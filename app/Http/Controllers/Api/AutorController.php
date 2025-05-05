<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\Autor;
use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;

class AutorController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        $pageSize = $request->get('pageSize', 5);
        $dir = $request->get('dir', 'asc');
        $props = $request->get('props', 'id');
        $search = $request->get('search', '');

        $query = Autor::select('id', 'nome', 'email')
                ->whereNull('deleted_at')
                ->orderBy($props, $dir);

        $total = $query->count();

        $data = $query->offset( ($page - 1) * $pageSize) // pode usar o Autor::paginate(5);
                      ->limit($pageSize)
                      ->get();

        $totalPages = ceil($total / $pageSize);

        return response()->json([
            'message'=>'Relatório de Autores',
            'status'=>200,
            'page'=>$page,
            'pageSize'=>$pageSize,
            'dir'=>$dir,
            'props'=>$props,
            'search'=>$search,
            'total'=>$total,
            'totalPages'=>$totalPages,
            'data'=>$data,
        ], 200);
    }

    public function store(StoreAutorRequest $request) //feito com request outra forma de fazer
    {
        $data = Autor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Autor Cadastrado com Sucesso',
            'data' => $data,
            'status' => 201,
        ], 201);
    }

    public function show(Request $request, string $id)
    {
        $data = Autor::findOrFail($id);

        if (!$data) {
            throw new HttpResponseException(
                response()->json('Autor não localizado'),
                404
            );
        }

        return response()->json([
            'message' => 'Autor localizado com Sucesso',
            'data' => $data,
            'status' => 200,
        ], 200);
    }

    public function update(UpdateAutorRequest  $request, string $id)
    {
        
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro nas informações do autor',
                'data' => $validator->errors(),
                'status' => 404,
            ], 404);
        }

        $data = Autor::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Autor não localizado',
                'data' => $id,
                'status' => 404,
            ], 404);
        }

        $data->name = $request->name ?? $data->name;
        $data->email = $request->email ?? $data->email;

        if ($request->has("password")) {
            $data->password = Hash::make($request->password);
        }

        $data->save();

        return response()->json([
            'message' => 'Autor alterado com sucesso',
            'data' => $data,
            'status' => 200,
        ], 200);
    }

    public function destroy(Request $request, string $id)
    {
        $data = Autor::find($id);

        if (!$data) {
            return response()->json([
                'message' => 'Autor não localizado',
                'data' => $id,
                'status' => 404,
            ], 404);
        }

        $data->delete();

        return response()->json([
            'message' => 'Autor Excluído com Sucesso',
            'status' => 200,
        ], 200);
    }
}
