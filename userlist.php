<?php
require_once 'db.php';
$query="SELECT id, name, uname, email, photo, status FROM users";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0){
    $datas=mysqli_fetch_all($result,true);
}
include "inc/header.php";
?>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5">             
                    <div class="card">
                        <div class="card-header">
                            <h2>All Users</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <tr class="table-dark">
                                    <th>Id</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                foreach($datas as $key => $data){
                                   ?>
                                 <tr>
                                    <td><?= ++$key ?></td>
                                    <td><img width="80" src="uploads/profile/<?=$data['photo']?>" alt=""></td>
                                    <td><?=$data['name']?></td>
                                    <td><?=$data['uname']?></td>
                                    <td><?=$data['email']?></td>
                                    <td>
                                        <a href="user.php?id=<?= $data['id']?>" class="badge bg-primary">View</a>
                                        <a href="edit.php?id=<?= $data['id'] ?>">Edit</a>
                                        <a href="userdelete.php?id=<?= $data['id'] ?>">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include "inc/footer.php";