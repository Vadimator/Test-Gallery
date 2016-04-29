<li class="text-center container-fluid">
    <button type="button" title="удалить" class="close" aria-hidden="true" data="<?php echo $id; ?>">&times;</button>
    <a href="<?php echo '/' . $img; ?>" data-rel="lightcase:myCollection:slideshow">
        <div class="image col<?php echo $id; ?>">
            <style>
                .col<?php echo $id; ?> {
                    background: url("<?php echo '../../' . $img; ?>");
                }
            </style>
        </div>
    </a>
    <small><?php echo $uploadDate; ?></small>
    <br>
    <div class="title-text">
        <div class="title"><?php echo $title; ?></div>
        <button title="изменить текст" class="btn btn-default" id="<?php echo $id; ?>">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
    </div>
</li>




