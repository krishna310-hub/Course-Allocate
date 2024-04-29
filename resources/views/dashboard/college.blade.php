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
        <a href="{{ route('addCollege') }}">
            <button class="button1">Add</button>
        </a>
    </div>
    <div>
        <table id="customers">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>College</th>
                    <th>options</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($colleges as  $college)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $college->college }}</td>
                        <td>
                            <a href="{{route('editCollege', ['id' => $college->id]) }}">
                            <button>
                                <i style="cursor: pointer;" class="fas fa-edit"></i>
                            </button> </a>
                            <a href="{{ route('deleteCollege', ['id' => $college->id]) }}" onclick="return confirmDelete()">
                                <button>
                                    <i style="cursor: pointer;" class="fas fa-trash-alt delete-icon"></i>
                                </button> </a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
    </div>
</body>
<style>
.button1 {
  position: relative;
  top: 55px;
  left: 720px;
  display: inline-block;
  padding: 15px 25px;
  font-size: 15px;
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
table {
position: relative;
display: inline;
Top: 10px;
left: 261px;
border-collapse: collapse;
width: 150px;
}
th, td {
text-align: left;
padding:7px;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #606261;
  color: white;
}
.displaynone {
   display: none !important;
 }
 .displayblock {
   display: block !important;
 }
</style>
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this college?');
    }

    $('.ui.dropdown').dropdown();

</script>
</html>

