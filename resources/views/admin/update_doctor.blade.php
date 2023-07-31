<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
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

            <div class="container" align='center' style="padding:100px;">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button class="close" type="button" data-dismiss='alert'>x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form action="{{ url('editdoctor', $data->id) }}" method="post"enctype="multipart/form-data">
                    @csrf
                    <div style="padding:15px;">
                        <label>Doctor Name</label>
                        <input type="text" name="name" placeholder="Write the Name" style=color:black
                            value="{{ $data->name }}">
                    </div>
                    <div style="padding:15px;">
                        <label>Phone</label>
                        <input type="number" name="phone" placeholder="Write the Number" style=color:black
                            value="{{ $data->phone }}">
                    </div>
                    <div style="padding:15px;">
                        <label>Speciality</label>
                        <select name="speciality" style="color:black;width:200px" value="{{ $data->speciality }}">
                            <option>--Select--</option>
                            <option value="skin" {{ $data->speciality === 'skin' ? 'selected' : '' }}>Skin</option>
                            <option value="heart" {{ $data->speciality === 'heart' ? 'selected' : '' }}>Heart</option>
                            <option value="eye" {{ $data->speciality === 'eye' ? 'selected' : '' }}>Eye</option>
                            <option value="nose" {{ $data->speciality === 'nose' ? 'selected' : '' }}>Nose</option>
                        </select>
                    </div>

                    <div style="padding:15px;">
                        <label>Room No</label>
                        <input type="text" name="room" placeholder="Write the Room Number" style=color:black
                            value="{{ $data->room }}">
                    </div>

                    <div style="padding:15px;">
                        <label>Doctor Image</label>
                        <input type="file" name="file">
                        <img src="{{ asset('doctorimage/' . $data->image) }}" height="100" width="100">
                    </div>

                    <div style="padding:15px;">
                        <input type="submit" class="btn btn-primary" value="update">
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
