$@extends('courses.layout')


@section('main_contnet')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-8">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edite {{ $course['title'] }}</h6>
                    {{-- erros list from validation --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('updateCourse') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $course['id'] }}">

                        <div class="mb-3">
                            <label for="courseTitle" class="form-label">Title</label>
                            <input value="{{ $course['title'] }}" type="text" class="form-control" id="courseTitle"
                                name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="courseDescription" class="form-label">Description</label>
                            <textarea value="{{ $course['description'] }}" type="text" class="form-control" id="courseDescription"
                                name="desctption" required>{{ $course['description'] }}</textarea>

                        </div>

                        <div class="mb-3">
                            <label for="courseimgUrl" class="form-label">IMG URL</label>
                            <input value="{{ $course['img_url'] }}" type="text" class="form-control" id="courseimgUrl"
                                name="img_url" required>

                        </div>

                        <div class="mb-3">
                            <label for="coursePrice" class="form-label">price</label>
                            <input value="{{ $course['Price'] }}" type="number" class="form-control" id="coursePrice"
                                name="price" required>

                        </div>

                        <label for="courseCategory" class="form-label">Select Category</label>
                        <select id='courseCategory' class="form-select mb-3" aria-label="Default select example"
                            name="Category_id" required>
                            @foreach ($categories as $categgory)
                                <option {{ $loop->iteration == 1 ? 'selected="selected"' : '' }}
                                    value="{{ $categgory['id'] }}">{{ $categgory['name'] }}</option>
                            @endforeach

                        </select>

                        <button type="submit" class="btn btn-primary">Update course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var t = "{{ $course['category_id'] }}";
        $('#courseCategory').val(t);
    </script>
@endpush
