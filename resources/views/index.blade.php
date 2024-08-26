@extends('layouts.master')
@section('content')
<h1>Welcome{{Auth::user()->name}}</h1>
@can('create',\App\Models\Post::class)
<a class="btn btn-success mx-1" href="{{route('blogs.create')}}">Create</a>
@endcan
<a class="btn btn-warning mx-1" href="#">Trashed</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope="col">Publish date</th>

    </tr>
  </thead>
  <tbody>
    @foreach($blog as $blogs)
    <tr>
      <th scope="row">{{$blogs->id}}</th>
     <td> <img src="{{asset('storage/' .$blogs->image) }}" alt="" width="80"></td>
      <td>{{$blogs->title}}</td>
      <td>{{$blogs->description}}</td>
      <td>{{$blogs->category->name}}</td>
      <td>{{date('d-m-y',strtotime($blogs->created_at))}}</td>
      <td><a class="btn-sm btn-primary btn mx-2" href="{{route('blogs.show', $blogs->id)}}">Show</a></td>
      @can('edit',\App\Models\Post::class)
      <td><a class="btn-sm btn-primary btn mx-2" href="{{route('blogs.edit', $blogs->id)}}">Edit</a></td>
      @endcan
      <td>
        <form action="{{route('blogs.destroy', $blogs->id)}}" method="POST">
          @csrf 
          @method('DELETE')
          <button class="btn-sm btn-danger btn">Delete</button>
           </form>
           </td>
    </tr>
    @endforeach
  </tbody>
  
</table>

{{$blog->links()}}
              



@endsection
