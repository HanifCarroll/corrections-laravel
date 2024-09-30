<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostSentence;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user:id,name')->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

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

        // Create PostSentence records for each sentence
        foreach ($sentences as $index => $sentenceText) {
            $sentence = new PostSentence([
                'post_id' => $post->id,
                'sentence_number' => $index + 1,
                'text' => trim($sentenceText),
            ]);
            $sentence->save();
        }

        return redirect()->route('posts.show', $post);
    }

    public function show(string $id)
    {
        $post = Post::with(['user'])
            ->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
