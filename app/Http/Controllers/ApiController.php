<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function productById($id){
        $item   =   DB::table('items')
            ->where('id', $id)
            ->first();
        return response()->json($item);
    }
}
