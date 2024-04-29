<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <title>One Time Password</title>
</head>

<body>
    <form action="{{ url('admin/newpass') }}" class="form" method="post">
        @csrf

        <p id="heading">Enter the OTP</p>
        <div class="field">
        <i class="fa-solid fa-check"></i>
            <input autocomplete="off" placeholder="Enter the Otp" name="otp" class="input-field" type="text">
        </div>
        <div class="btn">
            <button class="button2" type="submit">Verify Otp</button>
        </div>
    </form>

    @if(session('error'))
        <div class="error-message" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <style>
        .error-message {
    background-color: #f8d7da; /* Red background color */
    color: #721c24; /* Dark text color */
    padding: 10px; /* Padding around the text */
    margin-top: 10px; /* Spacing between form and error message */
    border-radius: 5px; /* Rounded corners */
    text-align: center; /* Center align the text */
    }
        body {
        padding: 150px;
        padding-left: 500px;
        padding-right: 500px;
        background: #f1f1f1;
      }

        .form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        padding-left: 2em;
        padding-right: 2em;
        padding-bottom: 0.4em;
        background-color: #171717;
        border-radius: 25px;
        transition: .4s ease-in-out;
      }

      .form:hover {
        transform: scale(1.05);
        border: 1px solid black;
      }

      #heading {
        text-align: center;
        margin: 2em;
        color: rgb(255, 255, 255);
        font-size: 1.2em;
      }

      .field {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5em;
        border-radius: 25px;
        padding: 0.6em;
        border: none;
        outline: none;
        color: white;
        background-color: #171717;
        box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
      }

      .input-icon {
        height: 1.3em;
        width: 1.3em;
        fill: white;
      }

      .input-field {
        background: none;
        border: none;
        outline: none;
        width: 100%;
        color: #d3d3d3;
      }

      .form .btn {
        display: flex;
        justify-content: center;
        flex-direction: row;
        margin-top: 2.5em;
      }

      .button1 {
        padding: 0.5em;
        padding-left: 1.1em;
        padding-right: 1.1em;
        border-radius: 5px;
        margin-right: 0.5em;
        border: none;
        outline: none;
        transition: .4s ease-in-out;
        background-color: #252525;
        color: white;
      }

      .button1:hover {
        background-color: black;
        color: white;
      }

      .button2 {
        padding: 0.5em;
        padding-left: 2.3em;
        padding-right: 2.3em;
        border-radius: 5px;
        border: none;
        outline: none;
        transition: .4s ease-in-out;
        background-color: #252525;
        color: white;
      }

      .button2:hover {
        background-color: black;
        color: white;
      }

    </style>

</body>
</html>

