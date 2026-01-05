<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Project</title>
    <!-- bootstrap css link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <h1 class="bg-dark text-light text-center py-2"> Project Demo</h1>


    <div class="container">

        <!-- profile -->

        <?php include 'profile.php' ?>


        <!-- form modal -->
        <?php
        include 'form.php';
        ?>

        <div class="row mb-3">

            <!-- <div class="col-8">

                <div class="input-group">

                    <div class="input-group-prepend">

                        <span class="input-group-text py-2 bg-dark">
                            <i class="fas fa-search text-light"></i>
                        </span>
                    </div>

                    <input type="text" placeholder="search user" class="form-control">
                </div>

            </div> -->
            <div class="col-3">

                <button data-bs-target="#usermodal" class="btn btn-dark" type="button" data-bs-toggle="modal" data-target="#usermodal">

                    Add new user
                </button>
            </div>
        </div>

        <!-- table -->


        <div class="row mb-4">

            <div class="col-12 row">


                <a href="./public/export_users.php" class="btn btn-sm col-2 btn-outline-dark"> Download CSV </a>
                <!-- <a href="#" class="col-3 btn btn-sm btn-outline-dark"> Upload CSV </a> -->
                <form class="col-6" action="./public/upload_users.php" method="post" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-dark">Upload CSV</button>
                    <input type="file" name="csv_file" accept=".csv" required>
                </form>


            </div>
        </div>
        <?php include 'table.php' ?>

        <!-- pagination -->

        <!-- <nav aria-label="Page navigation example" id="pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav> -->
    </div>

    <!-- jquery -->

    <!-- bootstrap js and popper -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

</body>

</html>