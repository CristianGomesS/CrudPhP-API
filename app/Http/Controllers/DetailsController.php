<?php

namespace App\Http\Controllers;

use App\Services\ServiceBookDetails;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    protected $detailsService;

    public function __construct(ServiceBookDetails $serviceDetails)
    {
        $this->detailsService = $serviceDetails;
    }
    public function index()
    {
        $details = $this->detailsService->getAllDetails();
        return response()->json($details, 200);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $detalhe = $this->detailsService->findDetailsById($id);
      
        if (!$detalhe) {
            return response()->json(['message' => 'detalhe não encontrado'], 404);  // HTTP 404: Not Found
        }
     
        $data = $request->all();
     
        // Chama o serviço para criar o livro
       $this->detailsService->updateDetails($detalhe, $data);
        
        return response()->json($detalhe, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $details)
    {
        //
    }
}
