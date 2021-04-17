@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-left">
            <div class="card-header">Todos</div>
            <div class="card-body">
                <div x-data = '{
                    editTodoItem: null,
                    todos: [
                        {
                            id:1 ,
                            todo: "purchase food",
                            isCompleted: "true"
                        },
                        {
                            id:2 ,
                            todo: "cook food",
                            isCompleted: "true"
                        },
                        {
                            id:3 ,
                            todo: "eat food",
                            isCompleted: "true"
                        }
                    ],
                    todo: "",
                }'>
                <input type="search" class="form-control" x-model='todo' @keydown.enter ='
                    if(editTodoItem){
                        editTodoItem.todo = todo;
                        editTodoItem = null;
                    } else {
                        todos.push({id:4, todo: todo, isCompleted:false});
                    }
                    todo = ""
                    '>

                <ul class="list-group mt-4">
                    <template x-for="todoItem in todos">
                        <li class="list-group-item d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" :id='`todo-${todoItem.id}`' :checked='todoItem.isCompleted'
                                @change = "todoItem.isCompleted = !todoItem.isCompleted">
                                <label x-text="todoItem.todo" :for='"todo-"+ todoItem.id' class="ml-3"
                                  ></label>
                                <template x-if='todoItem.isCompleted'>
                                    <div class="badge badge-success">
                                        done
                                    </div>
                                </template>
                            </div>
                            <div>
                                <button class="btn btn-secondary btn-sm" @click = 'editTodoItem = todoItem,
                                todo = todoItem.todo'>
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" @click = "todos = todos.filter(function(oldTodo){
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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endpush
@endsection
