<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helpers\readDirectory;

class MyDummyController extends Controller
{
    public function index()
    {
        $xml_string = "<files></files>";
        $xml_generator = new \SimpleXMLElement($xml_string);
        readDirectory('.', $xml_generator); 
        dd($xml_generator->asXML()); 
    }    
}