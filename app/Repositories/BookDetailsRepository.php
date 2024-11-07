<?php

namespace App\Repositories;

use App\Models\BookDetails;


class BookDetailsRepository
{
    protected $BookDetailsModel;

    public function __construct(BookDetails $model)
    {
        $this->BookDetailsModel = $model;
    }

    public function getAll()
    {
        try {
            // Retorna os dados com as colunas solicitadas
            return BookDetails::where('is_delete', 0)
                ->get(['id', 'isbn', 'summary', 'page_count', 'edition']); // Retorna apenas os dados sem Response
        } catch (\Exception $e) {
            // Retorna uma resposta JSON apenas em caso de erro
            return response()->json(['error' => 'Erro ao buscar detalhes: ' . $e->getMessage()], 500);
        }
    }

    public function  create($data)
    {   

        return $this->BookDetailsModel->create($data);
    }
    public function find($id)
    {
        try {
            return BookDetails::where('id', $id)
                       ->firstOrFail();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar Detalhe: ' . $e->getMessage()], 500);
        } 
   
    }

    public function delete($details)
    {
        // Encontra o livro, incluindo os que já foram soft deleted
        // $book = $this->bookModel->withTrashed()->findOrFail($id);

        //$book = Book::findOrFail($book);
        if (is_null($details)) {
            return response()->json(['mensagem' => ' livro não existe']);
        }
        // Verifica se o registro já foi excluído logicamente (soft delete)
        if ($details->is_delete == 0) {
            // Se já foi deletado logicamente, deletar permanentemente
            $details->is_delete = 1;
        } else {
            // Se ainda não foi deletado logicamente, realizar soft delete
            $details->is_delete = 0;
        }

        $details->save();

        return $details;
    }
    public function update($details, $data)
    {
        //dd(array_merge($data, ["id" => $id]));
        
        if (is_null($details)) {
            return response()->json(['mensagem' => ' detalhes não existe']);
        }
        return $details->update($data);
    }
}
