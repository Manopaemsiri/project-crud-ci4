<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>project-crud</title>

    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- DataTables | Table plug-in for jQuery --> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>

<style>
    .pagination li a {
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .pagination li.active a {
        z-index: 1;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    label {
        margin-bottom: 30px;
    }

    .dataTables_info,
    .dataTables_paginate {
        margin-top: 30px;
    }
</style>

<body>
    <div class="container">

        <h2 class="mt-4 mb-4"><i class="fa-solid fa-people-roof m-3"></i> manage customer information</h2>

        <?php

        $session = \Config\Services::session();

        if ($session->getFlashdata('success')) {
            echo '
            <div class="alert alert-success">' . $session->getFlashdata("success") . '</div>
            ';
        }
        ?>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">customer information</div>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo base_url("/crud/add") ?>" class="btn btn-success btn-sm">Create <i class="fa-solid fa-circle-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_id" class="display table table-striped table-bordered">
                        <thead>
                            <tr><br>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($user_data) {
                                foreach ($user_data as $user) {
                                    echo '
                               
                                <tr>
                                    <td>' . $user["id"] . '</td>
                                    <td>' . $user["name"] . '</td>
                                    <td>' . $user["email"] . '</td>
                                    <td>' . $user["gender"] . '</td>
                                    <td><a href="' . base_url() . '/crud/fetch_single_data/' . $user["id"] . '" class="btn btn-sm btn-warning">Edit <i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><button type="button" onclick="delete_data(' . $user["id"] . ')" class="btn btn-danger btn-sm">Delete <i class="fa-solid fa-circle-minus"></i></button></td>
                                </tr>
                                ';
                                }
                            }
                            ?>
                        <tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

    <!-- Delete Confirm -->
    <script>
        function delete_data(id) {
            if (confirm("Are you sure you want to remove it?")) {
                window.location.href = "<?php echo base_url(); ?>/crud/delete/" + id;
            }
            return false;
        }
    </script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src=" https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- DataTable Start -->
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>

</body>

</html>