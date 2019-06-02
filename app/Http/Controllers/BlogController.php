<?php

namespace App\Http\Controllers;

use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blog::query()
            ->select('id', 'title', 'description', 'created_at')
            ->where('is_publish', '=', 1)
            ->whereNull('deleted_at')
            ->orderBy('created_at')
            ->get();

        return view('blogs.index', compact('posts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getWhereDate()
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now();

        $posts = Blog::query()
            ->select('id', 'title', 'description', 'created_at')
            ->where('is_publish', '=', 1)
            ->whereNull('deleted_at')
            ->where('created_at', '>=', $start)
            ->where('created_at', '<=', $end)
            ->orderBy('created_at')
            ->get();

        return view('blogs.date', compact('posts', 'start', 'end'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getWhereId()
    {
        $posts = Blog::query()
            ->select('id', 'title', 'description', 'created_at')
            ->where('is_publish', '=', 1)
            ->whereNull('deleted_at')
            ->where('id', '=', 1)
            ->Orwhere('id', '=', 5)
            ->Orwhere('id', '=', 19)
            ->orderBy('created_at')
            ->get();

        return view('blogs.in', compact('posts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTrashed()
    {
        $posts = Blog::query()
            ->select('id', 'title', 'description', 'created_at')
            ->onlyTrashed()
            ->get();

        return view('blogs.trash', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->description))
            return Redirect::back()->withWarning('სავალდებულოა ორივე ველი შეავსოთ.');

        Blog::query()->insert([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now()
        ]);

        return Redirect::back()->withSuccess('პოსტი წარმატებით დაემატა.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::query()
            ->find($id)
            ->delete();


        return Redirect::back()->withSuccess('პოსტი წარმატებით წაიშალა.');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function restore($id)
    {
        Blog::query()
            ->withTrashed()
            ->find($id)
            ->restore();

        return Redirect::back()->withSuccess('პოსტი წარმატებით აღდგა.');
    }
}
