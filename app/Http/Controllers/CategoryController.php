<?php

namespace App\Http\Controllers;

use App\Services\ServiceCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(ServiceCategory $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $details = $this->categoryService->getAllCategory();
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
        $data = $request->all();
      
        $this->categoryService->createCategory($data);
            return response()->json(['message' => 'Categoria criada com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($categoryID)
    {
        $category =  $this->categoryService->findCategoryById($categoryID);
        return response()->json($category, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $category = $this->categoryService->findCategoryById($id);
      
        if (!$category) {
            return response()->json(['message' => 'detalhe não encontrado'], 404);  // HTTP 404: Not Found
        }
     
        $data = $request->all();
     
        // Chama o serviço para criar o livrosro
       $this->categoryService->updateCategory($category, $data);
        
        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $categoryID)
    {
        $category = $this->categoryService->findcategoryById($categoryID);

            $this->categoryService->deleteBook($category);

        return response()->json(['message' => 'Registro deletedo'], 200);
        }
}
