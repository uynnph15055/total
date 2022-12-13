<div class="d-flex justify-content-between">
    <h3>Quản lý danh mục</h3>
    <div class="">
        <a href="" class="btn btn-success">Thêm danh mục</a>
    </div>
</div>
<div class="">
    <table border="1">
        <thead>
            <style>
                th{
                border: 1px  solid #000;    
                }
            </style>
            <?php foreach($proto as $item): ?>
            <th>
                <a href="?url=chi-tiet-san-pham&id=<?=$item['id']?>">
                <img width="100px" src="./../../upload/<?= $item['sp_image']?>" alt="">
                <h2><?= $item['sp_name']?></h2>
                <p><?= $item['sp_intro']?></p>
                </a>
            </th>
            <?php endforeach ?>
        </thead>
    </table>
</div>