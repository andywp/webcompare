<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
/*
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd; */
//use Artesaos\SEOTools\Traits\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
class PagesController extends Controller
{
    
    function __construct() {
      /*  $this->SEOMeta      = new SEOMeta();
        $this->OpenGraph    = new OpenGraph();
        $this->TwitterCard  = new TwitterCard();
        $this->JsonLd       = new JsonLd(); */
        //$this->SEOTools     = new SEOTools();

    }



    public function index (){
        SEOMeta::setTitle('Home');
        //SEOTools::setTitile('Qwors commpeare');
        /* $this->SEOTools->setDescription('Qwors commpeare');
        $this->SEOTools->opengraph('Qwors commpeare');
        $this->SEOTools->setCanonical('http://webcompare.test/');
        $this->SEOTools->opengraph()->addProperty('type', 'articles');
        $this->SEOTools->jsonLd()->addImage('https://www.qwords.com/wp-content/themes/qwordsv7_theme/assets/img/logo-qwords.png'); */

        return view('index');
    }


   



}
