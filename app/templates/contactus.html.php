<!--    breadcumb of contact us page -->

<section class="header-descriptin329">
  <div class="container">
    <h3>Ask Question</h3>
    <ol class="breadcrumb breadcrumb839">
      <li><a href="#">Home</a></li>
      <li class="active">Contact US</li>
    </ol>
  </div>
</section>
<section class="google-map390">
  <div class="container">
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.3606635504457!2d90.31952411441043!3d23.876826289853003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c23e9a9dbe81%3A0x62af421e71601a5f!2sDaffodil+International+University+-+Permanent+Campus+Library!5e0!3m2!1sen!2sbd!4v1510023951587"
       width="100%" height="400" frameborder="0" style="border: 0" allowfullscreen></iframe> -->
    <iframe width="100%" height="400" frameborder="0" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJo4twKrWqNTERbJbsqX4bfKU&key=AIzaSyA0cYMtrL0viC-AOGP1dOrxShES1kfzD9g"></iframe>
  </div>
</section>
<?php include 'container.html.php' ?>

<div class="row">
  <div class="col-md-9">
    <div class="ask-question-input-part032">
      <h4>Contact Us</h4>
      <hr />
      <form method="POST">
        <div class="username-part940">
          <span class="form-description43">User name* </span>
          <input type="text" name="news[username]" class="username029" placeholder="Enter your Name" />
        </div>
        <div class="email-part320">
          <span class="form-description442">E-Mail* </span>
          <input type="text" name="news[email]" class="email30" placeholder="Enter Your Email" />
        </div>
        <div class="question-title39">
          <span class="form-description433">Question-Title* </span>
          <input type="text" name="news[title]" class="question-ttile32" placeholder="Write Your Question Title" />
        </div>
        <div class="question-title39">
          <span class="form-description43313">Details* </span>
          <textarea name="news[detail]" class="question-details3112" placeholder="Type the description thoroughly and in detail .">
          </textarea>
        </div>

        <div class="publish-button2389">
          <button type="submit" class="publis1291">Publish your Question</button>
        </div>
      </form>
    </div>
  </div>
  <!--                end of col-md-9 -->