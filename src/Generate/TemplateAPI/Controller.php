<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */
namespace App\Http\Controllers\{replace};

use App\Http\Controllers\Controller;
use App\Http\Requests\{replace}\Get{replace}Request;
use App\Http\Requests\{replace}\Create{replace}Request;
use App\Http\Requests\{replace}\Update{replace}Request;
use App\Http\Requests\{replace}\Delete{replace}Request;
use App\Repository\{replace}\{replace}Repository;

class {replace}Controller extends Controller
{

    /**
     * set {replace_sm} repository
     * @var object
     */
    protected ${replace_sm};

    /**
     * [__construct description]
     * @param {replace}Repository ${replace_sm} [description]
     */
    public function __construct({replace}Repository ${replace_sm})
    {
        $this->{replace_sm} = ${replace_sm};
    }

    /**
     * [create{replace} description]
     * @param  {replace}CreateRequest $request [description]
     * @return [type]                          [description]
     */
    public function create{replace}(Create{replace}Request $request)
    {
        $query = $this->{replace_sm}->createData($request->all());
        return response()->json($query); 
    }

    /**
     * [get{replace} description]
     * @param  {replace}GetRequest $request [description]
     * @return [type]                          [description]
     */
    public function get{replace}List(Get{replace}Request $request)
    {
        $query = $this->{replace_sm}->search($request->all())->getData();
        return response()->json($query);   
    }

    /**
     * [delete{replace} description]
     * @param  {replace}DeleteRequest $request [description]
     * @return [type]                          [description]
     */
    public function delete{replace}(Delete{replace}Request $request)
    {   
        $query = $this->{replace_sm}->delete($request->all());
        return response()->json($query);
    }

    /**
     * [update{replace} description]
     * @param  {replace}UpdateRequest $request [description]
     * @return [type]                          [description]
     */
    public function update{replace}(Update{replace}Request $request)
    {
        $query = $this->{replace_sm}->updateData($request->all());
        return response()->json($query);   
    }

}
