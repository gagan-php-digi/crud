@extends('layouts.master')

@section('content')

<div class="main-content mt-5">
    <div class="card">
        <div class="card-header">
          <div class="row">

            <div class="col-md-6">
              <h4>Show Post</h4>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
              <a class="btn btn-success mx-1" href="{{route('blogs.index')}}">Back</a>
            </div>

          </div>


        </div>
    
        <div class="card-body">
            <table class="table table-striped table-bordered border-dark">
                <tbody>       
                  {{-- <tr>
                    <th scope="row">{{$blog->id}}</th>
                    <td>
                        <img src="{{asset('storage/uploads'.$blog->image) }}" alt="" width="80">
                    </td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->description}}</td>
                    <td>{{$blog->category_id}}</td>
                    <td>{{date('d-m-Y', strtotime($post->created_at))}}</td>
                    <td>
                        <a class="btn-sm btn-success btn" href="">Show</a>

                        <a class="btn-sm btn-primary btn" href="{{route('posts.edit', $post->id)}}">Edit</a>
                        <a class="btn-sm btn-danger btn" href="">Delete</a>

                    </td>

                  </tr> --}}

                  <tr>
                    <td>Id</td>
                    <td>{{$blog->id}}</td>
                  </tr>
                  <tr>
                    <td>Image</td>
                    <td><img width="300" src="{{asset('storage/' .$blog->image)}}" alt=""></td>
                  </tr>

                  <tr>
                    <td>Title</td>
                    <td>{{$blog->title}}</td>
                  </tr>
                  <tr>
                    <td>Description</td>
                    <td>{{$blog->description}}</td>
                  </tr>
                  <tr>
                    <td>Category</td>
                    <td>{{$blog->category_id}}</td>
                  </tr>
                  <tr>
                    <td>Publish Date</td>
                    <td>{{date('d-m-Y', strtotime($blog->created_at))}}</td>
                  </tr>
                  
                </tbody>
              </table>
              
        </div>
    </div>
</div>

@endsection