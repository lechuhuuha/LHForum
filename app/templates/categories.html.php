<!--    breadcumb of category -->
<section class="header-descriptin329">
    <div class="container">
        <h3>All Question</h3>
        <ol class="breadcrumb breadcrumb839">
            <li><a href="#">Home</a></li>
            <li class="active">Category Type</li>
        </ol>
    </div>
</section>
<?php include 'container.html.php' ?>
<div class="col-md-9">
    <?php if (!empty($categories)) : ?>

        <section class="category2781">
            <?php foreach ($categories as $category) : ?>
                <div class="question-type2033">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="right-description893">
                                <div id="que-hedder2983">
                                    <h3>
                                        <a href="<?php echo URLROOT . 'quest/list?category=' . $category->id ?>" ><?php echo $category->name ?></a>
                                    </h3>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </section>
    <?php else : ?>
        <section id="content1">
            <!--Most Response Content Section -->
            <div class="question-type2033">
                <div class="row">
                    <h2>Sorry there is currenly no category has been asked.Come back later</h2>
                </div>
            </div>
        </section>
    <?php endif; ?>

</div>
<!-- end of col-md-9 -->