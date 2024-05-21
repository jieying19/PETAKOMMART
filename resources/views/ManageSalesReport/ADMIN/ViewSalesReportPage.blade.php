<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>VIEW SALES REPORT PAGE</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="" />
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

</head>

<body>

    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="#" style="font-weight: bold; color: red;">PETAKOM MART MANAGEMENT
                SYSTEM</a>
            <button type="button" class="btn"></button>

            </style>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <img height="20%" width="100%" src="{{ asset('Gambaq/petakom-logo.png') }}" alt="My Image">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ADMIN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body bg-danger">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inventory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Payment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Home2">Sales Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </nav>

    </table>
    <br>
    <br>
    <br>
    <table border="1" align="center">
        <br>
        <br>
        <br>
        <td>
            <table style="background : white" border="1" align="center">

                <tr>
                    <td style="width: 400px;height:0; text-align:center;">

                        <head>
                            <h4 style="color : red; text-align:center;">Weekly Sales Report</h4>
                        </head>
                        <br>
                        <a href="{{ route('ManageSalesReport.ADMIN.AddSalesReportPage') }}"><button type="button"
                                style="background-color: red; color: white;">&nbsp;&nbsp;&nbsp;&nbsp;ADD&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
                        <hr>
                        <br>
                        <br>
                        <table>
                            <tr>
                                <th><label for="fname">Total Sales Report:</th>
                                @foreach ($data_report as $salesreports)
                                    <th><input type="text"
                                            value="{{ $salesreports->monday + $salesreports->tuesday + $salesreports->wednesday + $salesreports->thursday + $salesreports->friday }}"
                                            disabled></th>
                                @endforeach
                            </tr>
                        </table>
                        </div>

                        <hr>
                        <table>
                            <style>
                                table,
                                th,
                                td {
                                    border: 1px solid black;
                                }
                            </style>
                            <tr>
                                <th>Week</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>

                            </tr>
                            @foreach ($data_report as $salesreports)
                                <tr>
                                    <td>{{ $salesreports->week }}</td>
                                    <td>{{ $salesreports->monday }}</td>
                                    <td>{{ $salesreports->tuesday }}</td>
                                    <td>{{ $salesreports->wednesday }}</td>
                                    <td>{{ $salesreports->thursday }}</td>
                                    <td>{{ $salesreports->friday }}</td>
                                    <td>
                                        <form action="{{ route('salesReport.destroy', $salesreports->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button
                                                style="background-color: red; color: white;">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                    <td>
                                        {{-- <form action="{{ route('salesReport.update', $salesreports['id']) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <a
                                                href="{{ route('ManageSalesReport.ADMIN.UpdateSalesReportPage', $salesreports['id']) }}"><button
                                                    type="button"
                                                    style="background-color: red; color: white;">Update</button></a>
                                        </form> --}}
                                        <a
                                                href="/salesReport/{{$salesreports->id}}/edit"><button
                                                    type="button"
                                                    style="background-color: red; color: white;">Update</button></a>
                                    </td>

                                </tr>
                            @endforeach


                        </table>





                        <!-- Bootstrap core JS-->
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
                        </script>
                        <!-- Core theme JS-->
                        <script type="text/javascripts" src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>
<style>
    body {
        background-image: url('{{ asset('Gambaq/cancelori.jpg') }}');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
    }
</style>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

</html>
