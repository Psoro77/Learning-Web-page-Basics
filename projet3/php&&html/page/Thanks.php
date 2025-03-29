<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    echo '<link href="../../styles/formpage.css" rel="stylesheet">';
    include('../views/head.php');
    ?>
</head>

<body>
    <div class="content">
        <div class="backgroundcontainer">
            <img src="../../images/image1.jpeg" id="image1">
            <div class="titlebox">
                <h1>Thanks</h1>
            </div>
            <div class="formbox">
                <div class="form">
                    <div class="formpair">
                        <div class="soloquest">
                            <a href="index.php"><label>continue browsing</label></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>




    <!-- footer here -->
    <?php
    include('../views/footer.php');

    ?>

</body>

</html>