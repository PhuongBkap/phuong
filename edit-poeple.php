<?php include 'header.php';
$province = mysqli_query($conn, "select * from province");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from people where id = $id";
    $people = mysqli_query($conn,$sql);
    $peo = mysqli_fetch_assoc($people);
    # code...
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $province_id = $_POST['province_id'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $about = $_POST['about'];
    if (isset($_FILES['avatar'])) {
        $file = $_FILES['avatar'];
        $file_name = $fiel['name'];
        move_uploaded_file($file['tmp_name'],'../uploads'.$file_name);
        # code...
    }
    $sql = "update people set
    name = '$name',
    province_id = '$province_id',
    birthday = '$birthday',
    gender = '$gender',
    avatar = '$file_name',
    about = '$about' where id = $id
    ";
    $query = mysqli_query($conn,$sql);
    if ($query) {
        header('location:list-poeple.php');

        # code...
    }else{
        echo 'That bai';
    }
    # code...
}
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Chỉnh Sửa người dân</h3>
    </div>
    <br>
    <form action="" method="POST" class="form" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label class="" for="">Tên người dân</label><span>*</span>
            <input class="form-control" name="name" placeholder="Nhập tên người dân" value="<?php echo $peo['name']?>">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Chọn thành phố</label><span>*</span>
            <select name="province_id" class="form-control" required>
                <option value="">--Chọn thành phố--</option>
                <?php foreach ($province as $key => $value):?> 
                    <option value="<?php echo $value['id']?>" <?php echo ($value['id']==$peo['province_id'])?'selected':''?>><?php echo $value['name']?></option>
                <?php endforeach ?>
                
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Ngày sinh</label><span>*</span>
            <input type="date" class="form-control" name="birthday" placeholder="Nhập Ngày sinh" value="<?php  echo $peo['birthday']?>">
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Giới tính</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="1" <?php echo (($peo['gender']==1)?'checked':'')?>> Nam
                </label>
                <label>
                    <input type="radio" name="gender" value="0" <?php echo (($peo['gender']==0)?'checked':'')?>> Nữ
                </label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Ảnh đại diện</label>
            <input type="file" name="avatar">
            <div class="col-md-4 avatar-img">
                <img src="../uploads<?php echo $peo['avatar']?>" alt="" class="img-responsive">
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Giới thiệu bản thân</label>
            <textarea name="about" class="form-control" placeholder="Giới thiệu bản thân"><?php echo $peo['about']?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<?php include 'footer.php'; ?>