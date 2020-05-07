@extends('Admin_layout.Layout')
@section('content')
<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Ui Form</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
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

                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Add New City</h4>
                        <p>You can create a new city</p>
                    </div>

                    
                    <div class="tab-inn">
                        <form method="POST" action="{{ route('admin-city-add-process') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="name" name="name" type="text" class="validate">
                                    <label for="first_name">City Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input name="img" type="file" accept="image/*" class="validate">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="submit" class="waves-effect waves-light btn-large">
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