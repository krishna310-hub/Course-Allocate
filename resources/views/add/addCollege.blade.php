<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="ui sidebar vertical left menu overlay visible" style="-webkit-transition-duration: 0.1s; overflow: visible !important;">
        <div class="item logo">
            <img width="250" height="45" src="https://amypo.com/wp-content/uploads/2023/10/amypng-e1709699800168.png" class="elementor-animation-grow attachment-full size-full wp-image-8433 lazyautosizes lazyloaded" alt="Amypo educational technology" data-src="https://amypo.com/wp-content/uploads/2023/10/amypng-e1709699800168.png" decoding="async" data-srcset="https://amypo.com/wp-content/uploads/2023/10/amypng-e1709699800168.png 522w, https://amypo.com/wp-content/uploads/2023/10/amypng-e1709699800168-300x83.png 300w" data-sizes="auto" data-eio-rwidth="522" data-eio-rheight="144" sizes="167px" srcset="https://amypo.com/wp-content/uploads/2023/10/amypng-e1709699800168.png 522w, https://amypo.com/wp-content/uploads/2023/10/amypng-e1709699800168-300x83.png 300w">
        </div>
        <div class="ui accordion">
            <div class="content">
                <a class="item" href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div class="content">
                <a class="item" href="{{route('department')}}">Department</a>
            </div>
            <div class="content">
                <a class="item" href="{{route('college')}}">College</a>
            </div>
            <div class="content">
                <a class="item" href="{{route('batch')}}">Batch</a>
            </div>
            <div class="content">
                <a class="item" href="{{route('student')}}">Student</a>
            </div>
            <div class="content">
                <a class="item" href="{{route('course')}}">Course</a>
            </div>
        </div>
    </div>
    <div class="pusher">
        <div class="ui menu asd borderless" style="border-radius: 0!important; border: 0; margin-left: 260px; -webkit-transition-duration: 0.1s;">
            <a class="item">Admin Login</a>
            <div class="right menu">
                <div class="ui dropdown item">
                    Language <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item">English</a>
                        <a class="item">Russian</a>
                        <a class="item">Spanish</a>
                    </div>
                </div>
                <div class="item">
                    <form action="{{ route('login') }}" method="POST">
                    @csrf
                        <button class="ui primary button">logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <br><br>
        <form action="{{route('college1')}}" method="POST">
            @csrf

            <div>
                <h2><label for="input" class="text">College name:</label></h1>
                <input type="text" placeholder="Enter the College name" name="college" class="input">
            </div>
            <br>
            <div>
                <button  class="button1">Submit</button>
            <div>
        </form>
    </div>
</body>
<style>
label{
margin-top: 10px;
margin-left: 270px;
}
.button1 {
  position: relative;
  top: 10px;
  left: 10px;
  display: inline-block;
  padding: 15px 25px;
  font-size: 15px;
  margin-left: 270px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #04AA6D;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button1:hover {background-color: #3e8e41}

.button1:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #a4a3a3;
  transform: translateY(4px);
}
input{
  font-size: 15px;
  height: 30px;
  width: 500px;
  margin-left: 270px;
}
</style>
<script>
    $('.ui.dropdown').dropdown();
</script>
</html>
