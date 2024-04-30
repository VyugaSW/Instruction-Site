<div class="row mx-1">
            <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm bg-body-tertiary mb-1">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/home">
                        <img src="{{asset('storage/images/logo.png')}}" alt="logo" style="width: 3.5rem; height: 3.5rem;">
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class='nav-link link-opacity-50-hover' href="/home"><i class="fa-solid fa-house"></i>  Home</a></li>
                            <li class="nav-item"><a class='nav-link link-opacity-50-hover' href="/search"><i class="fa-solid fa-magnifying-glass"></i>  Search</a></li>
                            <li class="nav-item"><a class='nav-link link-opacity-50-hover' href="/registration"><i class="fa-solid fa-address-card"></i>  Registration</a></li>
                            @if(session()->has('ruser')) 
                                    <li class="nav-item"><a class='nav-link link-opacity-50-hover' href="/profile"><i class="fa-solid fa-user"></i>  Profile</a></li>
                                @if(session()->has('radmin'))
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="/adminthings" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-pen-nib"></i> Admin things
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="/complains"><i class="fa-regular fa-clipboard"></i> Complains</a></li>
                                            <li><a class="dropdown-item" href="/approving"><i class="fa-solid fa-list"></i> Approve Instructions</a></li>
                                        </ul>
                                    </li>
                                @endif
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/adminthings" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-person"></i> Find user
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="m-1">
                                        <input class="form-control mr-sm-2 h-50" name="searchUser" type="search" placeholder="Username" aria-label="Search" oninput="getUsers(this.value)">
                                    </li>
                                    <div class="d-flex flex-column align-items-center m-2" id="users_found">
                                        
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <script>
                        async function getUsers(login){
                            if(login == ''){
                                document.getElementById('users_found').innerHTML = '';
                                return;
                            }

                            let response = await fetch('/usersFind?login='+login);

                            if(response.ok){
                                document.getElementById('users_found').innerHTML = await response.text();
                            }
                        }
                    </script> 
                        @if(session()->has('ruser')) 
                            <a href="/profile" class="link link-underline link-underline-opacity-0 link-underline-opacity-100-hover text-dark">
                                <h4 class="me-1 mb-4"> {{session('ruser')}}</h4>
                            </a>
                            <img src="{{ asset('storage/'.session('avatar'))}}" alt="avatar" style="width: 4rem; height: 4rem" class="me-1 rounded">
                            <form class="d-flex" role="search" method="POST" action="/unlogin">
                            @csrf
                                <button class="btn btn-primary" type="submit" name="btnunlogin">Unlogin</button>
                            </form>                   
                        @else
                            <button class="btn btn-primary" name="btnOpenModal" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                                <div class="modal-dialog" id="modalDialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Login window</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/login" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="inputLoginModal" class="form-label">Login:</label>
                                                <input type="text" class="form-control" id="inputLoginModal" name="login">
                                                <div id="loginHelpModal" class="form-text text-danger"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputPassword1Modal" class="form-label">Password:</label>
                                                <input type="password" class="form-control" id="inputPassword1Modal" name="password1">
                                                <div id="password1HelpModal" class="form-text text-danger"></div>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="btnlogin" id="loginbtn">Login</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div> 
                            <script src="{{asset('js/login_support.js')}}"></script>
                        @endif
                    </div>
            </nav>
        <hr>
        </div>