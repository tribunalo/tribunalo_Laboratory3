<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Formatting</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <link rel="stylesheet" href="style.css">

</head>

<body>
     <!--header-->
     <header class="header-fix">
        <div class="header-container">
            <h1><a href="#"><i class="fa fa-table"></i>Forms</a></h1>
        </div>
    </header>
    <div class="container">
        <!--first section-->
        <section class="first" id="first-section">
            <aside class="aside">
                <h2><i class="fa fa-question"></i>Info</h2>
                <ul>
                    <li>method:POST</li>
                    <li>Mandatory field</li>
                    <li>Standard field: text and password</li>
                    <li>Checkbox: checkbox</li>
                    <li>Standard button: submit</li>
                </ul>
            </aside>
            <article>
                <h2>Login Form</h2>
                <p class="marginbot50">Standard form to enter these <strong>login credentials:</strong></p>

                <form action="#first-section" method="POST" name="form" class="form-element">

                    <div>
                        <label for="username">Enter your username:</label>
                        <input type="text" name="username" id="username">
                    </div>

                    <div>
                        <label for="password">Enter your password: </label>
                        <input type="password" name="password" id="password">
                    </div>

                    <div>
                      <label></label>
                        <input type="checkbox" name="check" id="check" required>Remember Me
                    </div>

                    <div class="align-right">
                        <label ></label>
                        <input type="submit" name="login-form" value="Login">
                    </div>
                </form>

                <?php if (!empty($_POST)) { ?>
                <div class="result">
                    <b>Values returned by the form:</b><br>
                    <ul>
                        <?php foreach ($_POST as $key => $value) {
                            echo '<li>' . $key . ' =>' . $value . '</li>';
                        } ?>
                    </ul>
                </div>
            <?php } ?>

            </article>
        </section>
        <hr>  

        <section class="second" id="second-section">
          <aside class="aside">
              <h2><i class="fa fa-question">Info</i></h2>
              <ul>
                  <li>method:POST</li>
                  <li>Mandatory field</li>
                  <li>File sending</li>
                  <li>Standard field: text, email, date, file and password</li>
                  <li>Radio button: submit</li>
                  <li>Standard button: submit</li>
              </ul>
          </aside>
    <article>
        <h2>Registration Form</h2>
        <p class="marginbot50">Standard form for <strong>V</strong> on a website:</p>

        <form action="#second-section" method="POST" enctype="multipart/form-data" class="form-element" name="form">
            <div>
            <label for="gender" >Enter your <strong>Gender</strong>: </label>
                        <span class="mandatory">*</span>
                        <input type="radio" name="gender" id="F" value="F" required>Female
                        <input type="radio" name="gender" id="M"  value="M">Male
                 
                </label>
            </div>

            <div>
                <label>Enter your <strong>Lastname</strong>:<span class="mandatory">*</span></label>
                <input type="text" name="lname" id="lname" class="toBeMargin" required>
            </div>
            <div>
                <label> your <strong>Firstname</strong>:</label>
                <input type="text" name="fname" id="fname" class="toBeMargin" required>
            </div>
            <div>
                <label for="dob">Enter your <strong>Date of Birth</strong>:</label>
                <input type="date" name="dob" id="dob" class="toBeMargin" required>
            </div>
            <div>
                <label for="img">Enter your <strong>Photo</strong>:</label>
                <input type="file" name="imageFile" id="img" class="toBeMargin" >
            </div>
            <div>
                <label for="email">Enter your <strong>Email Address</strong>:<span class="mandatory">*</span></label>
                <input type="email" name="email" id="email" class="toBeMargin">
            </div>
            <div>
                <label for="pass">Enter your <strong>Password</strong>:<span class="mandatory">*</span></label>
                <input type="password" name="pword" id="pword" class="toBeMargin">
            </div>
            <div>
                <label for="confirmpwd">Confirm your <strong>Password</strong>:<span class="mandatory">*</span></label>
                <input type="password" name="confirmpwd" id="confirmpwd" class="toBeMargin">
            </div>
            <div class="mandatory">* mandatory field</div>
            <div>
                <br>
                <label>
                    <input type="checkbox" name="check" id="check" required>Accept TOS
                </label>
            </div>
            <div class="align-right">
                <label></label>
                <input type="submit" name="register-form" value="Registration">
            </div>
        </form>

        <?php if (!empty($_POST) && isset($_POST['register-form'])) { ?>
                    <div class="result">
                        <b>Values returned by the form:</b><br>
                        <ul>
                            <?php foreach ($_POST as $key => $value) {
                                echo '<li>' . $key . ' => ' . $value . '</li>';
                            } ?>
                        </ul>

                    <?php } ?>
        <?php
        if (!empty($_POST) && isset($_POST['register-form']) && $_POST['register-form'] === "Registration") {

            $imageTmpName = $_FILES['imageFile']['tmp_name'];
            $imageName = $_FILES['imageFile']['name'];
            $imageType = $_FILES['imageFile']['type'];
            $imageSize = $_FILES['imageFile']['size'];

            // Check if file is an actual image
            if (getimagesize($imageTmpName) !== false) {
                // Create directory if not exists
                $uploadDirectory = 'uploads/';
                if (!file_exists($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                }
                // Move uploaded file to target destination
                if (move_uploaded_file($imageTmpName, $uploadDirectory . $imageName)) {
                    // Display the uploaded image
                    echo '<div id="imageView">';
                    echo '<p>Uploaded Image:</p>';
                    echo '<img src="' . $uploadDirectory . $imageName . '" alt="' . $imageName . '" style="max-width: 250px;">';
                    echo '</div>';
                } else {
                    echo 'Failed to move the uploaded file.';
                }
            } else {
                echo 'File is not an image.';
            }
        } elseif (!empty($_FILES['imageFile'])) {
            echo 'Error uploading file. Error code: ' . $_FILES['imageFile']['error'];
        }
        ?>
    </article>
</section>

        <hr>
        <section class="third" id="third-section">
            <aside class="aside">
                <h2><i class="fa fa-question">Info</i></h2>
                <ul>
                    <li>method:POST</li>
                    <li>Mandatory field</li>
                    <li>Standard field: text and password</li>
                    <li>Checkbox: checkbox</li>
                    <li>Standard button: submit</li>
                </ul>

            </aside>
            <article>
                <h2>Contact Form</h2>
                <p class="marginbot50">Standard form for making <strong>information request</strong> credentials:</p>

                <form action="#third-section" method="POST" name="form" class="form-element">

                  <div>
                      <label for="username">Department you wish to contact: <span class="mandatory">*</span></label>
                      <select name="dept" id="dept">
                        <option value="Select...">Select...</option>
                        <option value="Sales Department">Sales Department</option>
                        <option value="Communication Department">Communication Department</option>
                        <option value="Technical Department">Technical Department</option>
                      </select>
                  </div>

                  <div>
                      <label for="title">Enter a <strong>title</strong>: <span class="mandatory">*</span></label>
                      <input type="text" name="title" id="title" placeholder="More than 20 characters">
                  </div>

                  <div>
                      <label for="question">Enter your <strong>Question</strong>:<span class="mandatory">*</span></label>
                      <textarea id="message" name="question" placeholder="Maximum 1000 characters..."></textarea>
                  </div>

                  <div>
                      <label for="password">Enter your <strong>Email Address</strong>:<span class="mandatory">*</span> </label>
                      <input type="email" name="email" id="email" placeholder="Your Email">
                  </div>

                  <div class="align-right">
                      <label ></label>
                      <input type="submit" name="contact-form" value="Contact" >
                  </div>
                  </form>


                  <?php
                  if (!empty($_POST) && isset($_POST['contact-form'])) {
                      echo "<div class='result'><b>Values returned by the form:</b><br><ul>";
                      foreach ($_POST as $key => $value) {
                          // Exclude posting the select option
                          if ($key !== 'dept') {
                              echo '<li>' . $key . ' =>' . $value . '</li>';
                          }
                      }
                      echo "</ul></div>";
                  }
                  ?>
            </article>
        </section>

    </div>
</body>
</html>
