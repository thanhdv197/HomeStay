@extends('Admin_layout.Layout')
@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Add Accommodation Type</a>
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
    </div>
    <div class="sb2-2-add-blog sb2-2-1">
        <h2>Add Accommodation Type Details</h2>

        <ul class="nav nav-tabs tab-list">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-info" aria-hidden="true"></i>
                    <span>Infor Detail</span></a>
            </li>

        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Listing Information</h4>
                    </div>
                    <div class="bor">
                        <form method="POST" action="{{ route('admin-accommodationtype-add-process') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" name="name" type="text" class="validate">
                                    <label for="list-title">Accommodation Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <div class="input-field col s6">
                                        <input id="image" name="image" type="file" accept="image/*" class="validate"
                                            placeholder="Accommodation Image">
                                    </div>

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
            </div>
        </div>
    </div>
</div>
@endsection