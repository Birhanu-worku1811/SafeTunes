@extends('layouts.app')

@section('content')
    @php
        if (isset($user->artist_id)){
        $artist = \App\Models\Artist::where('id', $user->artist_id)->first();
        }
    @endphp
    <form action="{{isset($artist) ? route('artist.update', $artist->id) : route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img src="{{asset($artist->photo)}}"
                                             alt="Maxwell Admin">
                                    </div>
                                    <h5 class="user-name">{{ $user->name }}</h5>
                                    <h6 class="user-email">{{ $user->email }}</h6>
                                </div>
                                <div class="about">
                                    <h5 class="mb-2 text-primary">About</h5>
                                    @if(isset($artist))
                                        <p>{{$artist->bio}}</p>
                                    @endif
                                </div>
                                <div class="about">
                                    @if(isset($artist->website))
                                        <a href="{{ $artist->website }}">Read more</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-3 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Full Name</label>
                                        <input type="text" class="form-control" id="fullName"
                                               placeholder="Enter full name" value="{{$user->name}}" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" class="form-control" id="eMail" placeholder="Enter email ID"
                                               value="{{ $user->email }}" name="email">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="photo">Profile Photo</label>
                                        <input type="file" class="form-control" id="photo" accept="image/*"
                                               name="photo">
                                    </div>
                                </div>
                                @if(isset($artist))
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="bio">Bio</label>
                                            <input type="text" class="form-control" id="bio" value="{{ $artist->bio }}"
                                                   name="bio">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="genre">Genre</label>
                                            <input type="text" class="form-control" id="genre"
                                                   value="{{ $artist->genre }}" name="genre">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="text" class="form-control" id="website"
                                                   value="{{ $artist->website }}" name="website">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="band_name">Band Name</label>
                                            <input type="text" class="form-control" id="band_name"
                                                   value="{{ $artist->band_name }}" name="band_name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="instrument">Instrument</label>
                                            <input type="text" class="form-control" id="website"
                                                   value="{{ $artist->instrument }}" name="instrument">
                                        </div>
                                    </div>
                            </div>
                            @endif

                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="submit" id="submit" class="btn btn-primary">Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
