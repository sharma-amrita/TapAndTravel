<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating New Password</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: black;
        }

        label {

          color: black !important;
        }

        .password-container {
            width: 400px;
            padding: 25px;
            border-radius: 10px;
            background: rgba(253, 249, 249, 0.97);
            /* backdrop-filter: blur(10px); */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        .password-container h4 {
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
            color: rgb(217, 19, 19);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            background: rgba(244, 230, 230, 0.8);
            border: none;
            padding: 10px;
            border-radius: 5px;
        }

        .form-control::placeholder {
            color: #555;
        }

        .pass_show {
            position: relative;
        }

        .pass_show .ptxt {
            position: absolute;
            top: 50%;
            right: 10px;
            z-index: 1;
            color: rgb(226, 49, 49);
            margin-top: -10px;
            cursor: pointer;
            transition: .3s ease all;
            font-weight: bold;
        }

        .pass_show .ptxt:hover {
            color: green;
        }

        .btn-primary {
            background: rgb(235, 59, 46);
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.78), #ff5e73);
            border: 2px solid red;
            color: black;
        }
    </style>
</head>

<body>
    <div class="password-container">
        <h4>Create New Password</h4>
        <form id="Create_NewPassword" role="form" action="" autocomplete="off" class="form" method="post">
            <!-- <div class="form-group">
                <label>Current Password</label>
                <div class="pass_show">
                    <input type="password" class="form-control" placeholder="Current Password">
                    <span class="ptxt">Show</span>
                </div>
            </div> -->
            <div class="form-group">
                <label>New Password</label>
                <div class="pass_show">
                    <input type="password" class="form-control" placeholder="New Password">
                    <span class="ptxt">Show</span>
                </div>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <div class="pass_show">
                    <input type="password" class="form-control" placeholder="Confirm Password">
                    <span class="ptxt">Show</span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create Password</button>
        </form>
    </div>
    <script>
        $(document).on('click', '.pass_show .ptxt', function () {
            $(this).text($(this).text() == "Show" ? "Hide" : "Show");
            $(this).prev().attr('type', function (index, attr) {
                return attr == 'password' ? 'text' : 'password';
            });
        });
    </script>
</body>

</html>