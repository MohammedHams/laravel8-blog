@extends('admin.admin_master')
@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif
                        <div class="card-header">Update Brand</div>
                        <table class="table">
                            <thead>


                            </thead>
                            <tbody>


                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">Edit Slider</div>
                                    <div class="card-body">
                                        <form action="{{url('about/update/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="old_image" value="{{$slider->image}}">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Slider title</label>
                                                <input type="text" name="title" value="{{$slider->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('slider_title')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror

                                                <label for="exampleFormControlTextarea1">Slider Description</label>
                                                 <textarea  class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3" value="{{$slider->description}}"></textarea>

                                                @error('slider_desc')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Slide image</label>
                                                <img src="{{asset($slider->image)}}" style="height: 400px; width: 700px;" alt="none.jpg">
                                                <input type="file" name="image" value="{{$slider->image}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('slider_image')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>

                                            <button  class="btn btn-primary">Update slider</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div></div>
@endsection
