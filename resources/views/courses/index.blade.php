@extends('courses.layout')


@section('main_contnet')
    <div class="container-fluid pt-4 px-4">
        {{-- Courses table card  --}}
        <div class="row g-8">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4" style="display: inline;"> Courses</h6>
                    {{-- add button --}}
                    <button onclick="window.location.href='{{ route('showAddCourseView') }}';"
                        class="btn btn-primary"style="float: right;">ADD</button>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Img Url</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">student num</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($courses as $course)
                                <tr>
                                    <th scope="row">{{ $course['id'] }}</th>
                                    <td>{{ $course['title'] }}</td>
                                    <td>{{ $course['description'] }}</td>
                                    <td>{{ $course['img_url'] }}</td>
                                    <td>{{ $course['Price'] }}</td>
                                    <td>{{ $course['category_id'] }}</td>
                                    <td>0</td>
                                    <td>
                                        <button onclick="location.href='{{ route('showEditCourseView', $course['id']) }}'"
                                            type="button" class="btn  btn-success btn-sm">Edite</button>

                                        <form style="display: inline;" action="{{ route('removeCourse') }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $course['id'] }}">
                                            <button
                                                onclick="return confirm('Are you sure you want delete {{ $course['title'] }} Course?')"
                                                type="submit" class="btn  btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
