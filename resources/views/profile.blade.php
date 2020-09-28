@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <form method="POST" action="profile">
                        @csrf
                        <div class="form-group">
                          <label>Overview</label>
                          <textarea type="text" name="overview" class="form-control" rows="3" placeholder="Write a brief history about yourself"></textarea>

                        </div>
                        <div class="form-group">
                          <label>English Proficiency</label>
                          <select class="form-control" name="english_proficiency">
                            <option>Basic</option>
                            <option>Fluent</option>
                            <option>Native</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Skills</label>
                            <input type="text" name="skills" class="form-control" placeholder="Enter skills you have">
                          </div>
                        <div class="form-group">
                            <label>Experience Level</label>
                            <select class="form-control" name="experience_level">
                              <option>High School</option>
                              <option>Bachelor</option>
                              <option>Masters</option>
                              <option>pHd</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Hourly Rate</label>
                            <input type="number" name="hourly_rate" class="form-control" placeholder="Rate per hour in $">
                          </div>
                          <div class="form-group">
                            <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
                          </div>
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Overview</th>
                            <th scope="col">English Proficiency</th>
                            <th scope="col">Experience level</th>
                           
                            <th scope="col">Skills</th>
                            <th scope="col">Hourly rate</th>
                            <th scope="col">Operations</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($show as $item)
                                           
                          <tr>
                            <td>{{$item->overview}}</td>
                            <td>{{$item->english_proficiency}}</td>
                            <td>{{$item->experience_level}}</td>
                            <td>{{$item->skills}}</td>
                            <td>{{$item->hourly_rate}}</td>
                            <td><a href=""><i class="fa fa-edit" style="margin-right: 20px"></i></a>
                                <a href=""><i class="fa fa-trash" style="color: red"></i></a>
                               
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
