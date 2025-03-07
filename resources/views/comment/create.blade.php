@extends("layouts.app")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
         <form enctype="multipart/form-data" action="{{route('savecomment')}}" method="post" >
            @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="post_id" value="{{ $post_id }}">


                <label>{{__('language.IMAGE')}}</label>
                <input type="file" name="image" class="form-control mb-4">
                @error('image')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror         

                <label>{{__('language.COMMENT')}}</label>
                <input type="text" name="comment" class="form-control mb-4" >
                @error('comment')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input type="submit" value='{{__('language.CREATECOMMENT')}}' class="form-control btn btn-success">

            </form>
        </div>
    </div>
</div>

@endsection
