@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 m-auto ">
                @if (Auth::user() && Auth::user()->role == 'user')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            {{ __('language.COMMENTS') }}
                        </div>
                    </div>
                    <div class="card-body ">
                        @if (session('messageuser'))
                            <h4 class="alert alert-success mt-2">{{ session('messageuser') }}</h4>
                        @endif

                        <table class="table table-dark mt-3">
                            <thead>
                                <tr>
                                    <td>{{ __('language.ID') }}</td>
                                    <td>{{ __('language.COMMENT') }}</td>
                                    <td>{{ __('language.IMAGE') }}</td>
                                    <td>{{ __('language.ACTION') }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td><img style="width:300px" src={{ asset('img/comments/' . $item->images) }} alt="">
                                        <td>
                                            <a href="{{ route('editcomment', $item->id) }}" class="btn btn-primary"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('delcomment', $item->id) }}" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }} <!-- Display pagination links -->
                    </div>
                </div>
                @endif

                @if (Auth::user() && Auth::user()->role == 'admin')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            {{ __('language.POSTS') }}
                        </div>
                    </div>

                    <div class="card-body ">
                        @if (session('message'))
                            <h4 class="alert alert-success mt-2">{{ session('message') }}</h4>
                        @endif

                        <table class="table table-dark mt-3">
                            <thead>
                                <tr>
                                    <td>{{ __('language.ID') }}</td>
                                    <td>{{ __('language.COMMENT') }}</td>
                                    <td>{{ __('language.IMAGE') }}</td>
                                    <td>{{ __('language.ACTION') }}</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data2 as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td><img style="width:300px" src={{ asset('img/comments/' . $item->images) }} alt="">
                                        <td>
                                            <a href="{{ route('delcomment', $item->id) }}" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data2->links() }} <!-- Display pagination links -->
                    </div>
                </div>
                @endif
            </div>
        </div>
    @endsection
