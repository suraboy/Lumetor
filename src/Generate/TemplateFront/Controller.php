<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */

namespace App\Http\Controllers\{replace};

use App\Http\Controllers\Controller;
use App\Http\Requests\{replace}\Get{replace}Request;
use App\Http\Requests\{replace}\Detail{replace}Request;
use App\Http\Requests\{replace}\Update{replace}Request;
use App\Http\Requests\{replace}\Create{replace}Request;
use App\Http\Requests\{replace}\Delete{replace}Request;
use App\Http\Requests\{replace}\Update{replace}PostRequest;
use App\Http\Requests\{replace}\Create{replace}PostRequest;
use App\Http\Requests\{replace}\Delete{replace}PostRequest;
use App\Http\Requests\{replace}\Delete{replace}AjaxRequest;
use App\Http\Requests\{replace}\Update{replace}AjaxRequest;
use App\Http\Requests\{replace}\Create{replace}AjaxRequest;
use App\Repository\{replace}\{replace}Repository;

class {replace}Controller extends Controller
{
    /**
     * {replace_sm} repository
     * @var object class
     */
    protected ${replace_sm};

    public function __construct({replace}Repository ${replace_sm})
    {
        $this->{replace_sm} = ${replace_sm};
    }

    /**
     * [get{replace}ListView]
     * @param  {replace}GetViewRequest $request [validation]
     * @return view object
     */
    public function get{replace}ListView()
    {
        return $this->{replace_sm}->getViewList();
    }

    /**
     * [get{replace}DetailView]
     * @param  {replace}GetDetailViewRequest $request [validation]
     * @return view object
     */
    public function get{replace}DetailView(Detail{replace}Request $request)
    {
        return $this->{replace_sm}->getViewDetail($request->id);
    }

    /**
     * [get{replace}EditView]
     * @param  {replace}GetEditViewRequest $request [validate]
     * @return view object
     */
    public function get{replace}EditView(Update{replace}Request $request)
    {
        return $this->{replace_sm}->getViewEdit($request->id);
    }

    /**
     * [get{replace}CreateView]
     * @return view object
     */
    public function get{replace}CreateView()
    {
        return $this->{replace_sm}->getViewCreate();
    }

    /**
     * [post{replace}Create]
     * @param  {replace}PostCreateRequest $request [validate]
     * @return redirect
     */
    public function post{replace}Create(Create{replace}PostRequest $request)
    {
        $this->{replace_sm}->createData($request->all());
        return redirect()->route('{replace_snc}.list')
            ->with(['message' => trans('alert.success')]);
    }

    /**
     * [post{replace}Update]
     * @param  {replace}PostUpdateRequest $request [validate]
     * @return redirect
     */
    public function post{replace}Update(Update{replace}PostRequest $request)
    {
        $this->{replace_sm}->upadateData($request->all());
        return redirect()->route('{replace_snc}.list')
            ->with(['message' => trans('alert.success')]);
    }

    /**
     * [post{replace}Delete]
     * @param  {replace}PostUpdateRequest $request [validate]
     * @return redirect
     */
    public function post{replace}Delete(Delete{replace}PostRequest $request)
    {
        $this->{replace_sm}->deleteData($request->id);
        return redirect()->route('{replace_snc}.list')
            ->with(['message' => trans('alert.success')]);
    }

    /**
     * [post{replace}CreateAjax]
     * @param  {replace}PostCreateAjaxRequest $request [validate]
     * @return object json
     */
    public function post{replace}CreateAjax(Create{replace}AjaxRequest $request)
    {
        $response = $this->{replace_sm}->createData($request->all());
        return response()->json($response);
    }

    /**
     * [post{replace}UpdateAjax]
     * @param  {replace}PostUpdateAjaxRequest $request [validate]
     * @return object json
     */
    public function post{replace}UpdateAjax(Update{replace}AjaxRequest $request)
    {
        $response = $this->{replace_sm}->upadateData($request->all());
        return response()->json($response);
    }

    /**
     * [post{replace}DeleteAjax]
     * @param  {replace}PostDeleteAjaxRequest $request [validate]
     * @return object json
     */
    public function post{replace}DeleteAjax(Delete{replace}AjaxRequest $request)
    {
        $response = $this->{replace_sm}->deleteData($request->id);
        return response()->json($response);
    }

}
