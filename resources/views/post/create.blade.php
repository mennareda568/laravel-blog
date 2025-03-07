@extends("layouts.app")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
         <form enctype="multipart/form-data" action="{{route('savepost')}}" method="post" >
            @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="cate_id" value="{{ $cate_id }}">


                <label>{{__('language.IMAGE')}}</label>
                <input type="file" name="image" class="form-control mb-4">
                @error('image')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror         

                <label>{{__('language.CONTENT')}}</label>
                <input type="text" name="content" class="form-control mb-4" >
                @error('content')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="submit" value='{{__('language.CREATEPOST')}}' class="form-control btn btn-success">

            </form>
        </div>
    </div>
</div>

@endsection
