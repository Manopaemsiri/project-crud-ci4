<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>project-crud</title>
    <!-- FONT AWESOME CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        
        <?php 

        $validation = \Config\Services::validation();


        ?>
        <h2 class="mt-4 mb-4"><i class="fa-solid fa-user-pen"></i> Edit Customer Information</h2>
        
        <!-- Form Data -->
        <div class="card">
            <div class="card-header">customer information</div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url('crud/edit_validation'); ?>">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $user_data['name']; ?>">

                        <!-- Error -->
                        <?php 
                        if($validation->getError('name'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('name')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $user_data['email']; ?>">

                        <?php 
                        if($validation->getError('email'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('email')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male" <?php if($user_data['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if($user_data['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        </select>

                        <?php 
                        if($validation->getError('gender'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('gender')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Edit <i class="fa-solid fa-pen-to-square"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Form Data End -->               
    </div>
 
</body>
</html>
