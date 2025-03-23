<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "botanic_space";

// Créer une connexion avec MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$countries = [
    "+1" => "United States",
    "+33" => "France",
    "+44" => "United Kingdom",
    "+91" => "India",
    "+81" => "Japan"
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    echo '<link href="../../styles/formpage.css" rel="stylesheet">';
    include('../views/head.php');
    ?>
</head>

<nav class="barre">
    <!-- logo du site-->
    <div class="logo">
        <a href="index.php"><img id="logopart1" alt="logo du site" src="../../images/logo-site.jpeg">
            <img id="logopart2" alt="logo du site" src="../../images/logo-titre.png"></a>
    </div>
    <!-- partie pour la recherche-->
    <div class="search-container">
        <input id="search-tab" placeholder="Search" type="search">
        <button id="button-search"><i class="fas fa-search logo-search"></i></button>
    </div>
    <!-- partie gauche de la barre-->
    <div class="tabpartiegauche">

    </div>
</nav>

<body>
    <div class="content">
        <div class="backgroundcontainer">
            <img src="../../images/image1.jpeg" id="image1">
            <div class="titlebox">
                <h1>Create an Account</h1>
            </div>
            <div class="formbox">
                <form action="newclient.php" method="post"
                    id="newclientform" class="form">
                    <div class="formpair">
                        <div class="soloquest">
                            <label>Full Name : </label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="soloquest">
                            <label>Address : </label>
                            <input type="text" name="Address" required><br>
                        </div>
                    </div>
                    <div class="formpair">
                        <div class="soloquest">
                            <label>Country : </label>
                            <select name="country" required>
                                <option value="">Select a country</option>
                                <?php foreach ($countries as $code => $name) : ?>
                                    <option value="<?php echo htmlspecialchars($code); ?>">
                                        <?php echo htmlspecialchars($name) . " ($code)"; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="soloquest">
                            <label>Phone number : </label>
                            <input type="tel" name="phonenumber" required><br>
                        </div>
                    </div>
                    <div class="spacevide">
                        <img src="../../images/image1.jpeg" id="image1">
                    </div>
                    <div class="formpair">
                        <div class="soloquest">
                            <label>E-mail : </label>
                            <input type="email" value="email" required placeholder="123@yourmail.com" name="email">
                        </div>
                        <div class="soloquest">
                            <label>Create a Password : </label>
                            <input type="password" value="Add Product" required name="password"><br>
                        </div>
                    </div>
                    <div class="submitbox">
                        <button type="submit" name="submit">Submit</button>
                    </div>


                </form>
            </div>
        </div>

    </div>




    <!-- footer here -->
    <?php
    include('../views/footer.php');

    ?>

</body>

</html>
<?php
$conn->close();
?>