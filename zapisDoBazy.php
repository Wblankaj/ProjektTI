
    <!DOCTYPE html>
    <html lang='en'>
    <head>

        <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
        <title>Formularz</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styl.css">
        
    </head>
    <body>  
      <div class="feedback">
            
       <?php
        $servername = "localhost";
        $username   = "admin1";
        $password   = "test1";
        $db         = "dbnowa";

        $connection = new mysqli($servername, $username, $password, $db);

        if ($connection->connect_error) {
            die("Connect failed: " . $connection->connect_error);
        }
        //TWORZENIE TABELI _ ODKOMENTOWAC ZEBY STWORZYC
        /*
        $myQuery = "CREATE TABLE UczestnicyKursow (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        course VARCHAR(70) NOT NULL,
        courseDate VARCHAR(50) NOT NULL,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        phoneNumber VARCHAR(9) NOT NULL,
        pesel VARCHAR(11)NOT NULL,
        birthDate DATE NOT NULL,
        birthPlace VARCHAR(30) NOT NULL,
        street VARCHAR(30) NOT NULL,
        zipCode VARCHAR(6) NOT NULL,
        CityRes VARCHAR(30) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($connection->query($myQuery)){
        print("Tabela została stworzona pomyślnie");
        } else {
        print("Błąd tworzenia tabeli: ". $connection->error . "<br>");
        }
        */
        if (isset($_POST['submit'])) {
            
            $course      = $_POST['course'];
            $courseDate  = $_POST['courseDate'];
            $name        = $_POST['name'];
            $lastname    = $_POST['lastName'];
            $email       = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $pesel       = $_POST['pesel'];
            $dateOfBirth = $_POST['dateOfBirth'];
            $birthPlace  = $_POST['birthPlace'];
            $street      = $_POST['street'];
            $zipCode     = $_POST['zipCode'];
            $cityRes     = $_POST['cityRes'];
            $fail        = 0;
            
            $emailPattern   = "/[a-z0-9\.+_-]+@[a-z0-9]+(\.[a-z0-9]+)*\.[a-z]{2,3}/i";
            $zipCodePattern = "/^[0-9]{2}-[0-9]{3}$/";
            $phonePattern   = "/^[0-9]{9}$/";
            $peselPattern   = "/^[0-9]{11}$/";
            $streetPattern  = "/^([A-ZŚŹŻŁĆa-zęłćńóżąźś]{1,30}+\s){1,3}+[0-9]{1,3}$/";
            $textPattern    = "/^[A-ZŚŹŻŁĆa-zęłćńóżąźś]{2,30}$/";
            $cityPattern    = "/^[A-ZŚŹŻŁĆa-zęłćńóżąźś]{2,30}+(\s+[A-ZŚŹŻŁĆa-zęłćńóżąźś]{0,30}){0,1}$/";
            if (strlen($name) <= 2) {
                $fail++;
            }
            if (preg_match($textPattern, $name) !== 1) {
                $fail++;
            }
            if (preg_match($textPattern, $lastname) !== 1) {
                $fail++;
            }
            if (preg_match($emailPattern, $email) !== 1) {
                $fail++;
            }
            if (preg_match($phonePattern, $phoneNumber) !== 1) {
                $fail++;
            }
            
            if (preg_match($peselPattern, $pesel) !== 1) {
                $fail++;
            }
            if (preg_match($cityPattern, $birthPlace) !== 1) {
                $fail++;
                
            }
            
            if (preg_match($zipCodePattern, $zipCode) !== 1) {
                $fail++;
            }
            if (preg_match($streetPattern, $street) !== 1) {
                $fail++;
                
            }
            if (preg_match($cityPattern, $cityRes) !== 1) {
                $fail++;
                
            }
            if (empty($dateOfBirth)) {
                $fail++;
            }
            
            if ($fail === 0) {
                $myMultiQuery = "INSERT INTO uczestnicykursow (course,courseDate,firstname,lastname,email,phoneNumber,pesel,birthDate,birthPlace,street,zipCode,CityRes ) 
                        VALUES ('$course', '$courseDate', '$name','$lastname','$email','$phoneNumber','$pesel','$dateOfBirth','$birthPlace','$street','$zipCode','$cityRes')";
                $result       = $connection->query($myMultiQuery);
                echo '<h2> Gratulacje, zostałeś zapisany/a na kurs. Oto twoje dane:</h2>';
                echo '<label>Wybrany kurs: </label>';
                echo $course;
                echo '<br>';
                echo '<label>Data kursu: </label>';
                echo $courseDate;
                echo '<br>';
                echo '<label>Twoje imię :</label>';
                echo $name;
                echo '<br>';
                echo '<label>Twoje nazwisko: </label>';
                echo $lastname;
                echo '<br>';
                echo '<label>Twój adres email: </label>';
                echo $email;
                echo '<br>';
                echo '<label>Twój numer telefonu: </label>';
                echo $phoneNumber;
                echo '<br>';
                echo '<label>Twoj pesel: </label>';
                echo $pesel;
                echo '<br>';
                echo '<label>Twoja data urodzenia: </label>';
                echo $dateOfBirth;
                echo '<br>';
                echo '<label>Twoje miejsce urodzenia: </label>';
                echo $birthPlace;
                echo '<br>';
                echo '<label>Twoja ulica i numer: </label>';
                echo $street;
                echo '<br>';
                echo '<label>Twoj kod pocztowy: </label>';
                echo $zipCode;
                echo '<br>';
                echo '<label>Twoje miasto zamieszkania: </label>';
                echo $cityRes;
                echo '<br>';
                echo '<br>';
            } else {
                echo '<h2> Nie zostałeś zapisany na kurs, spróbuj ponownie.</h2>';
            }
        }
        ?>
     </div>
    </body>
</html>