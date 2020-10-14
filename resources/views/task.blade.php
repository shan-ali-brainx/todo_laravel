@extends('layouts.app')

@section('content')
    <div class="card card-default mb-5">
        <div class="card-body">
            <form action="/task" method="POST" class="form-horizontal">
                @csrf

                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task</label>
                    <div class="col-sm-6">
                        <input type="text" name='name' id="task-name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>Add Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (count($tasks) > 0)
        <div class="card card-default">
            <div class="card-header">
                Current Tasks
            </div>
            <div class="card-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $task->name}}</div>
                                </td>
                                <td>
                                    <!-- TODO: Delete Button -->
                                    <form action="/task/{{$task->id}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger">Delete Task</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection()
