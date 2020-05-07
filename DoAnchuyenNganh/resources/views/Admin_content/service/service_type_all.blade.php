@extends('Admin_layout.Layout')
@section('content')
 <div class="sb2-2">
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> All Service</a>
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
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Service Name</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($service as $item)
                                                   
                                                <tr>
                                                    <td>{{ $item->service_name }}</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin-service-edit', $item->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin-service-delete', $item->id) }}" onclick="confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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