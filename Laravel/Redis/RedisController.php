<?php

namespace App\Http\Controllers;

use App\RedisModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

class RedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $data = Redis::lrange('redis-list', 0, -1);

        return view('redis.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return view('redis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        Redis::rpush('redis-list', $request->value);

        return redirect()->route('redis.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id): Response
    {
        $data = Redis::lindex('redis-list', $id);

        return view('redis.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id): Response
    {
        Redis::lset('redis-list', $id, $request->value);

        return redirect()->route('redis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id): Response
    {
        Redis::lrem('redis-list', 0, Redis::lindex('redis-list', $id));

        return redirect()->route('redis.index');
    }
}