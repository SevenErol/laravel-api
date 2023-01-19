@extends ('layouts.app')

@section ('content')

<div class="container p-3">
    <h1 class="text-center mb-4">Laravel CRUD table admin</h1>

    <table class="table p-5">
        <thead>
            <div class="row justify-content-between p-3 bg-light m-0 border-bottom border-dark align-items-center">
                <div class="col-2"><strong>All data</strong></div>
                <div class="col-2 text-end"><a href="{{ route('admin.project.create') }}" type="button" class="btn btn-primary">Add new data</a></div>
            </div>

            @include ('partials.message')
            <tr class="bg-light">
                <th scope="col">ID</th>
                <th scope="col">Cover image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <th scope="row">{{ $project['id']}}</th>
                <td>
                    @if($project->cover_image)
                    <img width="140" class="img-fluid" src="{{asset('storage/' . $project->cover_image)}}" alt="">
                    @else
                    <div class="placeholder p-5 bg-secondary d-flex align-items-center justify-content-center" style="width:140px">Placeholder</div>
                    @endif
                </td>
                <td>{{ $project['title'] }}</td>
                <td>{{ $project['description'] }}</td>
                <td>{{ $project['date']}}</td>
                <td>
                    <div class="d-flex flex-column">
                        <div>
                            <a href="{{ route ('admin.project.show', $project->id) }}" type="button" class="btn btn-secondary col-12 mb-3">View</a>
                        </div>
                        <div>
                            <a href="{{ route ('admin.project.edit', $project->id) }}" type="button" class="btn btn-primary col-12 mb-3">Edit</a>
                        </div>
                        <div>

                            <button data-bs-toggle="modal" data-bs-target="#delete-{{ $project->id }}" class="btn btn-danger col-12 mb-3">Delete</button>

                            @include('partials.projects-modal')

                        </div>
                    </div>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>

@endsection