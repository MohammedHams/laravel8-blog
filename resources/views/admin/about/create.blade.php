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


                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">ADD about</div>
                                    <div class="card-body">
                                        <form action="{{route('store.about')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">about title</label>
                                                <input type="text" name="about_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                @error('about_title')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">about short desc</label>
                                                <textarea type="text" name="about_short_desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                                                @error('about_short_desc')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">about long desc</label>
                                                <textarea type="text" name="about_long_desc" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                                                @error('about_long_desc')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>


                                            <button  class="btn btn-primary">add about</button>
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
