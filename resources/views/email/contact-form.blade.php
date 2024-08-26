@extends('layouts.master')
@section('content')

<div class="card">
        <div class="card-header">
          <div class="row">

            <div class="col-md-6">
              <h4>Contact Form</h4>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
              <a class="btn btn-success mx-1" href="">Back</a>
            </div>

          </div>
        </div>

        <div class="card-body">
            <form action="{{route('contact.formemail')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                    @if($errors->has('title'))
                  <span class="text-danger">{{$errors->first('title')}}</span>
                         @endif
                </div>

                <div class="form-group">
                    <label for="" class="form-label">Attachment</label>
                    <input type="file" class="form-control" name="attachment">
                    @if($errors->has('attachment'))
                  <span class="text-danger">{{$errors->first('attachment')}}</span>
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