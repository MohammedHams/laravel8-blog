<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Images
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-group">
                    @foreach($images as $image)
                        <div class="col-md-4 mt-5">
                        <div class="card">
                            <img src="{{asset($image -> image)}}" alt="">
                        </div>
                    </div>
                        @endforeach
                </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">ADD image</div>
                        <div class="card-body">
                            <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                    <input type="file" name="image[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">
                                    @error('image')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <button  class="btn btn-primary">add image</button>
                            </form>
                        </div>
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
</x-app-layout>
