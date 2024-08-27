<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management System</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
        }

        /* The side navigation menu */
        .sidebar {
            margin: 0;
            padding: 0;
            width: 220px;
            background-color: #ffffff;
            position: fixed;
            height: 100%;
            overflow: auto;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        /* Sidebar links */
        .sidebar .nav-link {
            display: flex;
            align-items: center;
            color: #4f5467;
            padding: 15px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            margin: 10px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link i {
            font-size: 18px;
            margin-right: 15px;
        }

        /* Active/current link */
        .sidebar .nav-link.active {
            background-color: #4b49ac;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Links on mouse-over */
        .sidebar .nav-link:hover:not(.active) {
            background-color: #f0f0f0;
            color: black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
        div.content {
            margin-left: 240px;
            padding: 20px;
            min-height: 100vh;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
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

        /* Additional styling for the sidebar */
        .sidebar-header {
            padding: 20px;
            background-color: #4b49ac;
            color: white;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
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
                <div class="sidebar-header">
                    Menu
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('students*') ? 'active' : '' }}"  href="{{url('/students')}}">
                            <i class="fas fa-user-graduate"></i> Students
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('teachers*') ? 'active' : '' }}" href="{{url('/teachers')}}">
                            <i class="fas fa-chalkboard-teacher"></i> Teachers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('courses*') ? 'active' : '' }}" href="{{url('/courses')}}">
                            <i class="fas fa-book-open"></i> Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('batches*') ? 'active' : '' }}" href="{{url('/batches')}}">
                            <i class="fas fa-layer-group"></i> Batches
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('enrollments*') ? 'active' : '' }}" href="{{url('/enrollments')}}">
                            <i class="fas fa-clipboard-list"></i> Enrollments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('payments*') ? 'active' : '' }}" href="{{url('/payments')}}">
                            <i class="fas fa-dollar-sign"></i> Payments
                        </a>
                    </li>
                </ul>
            </div>

            <div class="content col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</body>
</html>
