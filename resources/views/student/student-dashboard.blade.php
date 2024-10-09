<!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin dashboard</title>
    <link rel="stylesheet" href="{{ asset('backend_assets/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">IGC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('about.index') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('team.index') }}">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('advisor.index') }}">Advisor</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Country
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('country.index') }}">Country List</a></li>
                            <li><a class="dropdown-item" href="{{ route('country.detail.index') }}">Country Details</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            University
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('university.index') }}">University List</a></li>
                            <li><a class="dropdown-item" href="{{ route('university.detail.index') }}">University Details</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('success.story.index') }}">Success Stories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('event.index') }}">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('review.index') }}">Reviews</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Blogs
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('category.index') }}">Category</a></li>
                            <li><a class="dropdown-item" href="{{ route('blog.index') }}">Blog</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('partner.index') }}">Partners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('survey.index') }}">Survey List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.index') }}">Enrollment Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Website</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.blog.comment') }}">Blog-Comment</a>
                    </li>
                    {{-- <script>
                        const anchors = document.querySelectorAll("a[data-bs-toggle='dropdown']");
                        anchors.forEach(anc => {
                            anc.addEventListener("click", function (e) {
                                e.target.nextElementSibling.classList.toggle("d-block");
                            });
                        });
                    </script> --}}
                </ul>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">{{ auth()->user()->email }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                        <li><a class="dropdown-item" href="{{ route('manage.account') }}"><i class="fa fa-cog" aria-hidden="true"></i>Setting</a></li>
                        <li><a class="dropdown-item" href="{{ route('register.user') }}"><i class="fa fa-user" aria-hidden="true"></i>Register New User</a></li>
                    </ul>
                    {{-- <script>
                        const button = document.querySelector("button[data-bs-toggle='dropdown']");
                        button.addEventListener("click", function (e) {
                            e.target.nextElementSibling.classList.toggle("d-block");
                        });
                    </script>
                    <style>
                        .dropdown-menu {
                        top: 47px;
                        right: 10px;
                    }
                    </style> --}}
                </div>
            </div>
        </div>
    </nav>
    <section>
        <div class="container-fluid">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
            @endif

            @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success_message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </section>
    <script src="{{ asset('backend_assets/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
