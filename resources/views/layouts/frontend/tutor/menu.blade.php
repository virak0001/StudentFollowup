<div class="logo-header">
    <a href="{{route('author.dashboard')}}" class="logo">
        Manage Student
    </a>
    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
</div>
<nav class="navbar navbar-header navbar-expand-lg">
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="../assets/img/{{Auth::user()->profile}}" alt="user-img" width="36" height="36" style="border-radius:20px"><span>{{Auth::user()->first_name}}.{{Auth::user()->last_name}}</span></span> </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <div class="u-image">
                            <img class="mx-auto d-block" width="100" height="100" style="border-radius:100px" src="../assets/img/{{Auth::user()->profile}}" alt="user"></div>
                        <p  class="text-center">{{Auth::user()->first_name}}.{{Auth::user()->last_name}}</p>
                        <p id="email" class="text-center"></p>
                    </li>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('author.profile')}}"><i class="ti-user"></i>User Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
                <!-- /.dropdown-user -->
            </li>
        </ul>
    </div>
</nav>
</div>
<script>
    function exceptEamil(){
        var email = "{{Auth::user()->email}}";
        var res = email.substring(0, 30);
        document.getElementById("email").innerHTML = res+"...";
    }
    exceptEamil();
</script>