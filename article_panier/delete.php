<?php
require ('asset/config/init.php');
$article = $pdo->prepare('DELETE FROM `article` WHERE id_article =:num');
$article->bindvalue(':num',$_GET['numId'],PDO::PARAM_INT);
$article->execute();

header('location: http://localhost:8888/projet/article_panier/article_panier/panier.php');
?>