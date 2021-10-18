<?php

//Cannot upload new thingo

include_once 'app/PropertiesDB.php';
include_once 'config.php';

//line 60 steves had 'submit' here, mine had 'keyword''


//this wasnt there before? line 11
$properties = new PropertiesDB();

if (isset($_GET['action']))
{
    $action = $_GET['action'];
    
    if ($action == 'addProperties')
    {
        if(isset($_POST['submit']))
        {
            
            $filename = $_FILES['filename']['name'];
            $temp_file = $_FILES['filename']['tmp_name'];
            //define upload directory
            $destination = 'static/assets/photos/';
            //define target destination
            $target_file = $destination.$filename;
            //move file
            move_uploaded_file($filename, $target_file);
            
            
            //create form variables: $suburb, $state, etc
           foreach($_POST as $key => $value)
            {
                ${$key}=$value;
            }
            
            $values = [$street_address, $suburb, $state, $property_type, 
                $land_area, $selling_price, $filename];
            
            $properties = new PropertiesDB();
            $success = $properties->addProperties($values);
            
            header("location:?action=getProperties");
        }
        else
        {
            echo $view->render('properties_form.twig');
        }
    }
    elseif($action == 'getProperties')
    {
       $properties = new PropertiesDB();
       $records = $properties->getProperties();

        echo $view->render('properties_table.twig', ['records' => $records]);
    }
    elseif($action == 'searchProperties')
    {
        //steves had 'submit' here, mine had 'keyword''
        if (isset($_POST['submit']))
        {
            $keyword = $_POST['keyword'];
            $properties = new PropertiesDB();
            $records = $properties->searchProperties($keyword);
            echo $view->render('properties_table.twig', ['records' => $records]);
        }
        else
        {
        echo $view->render('search_form.twig');            
        }
    }
}
else
{
    echo $view->render('index.twig');
}



