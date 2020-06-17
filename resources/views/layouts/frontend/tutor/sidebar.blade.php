<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="../assets/img/{{Auth::user()->profile}}" />
            </div>
            <div class="info">
                <a>
                    <span>
                        {{Auth::user()->first_name}}.{{Auth::user()->last_name}}
                        <span class="user-level">{{Auth::user()->role->role_name}}</span>
                    </span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item active" >
                <a href="{{route('author.dashboard')}}">
                    <span class="material-icons text-primary">dashboard</span>
                    <strong style="margin-left: 15px;">Dashboard</strong>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('author.tutor')}}">
                    <span class="material-icons">person</span>
                    <p style="margin-left: 15px;">Turtor</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{Route('author.unserMentor')}}">
                    <span class="material-icons text-danger">people</span>
                    <p style="margin-left: 15px;">Under Mentor</p>
                </a>
            </li>
        </ul>
    </div>
</div>