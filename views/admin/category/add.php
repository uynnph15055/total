<div class="row">
    <h3>Thêm danh mục</h3>
    <div class="col-6">
        <form method="POST" action="?url=luu-them-danh-muc" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="text" class="form-control" name="dm_name" placeholder="Thêm tên" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ảnh</label>
                <input type="file" class="form-control" name="dm_image">
            </div>
           
            <button type="submit" class="btn btn-success">Thêm danh mục</button>
        </form>
    </div>
</div>