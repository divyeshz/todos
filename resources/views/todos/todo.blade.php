<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>

    {{-- include Navbar --}}
    @include('layouts.nav')

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6 my-5">

                {{-- include Flash Message --}}
                @include('layouts.flash')

                <h1>Todos</h1>
                <hr>

                {{-- New Task Add Area --}}
                <h3>
                    Add New Task
                </h3>

                <form action="{{ route('todos.add') }}" method="post">
                    @csrf

                    <div class="row">

                        <!-- Task input -->
                        <div class="col-10">
                            <input class="form-control" type="text" name="task" placeholder="Add New Task">
                            @if ($errors->has('task'))
                                <span class="text-danger">{{ $errors->first('task') }}</span>
                            @endif
                        </div>

                        <!-- Save buttons -->
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>

                {{-- Pending Tasks List Area ( Edit And Delete ) --}}
                <div class="my-5">
                    <hr>
                    <h3>
                        Pending Tasks
                    </h3>

                    <ul class="list-group my-3">

                        @forelse ($ptodo as $ptd)
                            <li class="list-group-item">{{ $ptd->task }}
                                <div class="d-inline float-end">
                                    <button type="button" id="" data-id="{{ $ptd->id }}"
                                        class="pending_task_edit btn btn-primary">Edit</button>
                                    <form action="{{ route('todos.delete', $ptd->id) }}" method="post" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>

                                {{-- Div for Edit Form --}}
                                <div id="editform{{ $ptd->id }}">
                                </div>

                            </li>
                        @empty
                            <p>No Tasks Found</p>
                        @endforelse

                    </ul>
                </div>

                {{-- Completed Tasks List Area ( Edit And Delete ) --}}
                <div class="my-5">
                    <hr>
                    <h3 class="my-3">
                        Completed Tasks
                    </h3>

                    <ul class="list-group my-3">

                        @forelse ($ctodo as $ctd)
                            <li class="list-group-item">{{ $ctd->task }} <div class="d-inline float-end">
                                    <button type="button" id="" data-id="{{ $ctd->id }}"
                                        class="complete_task_edit btn btn-primary">Edit</button>
                                    <form action="{{ route('todos.delete', $ctd->id) }}" method="post" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>

                                {{-- Div for Edit Form --}}
                                <div id="editform{{ $ctd->id }}">

                                </div>
                            </li>
                        @empty
                            <p>No Tasks Found</p>
                        @endforelse

                    </ul>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            // hide alert-box
            $("#alert-box").delay(3000).fadeOut();

            // Show Edit Form
            $(".complete_task_edit , .pending_task_edit").click(function() {
                let id = $(this).attr("data-id");
                $.ajax({
                    url: '{{ route('todos.edit') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                    },
                    error: function() {
                        console.log('Something is wrong');
                    },
                    success: function(data) {
                        $('#editform' + id).html(data);
                    }
                });
            });

            // Remove Edit Form on Cancel Button
            $(document).on("click", ".cancel", function() {
                let id = $(this).attr("data-id");
                $("#editform" + id).html("");
            });

        });
    </script>
</body>

</html>
