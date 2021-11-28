<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

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
                        <div class="card-header">Update Category</div>
                        <table class="table">
                            <thead>


                            </thead>
                            <tbody>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edit Category</div>
                        <div class="card-body">
                            <form action="{{url('category/update/'.$categories->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" name="category_name" value="{{$categories->category_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('category_name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <button  class="btn btn-primary">Update Category</button>
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
</x-app-layout>
