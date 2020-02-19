@extends('master')

@section('title', 'Tasks')

@section('content')
    <div class="tasks-list">

        <div class="navbar bg-dark navbar-dark">
            <span class="navbar-brand title">@lang('task.current_task')</span>
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
                    <tr>
                        <td class="task-name">1</td>
                        <td class="delete-btn btn btn-danger">&times;</td>
                    </tr>
                    <tr>
                        <td class="task-name">2</td>
                        <td class="delete-btn btn btn-danger">&times;</td>
                    </tr>
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
            <form action="{{ url('task') }}" method="Post">
                {{ csrf_field() }}
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" name="name" placeholder="@lang('task.task_name')">
                    <div class="input-group-append">
                      <button class="btn btn-success" type="submit">@lang('task.add_task')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
