@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 m-auto ">
                @if (Auth::user() && Auth::user()->role == 'admin')
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                {{ __('language.CATEGORIES') }}
                                <a href="{{ route('createcate') }}"
                                    class="btn btn-success">{{ __('language.CREATECATEGORY') }}</a>
                            </div>
                        </div>
                        <div class="card-body ">
                            @if (session('message'))
                                <h4 class="alert alert-success mt-2">{{ session('message') }}</h4>
                            @endif
                            <table class="table table-dark ">
                                <thead>
                                    <tr>
                                        <td>{{ __('language.ID') }}</td>
                                        <td>{{ __('language.NAME') }}</td>
                                        <td>{{ __('language.ACTION') }}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <a href="{{ route('editcate', $item->id) }}" class="btn btn-primary"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ route('deletecate', $item->id) }}" class="btn btn-danger"><i
                                                        class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $result->links() }} <!-- Display pagination links -->
                        </div>
                    </div>
                @elseif (Auth::user() && Auth::user()->role == 'user')
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                {{ __('language.CATEGORIES') }}
                            </div>
                        </div>
                        <div class="card-body ">
                            <table class="table table-dark ">
                                <thead>
                                    <tr>
                                        <td>{{ __('language.ID') }}</td>
                                        <td>{{ __('language.NAME') }}</td>
                                        <td>{{ __('language.ACTION') }}</td>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td> <a href="{{ route('createpost',$item->id) }}"
                                                    class="btn btn-success">{{ __('language.CREATEPOST') }}</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $result->links() }} <!-- Display pagination links -->
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endsection
