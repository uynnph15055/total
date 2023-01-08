<main class="content">
    <h1>Tất cả sản phẩm</h1>
    <div class="row">
        <div class="col-3">
            <form action="index.php?url=tim-kiem-theo-ten" method="POST" class="d-flex mb-3">
                <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul class="list-group">
                <?php foreach ($cate as $item): ?>
                <li class="list-group-item "><a class href="index.php?url=loc-theo-danh-muc&id=<?=$item['dm_id']?>"><?=$item['dm_name']?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="row col-9">
            <?php foreach ($product as $item): ?>
            <div class="card col-4" style="width: 18rem;">
                <img height="200px" src="./../../upload/<?=$item['sp_image']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$item['sp_name']?></h5>
                    <?=$item['sp_intro']?>
                    <a href="?url=chi-tiet-san-pham&id=<?=$item['id']?>" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <style>
        .card-body p {
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 25px;
            -webkit-line-clamp: 3;
            height: 75px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }
        </style>
    </div>
</main>