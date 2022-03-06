<!DOCTYPE html>
<html lang="en">
@include('admin.header')   
    <body>
@include('admin.sidebar')
    <main>
    @include('admin.users.alert')
        <div class="container-fluid px-4">
            <h3 class="mt-4">{{$title}}</h3>
            <div class="card mb-4">
                <div class="card-body">
                    <p class="mb-0">
                        @yield('content')
                    </p>
                </div>
            </div>
            <div style="height: 100vh"></div>
            <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
            <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2021</div>
                <div>
                    <a href="#">Privacy Policy</a>
                                        &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
        </footer>
        </div>
        </div>
        </div>
    </main>
    @include('admin.footer')
    </body>
</html>
