<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
        $userdata = Todo::where('user_id', auth()->user()->id)->first();
        return response()->json(['status' => true, 'userdata' => $userdata], $this->successStatus);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $userdata = Todo::updateOrCreate(
            ['user_id' => auth()->user()->id],
            ['content' => $request->content]
        );

        return response()->json(['status' => true, 'userdata' => $userdata], $this->successStatus);
    }

    public function destroy()
    {
        $todo = Todo::where('user_id', auth()->user()->id)->first();
        $todo->delete();
        return response()->json(['status' => true], $this->successStatus);
    }
}
