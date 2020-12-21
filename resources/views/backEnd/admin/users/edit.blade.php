@extends('backEnd.admin.layout.main')
@section('panel-title')
Add User
@endsection
@section('content')


<div class="content">

    <!-- Form validation -->
    <div class="panel panel-flat">


        <div class="panel-body">
            <form class="form-horizontal form-validate-jquery" action="{{-- {{route('admin.users.update')}} --}}" method="POST">
                @csrf
                <fieldset class="content-group">
               {{--      @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-styled-left alert-bordered">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold">Opps!</span> {{ $error }}.
                        </div>
                        @endforeach
                    @endif --}}
                    
                    <div class="form-group">
                        <label class="control-label col-lg-3"> Name <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="name" class="form-control" required="required" placeholder=" Name" value="{{$userInfo->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3"> Email <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input type="email" name="email" class="form-control" required="required" placeholder=" Email" value="{{$userInfo->email}}">
                        </div>
                    </div>

                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
                    <a href="{{route('admin.users.index')}}" class="btn btn-default">Back To List <i class="icon-backward2 position-right"></i></a>
                </div>
            </form>
        </div>
    </div>
    <!-- /form validation -->

</div>

@endsection
