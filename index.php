<?php

//Cannot upload new thingo
include_once 'app/RequestAction.php';

$requestAction = new RequestAction();


if (isset($_GET['action']))
{
    $action = $_GET['action'];
    
    if ($action == 'addProperties')
    {
        $requestAction->addProperties();
        
    }
    elseif($action == 'getProperties')
    {
       
       $requestAction->getProperties();
       
       /*$records = $properties->getProperties();
        echo $view->render('properties_table.twig', ['records' => $records]);*/
    }
    elseif($action == 'searchProperties')
    {
        $requestAction->searchProperties();
        
    }
}
else
{
    $requestAction->index();
}



