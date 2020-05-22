@extends('tasks.layout') @section('content')
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-7">
        <div class="card">
            <div class="card-header">
                <svg
                    class="bi bi-circle mr-1"
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z"
                        clip-rule="evenodd"
                    />
                </svg>
                My Open Tasks
            </div>
            <ul class="list-group list-group-flush mb-0">
                @foreach ($open_tasks as $open_task)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-1 col-md-1 col-lg-1 text-center">
                            <div class="form-check">
                                <input
                                    title="Mark as Complete"
                                    data-route="{{ route('tasks.update',$open_task->id) }}"
                                    class="form-check-input"
                                    type="radio"
                                    name="complete"
                                    id="complete"
                                    value="{{ $open_task->id }}"
                                />
                            </div>
                        </div>
                        <div class="col-sm-11">
                            <form
                                class="float-right"
                                action="{{ route('tasks.destroy',$open_task->id) }}"
                                method="POST"
                            >
                                <a
                                    class="btn btn-outline-primary"
                                    title="Edit"
                                    href="{{ URL::route('tasks.edit', $open_task->id) }}"
                                >
                                    <svg
                                        class="bi bi-pencil-square"
                                        width="1em"
                                        height="1em"
                                        viewBox="0 0 16 16"
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </a>
                                @csrf @method('DELETE')
                                <button
                                    title="Delete"
                                    type="submit"
                                    class="btn btn-outline-danger delete-task"
                                >
                                    <svg
                                        class="bi bi-trash"
                                        width="1em"
                                        height="1em"
                                        viewBox="0 0 16 16"
                                        fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </form>
                            <h2
                                class="mb-1 text-truncate"
                                style="max-width: 600px; font-size: 1.5rem;"
                            >
                                <a
                                    class="text-dark"
                                    href="{{ URL::route('tasks.show', $open_task->id) }}"
                                >
                                    {{ $open_task->name }}
                                </a>
                            </h2>
                            <small
                                >Due by:
                                <strong
                                    >{{ \Carbon\Carbon::parse($open_task->target_date)->format('m/d/Y') }}</strong
                                >
                            </small>
                            <p
                                class="mt-3 text-secondary text-truncate mb-0"
                                style="max-width: 400px;"
                            >
                                {{ $open_task->description }}
                            </p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="mt-1">
            {{ $open_tasks->appends(['complete' => $completed_tasks->currentPage()])->links() }}
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-5">
        <div class="card">
            <div class="card-header">
                <svg
                    class="bi bi-check-circle mr-1"
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z"
                        clip-rule="evenodd"
                    />
                    <path
                        fill-rule="evenodd"
                        d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z"
                        clip-rule="evenodd"
                    />
                </svg>
                My Completed Tasks
            </div>
            <ul class="list-group list-group-flush mb-0">
                @foreach ($completed_tasks as $completed_task)
                <li class="list-group-item">
                    <h2
                        class="mb-1 text-truncate"
                        style="max-width: 600px; font-size: 1.5rem;"
                    >
                        <del>
                            <a
                                class="text-dark"
                                href="{{ URL::route('tasks.show', $completed_task->id) }}"
                            >
                                {{ $completed_task->name }}
                            </a>
                        </del>
                    </h2>
                    <small class="d-block"
                        >Due by:
                        <strong
                            >{{ \Carbon\Carbon::parse($completed_task->target_date)->format('m/d/Y') }}</strong
                        ></small
                    >
                    <small class="d-block"
                        >Completed on:
                        <strong
                            >{{ \Carbon\Carbon::parse($completed_task->completed_date)->format('m/d/Y') }}</strong
                        ></small
                    >
                    <p
                        class="mt-3 text-secondary text-truncate mb-0"
                        style="max-width: 400px;"
                    >
                        {{ $completed_task->description }}
                    </p>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="mt-1">
            {{ $completed_tasks->appends(['open' => $open_tasks->currentPage()])->links() }}
        </div>
    </div>
</div>
@endsection
