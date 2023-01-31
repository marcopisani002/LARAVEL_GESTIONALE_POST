<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=post::orderBy("title")->get();
        return view("posts.index",["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepostRequest $request)
    {
        $data=$request->all();
        $data["public"] = key_exists("public", $data) ? true : false;
        $post=post::create($data);
        return redirect()->route("posts.show",$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
       
        return view("posts.show", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
       
        return view("posts.edit", ["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepostRequest  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepostRequest $request, post $post)
    {
         $data = $request->all();
        // $data = $request->validate($this->validationRules);
        // $data = $this->validation($request->all());

        // validated() usa le regole indicate nella funzione rules del StorePostRequest e ci ritorna i dati validati
        //$data = $request->validated();

        // Siccome usiamo la dependencyInjection, il fineOrFail viene fatto automaticamente
        // $post = Post::findOrFail($post->id);

        $data["public"] = key_exists("public", $data) ? true : false;

        $post->update($data);

        return redirect()->route("posts.show", $post->id)->with([
            "status" => "success",
            "message" => "Tutto è bene ciò che finisce bene"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
}
