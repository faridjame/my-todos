@extends('tasks.layout') @section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Task Details</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ URL::route('tasks.index') }}">
                Back</a
            >
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $task->name }}</h5>
        <p class="card-text">{{ $task->description }}</p>
        <p class="card-text">
            <small class="text-muted"
                >Target Completion Date:
                {{ \Carbon\Carbon::parse($task->target_date)->format('m/d/Y') }}</small
            >
        </p>
    </div>
</div>
@endsection
