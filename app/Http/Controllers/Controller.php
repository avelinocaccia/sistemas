<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Controller extends BaseController
{
    //
    public function customValidate($request, $rules, $messages = [])
    {
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            throw new ValidationException($validator, response(['ok' => 0, 'message' => $validator->errors()->first(), "errors" => $validator->errors()->all()], 400));
        }
        return $validator->validated();
    }


    protected function resultOk($data, string $message = null)
    {
        $resp = [
            'ok' => 1,
        ];
        if ($message) {
            $resp['message'] = $message;
        }
        if ($data) {
            if (gettype($data) === 'object' && get_class($data) === "Illuminate\Pagination\LengthAwarePaginator") {
                $resp = $resp + $data->toArray();
            } else {
                $resp['data'] = $data;
            }
        }
        return response($resp, 200);
        // $data = !empty($data) ? $data : [];

        // return new JsonResponse([
        //     'ok' => 1,
        //     // 'message' => $message,
        //     'data' => $data
        // ]);
    }

}
