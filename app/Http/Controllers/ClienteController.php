<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function __construct(private ClienteRepository $repository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->repository->getAllClientes()
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
    public function store(StoreClienteRequest $request): JsonResponse
    {
        $validateData = $request->validate();
        
        return response()->json([
            'data' => $this->repository->createCliente($validateData)
        ], HttpResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        return response()->json([
            'data' => $this->repository->getClienteById($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, $id): JsonResponse
    {
        Log::info('chegou no update');
        
        try {
            return response()->json([
                'data' => $this->repository->updateCliente($request->toArray(), $id)
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
    public function destroy($id)
    {
        return response()->json([
            'data' => $this->repository->deleteCliente($id)
        ], HttpResponse::HTTP_NO_CONTENT);
    }
}
