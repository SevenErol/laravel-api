@extends ('layouts.app')

@section ('content')

<div class="container p-3">


    <h1 class="text-center">Complete the form to add a new Data</h1>

    @include('partials.error')

    <form action="{{ route ('admin.project.store')}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Data title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
            @error('title')
            <small id="titleHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Data cover image</label>
            <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" value="{{old('cover_image')}}">
            @error('cover_image')
            <small id="cover_imageHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description">Data description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a description" id="description" name="description" style="height: 150px">{{old('description')}}</textarea>
            @error('description')
            <small id="descriptionHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{old('date')}}">
            @error('thumb')
            <small id="dateHlper" class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Types</label>
            <select class="form-select @error('type_id') 'is-invalid' @enderror" name="type_id" id="type_id">
                <option selected>Select one</option>

                @foreach ($types as $type )
                <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : ''  }}>{{$type->name}}</option>
                @endforeach

            </select>
        </div>
        @error('type_id')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        <div class="mb-3">
            <label for="technologies" class="form-label">Technologiess</label>
            <select multiple class="form-select form-select-sm" name="technologies[]" id="technologies">
                <option value="" disabled>Select a technology</option>
                @forelse ($technologies as $technology)

                @if ($errors->any())
                <option value="{{$technology->id}}" {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>{{$technology->name}}</option>
                @else
                <option value="{{$technology->id}}">{{$technology->name}}</option>
                @endif
                @empty
                <option value="" disabled>Sorry no technologies in the system</option>
                @endforelse
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection