@extends('layouts.app')

@section('content')

    <h1>Create new Project</h1>

    <form action="{{ route('dashboard.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="New title: max 4 words">
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input type="file" class="form-control" id="img" name="img" placeholder="Image URL">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Insert a description"></textarea>
          </div>

        <div class="mb-3">
            <label for="software" class="form-label">Softwares utilised</label>
            <input type="text" class="form-control" id="software" name="software" placeholder="New title: max 4 words">
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select name="type_id" class="form-select @error('type_id') is_invalid @enderror">
              <option value="">Choose...</option>
              @foreach ($types as $type)
                 <option value="{{ $type->id }}
                    {{ $type->id == old('type_id') ? 'selected' : '' }}">{{ $type->name }}</option>
              @endforeach
            </select>
        </div>

        <button class="btn btn-primary " type="submit">Create project</button>
    </form>
@endsection