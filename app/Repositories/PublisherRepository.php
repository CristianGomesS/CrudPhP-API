<?php

namespace App\Repositories;


use App\Models\Publisher;

class PublisherRepository
{
    protected $PublisherModel;

    public function __construct(Publisher $model)
    {
        $this->PublisherModel = $model;
    }

    public function getAll()
    {
        try {
            // Retorna os dados com as colunas solicitadas
            return Publisher::where('is_delete', 0)
                ->get(['id','nome','is_delete']); // Retorna apenas os dados sem Response
        } catch (\Exception $e) {
            // Retorna uma resposta JSON apenas em caso de erro
            return response()->json(['error' => 'Erro ao buscar Editora: ' . $e->getMessage()], 500);
        }
    }

    public function  create($data)
    {   

        return $this->PublisherModel->create($data);
    }
    public function find($id)
    {
        try {
            return Publisher::where('id', $id)
                       ->firstOrFail();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar Editora: ' . $e->getMessage()], 500);
        } 
   
    }

    public function delete($publisher)
    {
        // Encontra o livro, incluindo os que já foram soft deleted
        // $book = $this->bookModel->withTrashed()->findOrFail($id);

        //$book = Book::findOrFail($book);
        if (is_null($publisher)) {
            return response()->json(['mensagem' => ' Editora não existe']);
        }
        // Verifica se o registro já foi excluído logicamente (soft delete)
        if ($publisher->is_delete == 0) {
            // Se já foi deletado logicamente, deletar permanentemente
            $publisher->is_delete = 1;
        } else {
            // Se ainda não foi deletado logicamente, realizar soft delete
            $publisher->is_delete = 0;
        }

        $publisher->save();

        return $publisher;
    }
    public function update($publisher, $data)
    {
        //dd(array_merge($data, ["id" => $id]));
        
        if (is_null($publisher)) {
            return response()->json(['mensagem' => ' Editora não existe']);
        }
        return $publisher->update($data);
    }
}
