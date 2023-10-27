<?php

// Here is the example for the Inertia Laravel controller

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

// Requests
use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $tests = Test::all();
        return Inertia::render('admin/test/index', [
            'test' => $tests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('admin/test/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $img = $request->file('image')->store('testFolder');
        $test = Test::create([
            'name' => $request->name,
            'date' => $request->date,
            'image' => $img,
        ]);
        if ($test) {
            return redirect()->route('admin.test.index')->with('message', 'Test has been added successfully');;
        }
        return redirect()->route('admin.test.index')->with('message', 'Something went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param Test $test
     * @return Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Test $test
     * @return \Inertia\Response
     */
    public function edit(Test $test)
    {
        return Inertia::render('admin/test/Edit', [
            'test' => $test,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Test $test
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Test $test)
    {
        $img = $request->imageHidden;
        if($request->file('image')){
            Storage::delete($request->imageHidden);
            $img = $request->file('image')->store('testFolder');
        }
        $updatedTest = $test->update([
            'name' => $request->name,
            'date' => $request->date,
            'image' => $img,
        ]);
        if ($updatedTest) {
            return redirect()->route('admin.test.index')->with('message', 'Test has been edited successfully');
        }
        return redirect()->route('admin.test.index')->with('message', 'Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Test $test
     * @return RedirectResponse
     */
    public function destroy(Test $test)
    {
        if ($test->forceDelete()) {
            Storage::delete($test->image);
            return redirect()->route('admin.test.index')->with('message', 'Test has been deleted successfully');
        }
        return redirect()->route('admin.test.index')->with('message', 'Something went wrong');
    }
}
