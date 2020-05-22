@extends('tasks.layout') @section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Add New Task</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-primary" href="{{ URL::route('tasks.index') }}">
                Back</a
            >
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br /><br />
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <div class="form-group row">
        <label class="col-3 col-form-label" for="name">
            Name
        </label>
        <div class="col-9">
            <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Name"
                required
            />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3 col-form-label" for="description">
            Description
        </label>
        <div class="col-9">
            <textarea
                class="form-control"
                style="height: 150px;"
                name="description"
                placeholder="Description"
                required
            ></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="target-completion-date" class="col-3 col-form-label">
            Target Completion Date
        </label>
        <div class="col-9">
            <input
                class="form-control"
                type="date"
                value=""
                id="target_date"
                name="target_date"
                min="<?= date('Y-m-d') ?>"
                required
            />
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary float-right">
                Submit
            </button>
        </div>
    </div>
</form>
@endsection
