@extends('layouts.master')
@section('content')

<div class="card">
        <div class="card-header">
          <div class="row">

            <div class="col-md-6">
              <h4>Create Post</h4>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
              <a class="btn btn-success mx-1" href="">Back</a>
            </div>

          </div>
        </div>

        <div class="card-body">
            <form action="{{route('blogs.update' , $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    
                    <div>
                    <img style="width:200px" src="{{asset('storage/' .$post->image)}}" alt="">
                    </div>
                    <label for="" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                    @if($errors->has('image'))
                  <span class="text-danger">{{$errors->first('image')}}</span>
                         @endif
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Title</label>
                    <input type="text" class="form-control" value="{{$post->title}}" name="title">
                    @if($errors->has('title'))
                  <span class="text-danger">{{$errors->first('title')}}</span>
                         @endif
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Category</label>
                    <select id="" class="form-control" name="category_id">
                     
                    <option value="">Select</option>
                    @foreach($categories as $category)
                        <option  {{$category->id==$post->category_id ?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                        
                     @endforeach
                     </select>
                    @if($errors->has('category'))
                  <span class="text-danger">{{$errors->first('category')}}</span>
                         @endif
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$post->description}}</textarea>
                    @if($errors->has('description'))
                  <span class="text-danger">{{$errors->first('description')}}</span>
                         @endif
                </div>

                <div class="form-group mt-3">
                    <button class="btn btn-primary">Submit</button>
                </div>


            </form>
              
        </div>
    </div>
</div>

@endsection