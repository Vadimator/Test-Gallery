

<h1 class="text-center">Gallery</h1>

<ul class="gallery col-md-12">
    <?php foreach ($data as $row) : ?>
        <li class="text-center">
            <a href="http://<?php echo $_SERVER['HTTP_HOST'] . '/main/delete/'. $row['id'] .''; ?>">
                <button type="button" class="close" aria-hidden="true">&times;</button>
            </a>
            <img src="<?php echo $row['img']; ?>" alt="<?php echo $row['title']; ?>" width="200" height="200" class="img-rounded"><br>
            <small><?php echo $row['uploadDate']; ?></small>
            <br>
            <p><?php echo $row['title']; ?></p>
        </li>
    <?php endforeach; ?>
</ul>

