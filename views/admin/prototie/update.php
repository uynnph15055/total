<div class="d-flex justify-content-between">
    <h3>Sửa thuộc tính</h3>
</div>
<div class="row">
    <div class="col-3">
        <form action="?url=luu-sua-thuoc-tinh" method="POST">
            <div class="mb-3" hidden>
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="number" class="form-control" name="tt_id" value="<?= $proto['tt_id'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="text" class="form-control" name="tt_name" placeholder="Thêm tên" value="<?= $proto['tt_name'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kiểu hiển thị</label>
                <select class="form-select" id="type_display" name="tt_type">
                    <option value="<?= $proto['tt_type'] ?>" hidden><?= $proto['tt_type'] == 0 ? "Tên" : "Màu" ?></option>
                    <option value="0">Tên</option>
                    <option value="1">Màu</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thuộc tính cha</label>
                <select class="form-select" name="tt_parent_id">
                    <option value="<?= $nameChoseParent['tt_id'] ?>" hidden><?= $nameChoseParent['tt_name'] ?></option>
                    <option value="0">Chọn cha</option>
                    <?php foreach ($parent as $item) : ?>
                        <option value="<?= $item["tt_id"] ?>"><?= $item["tt_name"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div id="select-color" class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label d-block">Chọn màu</label>
                <input type="color" name="tt_code" value="<?= $proto['tt_code']?>">
            </div>
            <button class="btn btn-success">Sửa thuộc tính</button>
        </form>
    </div>
</div>
<script>
    $(document).ready(() => {
        var bla = $('#type_display').val();
        if (bla == 1) {
            $('#select-color').css('display', 'block');
        } else {
            $('#select-color').css('display', 'none');
        }
        $('#type_display').on('change', () => {
            var bla = $('#type_display').val();
            if (bla == 1) {
                $('#select-color').css('display', 'block');
            } else {
                $('#select-color').css('display', 'none');
            }
        })
    });
</script>