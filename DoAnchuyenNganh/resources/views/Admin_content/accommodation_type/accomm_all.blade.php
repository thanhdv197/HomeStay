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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>All Accommodation Type</h4>
                                    <p>List accommodation type</p>

                                    <!-- Dropdown Structure -->

                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>IMG</th>
                                                    <th>Accommodation Name</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $accommodation_type as $item )
                                                   
                                                <tr>
                                                    <td><span class="list-img"><img src="{{ $item->accommodation_type_img }}" alt=""></span>
                                                    </td>
                                                    <td>{{ $item->accommodation_type_name }}</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin-accommodationtype-edit', $item->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin-accommodationtype-delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection