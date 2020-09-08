@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Job</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/editjob" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <input type="hidden" name="id" value="{{$edit->id}}" class="form-control">
                          <label>Job Title</label>
                          <input type="text" name="title" value="{{$edit->title}}" class="form-control" placeholder="Job Title">
                        </div>
                        @csrf
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" placeholder="Job Description" rows="3">{{$edit->description}}</textarea>
                          </div>
                          <div class="form-group">
                            <label>File</label>
                            <input type="file" class="form-control" name="doc">
                          </div>
                        <div class="form-group">
                          <label>Budget</label>
                          <input type="number" name="budget" value="{{$edit->budget}}" class="form-control" placeholder="$">
                        </div>
                        <div class="form-group">
                            <label>Delivery Date</label>
                            <input type="datetime" name="delivery_date" value="{{$edit->delivery_date}}" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Hired at</label>
                            <input type="datetime" name="hired_at" value="{{$edit->hired_at}}" class="form-control">
                          </div>
                        <button type="submit" class="btn btn-primary">Update Job</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
