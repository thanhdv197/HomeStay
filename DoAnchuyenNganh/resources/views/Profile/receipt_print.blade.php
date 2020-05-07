<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="well col-xs-10 col-sm-10 col-md-6">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <address>
                    <strong>{{ $tran->customer_name }}</strong>
                    <br>
                    {{ $tran->customer_address }}
                    <br>
                    <abbr title="Phone">P:</abbr> {{ $tran->customer_phonenumber }}
                </address>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                <p>
                    <em>Date: {{ Carbon\Carbon::now() }}</em>
                </p>
                <p>
                    <em>Receipt #: {{ $tran->id }}</em>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="text-center">
                <h1>Receipt</h1>
            </div>
            </span>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Receive day</th>
                        <th>Return day</th>
                        <th class="text-center">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-md-9"><em>{{ $tran->room->room_name }}</em></h4>
                        </td>
                        <td class="col-md-1" style="text-align: center">
                            {{ $tran->receive_room_day }} </td>
                        <td class="col-md-1" style="text-align: center">
                            {{ $tran->return_room_day }} </td>
                        <td class="col-md-1 text-center">{{ $tran->room->price }}</td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td class="text-right">
                            <h4><strong>Total: </strong></h4>
                        </td>
                        <td class="text-center text-danger">
                            <h4><strong>{{ $tran->total }}</strong></h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>