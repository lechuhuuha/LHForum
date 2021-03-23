<div class="col-md-9">
    <div class="ask-question-input-part032">
        <h4>Ask Question</h4>
        <hr />
        <form method="POST">
            <!-- credentials -->
            <div class="username-part940">
                <span class="form-description43">User name* </span>
                <input type="text" name="fname" class="username029" placeholder="Enter your Name" />
            </div>
            <div class="email-part320">
                <span class="form-description442">E-Mail* </span>
                <input type="text" name="fname" class="email30" placeholder="Enter Your Email" />
            </div>
            <!-- !credentials -->
            <!-- Question  -->
            <input type="hidden" name="quest[id]" value="<?= $quest->id ?? '' ?>">
            <!-- title -->
            <div class="question-title39">
                <span class="form-description433">Question-Title* </span>
                <input type="text" name="quest[title]" value="<?php echo $quest->title ?? '' ?>" class="question-ttile32" placeholder="Write Your Question Title" />
            </div>
            <!-- !title -->
            <!-- Summary -->
            <div class="question-title39">
                <span class="form-description433">Question-Summary* </span>
                <input type="text" name="quest[summary]" value="<?php echo $quest->summary ?? '' ?>" class="question-ttile32" placeholder="Write Your Question Summary" />
            </div>
            <!-- !Summary -->
            <div class="categori49">
                <span class="form-description43305">Category* </span>
                <?php foreach ($categories as $category) : ?>
                    <?php if ($quest && $quest->hasCategory($category->id)) : ?>
                        <input type="checkbox" checked name="category[]" value="<?= $category->id ?>">
                    <?php else : ?>
                        <input type="checkbox" name="category[]" value="<?= $category->id ?>">
                    <?php endif; ?>
                    <label>
                        <?= $category->name ?>
                    </label>
                <?php endforeach; ?>

                <!-- <datalist id="browsers">
                    <option value="Front_End Web Developer"></option>
                    <option value="Back-End develoer"></option>
                    <option value="Andriod Developer"></option>
                    <option value="Web Application"></option>
                    <option value="System Analyst"></option>
                    <option value="Security"></option>
                </datalist> -->
            </div>
            <div class="categori49">
                <span class="form-description43305">Tag* </span>
                <?php foreach ($tags as $tag) : ?>
                    <?php if ($quest && $quest->hasTags($tag->id)) : ?>
                        <input type="checkbox" checked name="tag[]" value="<?= $tag->id ?>">
                    <?php else : ?>
                        <input type="checkbox" name="tag[]" value="<?= $tag->id ?>">
                    <?php endif; ?>
                    <label>
                        <?= $tag->name ?>
                    </label>
                <?php endforeach; ?>
            </div>
            <!-- <div class="button-group-addfile3239">
                <span class="form-description23993">Attactment*</span>
                <input type="file" name="ffile" class="question-ttile3226" />
            </div> -->
            <!-- content -->
            <div class="details2-239">
                <div class="col-md-12 nopadding">
                    <textarea name="quest[content]" id="txtEditor"><?php echo $quest->content ?? '' ?></textarea>
                </div>
            </div>
            <!-- !content -->
            <!-- !Question  -->
            <div class="publish-button2389">
                <input type="submit" class="publis1291" name="submit" value="Save">

            </div>
        </form>

    </div>
</div>
<!--   end of col-md-9 -->