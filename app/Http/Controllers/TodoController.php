<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ptodo = Todo::where('status', '=', '0')->get();
        $ctodo = Todo::where('status', '=', '1')->get();
        return view('todos/todo', compact('ptodo', 'ctodo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the form
        $validator = Validator::make($request->all(), [
            'task' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('todos/list')->withErrors($validator);
        }

        // store the data
        Todo::create([
            'task' => $request->get('task')
        ]);

        // redirect
        return redirect('todos/list')->with('success', 'Task Added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $data = Todo::findOrFail($request->id);
        return view('todos/editForm', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $todo_data = Todo::findOrFail($id);
        $update_data = [
            "task" => $request->task,
            "status"=> $request->status,
        ];
        $todo_data->update($update_data);
        return redirect('todos/list')->with('success', 'Task Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete the todo
        Todo::findOrFail($id)->delete();
        return redirect('todos/list')->with('success', 'Task Deleted!');
    }
}
