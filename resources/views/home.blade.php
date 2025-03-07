@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @if (Auth::user() && Auth::user()->role == 'user')
                @if (session('message'))
                    <h4 class="alert alert-success">{{ session('message') }}</h4>
                @endif
 

                <div class="col-md-6 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="{{ route('post') }}">
                                    {{ __('language.POSTS') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="{{ route('categories') }}">
                                    {{ __('language.CATEGORIES') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            @endif
            @if (Auth::user() && Auth::user()->role == 'admin')
                @if (session('messageadmin'))
                    <h4 class="alert alert-success">{{ session('messageadmin') }}</h4>
                @endif

                
                <div class="col-md-4 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="{{ route('categories') }}">
                                    {{ __('language.CATEGORIES') }}
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center ">
                            {{ $countcate }}

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a href="{{ route('post') }}">
                                    {{ __('language.POSTS') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

        

                <div class="col-md-4 mt-5 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <a>
                                    {{ __('language.USERS') }}
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center ">
                            {{ $countusers }}
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endif

    </div>
@endsection
