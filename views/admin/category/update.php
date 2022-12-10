<div class="row">
    <h3>Sửa danh mục</h3>
    <div class="col-6">
        <form method="POST" action="?url=luu-sua-danh-muc" enctype="multipart/form-data">
            <div class="mb-3" hidden>
                <label for="exampleInputEmail1" class="form-label">Id</label>
                <input type="number" class="form-control" name="dm_id" placeholder="Sửa tên"  value="<?= $cate['dm_id']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="text" class="form-control" name="dm_name" placeholder="Sửa tên" value="<?= $cate['dm_name']?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                <input type="file" class="form-control" name="dm_image">
                <img src="<?= $cate['dm_image']?>" alt="">
            </div>

            <button type="submit" class="btn btn-success">Sửa danh mục</button>
        </form>
    </div>
</div>