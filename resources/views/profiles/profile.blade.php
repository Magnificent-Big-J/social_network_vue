@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <p class="text-center">
                            {{$user->name}}'s profile
                        </p>
                    </div>

                    <div class="card-body">
                        <center>
                            <img class="mb-2"  src="{{asset($user->avatar)}}" width="140px" height="140px" style="border-radius:50px;" alt="Card image cap">
                        </center>
                        <p class="text-center mt-2">
                            {{$user->profile->location}}
                        </p>
                        <p class="text-center">
                            @if(Auth::id() == $user->id)
                                <a href="{{route('profile.edit',$user->slug)}}" class="btn btn-lg btn-info">Edit your profile</a>
                            @endif
                        </p>
                    </div>
                </div>
                @if(Auth::id() !== $user->id)
                    <div class="card mt-2">
                        <div class="card-body">
                            <app-friend :profile_user_id="{{$user->id}}"></app-friend>
                        </div>
                    </div>
                @endif
                <div class="card mt-2">
                    <div class="card-header">
                       <p class="text-center">About Me</p>
                    </div>

                    <div class="card-body">
                        <p class="text-center">
                            {{$user->profile->about}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">

            </div>
        </div>
    </div>
@endsection
