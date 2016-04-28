<article>
<ul class="gallery col-md-12 text-center">
    <?php foreach ($data as $row) : ?>
        <?php $srcImg = '/main/page/' . $row['id'] . ''; ?>
        <li class="text-center container-fluid">
            <button type="button" title="удалить" class="close" aria-hidden="true" data="<?php echo $row['id']; ?>">&times;</button>
            <a href="<?php echo  '/' . $row['img']; ?>" data-rel="lightcase:myCollection:slideshow">
                <div class="image col<?php echo $row['id']; ?>">
                    <style>
                    .col<?php echo $row['id']; ?>{
                        background: url("<?php if(($_SERVER['REQUEST_URI'] == '/main')) {
                                                    echo $row['img'];
                                               }else {
                                                     echo '../../' . $row['img'];
                                                }?>");
                    }
                    </style>
                </div>
            </a>
            
            <!--<img src="<?php if(($_SERVER['REQUEST_URI'] == '/main')) {
                echo $row['img'];
            }else {
                echo '../../' . $row['img'];
            }?>" alt="<?php echo $row['title']; ?>"  class="img-rounded"><br>-->

            
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



