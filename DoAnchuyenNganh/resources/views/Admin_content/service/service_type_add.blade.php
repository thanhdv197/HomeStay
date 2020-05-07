@extends('Admin_layout.Layout')
@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Add Service Type</a>
            </li>
        </ul>
    </div>
    @if(session('thongbao'))
    <div class="alert alert-success">{{session('thongbao')}}</div>
    @endif
    <div class="row">
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                <li>{{$item}}</li>
                @endforeach
            </ul>

        </div>
        @endif
        <div class="sb2-2-add-blog sb2-2-1">
            <h2>Add New Service</h2>
            <form method="POST" action="{{ route('admin-service-add-process') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" name="name" type="text" value="" class="validate">
                        <label for="list-title">Enter Service Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input type="submit" class="waves-effect waves-light btn-large" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection