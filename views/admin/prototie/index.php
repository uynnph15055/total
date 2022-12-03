<div class="d-flex justify-content-between">
    <h3>Quản lý thuộc tính</h3>
</div>
<div class="row">
    <div class="col-3">
        <form action="?url=luu-thuoc-tinh" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="text" class="form-control" name="tt_name" placeholder="Thêm tên"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kiểu hiển thị</label>
                <select class="form-select" id="type_display" name="tt_type" aria-label="Default select example">
                    <option value="0">Tên</option>
                    <option value="1">Màu</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thuộc tính cha</label>
                <select class="form-select" name="tt_parent_id" aria-label="Default select example">
                    <option value="0">Chọn cha</option>
                    <?php foreach(  $parent as $item): ?>
                    <option value="<?=$item["tt_id"]?>"><?=$item["tt_name"]?></option>
                    <?php endforeach; ?>
                </select>
            </div>
          
            <div id="select-color" class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label d-block">Chọn màu</label>
                <input type="color"  name="tt_code"
                    aria-describedby="emailHelp">
            </div>
            <button class="btn btn-success">Thêm thuộc tính</button>
        </form>
    </div>
    <div class="col-9">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Kiểu hiển thị</th>
                    <th scope="col">Giá trị</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        $index = 1;
        foreach($proto as $item): ?>
                <tr>
                    <td><?=$index++?></td>
                    <td><?php echo $item["tt_parent_id"] != 0 ? '_' . $item["tt_name"] :  $item["tt_name"]?></td>
                    <td><?php echo $item["tt_type"] == 0 ? 'Tên' : 'Màu'?></td>
                    <td>
                    <?php  if( $item["tt_type"] == 0) { 
                        echo   $item["tt_name"] ?>
                      <?php  }else{?> 
                           <div class="rounded-circle"  style="width:30px;height:30px;background-color: <?= $item["tt_code"]?>"></div>
                      <?php  }?>   
                    </td>
                    <td><a href="" class="btn btn-warning">Sửa</a></td>
                    <td><a href="" class="btn btn-danger">Xóa</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(() => {
        $('#select-color').css('display' , 'none');
        $('#type_display').on('change' , () => {
            var bla = $('#type_display').val();
            console.log(bla);
            if(bla == 1){
                $('#select-color').css('display' , 'block');
            }else{
                $('#select-color').css('display' , 'none');
            }
        })
    });
</script>