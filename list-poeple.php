<?php include 'header.php';
$people = mysqli_query($conn,"select people .*, province.name as 'NameProvince' 
    from people join province 
    on people.province_id = province.id");
$province = mysqli_query($conn,"select * from province");
$sql = "select * from people";
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách người dân</h3>
    </div>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="ct">STT</th>
                <th class="ct">Ảnh</th>
                <th>Tên người dân</th>
                <th>Ngày sinh</th>
                <th>Thành phố</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($people as $key => $value):?> 
            <tr>
                <td class="ct"><?php  echo $key+1 ?></td>
                <td class="ct">
                    <img src="../uploads<?php echo $value['avatar']?>" alt="" width="50px">
                </td>
                <td ><?php echo $value['name']?></td>
                <td ><?php echo $value['birthday'] ?></td>
                <td><?php echo $value['NameProvince'] ?></td>
                <td  class="ct">
                    <a href="edit-poeple.php?id=<?php echo $value['id']?>" class="btn btn-xs btn-primary">Sửa</a>
                    <a href="delete-poeple.php?id=<?php echo $value['id'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không');">Xóa</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>