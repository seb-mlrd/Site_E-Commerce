<?php
if(membreAccess() == true){ 
    $yourId = $_SESSION['member']['id'];
}
$panier = "";
$ajout = "";
$connect="";
// ----------- GEL DOUCHE ----------------------------------------------------------------
if(isset($_POST['gelDouche']) && $_POST['gelDouche'] == 'Achetez' && membreAccess() == true){
    
    $panier .= ' du gel douche';

    $article = $pdo->prepare("INSERT INTO `article`(`id_article`, `name`, `price`, `image`, `id`) VALUES (
        NULL,
        'gelDouche',
        25.99,
        'gelDouche.avif',
        :id
        )");

        $article->bindValue(':id',$yourId);
        $article->execute();
        $rows = $article->fetchAll(); //fetchAll pour récuperer toute les informations de la BDD


// ------------------------------------------------------------------ PS5 ----------------------------------------------------------------

}elseif(isset($_POST['ps5']) && $_POST['ps5'] == 'Achetez' && membreAccess() == true){

    $panier .= ' une ps5';
    $article = $pdo->prepare("INSERT INTO `article`(`id_article`, `name`, `price`, `image`, `id`) VALUES (
        NULL,
        'ps5',
        200,
        'ps5.avif',
        :id
        )");

        $article->bindValue(':id',$yourId);
        $article->execute();
        $rows = $article->fetchAll(); //fetchAll pour récuperer toute les informations de la BDD

        $ajout = $panier . ' a été ajouté à votre panier';
       
// ------------------------------------------------------------------ PLANTE ----------------------------------------------------------------

}elseif(isset($_POST['plante']) && $_POST['plante'] == 'Achetez' && membreAccess() == true){

    
    $panier .= ' une ps5';
    $article = $pdo->prepare("INSERT INTO `article`(`id_article`, `name`, `price`, `image`, `id`) VALUES (
        NULL,
        'plante',
        15.12,
        'plantePot.avif',
        :id
        )");

        $article->bindValue(':id',$yourId);
        $article->execute();
        $rows = $article->fetchAll(); //fetchAll pour récuperer toute les informations de la BDD

        $ajout = $panier . ' a été ajouté à votre panier';
// ------------------------------------------------------------------ MOTO ----------------------------------------------------------------

}elseif(isset($_POST['moto']) && $_POST['moto'] == 'Achetez' && membreAccess() == true){
    $panier .= ' une moto';

    $article = $pdo->prepare("INSERT INTO `article`(`id_article`, `name`, `price`, `image`, `id`) VALUES (
        NULL,
        'moto',
        999.99,
        'moto.avif',
        :id
        )");

        $article->bindValue(':id',$yourId);
        $article->execute();
        $rows = $article->fetchAll(); //fetchAll pour récuperer toute les informations de la BDD

        $ajout = $panier . ' a été ajouté à votre panier';

// ------------------------------------------------------------------ NAIN ----------------------------------------------------------------

}elseif(isset($_POST['nain']) && $_POST['nain'] == 'Achetez' && membreAccess() == true){

    $panier .= ' un nain';
    
    
    $article = $pdo->prepare("INSERT INTO `article`(`id_article`, `name`, `price`, `image`, `id`) VALUES (
        NULL,
        'nain',
        35.75,
        'nainGringe.avif',
        :id
        )");

        $article->bindValue(':id',$yourId);
        $article->execute();
        $rows = $article->fetchAll(); //fetchAll pour récuperer toute les informations de la BDD

        $ajout = $panier . ' a été ajouté à votre panier';

// ------------------------------------------------------------------ TOILETTE ----------------------------------------------------------------

}elseif(isset($_POST['toilette']) && $_POST['toilette'] == 'Achetez' && membreAccess() == true){

    $panier .= ' une toilette';
    
    $article = $pdo->prepare("INSERT INTO `article`(`id_article`, `name`, `price`, `image`, `id`) VALUES (
        NULL,
        'toilette',
        10000,
        'toilette.avif',
        :id
        )");

        $article->bindValue(':id',$yourId);
        $article->execute();
        $rows = $article->fetchAll(); //fetchAll pour récuperer toute les informations de la BDD
        
        $ajout = $panier . ' a été ajouté à votre panier';

}elseif(isset($_POST['toilette']) || isset($_POST['nain'])  || isset($_POST['moto']) || isset($_POST['plante']) || isset($_POST['ps5']) || isset($_POST['gelDouche']) && membreAccess() == false){
    $connect = 'connectez-vous pour ajouter des trucs à votre panier';
}
$nameUser = "";
$message = 0;
if(membreAccess() == true){
    $product = $_SESSION['member']['id'];
    $nbProduct = $pdo->prepare('SELECT COUNT(id) FROM `article` WHERE id =:product');
    $nbProduct->bindValue(':product', $product , PDO::PARAM_INT);
    $nbProduct->execute();
    $notifs = $nbProduct->fetchAll();
    foreach($notifs as $notif){
        $message = $notif['COUNT(id)'];
        
    }
        // Pour écrire le pseudo de l'user


    $memberId = 0;

    while($_SESSION['member']['id'] != $memberId){
        $memberId++;
    }
    $name = $pdo->prepare('SELECT pseudo FROM users WHERE id=:memberId'); 
    $name->bindValue('memberId',$memberId,PDO::PARAM_INT);
    $name->execute();
    
    $nameKeys = $name->fetchAll();
    foreach($nameKeys as $nameKey){
    $nameUser = $nameKey['pseudo'];
    }
}
?>

