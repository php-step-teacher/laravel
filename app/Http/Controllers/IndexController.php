<?php
/**
 * Created by PhpStorm.
 * User: st
 * Date: 17.02.2020
 * Time: 20:33
 */

namespace App\Http\Controllers;
use App\Model\Todo;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $todos = Todo::get();

        return view('layouts.index', compact('todos'));
    }

    public function delete($id) {
        if($todo = Todo::find($id)) {
            $todo->delete();
        }
    }

    public function get($id) {
        if ($todo = Todo::find($id)) {
            return response()->json([
                'purpose' => $todo->purpose,
                'description' => $todo->description,
                'category' => $todo->category,
                'id' => $todo->id
            ]);
        } else {
            return response()->json();
        }
    }

    public function update(Request $request, $id)
    {
        if ($todo = Todo::find($id)) {
            $data = $request->all();
            $todo->purpose = $data['purpose'];
            $todo->save();
        }
    }
}