<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
// use DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Chat::all();
        // return Chat::where('id', 1)->get();
        // $chats = Chat::take(1)->get();
        // $chats = Chat::all();
        // $chats = DB::select('SELECT * FROM chats');
        // $chats = Chat::orderBy('created_at', 'asc')->get();
        // $chats = Chat::orderBy('created_at', 'asc')->paginate(1);
        $chats = Chat::orderBy('created_at', 'desc')->get();
        return view('home', ['chats' => $chats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // $chat = new Chat;
        // $chat->message = $request->message;
        // $chat->save();

        // $validated = $request->validate([
        //     'message' => 'string',
        // ]);
        // Chat::create($validated);

        $message = $request->message;
        Chat::create(['message' => $message]);

        // Add [message] to fillable property to allow mass assignment on [App\Models\Chat].

        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        // $chat = Chat::find($id);
        // if($chat) 
        return view('show')->with('chat', $chat);
        // abort(404);
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
    public function update(Request $request, Chat $chat): RedirectResponse
    {
        $message = $request->message;
        // $chat = Chat::find($id);
        $chat->message = $message;
        $chat->save();

        return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat): RedirectResponse
    {
        // $chat = Chat::find($id);
        $chat->delete();

        return redirect(route('index'));
    }
}
