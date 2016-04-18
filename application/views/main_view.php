

<h1 class="text-center">Gallery</h1>

<div class="container">
    <button type="button" class="btn btn-default" id="sortDate">Сортировать по дате</button>
    <button type="button" class="btn btn-default" id="sortSize">Сортировать по размеру файла</button>
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
            <p><span><?php echo $row['title']; ?></span>
                <button class="btn btn-default" id="<?php echo $row['id']; ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
            </p>
        </li>
    <?php endforeach; ?>
</ul>


