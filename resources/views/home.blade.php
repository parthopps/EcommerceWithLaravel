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


                    <table class="table table-striped table-dark">
                      <thead>
                        <tr>
                          <th> cl Name :</th>
                          <th>Name</th>
                          <th>email</th>
                          <th>created_at</th>
                          <th>updated_at</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($all_users as $user)

                        <tr>
                          <th scope="row">1</th>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->created_at}}</td>
                          <td>{{$user->updated_at}}</td>
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
