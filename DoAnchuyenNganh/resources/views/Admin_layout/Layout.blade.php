<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/lava-admin/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 May 2019 19:47:56 GMT -->
@include('Admin_layout.head')

<body>
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            @include('Admin_layout.logo')
            <!--== SEARCH ==-->
            @include('Admin_layout.search')
            <!--== NOTIFICATION ==-->
            @include('Admin_layout.notifi')
            <!--== MY ACCCOUNT ==-->
            @include('Admin_layout.account')
        </div>
    </div>

    <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                @include('Admin_layout.user_info')
                <!--== LEFT MENU ==-->
                @include('Admin_layout.left_menu')
            </div>

            <!--== BODY INNER CONTAINER ==-->
            @yield('content')

        </div>
    </div>

    <!--== BOTTOM FLOAT ICON ==-->
    <section>
        <div class="fixed-action-btn vertical">
            <a class="btn-floating btn-large red pulse">
                <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
                <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a>
                </li>
                <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a>
                </li>
                <li><a class="btn-floating green"><i class="material-icons">publish</i></a>
                </li>
                <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a>
                </li>
            </ul>
        </div>
    </section>

    <!--======== SCRIPT FILES =========-->
    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/materialize.min.js"></script>
    <script src="admin/js/custom.js"></script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/lava-admin/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 May 2019 19:56:11 GMT -->
</html>