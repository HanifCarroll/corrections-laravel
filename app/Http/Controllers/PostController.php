<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Sentence;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user:id,name')->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        $post = new Post([
            'user_id' => auth()->id(),
            'title' => $request->get('title'),
            'text' => $request->get('text'),
        ]);

        $post->save();

        // Divide the post text into sentences
        $sentences = preg_split('/(?<=[.!?])\s+/', $post->text, -1, PREG_SPLIT_NO_EMPTY);

        // Create Sentence records for each sentence
        foreach ($sentences as $index => $sentenceText) {
            $sentence = new Sentence([
                'post_id' => $post->id,
                'sentence_number' => $index + 1,
                'original_text' => trim($sentenceText),
            ]);
            $sentence->save();
        }

        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
