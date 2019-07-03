<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */
namespace Lumpineevill\Request;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Response;

abstract class APIRequest extends FormRequest
{
    /**
     * set user
     * @var collection
     */
    protected $user;

    public function response(array $errors)
    {
        $header = array(
            'code' => '400',
            'message' => 'Bad Request',
        );
        $response = array(
            'header' => $header,
            'transaction_id' => ($this->has('transaction_id')) ? $this->get('transaction_id') : DATE('U'),
            'total' => 0,
            'count_result' => 0,
            'date_current' => date('Y-m-d H:i:s'),
        );
        $request = $this->all();
        $responseReturn = array_merge($response, $request);
        $responseReturn['data'] = $errors;
        return Response::json($responseReturn, 400);
    }
    /**
     * [validationData description]
     * @return [type] [description]
     */
    public function validationData()
    {
        return $this->all();
    }

    /**
     * overiding
     * @return [type] [description]
     */
    public function all()
    {
        $request = parent::all();
        # $request = $this->mappingRequest($request);
        # $request = $this->mergeUserAuth($request);
        # $request = $this->mappingOrderID($request);
        return $request;
    }
    /**
     * [mappingOrderID description]
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    private function mappingOrderID($request)
    {
        if (isset($this->genOrderId) && $this->genOrderId === true) {
            $request = array_merge($request, ['product_code' => genCode()]);
        }
        return $request;
    }

    /**
     * [mappingRequest description]
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    private function mappingRequest($request)
    {
        if (isset($this->mappingValue) && !empty($this->mappingValue)) {
            $request = array_merge($request, $this->mappingValue);
        }
        return $request;
    }

    /**
     * [mergeUserAuth description]
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    private function mergeUserAuth($request)
    {
        $user = $this->checkUserAuth();
        if (isset($user['id_user']) && $user['id_user'] != 0) {
            $request = array_merge($request, $user);
        }
        return $request;
    }

    /**
     * [mergeMerchatId description]
     * @return [type] [description]
     */
    private function mergeMerchatId($request)
    {
        $merchant = $this->getMerchantId();
        if (isset($user['merchant_id']) && $user['merchant_id'] != 0) {
            $request = array_merge($request, $merchant);
        }
        return $request;
    }

    /**
     * [checkUserAuth description]
     * @return [type] [description]
     */
    private function checkUserAuth()
    {
        try {
            $this->user = getMember();
            return ['user_id' => $this->user->id];
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * [getMerchantId description]
     * @param  [type] $idUser [description]
     * @return [type]         [description]
     */
    protected function getMerchantId()
    {
        try {
            $shop = $this->user->shop;
            return ['merchant_id' => $shop->id];
        } catch (Exception $e) {
            return false;
        }
    }

}
