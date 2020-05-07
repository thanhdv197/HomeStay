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
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Feedback Detail</h4>
                        <p>List feedback</p>
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
                                        <th>Id</th>
                                        <th>Post id</th>
                                        <th>Title</th>
                                        <th>Sender name</th>
                                        <th>Sender address</th>
                                        <th>content</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feedback as $item)
                                        
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->post_id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->sender_name }}</td>
                                        <td>{{ $item->sender_address }}</td>
                                        <td>{{ $item->content }}</td>
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