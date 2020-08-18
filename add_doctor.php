<?php
include('include/header.php');
include('include/config.php');
include('include/checklogin.php');
check_login();

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h2 class="page-title">Add Doctor</h2>
            <div class="row">

                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Add New Doctor
                        </div>
                        <div class="panel-body">
                            <form  method="POST" enctype="multipart/form-data">
                                <input type="text" name="name" class="form-control" placeholder="Doctor's Name"> <br>
                                <input type="text" name="idnumber" class="form-control" placeholder="Doctor's Id Number"><br>
                                <input type="text" name="phone" class="form-control" placeholder="Doctor's phone"><br>
                                <input type="text" name="Location" class="form-control" placeholder="Doctor's Location"><br>
                                <input type="file" name="image" class="form-control"><br>
                                
                                <input type="submit" name="add" value="Add New" class="btn btn-primary">
                            </form>
                            <?php
                            if (isset($_POST['add'])) {


                                $errors = array();
                                $file_name = $_FILES['image']['name'];
                                $file_size = $_FILES['image']['size'];
                                $file_tmp = $_FILES['image']['tmp_name'];
                                $file_type = $_FILES['image']['type'];
                                $temp_expload=explode('.', $_FILES['image']['name']);

                                $file_ext = strtolower(end($temp_expload));

                                $extensions = array("jpeg", "jpg", "png");

                                if (in_array($file_ext, $extensions) === false) {
                                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                                }

                                if ($file_size > 2097152) {
                                    $errors[] = 'File size must be excately 2 MB';
                                }

                                if (empty($errors) == true) {
                                    $hname = $_POST['name'];
                                    $hidnumber= $_POST['idnumber'];
                                    $hphone = $_POST['phone'];
                                    $hlocation = $_POST['Location'];

                                    $date= date('Y-m-d H:i:s');

                                    require_once('include/config.php');
                            
                                    $sql = "INSERT INTO neonatal_consultant (name,idnumber,phone,location,image,date)       VALUES ('$hname','$hidnumber','$hphone','$hlocation','$file_name','$date')";
                                    $data = mysqli_query($mysqli, $sql);
                                    if ($data) {
                                        move_uploaded_file($file_tmp, "img/" . $file_name);
                                        echo "Doctor added successfully";
                                    } else {
                                        echo "failed" . mysqli_error($mysqli);
                                    }

                                } else {
                                    print_r($errors);
                                }

                                
                               
                            }

                            ?>
                        </div>

                    </div>
                </div>


            </div>
            <div class="col-1"></div>
        </div>

    </div>



    <?php
    include('include/footer.php');
    ?>