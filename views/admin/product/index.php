<div class="d-flex justify-content-between">
    <h3>Quản lý danh mục</h3>
    <div class="">
        <a href="" class="btn btn-success">Thêm danh mục</a>
    </div>
</div>
<div class="">
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên</th>
      <th scope="col">Ảnh</th>
      <th scope="col">Giá</th>
      <th scope="col">Khuyến mại</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Thuộc tính</th>
      <th>Trạng thái</th>
      <th>Sửa</th>
      <th>Xóa</th>
    </tr>
  </thead>
  <tbody>
    <?php  $index=1;
    foreach($proto as $item): ?>
    <tr>
      <th scope="row"><?= $index++ ?></th>
      <td><?=$item["sp_name"]?></td>
      <td>><img width="70px" height="70px" src="./../../upload/<?=$item["sp_image"]?>" alt=""></td>
      <td><?=$item["sp_price"]?></td>
      <td><?=$item["sp_sale"]?></td>
      <td><?=$item["sp_quantity"]?></td>
      <td><?=$item["dm_name"]?></td>
      <td><?=$item["tt_name"]?></td>
      <td>
        <select name="" id="status-<?=$item["id"]?>" onChange="updateStatus(<?=$item["id"]?>)">
            <option  <?=$item["status"] ==  0 ? 'selected' : ''?> value="0">Đóng</option>
            <option   <?=$item["status"] ==  1 ? 'selected' : ''?> value="1">Mở</option>
        </select>
      </td>
      <td><a href="" class="btn btn-warning">Sửa</a></td>
      <td><a href="" class="btn btn-danger">Xóa</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<script src="./../../assets/Js/ajax.js"></script>