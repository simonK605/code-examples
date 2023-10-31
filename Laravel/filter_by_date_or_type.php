<?php

// Here is the example for the filters in Laravel
// And we are returning page with Inertia js

namespace App\Http\Controllers;

use App\Http\Requests\Post\IndexApplicationRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Carbon\Carbon;
use Inertia\Inertia;
use Inertia\Response;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IndexPostRequest $request
     * @return Response
     */
    public function index(IndexPostRequest $request): Response
    {
        $start = isset($request->startDate) ? Carbon::parse($request->startDate)->format("Y/m/d") : '';
        $end = isset($request->endDate) ? Carbon::parse($request->endDate)->format("Y/m/d") : '';
        $typeId = $request->typeId ?? null;

        $query = Post::query();

        if ($start && $end) {
            $query->whereDate('post_data_time','<=', $end)->whereDate('post_data_time','>=', $start);
        }
        if ($typeId) {
            $query->where('post_type_id', '=', $typeId);
        }

        return Inertia::render('Test/Index', [
            'startDate' => $start,
            'endDate' => $end,
            'typeId' => $typeId,
            'data' => DataResource::collection($query-->paginate(10)),
        ]);
    }
}