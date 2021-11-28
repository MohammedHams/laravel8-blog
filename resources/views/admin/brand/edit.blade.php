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
                                    <div class="card-header">Edit Brand</div>
                                    <div class="card-body">
                                        <form action="{{url('brand/update/'.$brand->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                                <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('brand_name')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                                <img src="{{asset($brand->brand_image)}}" style="height: 400px; width: 700px;" alt="none.jpg">
                                                <input type="file" name="brand_image" value="{{$brand->brand_image}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('brand_image')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>

                                            <button  class="btn btn-primary">Update brand</button>
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
