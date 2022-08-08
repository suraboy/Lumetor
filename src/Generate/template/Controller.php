<?php

namespace App\Http\Controllers\V1\{replace};

use App\Models\{replace};
use App\Http\Requests\{replace}\Index{replace}Request;
use App\Http\Requests\{replace}\Store{replace}Request;
use App\Http\Requests\{replace}\Show{replace}Request;
use App\Http\Requests\{replace}\Update{replace}Request;
use App\Http\Requests\{replace}\Delete{replace}Request;
use App\Transformers\{replace}Transformer;
use {repository};
use App\Http\Controllers\ApiController;
use Symfony\Component\HttpFoundation\Response;

class {replace}Controller extends ApiController
{
    /**
     * Instance of Repository
     *
     * @var Repository
     */
    private ${replace_sm}Repository;
    /**
     * Instanceof Resource
     *
     * @var Resource
     */
    private ${replace_sm}Transformer;

    /**
     * Constructor
     *
     * @param {replace}Repository ${replace_sm}Repository
     * @param {replace}Transformer ${replace_sm}Transformer
     */
    public function __construct({replace}Repository ${replace_sm}Repository, {replace}Transformer ${replace_sm}Transformer)
    {
        $this->{replace_sm}Repository  = ${replace_sm}Repository;
        $this->{replace_sm}Transformer = ${replace_sm}Transformer;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Index{replace}Request $request)
    {

        $filters = [];
        if ($request->has('name')) {
            $filters['name'] = $request->input('name');
        }

        ${replace_sm}s = $this->{replace_sm}Repository->getAll($filters);

        return $this->respondWithCustomCollection(${replace_sm}s, $this->{replace_sm}Transformer);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function show(Show{replace}Request $request, $id)
    {
        ${replace_sm} = $this->{replace_sm}Repository->findById($id);

            if (!${replace_sm} instanceof {replace}) {
            return $this->sendNotFoundResponse("The {replace_sm} with id {$id} doesn't exist");
        }

        return $this->respondWithCustomItem(${replace_sm}, $this->{replace_sm}Transformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store{replace}Request $request
     * @return \Illuminate\Http\JsonResponse|string
     * @throws \Throwable
     */
    public function store(Store{replace}Request $request)
    {
        ${replace_sm} = $this->{replace_sm}Repository->create($request->all());

            if (!${replace_sm} instanceof {replace}) {
            return $this->sendCustomResponse(Response::HTTP_EXPECTATION_FAILED, 'Error occurred on creating {replace}');
        }

        return $this->setStatusCode(201)->respondWithCustomItem(${replace_sm}, $this->{replace_sm}Transformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Update{replace}Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update(Update{replace}Request $request, $id)
    {
        ${replace_sm} = $this->{replace_sm}Repository->findById($id);

            if (!${replace_sm} instanceof {replace}) {
            return $this->sendNotFoundResponse("The {replace_sm} with id {$id} doesn't exist");
        }

        ${replace_sm} = $this->{replace_sm}Repository->update(${replace_sm}, $request->all());

        return $this->respondWithCustomItem(${replace_sm}, $this->{replace_sm}Transformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|string
     * @throws \Throwable
     */
    public function destroy(Delete{replace}Request $request, $id)
    {
        ${replace_sm} = $this->{replace_sm}Repository->findById($id);

            if (!${replace_sm} instanceof {replace}) {
            return $this->sendNotFoundResponse("The {replace_sm} with id {$id} doesn't exist");
        }

        $this->{replace_sm}Repository->destroy(${replace_sm});

        return $this->responseDeleteSuccess();
    }
}
