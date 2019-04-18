@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Description
                            <small>Edit </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                        <div class="alert alert-danger"> 
                             @foreach ($errors->all() as $err) 
                                {{$err}} <br>
                            @endforeach
                        </div>
                        @endif
                        @if (session('annoucement'))
                        <div class="alert alert-success">
                            {{session('annoucement')}}
                        </div>
                        @endif
                        <form action="admin/description/editPost"  method="POST">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Room</label>
                                <input class="form-control" name="room"  value="{{$description->room }}" />
                            </div>
                             <div class="form-group">
                                <label>Photo</label>
                                <input class="form-control" name="photo"  value="{{$description->photo }}" />
                            </div>
                             <div class="form-group">
                                <label>Menu</label>
                                <input class="form-control" name="menu"  value="{{$description->menu }}" />
                            </div>
                            <div class="form-group">
                                <label>Event</label>
                                <input class="form-control" name="event"  value="{{$description->event }}" />
                            </div>
                            
                            
                            <button type="submit" class="btn btn-default">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection