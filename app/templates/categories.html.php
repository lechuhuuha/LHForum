<!--    breadcumb of category -->
<section class="header-descriptin329">
    <div class="container">
        <h3>All Question</h3>
        <ol class="breadcrumb breadcrumb839">
            <li><a href="#">Home</a></li>
            <li class="active">Category Type</li>
        </ol>
        <h3 style="color:white">Category is the type of group that some questions belong to. <br> Such as question about pdo is belong to PHP category</p>
            <div class="form-style8292">
                <form action="" method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                        <input type="text" class="form-control form-control8392" placeholder="Search any category and you be sure find your answer ?">
                        <span class="input-group-addon"><a href="#">Search Now</a></span>
                    </div>
                </form>
            </div>
            <br>
    </div>
</section>
<?php include 'container.html.php' ?>
<div class="col-md-9">
    <?php if (!empty($categories)) : ?>

        <section class="category2781">
            <?php foreach ($categories as $category) : ?>
                <div class="question-type2033">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="left-user12923 left-user12923-repeat">
                                <a href="#"><img src="<?php echo URLROOT  ?>image/images.png" alt="image" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="right-description893">
                                <div id="que-hedder2983">
                                    <h3>
                                        <a href="<?php echo URLROOT . 'quest/list?category=' . $category->id ?>">

                                            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8')  ?>
                                        </a>
                                    </h3>
                                </div>
                                <div class="ques-details10018">
                                    <p>
                                        <?php echo htmlspecialchars($category->summary, ENT_QUOTES, 'UTF-8');  ?>
                                    </p>
                                </div>
                                <hr />
                                <div class="ques-icon-info3293">
                                    <a href="#"><i class="fa fa-star" aria-hidden="true"> 5 </i>
                                    </a>
                                    <?php if ($category->updated_at) :  ?>
                                        <a href="#"><i class="fa fa-calendar-plus-o" aria-hidden="true">
                                                <?php $dateUp = new DateTime($category->updated_at);
                                                echo $dateUp->format('jS F Y') ?></i></a>
                                    <?php else : ?>
                                        <a href="#"><i class="fa fa-calendar-minus-o" aria-hidden="true">
                                                <?php $date = new DateTime($category->created_at);
                                                echo $date->format('jS F Y') ?></i></a>
                                    <?php endif; ?>

                                    <a href="#"><i class="fa fa-folder" aria-hidden="true">
                                            Categories</i></a>
                                    <a href="#"><i class="fa fa-bug" aria-hidden="true">
                                            Report</i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="ques-type302">
                                <a href="#">
                                    <button type="button" class="q-type238">
                                        <i class="fa fa-question-circle" aria-hidden="true">
                                            <?php echo ($category->getQuests()['totalQuestInCate']) ?></i>
                                    </button>
                                </a>

                                <!-- edit and delete form -->
                                <a class="q-type238" href="<?php echo URLROOT . 'category/edit?id=' . $category->id ?>">Edit</a>
                                <form action="<?php echo URLROOT . 'category/delete' ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $category->id ?>">
                                    <input class="q-type238" type="submit" value="Delete">
                                </form>
                                <!-- !edit and delete form -->
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