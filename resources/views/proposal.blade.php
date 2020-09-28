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

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Proposal message</th>
                            <th scope="col">Bid</th>
                            <th scope="col">Delivery Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->proposal_text}}</td>
                            <td>{{$item->bid}}</td>
                            <td>{{$item->delivery_date}}</td>
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
