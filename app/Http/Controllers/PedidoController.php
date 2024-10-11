<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Mail\PedidoEmail;
use Illuminate\Support\Facades\Mail;
use Nette\Utils\Random;

class PedidoController extends Controller
{

    // public function __construct(private ProdutoRepository $repository)
    // {

    // }

    /**
     * Display a listing of the resource.
     */
    // public function index(): JsonResponse
    // {
    //     return response()->json([
    //         'data' => $this->repository->getAllProduto()
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {

        try {
            $cliente = Cliente::find($request['cliente_id'])->toArray();

            if (!$cliente ) {
                return response()->json([
                    'data' => [],
                    'status' => HttpResponse::HTTP_BAD_REQUEST,
                    'message' => 'Cliente não encontrado'
                ]);
            }

            $produtosIdList = Arr::pluck($request['produtos'], 'produto_id');

            $pedidoToken = Random::generate(1000000000, '0-9');
            $clienteNome = $cliente['nome'];

            $produtosCollection = [];
            foreach($produtosIdList as $produtoId) {
                $produto = Produto::find($produtoId)->toArray();

                if (!$produto) {
                    return response()->json([
                        'data' => [],
                        'status' => HttpResponse::HTTP_BAD_REQUEST,
                        'message' => 'Produto não encontrado'
                    ]);
                }

                $pedido = new Pedido([
                    'cliente_id' => $cliente['id'],
                    'produto_id' => $produto['id'],
                    'pedido_token' => $pedidoToken
                ]);

                $pedido->save();

                $produtosCollection[] = [
                    'foto' => $produto['foto'],
                    'nome' => $produto['nome']
                ];
            }

            $pedidoFull = [
                'pedidoToken' => $pedidoToken,
                'clienteNome' => $clienteNome,
                'produtosList' => $produtosCollection
            ];

            Mail::to('test@example.com')->queue(new PedidoEmail($pedidoFull));

            Log::info('Fim do pedido');

            return response()->json([
                'data' => [],
                'status' => HttpResponse::HTTP_CREATED,
                'message' => 'Pedido efetuado com sucesso'
            ]);
       
        } catch (\Throwable $th) {
            return response()->json([
                'data' => [],
                'status' => '500',
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show($id): JsonResponse
    // {
    //     return response()->json([
    //         'data' => $this->repository->getProdutoById($id)
    //     ]);
    // }

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
    // public function update(UpdateProdutoRequest $request, $id): JsonResponse
    // {
        
    //     try {
    //         return response()->json([
    //             'data' => $this->repository->updateProduto($request->toArray(), $id)
    //         ]);

    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'data' => [],
    //             'status' => '500'
    //         ]);
            
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id): JsonResponse
    // {
    //     return response()->json([
    //         'data' => $this->repository->deleteProduto($id)
    //     ], HttpResponse::HTTP_NO_CONTENT);
    // }
}
