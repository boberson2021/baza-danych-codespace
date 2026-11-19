<form method="post">
    <button type="submit" name="akcja" value="wyswietl">Wyświetl dane</button>
</form>

<?php
if ($_POST["akcja"] == "wyswietl") {
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "moja_baza";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM sklep";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // wypisanie danych z każdego wiersza
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - nazwa: " . $row["nazwa"] . " - cena: " . $row["cena"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
}
?>