<section class="content">
<div class="row">
            <?php echo $this->getContent(); ?>
            <?php echo $this->flashSession->output(); ?>
        </div>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form method="post" action="upload" enctype="multipart/form-data">
            <input type="file" class="btn btn-warning" name="avatar"/>
            <h5>Vui lòng chọn đường dẫn chứa File </h5>
            <input type="submit" class="btn btn-success" name="uploadclick" value="Upload"/>
            </br>
            <a href="/users/importexcel">Cập nhật dữ liệu(Lưu ý: Chỉ Click sau khi upload file)</a>
        </form>
        <!-- <?php
            // Xử Lý Upload
            var_dump($_FILES);
        ?> -->
    </body>
</html>
</section>