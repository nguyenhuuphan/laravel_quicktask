@extends('master')

@section('title', 'Tasks')

@section('content')

    @include('common.errors')

    <div class="tasks-list">

        <div class="navbar bg-dark navbar-dark">
            <span class="navbar-brand title">@lang('task.current_task_title')</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#task-list">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse show" id="task-list">
            <table class="table table-hover table-bordered">
                <thead class="text-center">
                    <th>@lang('common.name')</th>
                    <th>@lang('common.action')</th>
                </thead>
                <tbody class="text-center">
                    @foreach ($tasks as $task)
                        <tr>
                                <td class="task-name">{{ $task->name }}</td>
                                <td class="action-btn">
                                    <span class="edit-btn"><a url="{{ route('task.update') }}" data="{{ $task->id }}" class="btn btn-success">@lang('common.edit')</a></span>
                                     | 
                                    <span class="delete-btn"><a class="btn btn-danger" href="{{ route('task.delete', $task->id) }}">&times;</a></span>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="addTask-form">

        <div class="navbar bg-dark navbar-dark">
            <span class="navbar-brand title">@lang('task.add_task')</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#add-form">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="add-form">
            <form action="{{ route('task.add') }}" method="Post">
                {{ csrf_field() }}
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" name="name" placeholder="Task Name">
                    <div class="input-group-append">
                      <button class="btn btn-success" type="submit">@lang('task.add_task')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
