@extends('layouts.app')

@section('content')
    <h1>Project list</h1>

    <a class="btn btn-primary my-4 " href="{{ route('dashboard.projects.create') }}">Create new project</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Image</th>
            <th scope="col" class="col-xs-1 col-md-3 col-lg-5 ">Description</th>
            <th scope="col">Software</th>
            <th scope="col">Type</th>
            <th scope="col" class="col-lg-2">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>
                  <a href="{{ route('dashboard.projects.show', ['project'=>$project[ 'id']]) }}">
                    {{ $project->title }}
                  </a>
                </td>
                <td>{{ $project->slug }}</td>
                <td>{{ $project->img }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->software }}</td>
                <td>
                  {{ $project->type_id }}
                </td>
                <td>
                    <a class="btn btn-primary mb-3" href="{{ route('dashboard.projects.edit', $project->id)}}">Edit project</a>
                    <form action="{{ route('dashboard.projects.destroy', $project->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">Delete project</button>
                    </form>
                </td>
                </tr>   
            @endforeach
        </tbody>
      </table>
@endsection