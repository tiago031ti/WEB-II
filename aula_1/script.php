    <?php
    $id = $_POST['id'];
    $title = $_POST['titulo'];
    $price = $_POST['preço'];
    $description = $_POST['descrição'];
    $category = $_POST['categoria'];


    
    echo "id do produto: " . $id . "<br>";
    echo "Título:". $title ."<br>";
    echo "preço: ". $price ."<br>";
    echo "Descrição: ". $description . "<br>";
    echo "Categoria:" . $category . "<br>";
    ?>