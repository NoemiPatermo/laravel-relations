<?php

namespace App\Http\Controllers;
use App\Article;
use App\Author;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail;

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
        $tags = Tag::all();//manda alla create la lista dei tag 
        $authors = Author::all();//manda alla create la lista dei tuoi autori
        return view('articles.create', compact('tags', 'authors'));//qui hai il form vuoto che al salvataggio dei dati li invia alla store
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request);
        $article = new Article(); //crei oggetto vuoto
        $this->fillAndSaveArticle($article, $request);//richiami la funzione che fa il match tra le proprietà del data e le salva 

        Mail::to('info@test.it')->send(new SendNewMail($article));//invii l'oggetto al costruttore

        return redirect()->route('articles.show', $article->id);//fai la redirect sulla rotta show, passando anche come parametro id che salva
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

    private function fillAndSaveArticle(Article $article,  Request $request) { //function privata che viene richiamata in store e in update

        $data = $request->all();  //ha un metodo interno all(), che ti torna in array associativo i dati inviati
        $article->title = $data['title'];
        $article->cover = $data['cover'];
        $article->author_id = $data['author_id'];//id Noemi id!remember always!
        $article->content = $data['content'];
        $article->save();// salva, il tuo articolo avrà id 

        foreach($data['tags'] as $tagId) {
            $article->tag()->attach($tagId);
        }
    }
}
