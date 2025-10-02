<?php

namespace App\Http\Controllers;

use App\Services\ServiceAuthor;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorStoreUpdateFormRequest;

class AuthorController extends Controller
{
    protected $authorService;

    public function __construct(ServiceAuthor $author)
    {
        $this->authorService = $author;
    }
    public function index()
    {
        $author = $this->authorService->getAllAuthor();
        return response()->json($author, 200);
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
    public function store(AuthorStoreUpdateFormRequest $request)
    {
        $data = $request->validated();
      
        $this->authorService->createAuthor($data);
            return response()->json(['message' => 'Author criada com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($authorID)
    {
        $author =  $this->authorService->findAuthorById($authorID);
        return response()->json($author, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, AuthorStoreUpdateFormRequest $request)
    {
        $author = $this->authorService->findAuthorById($id);
      
        if (!$author) {
            return response()->json(['message' => 'detalhe não encontrado'], 404);  // HTTP 404: Not Found
        }
     
        $data = $request->validated();
     
       $this->authorService->updateAuthor($author, $data);
        
        return response()->json($author, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $authorId)
    {
        $author = $this->authorService->findAuthorById($authorId);

            $this->authorService->deleteAuthor($author);

        return response()->json(['message' => 'Registro deletedo'], 200);
        }
}
