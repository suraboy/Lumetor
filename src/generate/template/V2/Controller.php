<?php

namespace App\Http\Controllers\V1;

use App\Criterias\RequestCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\{replace}\Index{replace}Request;
use App\Http\Requests\{replace}\Store{replace}Request;
use App\Http\Requests\{replace}\Show{replace}Request;
use App\Http\Requests\{replace}\Update{replace}Request;
use App\Http\Requests\{replace}\Delete{replace}Request;
use App\Transformers\{replace}Transformer;
use App\Repositories\{replace}\{replace}RepositoryEloquent;

class {replace}Controller extends Controller
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
    public function __construct({replace}RepositoryEloquent ${replace_sm}Repository, {replace}Transformer ${replace_sm}Transformer)
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
        $this->{replace_sm}Repository->pushCriteria(new RequestCriteria());

        $model = $this->{replace_sm}Repository->paginate();

        return $this->respondWithCollection($model, $this->{replace_sm}Transformer);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function show(Show{replace}Request $request, $id)
    {
        $model = $this->{replace_sm}Repository->find($id);

        return $this->respondWithItem($model, $this->{replace_sm}Transformer);
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
        $model = $this->{replace_sm}Repository->create($request->all());

        return $this->setStatusCode(201)->respondWithItem($model, $this->{replace_sm}Transformer);
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
        $model = $this->{replace_sm}Repository->update($request->all(), $id);

        return $this->respondWithItem($model, $this->{replace_sm}Transformer);
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
        $this->{replace_sm}Repository->delete($id);

        return $this->responseDeleteSuccess();
    }
}
