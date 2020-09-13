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

                    <form action="/applyjob" method="POST" enctype="multipart/form-data">
                        
                        @csrf
                   <!--     <div class="form-group">
                            <label>Job Owner</label>
                            <input type="text" name="job_id" class="form-control" value="{{$apply->id}}">
                          </div>-->
                        <div class="form-group">
                            <input type="hidden" name="job_id" class="form-control" value="{{$apply->id}}">
                            <label>Proposal</label>
                            <textarea class="form-control" name="proposal_text" placeholder="Proposal Text" rows="3"></textarea>
                          </div>
                      
                        <div class="form-group">
                          <label>Bid</label>
                          <input type="number" name="bid" class="form-control" placeholder="$">
                        </div>
                        <div class="form-group">
                            <label>Delivery date</label>
                            <input type="datetime" name="delivery_date" class="form-control">
                          </div>
                          
                        <button type="submit" class="btn btn-primary">Send proposal</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
