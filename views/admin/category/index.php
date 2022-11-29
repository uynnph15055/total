<div class="d-flex justify-content-between">
    <h3>Quản lý danh mục</h3>
    <div class="">
        <a href="?url=them-danh-muc" class="btn btn-success">Thêm danh mục</a>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Tên</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $index = 1;
         foreach($cate as $item): ?>
        <tr>
            <td><?=$index++?></td>
            <td><img width="70px" src="./../../upload/<?=$item["dm_image"]?>" alt=""></td>
            <td><?=$item["dm_name"]?></td>
            <td><a href="" class="btn btn-warning">Sửa</a></td>
            <td><a href="?url=xoa-danh-muc&id=<?=$item["dm_id"]?>"  onClick="return confirm('Bạn có muốn xóa ?')" class="btn btn-danger">Xóa</a></td>
            <td></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>