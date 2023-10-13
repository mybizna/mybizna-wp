<?php

namespace Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Base\Http\Controllers\BaseController;

class RateController extends BaseController
{

    public function recordselect(Request $request)
    {
        $result = [
            'module'  => 'account',
            'model'   => 'rate',
            'status'  => 0,
            'total'   => 0,
            'error'   => 1,
            'records'    => [],
            'message' => 'No Records'
        ];

    
        return response()->json($result);
    }
}
