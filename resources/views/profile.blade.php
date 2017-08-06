<?php
// user 1 session
$_SESSION['user'] = 1;
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>PERCH - Profile</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        html, body {
            background-color: #fff;
            color: #3b4246;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 2em;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .invisible {
            position:absolute;
            left:-9999px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

    <script>
        function upload(){
            document.getElementById("profile_upload").click();
        }
    </script>

</head>

<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

    <!-- The Grid -->
    <div class="w3-row-padding">

        <!-- Left Column -->
        <div class="w3-third">

            <div class="w3-white w3-text-grey w3-card-4">
                <div class="w3-display-container">
                    @if ($student->profile_pic_link)
                        <img src="/{{ $student->profile_pic_link }}" style="width:100%" alt="Avatar" onclick="upload()">
                    @else
                        <img src="https://www.w3schools.com/w3css/img_avatar3.png" style="width:100%" alt="Avatar" onclick="upload()">
                    @endif
                    <form method="post" action="{{ url('/change_profile_picture') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="profile" id="profile_upload" class="invisible"
                               onchange="this.form.submit()"/>
                    </form>
                    <div class="w3-display-bottomleft w3-container w3-text-black">
                        <h2>{{$user->first_name}} {{$user->last_name}}</h2>
                    </div>
                </div>
                <div class="w3-container">
                    <p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>{{ $student->major }}</p>
                    <p><i class="fa fa-file-pdf-o fa-fw w3-margin-right w3-large w3-text-teal"></i>Resume
                    </p>
                    <p><i class="fa fa-linkedin-square fa-fw w3-margin-right w3-large w3-text-teal"></i>LinkedIn: {{ $student->linkedin_user }}</p>
                    <hr>

                    <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Academic</b></p>
                    <p><i class="fa fa-file-pdf-o fa-fw w3-margin-right w3-large w3-text-teal"></i>GPA</p>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div><br>

            <!-- End Left Column -->
        </div>

        <!-- Right Column -->
        <div class="w3-twothird">

            <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
                <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Bio</h2>
                <div class="w3-container">
                    <p>
                        @if($student->bio)
                            {{ $student->bio }}
                        @else
                            No bio available.
                        @endif

                    </p><br>
                </div>
            </div>

            <div class="w3-container w3-card-2 w3-white">
                <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Skills and Interests</h2>

            </div>

            <!-- End Right Column -->
        </div>

        <!-- End Grid -->
    </div>

    <!-- End Page Container -->
</div>

</body>


<body>

    <h1>Hello, {{ $user->first_name }} {{ $user->last_name }}</h1>

    <form method="post" action="{{ url('/upload') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <p>
            <label for="resume">Upload Resume:</label>
            <input type="file" name="resume">
        </p>
        <p>
            <input type="submit" name="upload" value="Upload">
        </p>
    </form>



    @if ($student->profile_pic_link)
        <p>pic</p>
    @else
        <p>null</p>
    @endif
</body>

</html>