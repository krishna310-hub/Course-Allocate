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

    <form action="{{ url('student/upload')}}" method="POST" enctype="multipart/form-data">
        @csrf

            <h2><label for="input" class="text">Department:</label></h2>
                <select name="department" required>
                    <option value="" disabled selected> Select a department</option>
                    @foreach ($departments as $department)
                        <option value="{{$department->id}}"> {{ $department->department}} </option>
                    @endforeach
                </select>

            <h2><label for="input" class="text">College:</label></h2>
                <select name="college" required>
                    <option value="" disabled selected> Select a College</option>
                    @foreach ($colleges as $college)
                        <option value="{{$college->id}}"> {{ $college->college}} </option>
                    @endforeach
                </select>

            <h2><label for="input" class="text">Batch:</label></h2>
                <select name="batch" required>
                    <option value="" disabled selected> Select a Batch</option>
                    @foreach ($batches as $batch)
                        <option value="{{$batch->id}}"> {{ $batch->batch}} </option>
                    @endforeach
                </select>
      <br><br><br><br>
                <input type="file" name="import_file">

                <a href="{{ route('dashboard') }}"><button class="cssbuttons-io-button" >
                    <svg viewBox="0 0 640 512" fill="white" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"></path></svg>
                    <span>Upload</span>
                </button></a>
    </form>
</body>

<style>
h1 {
text-align: center; /* Centers the text horizontally */
}
.h2-student {
color: black;
}
label{
margin-left: 300px;
}
select{
font-size: 18px;
width: 300px;
margin-left: 300px;
}
input{
font-size: 15px;
margin-left: 300px;
}
.cssbuttons-io-button {
display: flex;
margin-top: 30px;
margin-left: 300px;
align-items: center;
font-family: inherit;
font-weight: 500;
font-size: 17px;
padding: 0.8em 1.5em 0.8em 1.2em;
color: white;
background: #ad5389;
background: linear-gradient(0deg, rgb(120, 47, 255) 0%, rgb(185, 132, 255) 100%);
border: none;
box-shadow: 0 0.7em 1.5em -0.5em rgb(184, 146, 255);
letter-spacing: 0.05em;
border-radius: 20em;
}

.cssbuttons-io-button svg {
margin-right: 8px;
}

.cssbuttons-io-button:hover {
box-shadow: 0 0.5em 1.5em -0.5em rgb(149, 91, 255);
}

.cssbuttons-io-button:active {
box-shadow: 0 0.3em 1em -0.5em rgb(160, 109, 255);
}
/* student table */
</style>
<script>
    $('.ui.dropdown').dropdown();
</script>
</html>

