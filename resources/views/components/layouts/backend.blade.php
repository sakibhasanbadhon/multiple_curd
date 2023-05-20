<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> {{ $title ?? 'Curd Project' }} </title>
  </head>
  <body>
    <style>
        .header-area nav ul{
            list-style-type: none;
            padding: 5px;
            margin: 5px;
        }

        .header-area nav ul li{
            display: inline-block;
            margin-right:10px;

        }

        .header-area nav ul li:last-child{
            margin-right: 0;
        }

    </style>


    <div class="container">
        <div class="row bg-dark ">
            @include('backend.include.header')
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">

                        {{-- main Content --}}

                        {{-- @yield('content') --}}

                        {{ $slot }}

                </div>
            </div>

        </div>


    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function sweetAlert(delete_id){
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'

                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-'+delete_id).submit();


                    }
            })
            }


    </script>



</body>
</html>
