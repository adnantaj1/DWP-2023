<div class="row">
    <h3 class="bg-success"> <?php displayMessage() ?></h3>
    <div class="col-xs-3">
        <form action="" method="post" enctype="multipart/form-data">
            <?php addSlide() ?>
            <div class="form-group">
                <input type="file" name="file">
            </div>
            <div class="form-group">
                <label for="title">Slide Title</label>
                <input type="text" name="slide_title" class="form-control">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_slide">
            </div>
        </form>
    </div>
    <div class="col-xs-8">
        <?php getCurrentSlideInAdmin(); ?>
    </div>
</div><!-- × ROW-->
<hr>
<h1>Slides Available</h1>
<div class="row">
    <?php getSlideThumbnails(); ?>
</div>