<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublisherStoreUpdateFormRequest;
use App\Services\ServicePublisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    protected $publisherService;

    public function __construct(ServicePublisher $publisher)
    {
        $this->publisherService = $publisher;
    }
    public function index()
    {
        $publisher = $this->publisherService->getAllPublisher();
        return response()->json($publisher, 200);
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
    public function store(PublisherStoreUpdateFormRequest $request)
    {
        $data = $request->validated();
      
        $this->publisherService->createPublisher($data);
            return response()->json(['message' => 'Author criada com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($publisherId)
    {
        $publisher =  $this->publisherService->findPublisherById($publisherId);
        return response()->json($publisher, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $publisher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, PublisherStoreUpdateFormRequest $request)
    {
        $publisher = $this->publisherService->findPublisherById($id);
      
        if (!$publisher) {
            return response()->json(['message' => 'Editora não encontrado'], 404);  // HTTP 404: Not Found
        }
     
        $data = $request->validated();
     
        // Chama o serviço para criar o livrosro
       $this->publisherService->updatePublisher($publisher, $data);
        
        return response()->json($publisher, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $publisherId)
    {
        $publisher = $this->publisherService->findPublisherById($publisherId);

            $this->publisherService->deletePublisher($publisher);

        return response()->json(['message' => 'Registro deletedo'], 200);
        }
}
