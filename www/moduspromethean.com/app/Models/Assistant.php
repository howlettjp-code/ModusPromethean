<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistant; // you'll make this model later

class AssistantController extends Controller
{
    // GET /assistant/new
    public function create()
    {
        // Show step 1 of the wizard: name, origin, basic vibe
        return view('assistants.create');
    }

    // POST /assistant
    public function store(Request $request)
    {
        // Minimal validation for now
        $data = $request->validate([
            'name'   => 'required|string|max:100',
            'origin' => 'nullable|string|max:100',
            // add more fields as needed
        ]);

        // TODO: tie to authenticated user when auth is wired
        $assistant = Assistant::create([
            'name'   => $data['name'],
            'origin' => $data['origin'] ?? null,
            'config' => '{}', // placeholder JSON column for persona config
        ]);

        // Branch: continue wizard vs “explore settings on my own”
        $action = $request->input('action', 'wizard');

        if ($action === 'advanced') {
            return redirect()->route('assistants.edit', $assistant);
        }

        return redirect()->route('assistants.wizard', $assistant);
    }

    // GET /assistant/{assistant}/wizard
    public function wizard(Assistant $assistant)
    {
        // Show wizard UI: stepper for axes, modes, etc.
        return view('assistants.wizard', compact('assistant'));
    }

    // GET /assistant/{assistant}/settings
    public function edit(Assistant $assistant)
    {
        // Full psychosocial / persona config panel
        return view('assistants.edit', compact('assistant'));
    }
}
