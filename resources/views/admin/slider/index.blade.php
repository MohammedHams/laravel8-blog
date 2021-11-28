@extends('admin.admin_master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif
                        <div class="card-header">All Sliders</div>
                            <a href="{{url('slider/create/')}}" class="btn btn-info">Add Slider</a>

                            <table class="table">
                            <thead>

                            <tr>
                                <th scope="col">Slider title</th>
                                <th scope="col">Slider descreption</th>
                                <th scope="col">Slider image</th>
                                <th scope="col">Action</th>

                            </tr>

                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->description}}</td>
                                    <td><img src="{{asset($slider->image)}}" style="height: 40px; width: 70px;" alt="none.jpg"></td>
                                    <td>
                                        @if($slider->created_at==NULL)
                                            <span>No Data</span>
                                        @else
                                            {{Carbon\Carbon::parse($slider->created_at)->diffForHumans()}}

                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('slider/edit/'.$slider->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('slider/delete/'.$slider->id)}}" onclick="return confirm('are you sure to delete')" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$sliders->links() }}
                    </div>
                </div>
            </div>
        </div>






















        {{--
                --}}
        {{--trash Part --}}{{--

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-header">Trash List</div>
                            <table class="table">
                                <thead>

                                <tr>
                                    <th scope="col">SL no</th>
                                    <th scope="col">Name Category</th>
                                    <th scope="col">Name user</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>

                                </tr>

                                </thead>
                                <tbody>
                                @foreach($trashCat as $category)
                                    <tr>

                                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                        <td>{{$category->category_name}}</td>

                                        <td>{{$category->user->name}}</td>
                                        <td>
                                            @if($category->created_at==NULL)
                                                <span>No Data</span>
                                            @else
                                                {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                        </td>
                                        @endif
                                        <td>
                                            <a href="{{url('category/restore/'.$category->id)}}" class="btn btn-info">Restore</a>
                                            <a href={{url('category/pdelete/'.$category->id)}}"" class="btn btn-danger">P.Delete</a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$trashCat->links() }}
                        </div>
                    </div>
        --}}

        <div class="col-md-4">
            {{--   <div class="card">
                   <div class="card-header">ADD Category</div>
                   <div class="card-body">
                       <form action="{{route('store.category')}}}" method="POST">
                           @csrf
                           <div class="form-group">
                               <label for="exampleInputEmail1" class="form-label">Category Name</label>
                               <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                               @error('category_name')
                               <div class="text-danger">{{$message}}</div>
                               @enderror
                           </div>
                           <button type="Add Category" class="btn btn-primary">Submit</button>
                       </form>

                   </div>
               </div>--}}
        </div>

    </div>
    </div>
@endsection
