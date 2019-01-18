<div class="sidebar" data-color="green" data-background-color="black" data-image="{{asset('assets/back-end')}}/assets/img/sidebar-1.jpg">
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
            <img src="{{asset('assets/back-end')}}/assets/img/faces/avatar.jpg" />
        </div>
        <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                <span class="sidebar-normal">{{Auth::User()->name}}</span>
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="sidebar-mini"> MP </span>
                            <span class="sidebar-normal"> My Profile </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
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
            </div>
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item active ">
            <a class="nav-link" href="dashboard.html">
                <i class="material-icons">dashboard</i>
                <p> Dashboard </p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                <i class="material-icons">image</i>
                <p> Pages
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="pagesExamples">
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="pages/pricing.html">
                            <span class="sidebar-mini"> P </span>
                            <span class="sidebar-normal"> Pricing </span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="pages/rtl.html">
                            <span class="sidebar-mini"> RS </span>
                            <span class="sidebar-normal"> RTL Support </span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>


    </ul>
</div>
</div>