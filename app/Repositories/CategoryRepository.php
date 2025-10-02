<?php

namespace App\Repositories;

use App\Models\Category;


class CategoryRepository
{
    protected $CategoryModel;

    public function __construct(Category $model)
    {
        $this->CategoryModel = $model;
    }

    public function getAll()
    {
        try {
            // Retorna os dados com as colunas solicitadas
            return Category::where('is_delete', 0)
                ->get(['id','category','is_delete']); // Retorna apenas os dados sem Response
        } catch (\Exception $e) {
            // Retorna uma resposta JSON apenas em caso de erro
            return response()->json(['error' => 'Erro ao buscar Categoria: ' . $e->getMessage()], 500);
        }
    }

    public function  create($data)
    {   

        return $this->CategoryModel->create($data);
    }
    public function find($id)
    {
        try {
            return Category::where('id', $id)
                       ->firstOrFail();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar Detalhe: ' . $e->getMessage()], 500);
        } 
   
    }

    public function delete($Category)
    {
        // Encontra o livro, incluindo os que já foram soft deleted
        // $book = $this->bookModel->withTrashed()->findOrFail($id);

        //$book = Book::findOrFail($book);
        if (is_null($Category)) {
            return response()->json(['mensagem' => ' livro não existe']);
        }
        // Verifica se o registro já foi excluído logicamente (soft delete)
        if ($Category->is_delete == 0) {
            // Se já foi deletado logicamente, deletar permanentemente
            $Category->is_delete = 1;
        } else {
            // Se ainda não foi deletado logicamente, realizar soft delete
            $Category->is_delete = 0;
        }

        $Category->save();

        return $Category;
    }
    public function update($Category, $data)
    {
        //dd(array_merge($data, ["id" => $id]));
        
        if (is_null($Category)) {
            return response()->json(['mensagem' => ' detalhes não existe']);
        }
        return $Category->update($data);
    }
}
