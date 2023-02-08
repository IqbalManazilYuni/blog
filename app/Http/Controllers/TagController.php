<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    private $jumlahpage = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = $request->get('keyword') ? Tag::search($request->keyword)->paginate($this->jumlahpage)
            : Tag::paginate($this->jumlahpage);
        return view('tags.index', [
            'tags' => $tags->appends(['keyword' => $request->keyword])
        ]);
    }

    public function select(Request $request)
    {
        $tags = [];
        if ($request->has('q')) {
            $tags = Tag::select('id', 'title')->search($request->q)->get();
        } else {
            $tags = Tag::select('id', 'title')->limit(5)->get();
        }
        return response()->json($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:25',
            'slug' => 'required|string|unique:tags,slug',
        ])->validate();
        try {
            Tag::create([
                'title' => $request->title,
                'slug' => $request->slug,
            ]);
            Alert::success('Tambah Tag', 'success');
            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            Alert::error('Tambah Kategori', 'Tidak Berhasil' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tag $tag)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:25',
            'slug' => 'required|string|unique:tags,slug,' . $tag->id
        ])->validate();
        try {
            $tag->update([
                'title' => $request->title,
                'slug' => $request->slug,
            ]);
            Alert::success('Edit Tag', 'success');
            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            Alert::error('Edit Kategori', 'Tidak Berhasil' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tag $tag)
    {
        try {
            $tag->delete();
            Alert::success('Hapus Tag', 'success');
            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            Alert::error('Hapus Kategori', 'Tidak Berhasil' . $th->getMessage());
            return redirect()->back();
        }
    }
}
