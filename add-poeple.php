<?php include 'header.php';
error_reporting(0);
$err=[];
$province = mysqli_query($conn,"select * from province");
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $province_id = $_POST['province_id'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $about = $_POST['about'];
    if (isset($_FILES['avatar'])) {
        $file = $_FILES['avatar'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'],'../uploads'.$file_name);
    }
    if (empty($name)) {
        $err['name']="Bạn chưa nhập tên !";
    }
    if (empty($province_id)) {
        $err['province_id']="Bạn chưa chọn danh mục !";
    }
    if (empty($birthday)) {
        $err['birthday']="Bạn chưa nhập ngày sinh !";
    }
    if (empty($gender)) {
        $err['gender']="Bạn chưa chọn giới tính !";
    }
    if (empty($about)) {
        $err['about']="Bạn chưa nhập nội dung !";
    }
     if (empty($avatar)) {
        $err['avatar']="Bạn chưa chọn file ảnh !";
    }
    if (!empty($err)) {
          $sql = "insert into people (name,province_id,birthday,gender,avatar,about) value ('$name','$province_id','$birthday','$gender','$file_name','$about')";
        $query = mysqli_query($conn,$sql);
        if ($query) {
             header('location:list-poeple.php');
        }
    }
}
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Thêm Mới Người dân</h3>
    </div>
    <br>
    <form action="" method="POST" class="form" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label class="" for="">Tên Người dân</label><span>*</span>
            <input class="form-control" name="name" placeholder="Nhập tên Người dân">
            <div class="has-error">
                <span><?php echo(isset($err['name']))?$err['name']:''?></span>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Chọn thành phốc</label><span>*</span>
            <select name="province_id" class="form-control" >
                <option value="">--Chọn thành phốc--</option>
                <?php foreach ($province as $key => $value): ?>
                    <option value="<?php echo $value['id']?>"> <?php echo $value['name']?></option>
                <?php endforeach ?>
            </select>
             <div class="has-error">
                <span><?php echo(isset($err['province_id']))?$err['province_id']:''?></span>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Ngày sinh</label><span>*</span>
            <input type="date" class="form-control" name="birthday" placeholder="Nhập Ngày sinh">
             <div class="has-error">
                <span><?php echo(isset($err['birthday']))?$err['birthday']:''?></span>
            </div>
        </div>
        <div class="form-group col-md-6">
            <label class="" for="">Giới tính</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="1"> Nam
                </label>
                <label>
                    <input type="radio" name="gender" value="0"> Nữ
                </label>
                <div class="has-error">
                    <span><?php echo(isset($err['gender']))?$err['gender']:''?></span>
                 </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Ảnh đại diện</label>
            <input type="file" name="avatar">
            <div class="has-error">
                    <span><?php echo(isset($err['avatar']))?$err['avatar']:''?></span>
             </div>
        </div>
        <div class="form-group col-md-12">
            <label class="" for="">Giới thiệu bản thân</label>
            <textarea name="about" class="form-control" placeholder="Giới thiệu bản thân"></textarea>
             <div class="has-error">
                <span><?php echo(isset($err['about']))?$err['about']:''?></span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Mới</button>
    </form>
</div>

<?php include 'footer.php'; ?>