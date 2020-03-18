@extends('layouts.base')

@section('content')
    <div class="flex-center position-ref full-height">
        <h1>Todo list</h1>
        <button>Добавить</button>
        <table>
            <tr>
                <th>Id</th>
                <th>Purpose</th>
                <th>Description</th>
                <th>Category</th>
            </tr>
            @foreach($todos as $todo)
                <tr>
                    <td>
                        {{ $todo->id }}
                    </td>
                    <td>
                        {{ $todo->purpose }}
                    </td>
                    <td>
                        {{ $todo->description }}
                    </td>
                    <td>
                        {{ $todo->category }}
                    </td>
                    <td>
                        <button class="deleteButton" data-id="{{  $todo->id }}">Удалить</button>
                        <p><a  data-id="{{  $todo->id }}" class="openModal">Редактировать</a></p>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <!-- Modal HTML embedded directly into document -->
    <div id="ex1" class="modal">
        <p>Thanks for clicking. That felt good.</p>
        <form>
            <label>Purpose</label>
            <input type="text" name="purpose">
            <br>
            <label>Description</label>
            <input type="text" name="description">
            <br>
            <label>Category</label>
            <input type="text" name="category">
            <br>
            <input type="hidden" name="id">
            <input type="submit"/>
        </form>
        </form>
        <a href="#" rel="modal:close">Close</a>
    </div>

    <!-- Link to open the modal -->

@endsection