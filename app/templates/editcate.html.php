<div class="col-md-9">
    <div class="ask-question-input-part032">
        <h4>Declare a new Category</h4>
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
            <!-- Category  -->
            <input type="hidden" name="cate[id]" value="<?= $category->id ?? '' ?>">
            <!-- title -->
            <div class="question-title39">
                <span class="form-description433">Category-Title* </span>
                <input type="text" name="cate[name]" value="<?= $category ?  htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8') : "" ?>" class="question-ttile32" placeholder="Write Your Category Title" />
            </div>
            <!-- !title -->
            <!-- Summary -->
            <div class="question-title39">
                <span class="form-description433">Category-Summary* </span>
                <input type="text" name="cate[summary]" value="<?= $category ?  htmlspecialchars($category->summary, ENT_QUOTES, 'UTF-8') : "" ?>" class="question-ttile32" placeholder="Write Your Category Summary" />
            </div>
            <!-- !Summary -->
            <!-- !Category  -->
            <div class="publish-button2389">
                <input type="submit" class="publis1291" name="submit" value="Save">

            </div>
        </form>

    </div>
</div>
<!--   end of col-md-9 -->