<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="partials/style.css">

    <title>Welcom to iDiscuss Coding Forum</title>
</head>

<body>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
        $showAlert="false";
        if($_SERVER['REQUEST_METHOD']=='POST') { 
        // include '_dbconnect.php';
        $email = $_POST['sender_email'];
        $problem_title = $_POST['problem_title'];
        $problem = $_POST['problem'];
        $sql = "INSERT INTO `contactus` (`problem_title`, `sender_email`, `problem_desc`, `timestamp`) 
                VALUES ('$problem_title', '$email', '$problem', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if($result) {
        $showAlert = true;
        }
        if($showAlert) {
        echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> Your problem has been sent to our team. Our team will soon reach to you as possible.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        else {
            echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error! </strong> Something gone wrong. Please write us again.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        }
    ?>

    <div class="container container-height">
        <div class="container my-5 py-3 col-md-8">
            <form action="contact.php" method="post">
                <div class="form-group">
                    <label for="problem_title" class="font-weight-bold">What can we help you with?</label>
                    <input type="text" class="form-control" id="problem_title" name="problem_title" required>
                </div>
                <div class="form-group">
                    <label for="sender_email" class="font-weight-bold">Your email</label>
                    <input type="email" class="form-control" id="sender_email" name="sender_email"
                        aria-describedby="emailHelp" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="problem" class="font-weight-bold">Please describe your
                        problem</label>
                    <textarea class="form-control" id="problem" name="problem" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>




    <?php include 'partials/_footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>