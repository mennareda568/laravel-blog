@extends("layouts.app")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
         <form enctype="multipart/form-data" action="{{route('updatecomment')}}" method="post" >
            @csrf
                <input type="hidden" name="old_id" value="{{ $result->id }}">

                <label>{{__('language.IMAGE')}}</label>
                <input type="file" name="image" class="form-control mb-4">
                @error('image')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror         

                <label>{{__('language.COMMENT')}}</label>
                <input type="text" name="comment" class="form-control mb-4" value="{{$result->comment}}">
                @error('comment')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
  

                <input type="submit" value='{{__('language.UPDATECOMMENT')}}' class="form-control btn btn-success">

            </form>
        </div>
    </div>
</div>

@endsection
