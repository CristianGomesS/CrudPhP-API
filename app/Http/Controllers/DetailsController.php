<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookDetailsStoreUpdateFormRequest;
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
    public function store(BookDetailsStoreUpdateFormRequest $request)
    {
       $request->validated();
    
        $this->detailsService->createDetails($request->all());
            return response()->json(['message' => 'Livro criado com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($detailsID)
    {
        $details =  $this->detailsService->findDetailsById($detailsID);
        return response()->json($details, 200);
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
    public function update($id, BookDetailsStoreUpdateFormRequest $request)
    {
        $details = $this->detailsService->findDetailsById($id);
      
        if (!$details) {
            return response()->json(['message' => 'detalhe não encontrado'], 404); 
        }
     
        $data = $request->validated();
     
       $this->detailsService->updateDetails($details, $data);
        
        return response()->json($details, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $detailsID)
    {
        $details = $this->detailsService->findDetailsById($detailsID);

            $this->detailsService->deleteDetails($details);

        return response()->json(['message' => 'Registro deletedo'], 200);
        }
}
