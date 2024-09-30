<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Correction;

class CorrectionController extends Controller
{
    public function create(Post $post)
    {
        return view('corrections.create', compact('post'));
    }

    // Takes an array of objects with the following properties:
    // - text: string
    // - correction: string
    // - explanation: string
    // And creates a new Correction record with the given text, and a CorrectionSentence record for each object in the array.
    // If no correction exists for a given sentence, don't create the CorrectionSentence
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'corrections' => 'required|array',
            'corrections.*.text' => 'required|string',
            'corrections.*.correction' => 'nullable|string',
            'corrections.*.explanation' => 'nullable|string',
        ]);

        $correction = Correction::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);

        foreach ($request->corrections as $correctionData) {
            if (!empty($correctionData['correction'])) {
                $correction->correctionSentences()->create([
                    'correction_id' => $correction->id,
                    'post_sentence_id' => $post->sentences->where('text', $correctionData['text'])->first()->id,
                    'corrected_text' => $correctionData['correction'],
                    'explanation' => $correctionData['explanation'],
                ]);
            }
        }

        return redirect()->route('corrections.show', $correction);
    }

    public function show(Correction $correction)
    {
        $post = $correction->post;
        return view('corrections.show', compact('correction', 'post'));
    }

    public function destroy(Correction $correction)
    {
        $correction->delete();

        return redirect()->route('posts.show', $correction->post);
    }
}
