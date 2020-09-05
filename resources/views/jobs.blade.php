@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Jobs</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            
                            <th scope="col">Job Title</th>
                            <th scope="col">Budget</th>
                            <th scope="col">Description</th>
                            <th scope="col">Delivery Date</th>
                            <th scope="col">Operation</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($Jobs as $Job)
                          <tr>
                            
                            <td>{{$Job->title}}</td>
                            <td>${{$Job->budget}}</td>
                            <td>{{$Job->description}}</td>
                            <td>{{$Job->delivery_date}}</td>
                            <td><a href="/deletejobs"><i class="fa fa-trash"></i>
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
