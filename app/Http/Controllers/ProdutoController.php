<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Repositories\ProdutoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;

class ProdutoController extends Controller
{

    public function __construct(private ProdutoRepository $repository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->repository->getAllProduto()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request): JsonResponse
    {
        try {
            return response()->json([
                'data' => $this->repository->createProduto($request->toArray())
            ], HttpResponse::HTTP_CREATED);

        } catch (\Throwable $th) {
            return response()->json([
                'data' => [],
                'status' => '500'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        return response()->json([
            'data' => $this->repository->getProdutoById($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Cliente $cliente)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutoRequest $request, $id): JsonResponse
    {
        
        try {
            return response()->json([
                'data' => $this->repository->updateProduto($request->toArray(), $id)
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'data' => [],
                'status' => '500'
            ]);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        return response()->json([
            'data' => $this->repository->deleteProduto($id)
        ], HttpResponse::HTTP_NO_CONTENT);
    }
}
