<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
        $todo = Todo::where('user_id', auth()->user()->id)->first();
        return response()->json(['status' => true, 'todo' => $todo], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $todo = App\Todo::updateOrCreate(
            ['user_id' => auth()->user()->id],
            ['content' => $request->content]
        );

        return response()->json(['status' => true, 'todo' => $todo], $this-> successStatus);
    }

    public function destroy()
    {
        $todo = Todo::where('user_id', auth()->user()->id)->first();
        $todo->delete();
        return response()->json(['status' => true], $this-> successStatus);
    }
}
