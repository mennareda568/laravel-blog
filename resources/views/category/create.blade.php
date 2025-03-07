

@extends("layouts.app")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
            <form enctype="multipart/form-data" method="post" action="{{route('savecate')}}">
                @csrf
                <label>{{__('language.CATEGORYNAME')}}</label>
                <input type="text" name="name" class="form-control mb-4">
                @error('name')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="submit" value='{{__('language.CREATECATEGORY')}}' class="form-control btn btn-success">

            </form>
        </div>
    </div>
</div>

@endsection
