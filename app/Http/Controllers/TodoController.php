<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodosTable;

class TodoController extends Controller
{
    //

    public function index() {
        $todo = TodosTable::all();
        return view('index')->with('todos', $todo);
    }
    public function create() {
        return view('create');
    }
    public function store() {


        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required']
            ]);
        } catch (ValidationException $e) {
        }


        $data = request()->all();


        $todo = new TodosTable();
        //On the left is the field name in DB and on the right is field name in Form/view
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo created succesfully');

        return redirect('/');

    }
    public function details(TodosTable $todo) {
        return view('details')->with('todos', $todo);
    }
    public function edit(TodosTable $todo) {
        return view('edit')->with('todos', $todo);
    }
    public function update(TodosTable $todo){

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

        session()->flash('success', 'Todo updated successfully');

        return redirect('/');

    }
    public function delete(TodosTable $todo) {
        $todo->delete();

        return redirect('/');
    }
}
