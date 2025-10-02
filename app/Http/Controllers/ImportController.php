<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('import');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida se o arquivo foi enviado e se é do tipo CSV ou TXT
        $request->validate([
            'arquivo' => 'required|mimes:csv,txt' // Validação para garantir que o arquivo é um CSV ou TXT
        ]);
    
        // Verifica se o arquivo foi de fato enviado na requisição
        if ($request->hasFile('arquivo')) {
            // Armazena o arquivo na pasta 'uploads' com seu nome original
            $arquivo = $request->file('arquivo');
            $caminho = $arquivo->storeAs('uploads', $arquivo->getClientOriginalName());
            
            // Gera o caminho completo para o arquivo armazenado na pasta 'storage/app/uploads'
            $caminhoCompleto = storage_path('app/' . $caminho);
    
            // Abre o arquivo CSV para leitura
            if (($handle = fopen($caminhoCompleto, 'r')) !== false) {
                // Itera sobre cada linha do arquivo até o final
                while (($dados = fgetcsv($handle, 1000, ',')) !== false) {
                    // Imprime os dados da linha atual como um array
                    print_r($dados);
                }
                // Fecha o arquivo após a leitura
                fclose($handle);
            }
            
            // Retorna uma mensagem de sucesso após a leitura do arquivo
            return 'Arquivo lido com sucesso';
        }
        
        // Retorna uma mensagem de erro caso o arquivo não tenha sido processado
        return 'Erro ao processar o arquivo';
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
