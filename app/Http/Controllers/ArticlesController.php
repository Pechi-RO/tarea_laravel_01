<?php

namespace App\Http\Controllers;

use App\Models\articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=articles::orderBy('nombre')->paginate(10);
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['required','string','min:5','unique:articles,nombre'],
            'descripcion'=>['required','string','min:5']
        ]);
        articles::create($request->all());
        return redirect()->route('articles.index')->with("mensaje","article creado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(articles $articles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(articles $articles)
    {
        return view('articles.edit',compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, articles $articles)
    {
        $request->validate([
            'nombre'=>['required','string','min:5','unique:articles,nombre'.$articles->nombre],
            'descripcion'=>['required','string','min:5']
        ]);
        $articles->update($request->all());
        return redirect()->route('articles.index')->with("mensaje","article editado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(articles $articles)
    {
        $articles->delete();
        return redirect()->route('articles.index')->with("mensaje",'article borrado');
    }
}
