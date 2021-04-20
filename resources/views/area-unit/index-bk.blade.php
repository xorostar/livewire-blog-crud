@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Todos</div>
        <div class="card-body">
            <div x-data='{
                todoToEdit: null,
                todos: [
                    {
                        id: uuid.v4(),
                        todo: "Cook food",
                        isCompleted: false
                    },
                    {
                        id: uuid.v4(),
                        todo: "Buy grocery",
                        isCompleted: true
                    }
                ],
                todo: ""}'>
                <input type="text" x-model='todo' class='form-control mb-2' @keydown.enter='
                        if(todoToEdit){
                            todoToEdit.todo = todo;
                            todoToEdit = null;
                        }else{
                            todos.push({id: uuid.v4(), todo: todo, isCompleted: false});
                        }
                        todo = ""
                    '>
                <hr>
                <ul class="list-group">
                    <template x-for='todoItem in todos'>
                        <li class='list-group-item d-flex align-items-center justify-content-between'>
                            <div class='d-flex align-items-center'>
                                <input type="checkbox" class='mr-2' :id='`todo-${todoItem.id}`'
                                    :checked='todoItem.isCompleted'
                                    @change='todoItem.isCompleted = !todoItem.isCompleted'>
                                <label class='mb-0' :for='"todo-" + todoItem.id' x-text='todoItem.todo'></label>
                                <template x-if='todoItem.isCompleted'>
                                    <div class="badge badge-success ml-2">
                                        Done
                                    </div>
                                </template>
                            </div>
                            <div>
                                <button class="btn btn-secondary btn-sm"
                                    @click="todoToEdit = todoItem; todo = todoItem.todo;">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" @click="todos = todos.filter(function(oldTodo){
                                    return oldTodo.id != todoItem.id
                                })">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/node-uuid/1.4.8/uuid.min.js"
    integrity="sha512-rV0Q1QWodkoLjts/qP2XHtjvUPTmN46k4eH0lzOR3mDui8a0YnL/uqydipXA9mQ2wG6J4imL0BO6/26rcFho7Q=="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endpush

@endsection
