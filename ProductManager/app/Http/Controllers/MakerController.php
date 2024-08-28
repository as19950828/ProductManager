<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maker;
use App\Http\Requests\MakerRequest;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $query = Maker::search($search);
        $makers = $query->paginate(10);
        return view('makers.index', compact('makers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('makers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakerRequest $request)
    {
        Maker::create([
            'name' => $request->name,
        ]);

        return to_route('makers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maker = Maker::find($id);
        if (is_null($maker)) {
            abort(404, "メーカーが見つかりませんでした");
        }
        return view('makers.show', compact('maker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maker = Maker::find($id);
        if (is_null($maker)) {
            abort(404, "メーカーが見つかりませんでした");
        }
        return view('makers.edit', compact('maker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MakerRequest $request, $id)
    {
        $maker = maker::find($id);
        if (is_null($maker)) {
            abort(404, "更新に失敗しました");
        }
        $maker->name = $request->name;
        $maker->save();
        return to_route('makers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maker = Maker::find($id);
        if (is_null($maker)) {
            abort(404, "削除に失敗しました");
        }
        $maker->delete();
        return to_route('makers.index');
    }
}
