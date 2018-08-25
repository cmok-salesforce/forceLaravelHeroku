<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyDummyController extends Controller
{
    public function index()
    {
        print('<h1>MyDummyController</h1>');
        // INITIAL XML 
        //
        // THE SKELETON OF XML THAT WE WILL ADD THE DIRECTORY'S CONTENTS TO
        /*
        $xml_string = <<< XML
        <?xml version='1.0' encoding='UTF-8'?>
        <files>
        </files>
        XML;
        $xml_generator = new SimpleXMLElement($xml_string);
        
        Helpers::readDirectory('.', $xml_generator); 
        dd($xml_generator->asXML()); */
    }    
}