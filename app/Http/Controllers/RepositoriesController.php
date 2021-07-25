<?php

namespace App\Http\Controllers;
use App\Models\Repositories;
use Illuminate\Http\Request;

class RepositoriesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $repos = Repositories::all();
    return response()->json($repos);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {
      $repos = new Repositories($request->all());
      $repos->save();
      return response()->json(["message" => 'Informacoes foram salvas'], 200);
    } catch (\Exception $e) {
      return response()->json(["error" => $e, "message" => 'Erro inesperado ao salvar informacoes']);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Repositories  $repositories
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    try {
      $repos = Repositories::find($id);
      if ($repos) {
        $repos->update($request->all());
        return response()->json(["message" => 'Informacoes foram atualizadas'], 200);
      } else {
        return response()->json(["message" => 'ID nao encontrado no banco de dados'], 500);
      }
    } catch (\Exception $e) {
      return response()->json(["error" => $e, "message" => 'Erro inesperado ao alterar informacoes']);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Repositories  $repositories
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $repos = Repositories::find($id);
      if ($repos) {
        $repos->delete();
        return response()->json(["message" => 'Informacoes foram deletadas'], 200);
      } else {
        return response()->json(["message" => 'ID nao encontrado no banco de dados'], 500);
      }
    } catch (\Exception $e) {
      return response()->json(["error" => $e, "message" => 'Erro inesperado ao deletar informacoes']);
    }
  }
}
