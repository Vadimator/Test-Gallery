

<h1 class="text-center">Gallery</h1>

<div class="container text-center">
    <button type="button" class="btn btn-default" id="sortDate">Сортировать по дате</button>
    <button type="button" class="btn btn-default" id="sortSize">Сортировать по размеру файла</button>
</div>

<ul class="gallery col-md-12">
    <?php foreach ($data as $row) : ?>
        <li class="text-center container-fluid">
            <button type="button" title="удалить" class="close" aria-hidden="true" data="<?php echo $row['id']; ?>">&times;</button>
            <img src="<?php if(($_SERVER['REQUEST_URI'] == '/main/sortSize') || ($_SERVER['REQUEST_URI'] == '/main/sortDate')) {
                echo '../' . $row['img'];
            }else {
                echo $row['img'];
            }?>" alt="<?php echo $row['title']; ?>" width="200" height="200" class="img-rounded"><br>
            <small><?php echo $row['uploadDate']; ?></small>
            <br>
            <div class="title-text"><div class="title"><?php echo $row['title']; ?></div>
                <button title="изменить текст" class="btn btn-default" id="<?php echo $row['id']; ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
            </div>
        </li>
    <?php endforeach; ?>
</ul>


