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
                    <form action="{{ route('student') }}" method="get">
                        <button class="ui primary button">Add</button>
                    </form>
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
        <table id="customers">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>College</th>
                    <th>Batch</th>
                    <th>DOB</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ @$item->Department->department }}</td>
                    <td>{{ @$item->College->college }}</td>
                    <td>{{ @$item->Batch->batch }}</td>
                    <td>{{ $item->DOB }}</td>
                    <td>{{ $item->phone_number }}</td>
                    <td>
                        <a href="{{ route('editDashboardData', ['id' => $item->id]) }}">
                            <button class="button2">edit</button>
                        </a>
                        <form action="{{ route('deleteDashboardData', ['id' => $item->id]) }}" onclick="return confirmDelete()" method="POST">
                            @csrf
                            @method('DELETE')
                            <br>
                            <button type="submit" class="button2">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<style>
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
 .button2 {
 font-size: 17px;
 padding: 0.em 2em;
 border: transparent;
 box-shadow: 2px 2px 4px rgba(0,0,0,0.4);
 background: dodgerblue;
 color: white;
 border-radius: 4px;
}

.button2:hover {
 background: rgb(2,0,36);
 background: linear-gradient(90deg, rgba(30,144,255,1) 0%, rgba(0,212,255,1) 100%);
}

.button2:active {
 transform: translate(0em, 0.2em);
}
</style>
<script>
// Add your JavaScript code here
$(".openbtn").on("click", function() {
$(".ui.sidebar").toggleClass("very thin icon");
$(".asd").toggleClass("marginlefting");
$(".sidebar z").toggleClass("displaynone");
$(".ui.accordion").toggleClass("displaynone");
$(".ui.dropdown.item").toggleClass("displayblock");
$(".logo").find('img').toggle();
});

$(".ui.dropdown").dropdown({
allowCategorySelection: true,
transition: "fade up",
context: 'sidebar',
on: "hover"
});

$('.ui.accordion').accordion({
selector: {}
});

function confirmDelete() {
        return confirm('Are you sure you want to delete this department?');
    }

$('.ui.dropdown').dropdown();

</script>
</body>
</html>

