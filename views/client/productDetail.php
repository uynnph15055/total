<div class="content">
    <div class="row">
        <div class="col-6">
            <img class="w-100" src="./../../upload/<?=$rowPro['sp_image']?>" alt="">
        </div>
        <form action="?index.php&url=them-gio-hang" method="POST"  class="col-6">
            <h3><?=$rowPro['sp_name']?></h3>
            <input type="text" name="sp_id" hidden value="<?=$rowPro['id']?>">
            <h2 class="text-primary"><?=number_format($rowPro['sp_sale'] ,0 , '.' , '.' )?>đ</h2>
            <p class="text-danger text-decoration-line-through"><?=number_format($rowPro['sp_price'] , 0  , '.' , '.')?>đ</p>
            <h3>Size :</h3>
                <label class="border p-2" for="sizeS">Size S</label>
                <input type="radio" value="S" name="size" hidden id="sizeS" >
                <label class="border p-2" for="sizeM">Size M</label>
                <input type="radio"  value="M"  hidden  name="size" id="sizeM" >
                <label class="border p-2" for="sizeXL">sizeXL</label>
                <input type="radio" hidden value="XL"  name="size" id="sizeXL" >
            <h3>Số lượng :</h3>
            <input type="number" name="quantity">
            <br>
            <button class="mt-4 btn-primary">Thêm giỏ hàng</button>
        </form>
    </div>
    <h4 class="my-4">Sản phẩm liên quan</h4>
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
        <?php if(isset($_SESSION["user_client"])):  ?>
    <form action="index.php?url=save-binh-luan" method="POST" class="mt-5 ">
        <input type="text" hidden value="<?=$rowPro['id']?>" name="pro_id">
        <div class="d-flex justify-space-between">
            <div class="">
                 <img height="50px" width="50px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtYLksYAg4c7vZqUreevNWW77zXUtf3HRShA&usqp=CAU" class="rounded-circle" alt="">
            </div>
            <input type="text" name="content" placeholder="Nhập bình luận của bạn" class="mx-4 form-control"> 
            <button class="btn btn-success"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </form>
    <?php endif  ?>
    <div class="d-flex mb-5 mx-5 justify-space-between my-4">
            <div class="">
                 <img height="50px" width="50px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtYLksYAg4c7vZqUreevNWW77zXUtf3HRShA&usqp=CAU" class="rounded-circle" alt="">
            </div>
             <p class="mx-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum voluptatem facilis eius labore vel sit fuga sapiente quia ea earum harum repudiandae cupiditate, nisi a minus architecto. Porro, autem eius.</p>
          <div class="">
          <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
          </div>
        </div>
</div>
