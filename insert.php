<?php

// Maak verbinding met de database winkel
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "winkel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    $sql = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving)
            VALUES ('$product_naam', '$prijs_per_stuk', '$omschrijving')";

    if ($conn->query($sql) === TRUE) {
        echo "Nieuw product toegevoegd";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<body>

<h2>Product toevoegen</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Product Naam: <input type="text" name="product_naam"><br>
    Prijs per Stuk: <input type="text" name="prijs_per_stuk"><br>
    Omschrijving: <textarea name="omschrijving"></textarea><br>
    <input type="submit" value="Product toevoegen">
</form>

</body>
</html>