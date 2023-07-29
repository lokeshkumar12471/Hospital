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

            <div class="container" align='center' style="padding-top:100px;">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button class="close" type="button" data-dismiss='alert'>x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form action="{{ url('upload_doctor') }}" method="post"enctype="multipart/form-data">
                    @csrf
                    <div style="padding:15px;">
                        <label>Doctor Name</label>
                        <input type="text" name="name" placeholder="Write the Name" style=color:black
                            required="">
                    </div>
                    <div style="padding:15px;">
                        <label>Phone</label>
                        <input type="number" name="phone" placeholder="Write the Number" style=color:black
                            required="">
                    </div>
                    <div style="padding:15px;">
                        <label>Speciality</label>
                        <select name="speciality" style="color:black;width:200px" required="">
                            <option>--Select--</option>
                            <option value="skin">Skin</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                            <option value="nose">Nose</option>
                        </select>
                    </div>

                    <div style="padding:15px;">
                        <label>Room No</label>
                        <input type="text" name="room" placeholder="Write the Room Number" style=color:black
                            required="">
                    </div>

                    <div style="padding:15px;">
                        <label>Doctor Image</label>
                        <input type="file" name="file" required="">
                    </div>

                    <div style="padding:15px;">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
        <!-- main-panel ends -->

        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>
