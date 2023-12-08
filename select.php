<?php
$conn = new mysqli("localhost", "username", "password", "winkel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM producten";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Product Code: " . $row["product_code"] . " - Product Naam: " . $row["product_naam"] . " - Prijs per Stuk: " . $row["prijs_per_stuk"] . " - Omschrijving: " . $row["omschrijving"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>





<?php
$conn = new mysqli("localhost", "username", "password", "winkel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_code = 1;
$stmt = $conn->prepare("SELECT * FROM producten WHERE product_code = ?");
$stmt->bind_param("i", $product_code);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Product Code: " . $row["product_code"] . " - Product Naam: " . $row["product_naam"] . " - Prijs per Stuk: " . $row["prijs_per_stuk"] . " - Omschrijving: " . $row["omschrijving"] . "<br>";
    }
} else {
    echo "0 results";
}
$stmt->close();
$conn->close();
?>





<?php
$conn = new mysqli("localhost", "username", "password", "winkel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_code = 2;
$stmt = $conn->prepare("SELECT * FROM producten WHERE product_code = :product_code");
$stmt->bindParam(':product_code', $product_code, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Product Code: " . $row["product_code"] . " - Product Naam: " . $row["product_naam"] . " - Prijs per Stuk: " . $row["prijs_per_stuk"] . " - Omschrijving: " . $row["omschrijving"] . "<br>";
    }
} else {
    echo "0 results";
}
$stmt->close();
$conn->close();
?>