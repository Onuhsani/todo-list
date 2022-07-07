<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoAppController extends Controller
{


    public function index()
    {
        $todo = Todo::all();
        return view('index')->with('todos', $todo);
    }


    public function create()
    {
        return view('create');
    }


    public function details(Todo $todo)
    {
        return view('details')->with('todos', $todo);
    }
    

    public function edit(Todo $todo)
    {
        return view('edit')->with('todos', $todo);
    }


    public function update(Todo $todo)
    {
        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required'],
           
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'update successfully');

        return redirect('/');
    
    }


   public function delete(Todo $todo)
   {
        $todo->delete();
        return redirect('/');
    }


    public function store()
    {
        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required']
            ]);
        } catch (ValidationException $e) {
        }


        $data = request()->all();
        $todo = new Todo();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'New activity added');

        return redirect('/');

    }
}