<?php

namespace App\Http\Controllers;

use App\GraphQL\GraphQLService;
use Digia\GraphQL\Error\InvariantException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GraphQLController extends Controller
{

    /**
     * @var GraphQLService
     */
    private $graphqlService;

    /**
     * GraphQLController constructor.
     *
     * @param GraphQLService $graphqlService
     */
    public function __construct(GraphQLService $graphqlService)
    {
        $this->graphqlService = $graphqlService;
    }

    /**
     * @param Request $request
     * @return Response
     * @throws InvariantException
     */
    public function handle(Request $request): Response
    {
        $query         = $request->get('query');
        $variables     = $request->get('variables');
        $operationName = $request->get('operationName');

        $result = $this->graphqlService->executeQuery($query, $variables ?? [], $operationName);

        return new Response($result, 200, []);
    }

    /**
     * Renders the GraphiQL interactive query interface.
     *
     * @return View
     */
    public function renderGraphiQL(): View
    {
        return view('graphql');
    }
}
