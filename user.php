<?php
require_once 'db.php';
$id=$_GET['id'];
$query="SELECT * FROM users WHERE id=$id";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)){
    $data=mysqli_fetch_assoc($result);
}
require_once "inc/header.php";
?>
<section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">               
                    <div class="card">
                        <div class="card-header">
                            <h2><?= $data['name']?></h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <tr class="table-dark">
                                    <td>Name</td>
                                    <td><?= $data['name']?></td>
                                </tr>
                                <tr class="table-dark">
                                    <td>User Name</td>
                                    <td><?= $data['uname']?></td>
                                </tr>
                                <tr class="table-dark">
                                    <td>Email</td>
                                    <td><?= $data['email']?></td>
                                </tr>
                                <tr class="table-dark">                                   
                                    <td>Photo</td>
                                    <td><img width="100" src="uploads/profile/<?=$data['photo']?>"><?= $data['photo']?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
require_once "inc/footer.php";