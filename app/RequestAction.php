<?php

//confirm this works
require __DIR__ .'/../vendor/autoload.php';
use GuzzleHttp\Client;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class RequestAction 
{
   var $client;
   var $view;
  
   
   function __construct()
   {
       $this->client = new Client(['base_uri' => 'http://107.20.52.139/RestServer3930519/']);
       //$this->client = new Client(['base_uri' => 'http://localhost/RestServer3930519/']);
       $loader = new FilesystemLoader(__DIR__.'/../templates/');
       $this->view = new Environment($loader);
   }
   
   function index()
   {
       echo $this->view->render('index.twig'); 
   }
   
   function getProperties()
   {
       $uri = 'properties';
       $response = $this->client->get($uri); 
       $contents = $response->getBody()->getContents(); 
       $records = json_decode($contents, true); 
        
       echo $this->view->render('properties_table.twig', ['records'=>$records]);
   }
 
   function addProperties()
   {
       if(isset($_POST['submit']))
        {
           //steve has IMAGE instead of 'filename'
            
            $filename = $_FILES['filename']['name'];
            $temp_file = $_FILES['filename']['tmp_name'];
            $error_level = $_FILES['filename']['error'];
            //define upload directory
            $destination = 'static/assets/photos/';
            //define target destination
            $target_file = $destination.$filename;
            //move file
            move_uploaded_file($filename, $target_file);
            //i didnt have dis
            $_POST['filename'] = $filename;
            
            
            $uri = 'properties';
            $response = $this->client->request('POST', $uri, ['form_params'=> $_POST]);
            
            $contents = $response->getBody()->getContents(); 
            $data = json_decode($contents, true); 
            $message = $data['message'];
            echo $this->view->render('message.twig', ['message'=>$message]);
            

        }
        else
        {
            echo $this->view->render('properties_form.twig');
        }
   }
   function searchProperties()
   {
       //steves had 'submit' here, mine had 'keyword''
       if (isset($_POST['submit']))
        {
           $keyword = $_POST['keyword'];
           $uri = "properties/keyword/$keyword";
           $response = $this->client->get($uri); 
           $contents = $response->getBody()->getContents(); 
           $records = json_decode($contents, true); 
           
           echo $this->view->render('properties_table.twig', ['records' => $records]);
        }
        else
        {
        echo $this->view->render('search_form.twig');            
        }
       
       
       
       
   }
   
   
}
