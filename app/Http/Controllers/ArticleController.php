<?php

namespace App\Http\Controllers;
use App\Article;
use App\Author;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();//prendi tutti i dati e inviali alla index

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');//qui hai il form vuoto che al salvataggio dei dati li invia alla store
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();//ha un metodo interno all(), che ti torna in array associativo i dati inviati
        $article = new Article(); //crei oggetto vuoto
        $this->fillAndSaveArticle($article, $data);//richiami la funzione che fa il match tra le proprietà del data e le salva 
        return redirect()->route('articles.show');//fai la redirect sulla rotta show, passando anche come parametro id che salva
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id); //trova id specifico con variabile creata appositamente
        return view('articles.show', compact('article')); // e lo invia alla rotta show [template singolo post di dettaglio]
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
        //
    }

    private function fillAndSaveArticle(Article $article, $data) { //function privata che viene richiamata in store e in update
        
        $article->title = $data['title'];
        $article->cover = $data['cover'];
        $article->author = $data['author'];
        $article->content = $data['content'];
        $article->save();
    }
}
