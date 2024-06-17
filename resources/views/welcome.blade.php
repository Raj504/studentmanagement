<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Student Management</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <style>
        body {
            margin: 0;
            background: #000;
            font-family: 'Source Sans Pro', sans-serif;
        }
        @keyframes w_line {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }
        .backend_txt {
            position: absolute !important;
            left: 0 !important;
            margin: 2px 0 !important;
            top: 0 !important;
            text-align: center;
            z-index: -1;
            background: #000;
        }
        .backend_txt span {
            font-family: 'Source Sans Pro', sans-serif;
            position: relative !important;
            color: rgba(255, 255, 255, .2) !important;
        }
        h2 {
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 100;
            color: #fff;
            text-align: center;
        }
        .d_cont {
            position: relative;
            padding-top: 4px;
            left: 0;
            width: 100%;
            min-height: 80px;
        }
        .d_txt, .backend_txt {
            position: relative;
            left: 0;
            width: 100%;
            max-width: 100%;
            margin: 5px auto;
            height: 100px;
        }
        .d_txt span {
            font-family: 'Source Sans Pro', sans-serif;
            color: #fff;
            position: absolute;
            font-size: 38px;
        }
        .w_line {
            background: #fff;
            width: 1.5px;
            height: 70px;
            display: block;
            opacity: 0;
            position: absolute;
            left: 10px;
        }
        .w_line.active {
            animation: w_line 0.8s infinite;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="d_cont">
        <div class="d_txt">
            <h2>Welcome to Student Management</h2>
            <span class="w_line active"></span>
        </div>
        <div class="backend_txt">
            <span>Backend Text</span>
        </div>
    </div>
    <div style="text-align: center; margin-top: 50px;">
        <a href="{{ route('login') }}" class="btn">Login</a>
        <a href="{{ route('register') }}" class="btn">Register</a>
    </div>
    <!-- Include the compiled JavaScript -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
