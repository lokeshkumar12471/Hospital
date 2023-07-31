<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .label {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial:partials/_navbar.html -->
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div align="center" style="padding:100px;">
                <table>
                    <tr style="background-color:black">
                        <th style="padding:10px">Customer Name</th>
                        <th style="padding:10px">Email</th>
                        <th style="padding:10px">Phone</th>
                        <th style="padding:10px">Doctor Name</th>
                        <th style="padding:10px">Date</th>
                        <th style="padding:10px">Message</th>
                        <th style="padding:10px">Status</th>
                        <th style="padding:10px">Approved</th>
                        <th style="padding:10px">Canceled</th>
                    </tr>

                    @foreach ($data as $appoint)
                        <tr align="center" style="background-color:skyblue">
                            <td style="padding:10px">{{ $appoint->name }}</td>
                            <td style="padding:10px">{{ $appoint->email }}</td>
                            <td style="padding:10px">{{ $appoint->phone }}</td>
                            <td style="padding:10px">{{ $appoint->doctor }}</td>
                            <td style="padding:10px">{{ $appoint->date }}</td>
                            <td style="padding:10px">{{ $appoint->message }}</td>
                            <td style="padding:10px">{{ $appoint->status }}</td>
                            <td><a href="{{ url('approved', $appoint->id) }}" class="btn btn-success">Approved</a></td>
                            <td><a href="{{ url('canceled', $appoint->id) }}" class="btn btn-danger">Canceled</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>
