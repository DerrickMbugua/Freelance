@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Freelancer Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Overview</th>
                            <th scope="col">English proficiency</th>
                            <th scope="col">Experience level</th>
                            <th scope="col">Hourly rate</th>
                            <th scope="col">Message</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($profile as $item)  
                          <tr>
                            @foreach ($name as $i)
                            <td>{{$i->name}}</td>
                            @endforeach
                            <td>{{$item->overview}}</td>
                            <td>{{$item->english_proficiency}}</td>
                            <td>{{$item->experience_level}}</td>
                            <td>${{$item->hourly_rate}}/ hour</td>
                            <td><a href=""><input type="button" value="Message"></a></td>

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
