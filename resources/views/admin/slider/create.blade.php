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
                                    <div class="card-header">ADD Sldier</div>
                                    <div class="card-body">
                                        <form action="{{route('store.slider')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Slider title</label>
                                                <input type="text" name="slider_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('slider_title')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Slider desc</label>
                                                <textarea type="text" name="slider_desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                                                @error('slider_desc')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Slider Image</label>
                                                <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('slider_image')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <button  class="btn btn-primary">add Slider</button>
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
