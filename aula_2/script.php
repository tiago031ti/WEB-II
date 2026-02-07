<?php    
    $arquivo = "dados.json";

    $texto = file_get_contents($arquivo);
    $data = json_decode($texto, true);
    $data = $data ? : [];

    

        
        $id = $_POST["id"];
        $username = $_POST["username"];
        $emailUser = $_POST["email"];
        $passwordUser = $_POST["password"];
        
        
        $newUsers = [
            "id" => $id,
            "username" => $username,
            "email" => $emailUser,
            "password" => $passwordUser
        ];

        $data[] = $newUsers;
        $newJson = json_encode($data);

        file_put_contents($arquivo, $newJson);

        echo "Id: " . $newUsers["id"] . "<br>";
        echo "Username: " . $newUsers["username"] . "<br>";
        echo "Email: " . $newUsers["email"] . "<br>";
        echo "Password: " . $newUsers["password"];

    


    
    ?>