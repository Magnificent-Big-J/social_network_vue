@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Notifications</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($nots as $not)
                                <li class="list-group-item">
                                    {{$not->data['name']}} {{ $not->data['message'] }}
                                    <span class="pull-right">{{$not->created_at->diffForHumans()}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
