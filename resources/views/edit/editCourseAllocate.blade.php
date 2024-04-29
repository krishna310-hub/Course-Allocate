<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
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
    <center>
    <br>
    <h2>Edit the data which you need</h1>
        <form action="{{ route('editCourseAllocate/{id}', ['id' => $data->id]) }}" method="post">
            @csrf
            <h3>
                <label>Department:
                    <select id="department_id" name="department_id">
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ $data->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->department }}
                            </option>
                        @endforeach
                    </select>
                </label>
            </h3>
            <h3>
                <label>College:
                    <select id="college_id" name="college_id">
                        @foreach($colleges as $college)
                            <option value="{{ $college->id }}" {{ $data->college_id == $college->id ? 'selected' : '' }}>
                                {{ $college->college }}
                            </option>
                        @endforeach
                    </select>
                </label>
            </h3>
            <h3>
                <label>Batch:
                    <select id="batch_id" name="batch_id">
                        @foreach($batches as $batch)
                            <option value="{{ $batch->id }}" {{ $data->batch_id == $batch->id ? 'selected' : '' }}>
                                {{ $batch->batch }}
                            </option>
                        @endforeach
                    </select>
                </label>
            </h3>
            <h3>
                <label>Course:
                    <select id="course_id" name="course_id">
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ $data->course_id == $course->id ? 'selected' : '' }}>
                                {{ $course->course }}
                            </option>
                        @endforeach
                    </select>
                </label>
            </h3>
            <button class="button" type="submit">Update</button>
            <a href="{{ route('dashboard') }}"><button class="cancelBtn" type="button">Cancel</button></a>
        </form>
    </center>
</body>
<style>
.button, .cancelBtn {
 font-size: 17px;
 padding: 0.em 2em;
 border: transparent;
 box-shadow: 2px 2px 4px rgba(0,0,0,0.4);
 background: dodgerblue;
 color: white;
 border-radius: 4px;
}

.button:hover {
 background: rgb(2,0,36);
 background: linear-gradient(90deg, rgba(30,144,255,1) 0%, rgba(0,212,255,1) 100%);
}

.button:active {
 transform: translate(0em, 0.2em);
}
</style>
<script>
    $('.ui.dropdown').dropdown();
</script>
</html>
