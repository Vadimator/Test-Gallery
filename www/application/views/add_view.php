<div class="addForm container-fluid">
<h1>Добавление новой картинки</h1>

<form role="form" enctype="multipart/form-data" method="post" action="http://<?php echo $_SERVER['HTTP_HOST'] . '/add/store'; ?> ">
    <div class="form-group">
        <label for="description">Комментарий к изображению</label>
        <textarea  name="description" class="form-control" rows="3" maxlength="200" required ><?php if(isset($_POST['description'])) echo $_POST['description']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Загрузить изображения</label>
        <input type="file" id="exampleInputFile" name="image" accept="image/jpeg, image/png, image/jpg">
        <p class="bg-danger"><?php echo $data; ?></p>
    </div>
    <input class="btn btn-default" type="submit" value="Загрузить">
</form>
</div>