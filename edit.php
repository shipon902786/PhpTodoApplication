<?php
$id=$_GET['id'];
require_once 'db.php';
$error=[];
if(isset($_POST['submit'])){
    $name=trim(htmlentities($_POST['name']));
    $uname=trim(htmlentities($_POST['uname']));
    $email=trim(htmlentities($_POST['email']));
    $password=$_POST['password'];
    $encpass= md5($password);
    $photo=$_FILES['photo'];
    if(empty($name)){
        $error['nameerr']="Enter Your Name!";
    }
    if(empty($uname)){
        $error['unameerr']="Enter Your User Name!";
    }
    if(empty($email)){
        $error['emailerr']="Enter Your Valid Email!";
    }
    if(empty($password)){
        $error['passworderr']="Enter Your Password!";
}
if(empty($photo['name'])){
    $error['photoerr']="Upload Your Photo!";
} 
if(empty($error)){
    if($photo['name']){
        $path_info=pathinfo($photo["name"]);
        $photoExtension=$path_info['extension'];
        if($photoExtension!="png" && $photoExtension!="PNG" && $photoExtension!="jpg" && $photoExtension!="JPG"){
            $error['photoerr']="Only JPG AND PNG Is Allowed.!";
        }else{
            $photo_ex =explode('.',$photo['name']);
            $photo_name=$name.'-'.time().'.'.end($photo_ex);
            $upload_photo=move_uploaded_file($photo['tmp_name'],'uploads/profile/'.$photo_name);
             if($upload_photo){              
                 $update_query="update users set name='$name',uname='$uname',email='$email',password='$encpass',photo='$photo_name' where id='$id'";            
                $result= mysqli_query($conn,$update_query);
                if($result){
                    $success="User Update Successfully Done!";
             }
            }else{
                $error="File Not Uploated!";
            }
        }  
    }
}
}
//facing previous user data
$select_user_query="SELECT * FROM users WHERE id='$id'";
$result=mysqli_query($conn,$select_user_query);
if(mysqli_num_rows($result)){
    $data=mysqli_fetch_assoc($result);
}
include "inc/header.php";
?>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mt-5">            
                  <?php 
                  if(isset($success)){
                      ?>
                      <div class="alert alert-success">
                         <p><?=$success ?></p> 
                      </div>
                      <?php
                  }
                  ?>
                    <div class="card">
                        <div class="card-header">
                            <h2>Update User</h2>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Enter Your Name" value="<?= $data['name']?>">
                                    <?php
                                  if(isset($error['nameerr'])){
                                  echo "<p style='color:red;'>" .$error['nameerr']."</p>";
                                   };
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="uname" placeholder="Enter Your User Name" value="<?= $data['uname']?>">
                                    <?php
                                   if(isset($error['unameerr'])){
                                   echo "<p style='color:red;'>" .$error['unameerr']."</p>";
                                   };
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email" value="<?= $data['email']?>">
                                    <?php
                                   if(isset($error['emailerr'])){
                                   echo "<p style='color:red;'>" .$error['emailerr']."</p>";
                                   };
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Enter Your Paassword" value="<?= $data['password']?>">
                                    <?php
                                   if(isset($error['passworderr'])){
                                   echo "<p style='color:red;'>" .$error['passworderr']."</p>";
                                   };
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="photo" value="<?= $data['photo']?>">
                                    <div>
                                    <img width="100" src="uploads/profile/<?=$data['photo']?>"><?= $data['photo']?>
                                    </div>
                                    <?php
                                   if(isset($error['photoerr'])){
                                   echo "<p style='color:red;'>" .$error['photoerr']."</p>";
                                   };
                                    ?>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="form-control btn btn-primary" name="submit" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include "inc/footer.php";