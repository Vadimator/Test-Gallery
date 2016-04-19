

<h1 class="text-center">Gallery</h1>

<div class="container">
    <div class="col-md-6 col-sm-12">
        <button type="button" class="btn btn-default" id="sortDateDESC">Самые новые</button>
        <button type="button" class="btn btn-default" id="sortDateASC">Самые старые</button>
    </div>
    <div class="col-md-6 col-sm-12 text-right">
        <button type="button" class="btn btn-default" id="sortSizeASC">Самые маленькие</button>
        <button type="button" class="btn btn-default" id="sortSizeDESC">Самые большие</button>
    </div>
</div>

<ul class="gallery col-md-12 text-center">
    <?php foreach ($data as $row) : ?>
        <?php $srcImg = '/main/page/' . $row['id'] . ''; ?>
        <li class="text-center container-fluid">
            <button type="button" title="удалить" class="close" aria-hidden="true" data="<?php echo $row['id']; ?>">&times;</button>
            <img src="<?php if(($_SERVER['REQUEST_URI'] == '/main')) {
                echo $row['img'];
            }else {
                echo '../../' . $row['img'];
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

<div class="container text-center">
    <nav>
        <ul class="pagination">
            <?php for ($i = 0; $i < $count; $i++) : ?>
                <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/main/page/' . $i . ''; ?>"><?php echo $i + 1; ?></a></li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>
