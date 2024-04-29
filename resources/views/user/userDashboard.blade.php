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
                <a class="item" href="{{route('userDashboard')}}">Dashboard</a>
            </div>
        </div>
    </div>
    <div class="pusher">
        <div class="ui menu asd borderless" style="border-radius: 0!important; border: 0; margin-left: 260px; -webkit-transition-duration: 0.1s;">
            <a class="item">Student Login ( {{ Auth::user()->name }} ) </a>
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
        <div class="user-menu">
            <div class="user-name" onclick="toggleLogoutMenu()">
            </div>
        </div>
        <br>
        <table id="customers">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Department</th>
                    <th>College</th>
                    <th>Batch</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($datas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ @$item->Department->department }}</td>
                    <td>{{ @$item->College->college }}</td>
                    <td>{{ @$item->Batch->batch }}</td>
                    <td>{{ @$item->Course->course }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
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
</style>
<script>
    $('.ui.dropdown').dropdown();
</script>
