<?php

namespace App\Repositories;

use App\Models\Author;


class AuthorRepository
{
    protected $authorModel;

    public function __construct(Author $model)
    {
        $this->authorModel = $model;
    }

    public function getAll()
    {
        try {
            // Retorna os dados com as colunas solicitadas
            return author::where('is_delete', 0)
                ->get(['id','Nome','is_delete']); // Retorna apenas os dados sem Response
        } catch (\Exception $e) {
            // Retorna uma resposta JSON apenas em caso de erro
            return response()->json(['error' => 'Erro ao buscar autor: ' . $e->getMessage()], 500);
        }
    }

    public function  create($data)
    {   

        return $this->authorModel->create($data);
    }
    public function find($id)
    {
        try {
            return author::where('id', $id)
                       ->firstOrFail();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar Detalhe: ' . $e->getMessage()], 500);
        } 
   
    }

    public function delete($author)
    {
  
        if (is_null($author)) {
            return response()->json(['mensagem' => ' autor não existe']);
        }
        // Verifica se o registro já foi excluído logicamente (soft delete)
        if ($author->is_delete == 0) {
            // Se já foi deletado logicamente, deletar permanentemente
            $author->is_delete = 1;
        } else {
            // Se ainda não foi deletado logicamente, realizar soft delete
            $author->is_delete = 0;
        }

        $author->save();

        return $author;
    }
    public function update($author, $data)
    {
        //dd(array_merge($data, ["id" => $id]));
        
        if (is_null($author)) {
            return response()->json(['mensagem' => ' autor não existe']);
        }
        return $author->update($data);
    }
}
