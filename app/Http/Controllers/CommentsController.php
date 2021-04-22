<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cardon\Cardon;

class CommentsController extends Controller
{
    public function post(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "share_id" => $request->share_id,
            "user_id" => $request->user_id,
            "content" => $request->content,
            "created_at" => $now,
            "update_at" => $now
        ];
        DB::table('comments')->insert($param);
        return response()->json([
            'message' => 'Comment created successfully',
            'data' => $param
        ], 200);
    }
}
