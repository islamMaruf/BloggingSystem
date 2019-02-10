<div class="sidebar" data-color="purple" data-background-color="purple" data-image="{{asset('assets/back-end')}}/assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a class="simple-text logo-mini">
            CT
        </a>
        <a class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
    <div class="user">
        <div class="photo">
            @if(isset(Auth::User()->info->profilePhoto))
                <img src="{{asset('storage/userImage/'.Auth::User()->info->profilePhoto)}}" />
            @else
                <img src="{{asset('image/default.png')}}" />
            @endif

        </div>
        <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                <span class="sidebar-normal">{{Auth::User()->role_id == 1 ? 'Admin':'Author'}}</span>
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
                @if(Auth::user()->role_id ==1)
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.profile-hit')}}">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{route('admin.edit-hit')}}>
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <span class="sidebar-mini"> A </span>
                                <span class="sidebar-normal">{{Auth::User()->role->name}}</span>
                            </a>
                        </li>
                    </ul>
                    @else
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('author.profile-hit')}}">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{route('author.edit-hit')}}>
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <span class="sidebar-mini"> A </span>
                                <span class="sidebar-normal">{{Auth::User()->role->name}}</span>
                            </a>
                        </li>

                    </ul>
                    @endif

            </div>
        </div>
    </div>
    <ul class="nav">
        @if(Request::is('admin*'))
        <li class="nav-item {{Request::is('admin/dashboard') ? 'active':''}}">
            <a class="nav-link" href="{{route('admin.dashboard-hit')}}">
                <i class="material-icons">dashboard</i>
                <p> Dashboard </p>
            </a>
        </li>
        <li class="nav-item {{Request::is('admin/tags*') ? 'active':''}}">
            <a class="nav-link" href="{{route('admin.tags.index')}}">
                <i class="material-icons">view_headline</i>
                <p> Tags </p>
            </a>
        </li>
        <li class="nav-item {{Request::is('admin/categories*') ? 'active':''}}">
            <a class="nav-link" href="{{route('admin.categories.index')}}">
                <i class="material-icons">sort</i>
                <p> Categories </p>
            </a>
        </li>
        <li class="nav-item {{Request::is('admin/posts*') ? 'active':''}}">
            <a class="nav-link" href="{{route('admin.posts.index')}}">
                <i class="material-icons">receipt</i>
                <p> Posts </p>
            </a>
        </li>
         <li class="nav-item {{Request::is('admin/pending*') ? 'active':''}}">
            <a class="nav-link" href="{{route('admin.pending-post')}}">
                <i class="material-icons">table_chart</i>
                <p> Pending Post </p>
            </a>
        </li>
        <li class="nav-item {{Request::is('admin/subscriber*') ? 'active':''}}">
            <a class="nav-link" href="{{route('admin.subscriber')}}">
                <i class="material-icons">subscriptions</i>
                <p> Subscriber </p>
            </a>
        </li>
        @endif

        @if(Request::is('author*'))
        <li class="nav-item {{Request::is('author/dashboard') ? 'active':''}}">
            <a class="nav-link" href="{{route('author.dashboard-hit')}}">
                <i class="material-icons">dashboard</i>
                <p> Dashboard </p>
            </a>
        </li>
        <li class="nav-item {{Request::is('author/posts*') ? 'active':''}}">
            <a class="nav-link" href="{{route('author.posts.index')}}">
                <i class="material-icons">receipt</i>
                <p> Posts </p>
            </a>
        </li>
        @endif
    </ul>
</div>
</div>