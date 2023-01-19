@extends ('layouts.app')

@section ('content')

<div class="container p-3">
    <h1 class="text-center mb-4">Single data view</h1>

    <table class="table p-5">
        <thead>
            <tr class="bg-light">
                <th scope="col">ID</th>
                <th scope="col">Cover image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Type</th>
                <th scope="col">Technologies</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

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
                <td class="type">{{ $project->type ? $project->type->name : 'Uncategorized'}}</td>
                <td>
                    @if(count($project->technologies) > 0 )

                    <ul>
                        @foreach ($project->technologies as $technology)
                        <li>#{{$technology->name}} </li>
                        @endforeach

                        @else
                        <li>No technologies associated to the current project</li>
                        @endif
                    </ul>
                </td>
                <td>
                    <div class="d-flex flex-column">
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



        </tbody>
    </table>
</div>

@endsection