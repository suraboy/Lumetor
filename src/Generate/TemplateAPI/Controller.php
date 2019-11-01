<?php

namespace App\Http\Controllers\V1\{replace};

use App\Http\Controllers\Controller;
use App\Http\Requests\{replace}\Get{replace}Request;
use App\Http\Requests\{replace}\Create{replace}Request;
use App\Http\Requests\{replace}\Update{replace}Request;
use App\Http\Requests\{replace}\Show{replace}Request;
use App\Http\Requests\{replace}\Delete{replace}Request;
use App\Repository\{replace}\{replace}Repository;
use App\Transformers\{replace}Transformer;

class {replace}Controller extends Controller
{

    /**
     * set {replace_sm} repository
     * @var object
     */
    protected ${replace_sm};

    /**
     * set {replace_sm} transform
     * @var object
     */
    protected ${relace_tm};

    /**
     * [__construct description]
     * @param {replace}Repository ${replace_sm} [description]
     */
    public function __construct(
        {replace}Repository ${replace_sm} ,
        {relace_tm}Transformer ${relace_tm})
    {
        $this->{replace_sm} = ${replace_sm};
        $this->{relace_tm} = ${relace_tm};
    }

    /**
     * [create{replace} description]
     * @param  {replace}CreateRequest $request [description]
     * @return [type]                          [description]
     */
    public function store(Create{replace}Request $request)
    {
        $query = $this->{replace_sm}->create($request->all());

        return $this->setStatusCode(201)->respondWithItem($query, $this->{relace_tm});
    }

    /**
     * [get{replace} description]
     * @param  {replace}GetRequest $request [description]
     * @return [type]                          [description]
     */
    public function index(Get{replace}Request $request)
    {
        $query = $this->{replace_sm}->paginate();

        return $this->respondWithCollection($query, $this->{relace_tm});
    }

    /**
     * [show{replace} description]
     * @param  {replace}ShowRequest $request [description]
     * @return [type]                          [description]
     */
    public function show(Show{replace}Request $request)
    {
        $query = $this->{replace_sm}->find($request->id);

        return $this->respondWithItem($query, $this->{relace_tm});
    }

    /**
     * [delete{replace} description]
     * @param  {replace}DeleteRequest $request [description]
     * @return [type]                          [description]
     */
    public function destroy(Delete{replace}Request $request,$id)
    {
        $query = $this->{replace_sm}->delete($id);
        return $this->responseDeleteSuccess();
    }

    /**
     * [update{replace} description]
     * @param  {replace}UpdateRequest $request [description]
     * @return [type]                          [description]
     */
    public function update(Update{replace}Request $request)
    {
        $query = $this->{replace_sm}->update($request->all(), $id);
        return $this->respondWithItem($query, $this->{relace_tm});
    }

}
