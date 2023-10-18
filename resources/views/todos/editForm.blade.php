<ul class="list-group mt-4">
    <li class="list-group-item">

        <form class="row g-3" action="{{ route('todos.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Task input -->
            <div class="col-4">
                <input type="text" class="form-control" name="task" value="{{ old('task', $data->task) }}"
                    placeholder="Enter Task Name">
            </div>

            <!-- Status input -->
            <div class="col-4" {{ $data->status }}>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option value="1" @if ($data->status == 1) selected @endif>Complete</option>
                    <option value="0" @if ($data->status == 0) selected @endif>Working</option>
                </select>
            </div>

            <!-- Update & Cancel buttons -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary ">Update</button>
                <button type="button" data-id="{{ $data->id }}" class="btn btn-secondary cancel">Cancel</button>
            </div>

        </form>

    </li>
</ul>
