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
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Posts Detail</h4>
                        <p>List Post</p>
                        <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-users"><i
                                class="material-icons">more_vert</i></a>
                        <ul id="dr-users" class="dropdown-content">
                            <li><a href="user-add.html">Add New</a>
                            </li>
                            <li><a href="user-edit.html">Edit</a>
                            </li>
                            <li><a href="#!">Update</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#!"><i class="material-icons">delete</i>Delete</a>
                            </li>
                            <li><a href="user-view.html"><i class="material-icons">subject</i>View All</a>
                            </li>
                        </ul>

                        <!-- Dropdown Structure -->

                    </div>
                  
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Accommodation Name</th>
                                        <th>Accommodation Type</th>
                                        <th>City</th>
                                        <th>Accommodation status</th>
                                        <th>Review</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $item)
                                        
                                    <tr>
                                        <td><span class="list-img"><img src="{{ $item->accommodation_img }}" alt=""></span>
                                        </td>
                                        <td><span class="list-enq-name">{{ $item->accommodation_name }}</span>
                                        </td>
                                        <td>{{ $item->accomodation_type->accommodation_type_name }}</td>
                                        <td>{{ $item->city->city_name }}</td>
                                        <td>{{ $item->accommodation_status }}</td>
                                        <td>
                                            <a href="{{ route('admin-post-review', $item->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin-post-delete', $item->id) }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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