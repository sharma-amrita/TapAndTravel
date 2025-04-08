<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .card {
            width: 420px;
            border: none;
            padding: 20px;
            border-radius: 15px;
            /* background: rgba(255, 255, 255, 0.15); */
            box-shadow: 0 8px 16px rgba(171, 145, 145, 0.3);
            text-align: center;
            backdrop-filter: blur(10px);
        }

        h6 {
            color:rgb(235, 59, 46);
            font-size: 22px;
            font-weight: bold;
        }

        .inputs input {
            width: 50px;
            height: 50px;
            font-size: 22px;
            text-align: center;
            border: 2px solid rgb(235, 59, 46);
            border-radius: 8px;
            margin: 5px;
            outline: none;
            transition: 0.3s;
            background: transparent;
            color: black;
        }

        .inputs input:focus {
            border-color:rgb(235, 59, 46);
            background:rgb(238, 202, 202);
        }

        .validate {
            background:rgb(232, 99, 87);
            border: none;
            border-radius: 25px;
            font-size: 18px;
            padding: 10px 30px;
            color: white;
            transition: 0.3s;
            font-weight: bold;
        }

        .validate:hover {
            background:rgb(227, 68, 56);
            color: white;
        }
    </style>
</head>

<body>
    <div class="card">
        <h6>Enter the OTP to Verify Your Account</h6>
        <p>A code has been sent to <strong id="maskedNumber"></strong></p>
        <div id="otp" class="inputs d-flex justify-content-center mt-3">
            <input type="text" maxlength="1" class="form-control" id="first" />
            <input type="text" maxlength="1" class="form-control" id="second" />
            <input type="text" maxlength="1" class="form-control" id="third" />
            <input type="text" maxlength="1" class="form-control" id="fourth" />
            <input type="text" maxlength="1" class="form-control" id="fifth" />
            <input type="text" maxlength="1" class="form-control" id="sixth" />
        </div>
        <button id="validateBtn" class="btn validate mt-4">Validate</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const userPhoneNumber = "9876543210"; 
            document.getElementById("maskedNumber").textContent = "*******" + userPhoneNumber.slice(-4);

            function OTPInput() {
                const inputs = document.querySelectorAll('#otp > input');
                inputs.forEach((input, index) => {
                    input.addEventListener('input', function () {
                        if (this.value.length > 1) {
                            this.value = this.value[0];
                        }
                        if (this.value !== '' && index < inputs.length - 1) {
                            inputs[index + 1].focus();
                        }
                    });

                    input.addEventListener('keydown', function (event) {
                        if (event.key === 'Backspace' && index > 0 && this.value === '') {
                            inputs[index - 1].focus();
                        }
                    });
                });
            }

            OTPInput();

            document.getElementById('validateBtn').addEventListener('click', function () {
                let otp = '';
                document.querySelectorAll('#otp > input').forEach(input => otp += input.value);
                if (otp.length === 6) {
                    window.location.href = "form_NewPass.php"; 
                } else {
                    alert("Please enter a valid 6-digit OTP");
                }
            });
        });
    </script>
</body>
</html>
