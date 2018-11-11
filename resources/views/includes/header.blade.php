<header>
<nav class="navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand header" href="">Digi Health Care</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            @if(session('signedUser')->user_type == "Admin")
                <li><a href="{{route('user.profile')}}">{{session('signedUser')->username}}</a></li>
                <li><a href="{{route('user.index')}}">Post Feed</a></li>
                <!--<li><a href="{{route('user.index')}}">Chat</a></li>-->
                <li><a href="{{route('admin.index')}}">Admin Panel</a></li>
                <li><a href="{{route('signout.index')}}">Sign Out</a></li> 
            @elseif(session('signedUser')->user_type == "Moderator")
            <li><a href="{{route('user.profile')}}">{{session('signedUser')->username}}</a></li>
            <li><a href="{{route('user.index')}}">Post Feed</a></li>
            <!--<li><a href="{{route('user.index')}}">Chat</a></li>-->
            <li><a href="{{route('moderator.index')}}">Moderator panel</a></li>
            <li><a href="{{route('signout.index')}}">Sign Out</a></li>
            @else
            <li><a href="{{route('user.profile')}}">{{session('signedUser')->username}}</a></li>
            <li><a href="{{route('user.index')}}">Post Feed</a></li>
            <!--<li><a href="{{route('user.index')}}">Chat</a></li>--> 
            <li><a href="{{route('signout.index')}}">Sign Out</a></li>  
            @endif                        
            </ul>
        </div>
    </div>
</nav>
</header>