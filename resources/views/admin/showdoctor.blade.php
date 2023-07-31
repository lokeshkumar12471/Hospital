<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial:partials/_navbar.html -->
        <!-- partial -->
        <!-- main-panel ends -->
        <div class="container-fluid page-body-wrapper">
            <div align="center" style="padding:100px;">
                <table>
                    <tr style="background-color:black">
                        <th style="padding:10px">Doctor Name</th>
                        <th style="padding:10px">Phone</th>
                        <th style="padding:10px">Speciality</th>
                        <th style="padding:10px">Room No</th>
                        <th style="padding:10px">Image</th>
                        <th style="padding:10px">Delete</th>
                        <th style="padding:10px">Update</th>
                    </tr>
                    @foreach ($data as $doctor)
                        <tr align="center" style="background-color:skyblue">
                            <td style="padding:10px">{{ $doctor->name }}</td>
                            <td style="padding:10px">{{ $doctor->phone }}</td>
                            <td style="padding:10px">{{ $doctor->speciality }}</td>
                            <td style="padding:10px">{{ $doctor->room }}</td>
                            <td style="padding:10px"><img src="{{ asset('doctorimage/' . $doctor->image) }}"
                                    width="100" height="100"></td>
                            <td><a onclick="return confirm('Are You Sure To Delete This')"
                                    href="{{ url('deletedoctor', $doctor->id) }}" class="btn btn-success">Delete</a>
                            </td>
                            <td><a href="{{ url('updatedoctor', $doctor->id) }}" class="btn btn-danger">Update</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>
