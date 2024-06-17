<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Management System</title>
    <style>
        /* The side navigation menu */
        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        /* Sidebar links */
        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        /* Active/current link */
        .sidebar a.active {
            background-color: #04AA6D;
            color: white;
        }

        /* Links on mouse-over */
        .sidebar a:hover:not(.active) {
            background-color: #ddd;
            color: black;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
        div.content {
            margin-left: 200px;
            padding: 20px;
            height: 1000px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        /* On screens that are less than 700px wide, make the sidebar into a topbar */
        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .sidebar a {float: left;}
            div.content {margin-left: 0;}
        }

        /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }

        /* Colorful boxes */
        .box {
            background-color: #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .box:hover {
            background-color: #04AA6D;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .box a {
            text-decoration: none;
            color: inherit;
        }

        .box h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light col-12" style="box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                <a class="navbar-brand" href="#"><h2>Student Management Project</h2></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>

        <div class="row">
            <!-- The sidebar -->
            <div class="sidebar">
                <div class="box"><a href="{{url('/students')}}"><h3>Students</h3></a></div>
                <div class="box"><a href="{{url('/teachers')}}"><h3>Teachers</h3></a></div>
                <div class="box"><a href="{{url('/courses')}}"><h3>Courses</h3></a></div>
                <div class="box"><a href="{{url('/batches')}}"><h3>Batches</h3></a></div>
                <div class="box"><a href="{{url('/enrollments')}}"><h3>Enrollments</h3></a></div>
                <div class="box"><a href="{{url('/payments')}}"><h3>Payments</h3></a></div>
            </div>

            <div class="content col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-1C04JBFCcz/9Ei2kIUHVa8j/+m6O5sE1BEHtqKbbrSXOcF5xFfSW/8FDoBd/PfSgU" crossorigin="anonymous"></script>
</body>
</html>
