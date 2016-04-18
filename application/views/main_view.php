

<h1 class="text-center">Gallery</h1>

<div class="container">
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/main/sortDate'; ?>">
        <button type="button" class="btn btn-default">Сортировать по дате</button>
    </a>
    <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/main/sortSize'; ?>">
        <button type="button" class="btn btn-default">Сортировать по размеру файла</button>
    </a>
</div>

<ul class="gallery col-md-12">
    <?php foreach ($data as $row) : ?>
        <li class="text-center">
            <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/main/delete/'. $row['id'] .''; ?>">
                <button type="button" class="close" aria-hidden="true">&times;</button>
            </a>
            <img src="<?php if(($_SERVER['REQUEST_URI'] == '/main/sortSize') || ($_SERVER['REQUEST_URI'] == '/main/sortDate')) {
                echo '../' . $row['img'];
            }else {
                echo $row['img'];
            }?>" alt="<?php echo $row['title']; ?>" width="200" height="200" class="img-rounded"><br>
            <small><?php echo $row['uploadDate']; ?></small>
            <br>
            <p><?php echo $row['title']; ?><button><i class="fa fa-pencil" aria-hidden="true"></i></button></p>
        </li>
    <?php endforeach; ?>
</ul>

