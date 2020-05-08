<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/*
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd; */
//use Artesaos\SEOTools\Traits\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;

class PagesController extends Controller
{

    function __construct()
    {
        /*  $this->SEOMeta      = new SEOMeta();
        $this->OpenGraph    = new OpenGraph();
        $this->TwitterCard  = new TwitterCard();
        $this->JsonLd       = new JsonLd(); */
        //$this->SEOTools     = new SEOTools();

    }



    public function index()
    {
        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('Qwords Hosting Compare');
        SEOMeta::setCanonical(url('/'));
        //SEOTools::setTitile('Qwors commpeare');
        /* $this->SEOTools->setDescription('Qwors commpeare');
        $this->SEOTools->opengraph('Qwors commpeare');
        $this->SEOTools->setCanonical('http://webcompare.test/');
        $this->SEOTools->opengraph()->addProperty('type', 'articles');
        $this->SEOTools->jsonLd()->addImage('https://www.qwords.com/wp-content/themes/qwordsv7_theme/assets/img/logo-qwords.png'); */
        //$data = DB::table('hosting')->paginate(9);
        // $data=array();
        $kategori = DB::table('kategori')->where('type', 'hosting')->get();
        /*  adodb_pr($kategori);
        exit(); */
        $tabsMenu = '';
        $i = 1;
        $tabsContent = '';
        foreach ($kategori as $kat) {
            $selected = ($i == 1) ? 'true' : 'false';
            $active = ($i == 1) ? 'active' : '';
            $classActive = ($i == 1) ? 'show active' : '';
            $tabsMenu .= '
                        <a class="nav-item nav-link ' . $active . '" id="nav-hosting-tab' . $kat->id . '" data-toggle="tab" href="#nav-hosting-' . $kat->id . '" role="tab" aria-controls="nav-home" aria-selected="' . $selected . '">
                        ' . $kat->kategori . '
                        </a>
                ';
            $hosting = DB::table('hosting')
                ->select('id', 'paket', 'slug_url')
                ->where('kategori_id', $kat->id)->get();
            //adodb_pr($hosting);

            $product = '';
            foreach ($hosting as $r) {
                $product .= '
                             <div class="item">
                                <div class="box-hosting">
                                    <div class="box-head"></div>
                                    <div class="box-body pt-1 pb-1">
                                    <img src="'. asset('img/wordpress.png') .'" class="rounded mx-auto d-block" alt="...">
                                    </div>
                                    <div class="box-title">
                                        <h3 class="heading-title text-center">'.$r->paket.'</h3>
                                    </div>
                                    <a href="'.route('hosting',$r->slug_url).'" title="Bandingkan" class="btn btn-orange">Compare</a>
                                </div>
                            </div>
                            ';
            } 

            $tabsContent .= '<div class="tab-pane fade ' . $classActive . ' " id="nav-hosting-' . $kat->id . '" role="tabpanel" aria-labelledby="nav-home-tab' . $kat->id . '">
                                <div class="product-slider owl-carousel owl-theme">
                                '.$product.'
                                </div>
                             </div>';
            $i++;
        }




          $html = '
                    <div class="produk-hosting">
                        <nav>
                            <div class="nav nav-tabs nav-fill mt-5 mb-5 hosting-tabs" id="nav-tab" role="tablist">
                                ' . $tabsMenu . '
                            </div>
                        </nav>
                        <div class="tab-content pt-5 pb-5 pt-5" id="nav-tabContent">
                           
                                ' . $tabsContent . '
                            
                        </div>
                    </div>';

       // exit();
        return view('index',['html' => $html ]);
    }


    public function hosting($url){
        $hosting = DB::table('hosting')->where('slug_url', anti_Injection($url))->first();
       // adodb_pr($hosting);
       SEOMeta::setTitle($hosting->paket);
       $fitur=unserialize($hosting->deskripsi);
       $produk = DB::table('hosting')->select('id', 'paket','slug_url')->get();


        return view('hosting',['data'=>$hosting ,'fitur' => (object)$fitur, 'produk' => $produk]);
    }


    private function hostingData($id){

        $hosting = DB::table('hosting')
                ->select('id', 'paket', 'slug_url')
                ->where('kategori_id', $kat->id)->first();

        return $hosting;
    }

    public function compare($url){
        /*uri query string*/
        $url=anti_Injection($url);
        $urlSlug=explode('-vs-',urldecode($url));
        /*--- load DB----- */
        $hosting = DB::table('hosting')->whereIn('slug_url', $urlSlug)->get();
        
       /* untuk select compare */
       $produk = DB::table('hosting')->select('id', 'paket','slug_url')->get();
       $titleSEO='';
        $idp=array();
        foreach($hosting as $k){
            $titleSEO.=$k->paket.' vs ';
            $idp[]=$k->id;

        }
        SEOMeta::setTitle('Compare '. $titleSEO);
        SEOMeta::setDescription('Compare '. $titleSEO);
        SEOMeta::setCanonical(url('/'));




        
        return view('compare',['data'=>$hosting, 'produk' => $produk]);

    }





    public function ajaxcompare(Request $request){
        $error = true;
        $alert = '';
        $url='';
        if(empty($request->compare)){
            $alert='Choose Hosting';
        }else{
            $hosting = DB::table('hosting')
                        ->select('id', 'paket', 'slug_url')
                        ->whereIn('id', $request->compare)->get();
                        /* adodb_pr($hosting); */
            $url='';
            foreach($hosting as $r){
                $url.=$r->slug_url.'-vs-';
            }
            $error=false;
            $url=substr($url,0,-4);

         }

        $response = array(
            'error' => $error,
            'alert' => $alert,
            'url'   => $url
        );
        echo json_encode($response);
    }



}
