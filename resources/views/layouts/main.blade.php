<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name', 'Kampung Sarosah') }} - @yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script src="{{asset('/js/qrcode.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body id="page-top">
    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.topbar')
                <!-- Begin Page Content -->
                <div class="container-fluid" id="jam_buka">
                    <!-- Page Heading -->
                    @yield('heading')
                    <!-- Content Row -->
                    @yield('content')
                </div>
                <div id="jam_tutup">

                    <h1>Tutup</h1>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>

    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <!-- Bootstrap core JavaScript-->
    {{-- <script>
        $(document).ready(function () {

        function my_Clock() {
        this.cur_date = new Date();
        this.hours = this.cur_date.getHours();
        this.minutes = this.cur_date.getMinutes();
        this.seconds = this.cur_date.getSeconds();
    }

    my_Clock.prototype.run = function () {
        setInterval(this.update.bind(this), 1000);
    };

    my_Clock.prototype.update = function () {
        this.updateTime(1);
        // buka aplikasi jam 8 pagi
        if(this.hours >= 8 && this.hours <= 11 ){
            // console.log('buka');
            if(this.hours <= 11 && this.minutes <= 13){
                // console.log('buka1');
                $('#jam_buka').css('display', 'block');
                $('#jam_tutup').css('display', 'none');
            }else{
                // console.log('tutup');
                $('#jam_buka').css('display', 'none');
                $('#jam_tutup').css('display', 'block');
            }
        }else{
            // console.log('tutup1');
            $('#jam_buka').css('display', 'none');
            $('#jam_tutup').css('display', 'block');
        }
        console.log(this.hours + ":" + this.minutes + ":" + this.seconds);
    };
    my_Clock.prototype.updateTime = function (secs) {
        this.seconds += secs;
        if (this.seconds >= 60) {
            this.minutes++;
            this.seconds = 0;
        }
        if (this.minutes >= 60) {
            this.hours++;
            this.minutes = 0;
        }
        if (this.hours >= 24) {
            this.hours = 0;
        }
    };
    var clock = new my_Clock();
    clock.run();
    });

    </script> --}}
    <script src="{{ asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/js/sb-admin-2.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('/vendor/chart.js/Chart.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('/js/demo/chart-pie-demo.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset('/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('/js/demo/datatables-demo.js')}}"></script>
</body>

</html>
