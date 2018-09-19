@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit your profile</div>

                    <div class="card-body">
                        <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" name="location" value="{{$user->profile->location}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="avatar">Upload avatar:</label>
                                <input type="file" name="avatar"  class="form-control" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="about">About:</label>
                                <textarea name="about" id="about" cols="30" rows="10" class="form-control" required>{{$user->profile->about}}</textarea>

                            </div>
                            <div class="form-group">
                                <p class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Update your info
                                    </button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
