<?php
/*
 *  Service Endpoint. Les requêtes HTTP sont reçues ici. 
 *  Slim déclare les routes pour les URI et fait l'association avec 
 *  les fonctions qui sont définies dans la facade (articleFacade.php) 
 */

use Slim\Factory\AppFactory;


require_once('../../../model/dao/ArticleDAO.php');
require_once('../../../model/dao/AuteurDAO.php');
require_once('../../../model/dao/DAOFactory.php');
require_once('../../../model/dao/PDOArticleDAO.php');
require_once('../../../model/dao/PDOAuteurDAO.php');
require_once('../../../model/to/Article.php');
require_once('../../../model/to/Auteur.php');
require_once('../../../model/to/Categorie.php');
require_once('../../../commons/db/Connection.php');
require_once('../../../commons/utils/ArticleException.php');
require_once('../../../commons/utils/AuteurException.php');

// On charge toutes les ressources installées par composer
require_once('../../../vendor/autoload.php');

// On charge la facade
require_once('articleFacade.php');


// On créé l'application Slim
$app = AppFactory::create();

$prefix = '/PHPOnline/service/rest/article';

// On déclare les routes
$app->post($prefix . '/article', 'ajouter');
$app->get($prefix . '/article/{id}', 'rechercherParId');
$app->get($prefix . '/articles', 'rechercherTous');

// Démarrage de l'application Slim
$app->run();
