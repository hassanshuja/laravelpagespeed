<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use DB;
use App;
use File;
use Redirect;
use \Session;
use View;
use PDF;
use Spatie\Sitemap\SitemapGenerator;
use DateTime;
use ImageOptimizer;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Log;
use Illuminate\Support\Facades\Route;

class mainController extends Controller
{

    public function getData($selected_category=0){
        DB::enableQueryLog();
        //categories with subcategories
        $data['title_tag']="Wellness Romantik Weekend Tagesausflüge Gruppenausflüge - Erlebnis Schweiz zum Buchen oder als Geschenkgutschein";
        $data['categories']=DB::table('category')
            ->where([['parent',0],['uid','<','4'],['hidden',0],['deleted',0]])
            ->select('title_url','title','uid','parent')
            ->get();
        for($i=0;$i<count($data['categories']);$i++){
            $getData=DB::table('category')
                ->where([['deleted',0],['hidden',0],['parent',$data['categories'][$i]->uid]])
                ->select('title','uid','title_url','parent')
                ->orderBy('sorting')
                ->get();
            for($l=0;$l<count($getData);$l++){
                $getData[$l]->title_urls=DB::table('tx_realurl_uniqalias')->where([['value_id',$getData[$l]->uid],['field_alias','title_url'],['tablename','tx_travel_domain_model_category']])->orderBy('uid','desc')->limit(1)->value('value_alias');
                $getSubCategories=DB::table('category')->where([['parent',$getData[$l]->uid],['hidden',0],['deleted',0]])->select('title','uid','title_url','parent')->get();
                for($k=0;$k<count($getSubCategories);$k++){
                    $getSubCategories[$k]->title_urls=DB::table('tx_realurl_uniqalias')
                        ->leftJoin('category','category.uid','value_id')
                        ->where([['value_id',$getSubCategories[$k]->uid],['category.parent',$getData[$l]->uid],['field_alias','title_url']])
                        ->orderBy('tx_realurl_uniqalias.uid','desc')
                        ->value('value_alias');

                }
                $getData[$l]->subCategories=$getSubCategories;
            }
            $data['categories'][$i]->subCategories=$getData;
        }

        //regions with subregions
        $data['regions']=DB::table('region')->where([['parent',0],['hidden',0],['deleted',0]])->select('uid','title')->get();
        for($i=0;$i<count($data['regions']);$i++){
            $data['regions'][$i]->value_alias=DB::table('tx_realurl_uniqalias')->where([['value_id',$data['regions'][$i]->uid],['tablename','tx_travel_domain_model_region']])->orderBy('uid','desc')->limit(1)->value('value_alias');
            $getData=DB::table('region')->where([['parent',$data['regions'][$i]->uid],['hidden',0],['deleted',0]])->select('title','uid')->get();
            for($l=0;$l<count($getData);$l++){
                $getData[$l]->value_alias=DB::table('tx_realurl_uniqalias')->where([['value_id',$getData[$l]->uid],['tablename','tx_travel_domain_model_region']])->orderBy('uid','desc')->limit(1)->value('value_alias');
            }
            $data['regions'][$i]->subRegions=$getData;
        }
        //main regions represented in key=>value
        $data['region']=DB::table('region')
            ->where([['parent',0],['hidden',0],['deleted',0]])
            ->pluck('title','uid')
            ->toArray();


        //only subregions represented in key=>value
        $data['subregion']=DB::table('region')->where([['parent','>',0],['hidden',0],['deleted',0]])->pluck('title','uid')->toArray();
        //all Regions key=>value
        $data['allRegions']=DB::table('region')->where([['hidden',0],['deleted',0]])->pluck('title','uid')->toArray();
        //all Categories key=>value
        $data['category']=DB::table('category')->where([['hidden',0],['deleted',0]])->pluck('title','uid')->toArray();
        //main categories key=>value
        $data['maincategory']=DB::table('category')->where([['parent',0],['hidden',0],['deleted',0]])->pluck('title','uid')->toArray();
        //only subcategories
        $data['subcategories']=DB::select(DB::raw("Select ca.uid,ca.title,ca.parent,ca.image  from category as ca, category as cb where cb.uid=ca.parent and ca.parent!=0 and ca.deleted=0 and ca.hidden=0 order by ca.sorting"));


        //touroperators key=>value
        $data['tourOperators']=DB::table('touroperator')->where([['hidden',0],['deleted',0]])->pluck('title','uid')->toArray();
        //duration key=>value
        $data['duration']=DB::table('offer')->where([['deleted',0],['hidden',0]])->groupBy('night','day')->pluck('day','night')->toArray();
        //currency
        $data['currency']=DB::table('currency')->pluck('currency','uid')->toArray();

        $data['subCategoriesMS']=DB::table('category')
            ->where([['uid','>',3],['hidden',0],['deleted',0]])
            ->select('title','uid','parent','title_url',DB::raw('(SELECT value_alias from tx_realurl_uniqalias where value_id=category.uid and field_alias="title_url" and tablename="tx_travel_domain_model_category" order by uid desc limit 1) as title_urls'))
            ->orderBy('sorting')
            ->get();

        // $data['categoryData']=DB::table('category as catA')
        //     ->leftJoin('category as catB','catB.parent','catA.uid')
        //     ->leftJoin('sys_file_reference as c','c.uid_foreign','catB.uid')
        //     ->leftJoin('sys_file as fs','fs.uid','c.uid_local')
        //     ->where([['c.hidden',0],['c.deleted',0],['catB.hidden',0],['catB.deleted',0],['c.fieldname','image'],['fs.identifier','NOT LIKE',"%user_upload%"],['fs.identifier','LIKE',"%category%"]])
        //     ->select('fs.identifier','catB.title_url','fs.name','fs.uid','catB.title','catB.uid','catA.parent as parent','catB.parent as parent2','catB.category_class')
        //     ->orderBy('catB.sorting','asc')
        //     ->get();
        $data['categoryData']=DB::select(DB::raw('select `fs`.`identifier`,`value_id`,`value_alias`,`catB`.`title_url`, `fs`.`name`, `catB`.`category_season`, `fs`.`uid`, `catB`.`title`, `catB`.`sorting` as `sorting`, `catB`.`uid`, `catA`.`parent` as `parent`, `catB`.`parent` as `parent2`, `catB`.`category_class`, `catB`.`box_layout` from `category` as `catA`
            left join `category` as `catB` on `catB`.`parent` = `catA`.`uid`
            left join `sys_file_reference` as `c` on `c`.`uid_foreign` = `catB`.`uid`
            left join `sys_file` as `fs` on `fs`.`uid` = `c`.`uid_local`
            left join (select value_id,value_alias,field_alias from tx_realurl_uniqalias where tablename = "tx_travel_domain_model_category" and field_alias="title_url" group by value_id order by uid desc) as ua on ua.value_id=catB.uid
            where (`c`.`hidden` = 0 and `c`.`deleted` = 0 and `catB`.`hidden` = 0 and `catB`.`deleted` = 0 and `c`.`fieldname` = "image" and `tablenames` = "tx_travel_domain_model_category") order by `catB`.`sorting` asc'));


        // $gs=$selected_category;
        // switch($selected_category){
        //     case(0):
        //         $selected_category=1;
        //         $gs=1;
        //         break;
        //     case(1):
        //         $selected_category=4;
        //         break;
        //     case(2):
        //         $selected_category=18;
        //         break;
        //     case(3):
        //         $selected_category=69;
        //         break;
        // }
        // $data['gjyshiStatik']=$gs;
        // $data['firstParent']=DB::table('category')
        //     ->where([['uid',$selected_category],['hidden',0],['deleted',0]])
        //     ->pluck('parent');
        // $data['gjyshi']=DB::table('category')
        //     ->where([['uid',$data['firstParent'][0]],['hidden',0],['deleted',0]])
        //     ->pluck('parent');
        // $data['selected_categories2']=DB::table('category')->where('parent',$selected_category)->get();

        return $data;
    }

    public function generateXml(){
        $path='assets/siteMap/sitemap.xml';
        SitemapGenerator::create('https://www.meinweekend.ch')->writeToFile(public_path('sitemap.xml'));
        return "true";
        //echo "generated";
    }
    public function generateDynamicXml(){
        $base="https://www.meinweekend.ch/";
        $sitemap = App::make('sitemap');
        $masterI=1;
        echo '<br>Category<br>';
        $sitemapContent=DB::select(DB::raw(
            'select * from tx_realurl_uniqalias where (tablename="tx_travel_domain_model_category") AND field_alias="title_url"'
        ));
        $i=1;
        $finalXmlArr=array();
        foreach ($sitemapContent as $allLinks) {
            if($allLinks->tablename=="tx_travel_domain_model_category")
            {
                $link='';
                $isUnavailable=DB::select(DB::raw(
                    'select * from category where deleted = 0 and hidden=0 and uid='.$allLinks->value_id
                ));
                $avC=count($isUnavailable);
                if($avC!=0)
                {
                    $filNav=$this->getNavBarIds($allLinks->value_id);
                    $parentCategory=$filNav['gjyshiStatik'];
                    if($parentCategory==1)
                    {
                        if($allLinks->value_id==1)
                        {
                            $link=$base."weekend";
                        }
                        else
                        {
                            $link=$base."weekend/".$allLinks->value_alias;
                        }
                    }
                    elseif($parentCategory==2)
                    {
                        if($allLinks->value_id==2)
                        {
                            $link=$base."tagesausflug";
                        }
                        else
                        {
                            $link=$base."tagesausflug/".$allLinks->value_alias;
                        }
                    }
                    else
                    {
                        if($allLinks->value_id==3)
                        {
                            $link=$base."gruppenausfluege";
                        }
                        else
                        {
                            $link=$base."gruppenausfluege/".$allLinks->value_alias;
                        }
                    }
                }
            }
            if($avC!=0)
            {
                //$pLink['link']=$link;
                //echo $masterI.'  '.$i." ".$link.'<br>';
                //array_push($finalXmlArr["link"],$link);
                $finalXmlArr[$masterI]["link"]=$link;
                $finalXmlArr[$masterI]["priority"]='1.0';
                $finalXmlArr[$masterI]["time"]=date('c', time());
                $finalXmlArr[$masterI]["frequency"]="monthly";
                $masterI++;
                $i++;
            }
            //$sitemap->add($link->slug, now(), 1, "monthly");
        }
        echo '<br>Regions<br>';
        $sitemapContent=DB::select(DB::raw(
            'select * from tx_realurl_uniqalias where (tablename="tx_travel_domain_model_region") AND field_alias="title"'
        ));
        $i=1;
        foreach ($sitemapContent as $allLinks) {
            if($allLinks->tablename=="tx_travel_domain_model_region")
            {
                $isUnavailable=DB::select(DB::raw(
                    'select * from region where deleted = 0 and hidden=0 and uid='.$allLinks->value_id
                ));
                $avC=count($isUnavailable);
                if($avC!=0)
                {
                    $link=$base."region/".$allLinks->value_alias;
                }
            }
            if($avC!=0)
            {
                //echo $masterI.'  '.$i." ".$link.'<br>';

                $finalXmlArr[$masterI]["link"]=$link;
                $finalXmlArr[$masterI]["priority"]='1.0';
                $finalXmlArr[$masterI]["time"]=date('c', time());
                $finalXmlArr[$masterI]["frequency"]="monthly";
                $masterI++;
                $i++;
            }
        }
        echo '<br>Offers<br>';
        $sitemapContent=DB::select(DB::raw(
            'select * from tx_realurl_uniqalias where (tablename="tx_travel_domain_model_offer") AND field_alias="title"'
        ));
        $i=1;
        foreach ($sitemapContent as $allLinks) {
            if($allLinks->tablename=="tx_travel_domain_model_offer")
            {
                $isUnavailable=DB::select(DB::raw(
                    'select * from offer where deleted = 0 and hidden=0 and uid='.$allLinks->value_id
                ));
                $avC=count($isUnavailable);
                if($avC!=0)
                {
                    $link=$base."ausflug/".$allLinks->value_alias;
                }
            }
            if($avC!=0)
            {
                //echo $masterI.'  '.$i." ".$link.'<br>';
                $finalXmlArr[$masterI]["link"]=$link;
                $finalXmlArr[$masterI]["priority"]='1.0';
                $finalXmlArr[$masterI]["time"]=date('c', time());
                $finalXmlArr[$masterI]["frequency"]="monthly";
                $masterI++;
                $i++;
            }
        }
            
        $i=1;
        echo '<br>Combined category region<br>';
        $sitemapContent=DB::select(DB::raw(
            'select * from tx_realurl_uniqalias where (tablename="tx_travel_domain_model_category") AND field_alias="title_url"'
        ));
        foreach ($sitemapContent as $allLinks) {
            if($allLinks->tablename=="tx_travel_domain_model_category")
            {
                $link='';
                $isUnavailable=DB::select(DB::raw(
                    'select * from category where deleted = 0 and hidden=0 and uid='.$allLinks->value_id
                ));
                $avC=count($isUnavailable);
                if($avC!=0)
                {
                    $filNav=$this->getNavBarIds($allLinks->value_id);
                    $parentCategory=$filNav['gjyshiStatik'];
                    if($parentCategory==1)
                    {
                        if($allLinks->value_id==1)
                        {
                            $link=$base."weekend";
                        }
                        else
                        {
                            $link=$base."weekend/".$allLinks->value_alias;
                        }
                    }
                    elseif($parentCategory==2)
                    {
                        if($allLinks->value_id==2)
                        {
                            $link=$base."tagesausflug";
                        }
                        else
                        {
                            $link=$base."tagesausflug/".$allLinks->value_alias;
                        }
                    }
                    else
                    {
                        if($allLinks->value_id==3)
                        {
                            $link=$base."gruppenausfluege";
                        }
                        else
                        {
                            $link=$base."gruppenausfluege/".$allLinks->value_alias;
                        }
                    }
                    $sitemapContentSub=DB::select(DB::raw(
                        'select * from tx_realurl_uniqalias where (tablename="tx_travel_domain_model_region") AND field_alias="title"'
                    ));
                    foreach ($sitemapContentSub as $allLinksB){
                        if($allLinksB->tablename=="tx_travel_domain_model_region")
                        {
                            $isUnavailable=DB::select(DB::raw(
                                'select * from region where deleted = 0 and hidden=0 and uid='.$allLinksB->value_id
                            ));
                            $avC=count($isUnavailable);
                            if($avC!=0)
                            {
                                $linkB=$link."/"."region/".$allLinksB->value_alias;
                                //echo $masterI.'  '.$i." ".$linkB.'<br>';
                                $finalXmlArr[$masterI]["link"]=$linkB;
                                $finalXmlArr[$masterI]["priority"]='1.0';
                                $finalXmlArr[$masterI]["time"]=date('c', time());
                                $finalXmlArr[$masterI]["frequency"]="monthly";
                                $masterI++;
                                $i++;
                            }
                        }
                    }
                }
            }
            // if($allLinks->tablename=="tx_travel_domain_model_offer")
            // {
            //     $link=$base."ausflug/".$allLinks->value_alias;
            // }
            // if($allLinks->tablename=="tx_travel_domain_model_region")
            // {
            //     $link=$base."region/".$allLinks->value_alias;
            // }
        }

        echo '<br>Offers Vaucher<br>';
        $sitemapContent=DB::select(DB::raw(
            'select * from tx_realurl_uniqalias where (tablename="tx_travel_domain_model_offer") AND field_alias="title"'
        ));
        $i=1;
        foreach ($sitemapContent as $allLinks) {
            if($allLinks->tablename=="tx_travel_domain_model_offer")
            {
                $isUnavailable=DB::select(DB::raw(
                    'select * from offer where deleted = 0 and hidden=0 and uid='.$allLinks->value_id
                ));
                $avC=count($isUnavailable);
                if($avC!=0)
                {
                    $link=$base."angebote/geschenkgutschein-geschenkidee/ideen/".$allLinks->value_alias;
                }
            }
            if($avC!=0)
            {
                //echo $masterI.'  '.$i." ".$link.'<br>';
                $finalXmlArr[$masterI]["link"]=$link;
                $finalXmlArr[$masterI]["priority"]='1.0';
                $finalXmlArr[$masterI]["time"]=date('c', time());
                $finalXmlArr[$masterI]["frequency"]="monthly";
                $masterI++;
                $i++;
            }
        }

   

        //print_r($finalXmlArr);
        $finalXmlArr[$masterI]["link"]='https://www.meinweekend.ch/geschenkgutschein';
        $finalXmlArr[$masterI]["priority"]='1.0';
        $finalXmlArr[$masterI]["time"]=date('c', time());
        $finalXmlArr[$masterI]["frequency"]="monthly";
        $masterI++;
        $i++;
            
        $finalXmlArr[$masterI]["link"]='https://www.meinweekend.ch/ueber-uns';
        $finalXmlArr[$masterI]["priority"]='1.0';
        $finalXmlArr[$masterI]["time"]=date('c', time());
        $finalXmlArr[$masterI]["frequency"]="monthly";
        $masterI++;
        $i++;
            
        $finalXmlArr[$masterI]["link"]='https://www.meinweekend.ch/impressum';
        $finalXmlArr[$masterI]["priority"]='1.0';
        $finalXmlArr[$masterI]["time"]=date('c', time());
        $finalXmlArr[$masterI]["frequency"]="monthly";
        $masterI++;
        $i++;
        $n=1;
        foreach($finalXmlArr as $finalxml)
        {
            echo "$n. Link: ".$finalxml['link'].'/'." priority: ".$finalxml['priority']." time: ".$finalxml['time']." frequency: ".$finalxml['frequency']."<br>";
            //echo "$n. Link: ".$finalxml['link'].'/'." priority: ".$finalxml['priority']." time: ".$finalxml['time']." frequency: ".$finalxml['frequency']."<br>";
            //$sitemap->add($finalxml['link'].'/', $finalxml['time'], $finalxml['priority'], $finalxml['frequency']);
            $n++;
        }
        //$sitemap->store('xml', '/siteMap/sitemapMeinweekend');
        //return $sitemap->render('xml');
        //return "stored";
        //return "true";
        //return $sitemapContent;
        //$path='assets/siteMap/sitemap.xml';
        //SitemapGenerator::create('https://www.meinweekend.ch')->writeToFile(public_path('siteMap/sitemap.xml'));
        //return "true";
        //echo "generated";
    }
    public function getDynamicIndex(){
        return view('dynamicindex')->with('data',$this->getData());
    }
    public function geschenkgutscheinReservation(Request $request){
        /*not used*/
        $vauchers=DB::table('vaucher_templates')
            ->select('image')
            ->orderBy('uid')
            ->get();
        $metaDesc="Ein Geschenkgutschein ist eine tolle Geschenkidee zum Geburtstag, zum Jubiläum, zu Weihnachten, zur Hochzeit oder als Hauptgewinn an einem Wettbewerb. www.meinweekend.ch bietet Ihnen eine breite Auswahl für ein spannendes Weekend oder einen Tagesausflug in der Schweiz. Für Freizeit-Aktivisten und Romantiker – einfach für alle Menschen, die in ihrer Freizeit einmal etwas ganz Besonderes erleben möchten.";
        $meta=['description'=>$metaDesc];
        $title='Geschenkgutschein';
        if($request->isNavigate==0){
            $viewData=View::make('geschenkgutschein')
                ->with('vauchers',$vauchers)
                ->with('data',$this->getData())
                ->render();
            return view('index')
                ->with('dataView',$viewData)
                ->with('isNavigate',$request->isNavigate)
                ->with('title',$title)
                ->with('meta',$meta)
                ->with('data',$this->getData());
        }else{
            $view=View::make('geschenkgutschein')
                ->with('vauchers',$vauchers)
                ->with('data',$request->data)
                ->with('isNavigate',$request->isNavigate)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }

    }
    public function migrate(){
        ini_set('max_execution_time', 180);
        DB::enableQueryLog();
        $data=DB::table('sys_file_reference')
            ->join('sys_file','sys_file_reference.uid_local','sys_file.uid')
            ->where([['sys_file_reference.fieldname','images'],['sys_file.missing',0],['sys_file_reference.deleted',0],['sys_file_reference.tablenames','tx_travel_domain_model_offer']])
            ->get();
        for($i=0;$i<count($data);$i++){
            $dataToInsert[$i]['offer']=$data[$i]->uid_foreign;
            $dataToInsert[$i]['image']=$data[$i]->identifier;
            $dataToInsert[$i]['sorting']=$data[$i]->sorting_foreign;
            $dataToInsert[$i]['image_src']=$data[$i]->identifier;
            $dataToInsert[$i]['crdate']=$data[$i]->creation_date;
            $dataToInsert[$i]['hidden']=$data[$i]->hidden;

        }
        $insert=DB::table('images2')
            ->insert($dataToInsert);
    }
    public function previewLayout(Request $request,$parent=1){
        $pid=1;

        if($parent=='Weekend' || $parent==1){
            $pid=1;
            $parent='Weekend';
        }
        if($parent=='Tagesausflug'){
            $pid=2;
        }
        if($parent=='Gruppenausflüge' || $parent=='Gruppenausfluge' || $parent=='gruppenausfluege'){
            $pid=3;
        }
        $filteredNav=$this->getNavBarIds($pid);
        $data=$this->getData();
        $data['categoryData']=DB::table('category as catA')
            ->leftJoin('category as catB','catB.parent','catA.uid')
            ->leftJoin('sys_file_reference as c','c.uid_foreign','catB.uid')
            ->leftJoin('sys_file as fs','fs.uid','c.uid_local')
            ->where([['catA.parent',$pid],['c.hidden',0],['c.deleted',0],['catB.hidden',0],['catB.deleted',0],['c.fieldname','image'],['fs.identifier','NOT LIKE',"%user_upload%"],['fs.identifier','LIKE',"%category%"]])
            ->select('fs.identifier','catB.title_url','fs.name','catB.category_season','fs.uid','catB.title','catB.sorting as sorting','catB.uid','catA.parent as parent','catB.parent as parent2','catB.category_class','catB.box_layout')
            ->orderBy('catB.season_order','asc')
            ->orderBy('catB.sorting', 'asc')
            ->get();
        //return $data['categoryData'];
        $meta['keywords']="Weekend Schweiz, Geschenkgutschein, Gruppenausflüge, Weekend Package, Tagesausflug, Loveroom, Romantik Weekend, Weekend zu zweit, Wellness Weekend, Quad fahren, Helikopter fliegen, Rundflüge, Huskytour, Hundeschlittentour, Schneeschuhtour, Skitour, Iglu bauen, Kanutour, Motorboot mieten, Motoryacht mieten, Segeln, Eseltrekking, Ziegentrekking, Weinseminar, Whisky Tasting, Lady Weekend";
        $meta['description']="Vielfältige Ideen für ein Erlebnis. Als Weekend, Tagesausflug oder als Gruppenausflüge in der Schweiz. Per direkter Buchung oder mit einem Geschenkgutschein. Zur Entspannung Romantik Weekend als Loveroom Weekend zu zweit oder Wellness Weekend. Aktiv als Weekend Package, Tagesausflug oder Gruppenausflüge mit Quad fahren, Helikopter fliegen, Rundflüge. Im Sommer oder Winter Hundeschlittentour, jedoch auch Ziegentrekking, Eseltrekking, Schneeschuhtour, skitour, iglu bauen, kanutour, motorboot mieten, motoryacht mieten, segeln. Als Lifestyle Angebote: Lady Weekend, Weinseminar oder Whisky Tasting.";

        $title='Meinweekend';
        if($request->isNavigate==0) {
            $view=View::make('layoutHome')->with('data',$data)
                ->with('categoryName',$parent)
                ->with('filteredNav',$filteredNav)
                ->with('isHome',1)

                ->render();
            return view('index')
                ->with('dataView',$view)
                ->with('isNavigate',$request->isNavigate)
                ->with('meta',$meta)
                ->with('categoryName',$parent)
                ->with('title',$title);
        }else{
            $view=View::make('layoutHome')
                ->with('allData',$data)
                ->with('isNavigate',$request->isNavigate)
                ->with('data',$data)
                ->with('isHome',1)

                ->with('filteredNav',$filteredNav)
                ->with('categoryName',$parent)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }
    public function getHome(Request $request,$parent=1){


            // $route = Route::current();

            // return $name = Route::currentRouteName();

            //  $action = Route::currentRouteAction();
        

        

        $pid=1;
        //return $parent;
        //$pid=$this->getParent($parent);
        if($parent != 1){ $pid=$this->getParentTwo($parent); };
        if($parent != 1 && $pid == 0) {  return $this->get404($request); }
        $filteredNav=$this->getNavBarIds($pid);
        $data=$this->getData();
        $seo=DB::table('category')->where('uid',$pid)->value('seo');
        $seo = str_replace("<br>",'<br/><br/>',$seo);
        $seo=explode('###COLUMNS###',$seo);

        $data['categoryData']=DB::select(DB::raw('select `fs`.`identifier`,`value_id`,`value_alias`,`catB`.`title_url`, `fs`.`name`, `catB`.`category_season`, `fs`.`uid`, `catB`.`title`, `catB`.`sorting` as `sorting`, `catB`.`uid`, `catA`.`parent` as `parent`, `catB`.`parent` as `parent2`, `catB`.`category_class`, `catB`.`box_layout` from `category` as `catA`
                left join `category` as `catB` on `catB`.`parent` = `catA`.`uid`
                left join `sys_file_reference` as `c` on `c`.`uid_foreign` = `catB`.`uid`
                left join `sys_file` as `fs` on `fs`.`uid` = `c`.`uid_local`
                left join (select value_id,value_alias,field_alias from tx_realurl_uniqalias where tablename = "tx_travel_domain_model_category" and field_alias="title_url" group by value_id) as ua on ua.value_id=catB.uid
                where (`catA`.`parent` = '.$pid.' and `c`.`hidden` = 0 and `c`.`deleted` = 0 and `catB`.`hidden` = 0 and `catB`.`deleted` = 0 and `c`.`fieldname` = "image" and `tablenames` = "tx_travel_domain_model_category") order by `catB`.`sorting` asc'));
        // return $data['categoryData'];
        $meta['keywords']="Weekend Schweiz, Geschenkgutschein, Gruppenausflüge, Weekend Package, Tagesausflug, Loveroom, Romantik Weekend, Weekend zu zweit, Wellness Weekend, Quad fahren, Helikopter fliegen, Rundflüge, Huskytour, Hundeschlittentour, Schneeschuhtour, Skitour, Iglu bauen, Kanutour, Motorboot mieten, Motoryacht mieten, Segeln, Eseltrekking, Ziegentrekking, Weinseminar, Whisky Tasting, Lady Weekend";
        $meta['description']="Vielfältige Ideen für ein Erlebnis. Als Weekend, Tagesausflug oder als Gruppenausflüge in der Schweiz. Per direkter Buchung oder mit einem Geschenkgutschein. Zur Entspannung Romantik Weekend als Loveroom Weekend zu zweit oder Wellness Weekend. Aktiv als Weekend Package, Tagesausflug oder Gruppenausflüge mit Quad fahren, Helikopter fliegen, Rundflüge. Im Sommer oder Winter Hundeschlittentour, jedoch auch Ziegentrekking, Eseltrekking, Schneeschuhtour, skitour, iglu bauen, kanutour, motorboot mieten, motoryacht mieten, segeln. Als Lifestyle Angebote: Lady Weekend, Weinseminar oder Whisky Tasting.";

        $title='Wellness Romantik Weekend Schweiz';
        if($request->isNavigate==0) {
            $view=View::make('home')
                ->with('data',$data)
                ->with('categoryName',$parent)
                ->with('filteredNav',$filteredNav)
                ->with('seo',$seo)
                ->with('isHome',1)
                ->render();
   
            return view('index')
                ->with('dataView',$view)
                ->with('isNavigate',$request->isNavigate)
                ->with('data',$data)
                ->with('meta',$meta)
                ->with('seo',$seo)
                ->with('categoryName',$parent)
                ->with('title',$title);
        }else{
            $view=View::make('home')
                ->with('allData',$data)
                ->with('isNavigate',$request->isNavigate)
                ->with('data',$data)
                ->with('seo',$seo)
                ->with('isHome',1)
                ->with('filteredNav',$filteredNav)
                ->with('categoryName',$parent)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }

    public function booking03(Request $request){
        $meta['description']='Booking proccess step 3 | Meinweekend';
        $title='Booking step 3 | Meinweekend';
        if($request->isNavigate==0) {
            return view('index')
                ->with('dataView',$this->handleRequest('booking03'))
                ->with('isNavigate',$request->isNavigate)
                ->with('data',$this->getData())
                ->with('meta',$meta)
                ->with('title',$title);
        }else{
            $view= view('booking03')
                ->with('isNavigate',$request->isNavigate)
                ->with('data',$request->data)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }

    public function booking04(Request $request){
        $meta['description']='Booking proccess, step 4 | Meinweekend';
        $title='Booking step 4 | Meinweekend';
        if($request->isNavigate==0) {
            return view('index')
                ->with('dataView',$this->handleRequest('booking04'))
                ->with('isNavigate',$request->isNavigate)
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('data',$this->getData());
        }else{
            $view= View::make('booking04')
                ->with('isNavigate',$request->isNavigate)
                ->with('data',$request->data)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }

    public function booking02(Request $request){
        $meta['description']='Booking proccess, step 2 | Meinweekend';
        $title='Booking step 2 | Meinweekend';
        if($request->isNavigate==0) {
            return view('index')
                ->with('dataView',$this->handleRequest('booking02'))
                ->with('isNavigate',$request->isNavigate)
                ->with('data',$this->getData());
        }else{
            $view= View::make('booking02')
                ->with('isNavigate',$request->isNavigate)
                ->with('data',$request->data)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }

    public function handleRequest($viewR,$transferData=false){
        if($transferData) {
            return view($viewR)
                ->with('allData',$transferData)
                ->with('data',$this->getData());
        }else{
            return view($viewR)
                ->with('data',$this->getData());
        }
    }

    public function getOfferId(Request $request,$offer_name){
        $offer_name=str_replace("-"," ",$offer_name);
        $offerId=DB::table('offer')->where('title',$offer_name)->value('uid');
        if(count($offerId)>0){
            return $this->getOfferPage($request,$offerId);
        }else{
            return redirect()->back();
        }
    }


    public function redirect1(Request $request,$category=0){
        if($category===0){
            $category='weekend';
        }

        return $this->listOffers($request,'alle',$category,'alle','alle',1);
    }
    public function redirect9(Request $request,$category=0){

        if($category===0){
            $category='tagesausflug';
        }

        return $this->listOffers($request,'alle',$category,'alle','alle',2);
    }
    public function redirect10(Request $request,$category=0){
        if($category===0){
            $category='gruppenausfluege';
        }
        return $this->listOffers($request,'alle',$category,'alle','alle',3);
    }

    public function redirect2(Request $request,$category,$region){
        return $this->listOffers($request,$region,$category,'alle','alle',1);

    }
    public function redirect11(Request $request,$category,$region){
        return $this->listOffers($request,$region,$category,'alle','alle',2);

    }
    public function redirect12(Request $request,$category,$region){
        return $this->listOffers($request,$region,$category,'alle','alle',3);
    }

    public function redirect3(Request $request, $category,$region,$day){
        return $this->listOffers($request, $region,$category,$day,'alle',1);
    }
    public function redirect13(Request $request, $category,$region,$day){
        return $this->listOffers($request, $region,$category,$day,'alle',2);
    }
    public function redirect14(Request $request, $category,$region,$day){
        return $this->listOffers($request, $region,$category,$day,'alle',3);
    }

    public function redirect4(Request $request, $parent,$category,$region,$day,$search){

        $v=$this->getParent($parent);
        return $this->listOffers($request, $region,$category,$day,$search,$v,"yes");
    }

    public function redirect5(Request $request){
        return $this->listOffers($request,'alle','alle','alle','alle');
    }
    public function redirect6(Request $request,$region){
        return $this->listOffers($request,$region,'weekend','alle','alle',1);
    }
    public function redirect7(Request $request,$region){
        return $this->listOffers($request,$region,'tagesausflug','alle','alle',2);
    }
    public function redirect8(Request $request,$region){
        return $this->listOffers($request,$region,'gruppenausfluege','alle','alle',3);
    }

    public function redirect17(Request $request,$fuer){
        return $this->listOffers($request,'alle','alle',$fuer,'alle');
    }

    public function redirect18(Request $request,$search){
        return $this->listOffers($request,'alle','alle','alle',$search);
    }

    public function redirect19(Request $request,$region){
        return $this->listOffers($request,$region,'alle','alle','alle');
    }
    public function redirect20(Request $request,$region,$fuer){
        return $this->listOffers($request,$region,'alle',$fuer,'alle');
    }
    public function redirect21(Request $request,$region,$fuer,$search){
        return $this->listOffers($request,$region,'alle',$fuer,$search);
    }
    public function redirect22(Request $request,$region,$search){
        return $this->listOffers($request,$region,'alle','alle',$search);
    }
    public function redirect23(Request $request,$fuer,$search){
        return $this->listOffers($request,'alle','alle',$fuer,$search);
    }
    public function redirect24(Request $request,$parent,$category,$fuer,$search){
        $v=$this->getParent($parent);
        return $this->listOffers($request,'alle',$category,$fuer,$search,$v);
    }

    public function redirect27(Request $request,$parent,$category,$search){
        $v=$this->getParent($parent);
        return $this->listOffers($request,'alle',$category,'alle',$search,$v);
    }

    public function redirect30(Request $request,$parent,$category,$fuer){
        $v=$this->getParent($parent);
        return $this->listOffers($request,'alle',$category,$fuer,'',$v);
    }

    public function redirect33(Request $request,$parent,$category,$region,$fuer){
        $v=$this->getParent($parent);
        return $this->listOffers($request,$region,$category,$fuer,'alle',$v,"yes");
    }


    public function redirect40(Request $request,$parent,$region){
        $v=$this->getParent($parent);
        return $this->listOffers($request,$region,$parent,'alle','alle',$v,"yes");

    }

    public function redirect42(Request $request,$parent,$region,$day,$search){
        $v=$this->getParent($parent);
        return $this->listOffers($request,$region,$parent,$day,$search,$v,"yes");
    }

    public function redirect43(Request $request,$parent,$region,$search){
        $v=$this->getParent($parent);
        return $this->listOffers($request,$region,$parent,'alle',$search,$v,"yes");
    }

    public function redirect44(Request $request,$parent,$search){
        $v=$this->getParent($parent);
        return $this->listOffers($request,'alle',$parent,'alle',$search,$v,"yes");
    }

    public function redirect45(Request $request,$parent,$day){
        $v=$this->getParent($parent);
        return $this->listOffers($request,'alle',$parent,$day,'alle',$v);
    }
    public function redirect46(Request $request,$parent,$day,$search){
        $v=$this->getParent($parent);
        return $this->listOffers($request,'alle',$parent,$day,$search,$v);
    }
    public function redirect47(Request $request,$parent,$category,$region){
        $v=$this->getParent($parent);
        return $this->listOffers($request,$region,$category,'alle','alle',$v);
    }

    public function redirect48(Request $request,$parent,$region,$day){
        $v=$this->getParent($parent);
        return $this->listOffers($request,$region,$parent,$day,'alle',$v,"yes");
    }

    public function redirect49(Request $request,$region){
        return $this->listOffers($request,$region,'alle','alle','alle');
    }

    public function redirect50(Request $request,$region,$parent,$category){
        $category=str_replace('.html','',$category);

//        return redirect("/".$parent."/".$category."/region/".$region);
    }

    public function redirect51(Request $request,$region,$parent){
        $parent=str_replace('.html','',$parent);



//        return redirect("/".$parent."/region/".$region);
    }

    public function redirect52(Request $request,$category,$region){
        $categoryLink='';
        $region=str_replace('.html','',$region);

        $cats=['gruppenausflüge','weekend','tagesausflug','gruppenausfluege',];
        if(in_array($category,$cats)){
            $categoryLink=str_replace('ü','ue',$category);
        }else{
            $cat_id=DB::table('tx_realurl_uniqalias')->where([['value_alias',$category],['field_alias','title_url']])->value('value_id');
            if($cat_id!=null){
                $navBarIds=$this->getNavBarIds($cat_id);
                $categoryLink=$cats[$navBarIds['gjyshiStatik']]."/".$category;
            }else{
                return $this->get404($request);

                // return redirect('/');
            }
        }

        return redirect('/'.$categoryLink."/region/".$region);
    }

    public function redirect53(Request $request,$parent,$region){
        $region=str_replace('.html','',$region);
//        return redirect('/'.$parent.'/region/'.$region);
    }

    public function redirect54(Request $request,$parent,$category,$region){
        $region=str_replace('.html','',$region);
//        return redirect('/'.$parent.'/'.$category.'/region/'.$region);
    }

    public function redirect55(Request $request,$parent,$category){
        $category=str_replace('.html','',$category);
        $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//      return redirect('/'.$parent.'/'.$category);
    }

    public function redirect56(Request $request,$region){
        return $this->listOffers($request,$region,'alle','alle','alle');
    }

    public function redirectregion($region){
        //return redirect('erlebnis-schweiz/region/'.$region);
    }

    public function redirect57(Request $request,$category){
        //return redirect("/weekend/".$category);
    }

    public function redirect59(Request $request,$category){
        //return redirect("/tagesausflug/".$category);
    }

    public function redirect60(Request $request,$category){
        //return redirect("/gruppenausfluege/".$category);
    }

    public function redirect61(Request $request,$category){
        //return redirect("/tagesausflug/".$category);
    }

    public function redirect62(Request $request,$category,$region){
        //return redirect("/tagesausflug/".$category.'/region/'.$region);
    }

    public function redirect63(Request $request,$region){
        //return redirect("/tagesausflug/region/".$region);
    }

    public function redirect64(Request $request,$region){
        //return redirect("/weekend/schneeschuhtour/region/".$region);
    }

    public function redirect58(Request $request,$parent,$region){
        $cats=['weekend','tagesausflug','gruppenausfluege','gruppenausfluge'];
        if(!in_array($parent,$cats)){
            return $this->get404($request);
            // return redirect('/');
        }
        //return redirect("/".$parent."/region/".$region);
    }

    public function getOfferPage(Request $request,$offer_id){
        Session::forget('tableSelPrices');
        Session::forget('selectedPrices');
        Session::forget('firstTable');
        Session::forget('userContactForm');
        Session::forget('isAdditinalNight');
        $offerUrl=DB::table('tx_realurl_uniqalias')->where([['value_id',$offer_id],['field_alias','title_url'],['tablename','tx_travel_domain_model_offer']])->value('value_alias');

        return redirect()->action('mainController@getOfferPageSEO',['request'=>$request,'offerUrl'=>$offerUrl]);

        $currency=0;
        $catId=DB::table('offer')->where('uid',$offer_id)->value('categories');
        $explode=explode(',',$catId);
        $filteredNav=$this->getNavBarIds($explode[0]);
        $data['singleOfferData']=DB::table('offer')
            ->where('offer.uid',$offer_id)
            ->leftJoin('region','region.uid','offer.region')
            ->leftJoin('touroperator','touroperator.uid','offer.touroperator')
            ->select('offer.*','region.title as region_title','touroperator.terms as to_terms','touroperator.cancellationterms as to_cancellationterms')
            ->get();

        if($data['singleOfferData'][0]->deleted==1 || $data['singleOfferData'][0]->hidden==1){
            return $this->get410($request);
        }

        $title=$data['singleOfferData'][0]->title." | Meinweekend";
        $meta['description']=$data['singleOfferData'][0]->meta_description;
        $meta['title']=$data['singleOfferData'][0]->title;
        $meta['image']='https://www.meinweekend.ch/fileadmin/img/logo.png';
        $meta['url']="https://www.meinweekend.ch/".$offer_id."/".str_replace(" ","-",$data['singleOfferData'][0]->title);
        for($i=0;$i<count($data['singleOfferData']);$i++){
            $data['singleOfferData'][0]->person_type=$this->checkUnit($data['singleOfferData'][0]->uid,0);

            $prices=DB::table('price')
                ->leftJoin('options','price.selected_option','options.uid')
                ->where([['price.offer',$data['singleOfferData'][$i]->uid],['price.hidden',0],['price.deleted',0],['price.closed',0],['adult_price','!=',0]])
                ->orderBy('price.sorting','asc')
                ->get();
            if(count($prices)>0){
                $currency=$prices[0]->currency;
            }
            if($data['singleOfferData'][0]->endtime==0){
                $dates=DB::table('price')
                    ->where('offer',$data['singleOfferData'][0]->uid)
                    ->select('datelist','datelist_closed')
                    ->get();
            }

            $convertedDate=[];

            $additionals=DB::table('additional')
                ->leftJoin('options','additional.selected_option','options.uid')
                ->where([['additional.offer',$data['singleOfferData'][$i]->uid],['additional.deleted',0],['additional.hidden',0]])
                ->orderBy('additional.sorting','desc')
                ->get();

            $images=DB::table('images2')
                ->where([['offer',$data['singleOfferData'][$i]->uid],['deleted',0]])
                ->select('image as identifier')
                ->orderBy('sorting')
                ->get();
            // for($l=0;$l<count($images);$l++){
            //     $exploded=explode('.',$images[$l]->identifier);
            //     $ext=strtolower($exploded[1]);
            //     $images[$l]->identifier=$exploded[0].".".$ext;
            // }
            $relatedOffer=$data['singleOfferData'][$i]->related_offer;

            $similar=DB::table('offer')
                ->whereRaw("find_in_set (uid, '".$relatedOffer."')")
                ->select('offer.title as related_offer_title','subtitle','hasspeciallistsettings','special_list_currency','special_list_price','offer.bodytext as related_offer_bodytext','offer.day as related_offer_days','offer.night as related_offer_nights','offer.uid',
                    DB::raw('(SELECT image from images2 where offer=offer.uid order by sorting limit 1) as related_offer_image'),
                    DB::raw('(SELECT value_alias from tx_realurl_uniqalias where value_id=offer.uid and tablename="tx_travel_domain_model_offer" and field_alias="title_url" order by uid desc limit 1) as link_name'),
                    DB::raw("(SELECT adult_price from price where price.offer=offer.uid and price.hidden=0 and price.deleted=0 and price.closed=0 order by sorting asc limit 1) as related_offer_price"))
                ->get();

            $data['singleOfferData'][$i]->calendar=$this->checkDates($data['singleOfferData'][$i]->uid);
            $data['singleOfferData'][$i]->images=$images;
            $data['singleOfferData'][$i]->prices=$prices;
            $data['singleOfferData'][$i]->additionals=$additionals;
            $data['singleOfferData'][$i]->related_offers=$similar;
            $data['singleOfferData'][$i]->dates=$convertedDate;
            $data['singleOfferData'][$i]->informacion=$this->convertToTable($data['singleOfferData'][$i]->informacion);
            $data['singleOfferData'][$i]->priceinfo=$this->fixRsandNs($data['singleOfferData'][$i]->priceinfo);
            $data['singleOfferData'][$i]->bodytext=$this->fixBodyText($data['singleOfferData'][$i]->bodytext);

        }
        $categoryId=explode(',',$data['singleOfferData'][0]->categories);
        $data['viewData']=$request->data;
        $data['exchange']=DB::table('currency')->where('uid',1)->value('value');
        $data['s_currency']=DB::table('price')->where('offer',$data['singleOfferData'][0]->uid)->value('currency');

        if($request->isNavigate==0) {
            $dataView=View::make('offerpage')
                ->with('allData',$data)
                ->with('currency',$currency)
                ->with('filteredNav',$filteredNav)
                ->with('blue',1)
                ->with('data',$this->getData())
                ->render();

            return view('index')
                ->with('data',$this->getData())
                ->with('meta',$meta)
                ->with('dataView',$dataView)
                ->with('isNavigate',$request->isNavigate);
        }else{
            $view=View::make('offerpage')
                ->with('data',$this->getData($categoryId[0]))
                ->with('allData',$data)
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('blue',1)
                ->with('currency',$currency)
                ->with('isNavigate',$request->isNavigate)
                ->with('filteredNav',$filteredNav)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }

    public function getOfferPageSEO(Request $request,$offerUrl,$callBack=0)
	{


        //trekking-reiten-im-westernstyle
	    Session::forget('tableSelPrices');
        Session::forget('selectedPrices');
        Session::forget('firstTable');
        Session::forget('userContactForm');
        Session::forget('isAdditinalNight');
        //return $offerUrl;
        $currency=0;
        $offer_url=$offerUrl;
        //echo $offer_url;die;
        //$title_for_link=str_replace("-"," ",$offerUrl);
        $offer_id_from_db = DB::table('tx_realurl_uniqalias')
            ->where([['tablename','tx_travel_domain_model_offer'],['value_alias',$offerUrl]])
            ->leftJoin('offer','offer.uid','tx_realurl_uniqalias.value_id')
            ->orderBy('tx_realurl_uniqalias.uid','desc')
            ->limit(1)
            ->select('value_id')
            ->get();
        if(count($offer_id_from_db)>0){
            $offer_id=$offer_id_from_db[0]->value_id;
            $checkIfDeleted=DB::table('offer')->where([['uid',$offer_id],['deleted',1]])->orWhere([['uid',$offer_id],['hidden',1]])->count();
            if($checkIfDeleted>0){
                return $this->get410($request);
            }
        }else if($callBack==0){
            $offer_url=str_replace('ue','ü',$offer_url);
            $offer_url=str_replace('oe','ö',$offer_url);
            $offer_url=str_replace('ae','ä',$offer_url);
            // return redirect()->action('mainController@getOfferPageSEO',['offerUrl'=>$offer_url,'callBack'=>1]);
            return $this->getOfferPageSEO($request,$offer_url,1);
        }else if($callBack==1){
            $offer_url=$this->fixLinks($offer_url);
            // return redirect()->action('mainController@getOfferPageSEO',['offerUrl'=>$offer_url,'callBack'=>1]);
            return $this->getOfferPageSEO($request,$offer_url,2);
        }else if($callBack==2){
            return $this->get404($request);
            // return redirect('/');
        }


        //return $offer_id;
        //$title_for_link2=str_replace("/","-",$title_for_link);
        //$data['offerData'][$i]->title_link=$title_for_link2;
        //$offer_id=DB::table('offer')->where('title',$title_for_link)->value('uid');
        $catId=DB::table('offer')->where('uid',$offer_id)->value('categories');
        $explode=explode(',',$catId);
        $filteredNav=$this->getNavBarIds($explode[0]);
        $data['singleOfferData']=DB::table('offer')
            ->where('offer.uid',$offer_id)
            ->leftJoin('region','region.uid','offer.region')
            ->leftJoin('touroperator','touroperator.uid','offer.touroperator')
            ->select('offer.*','region.title as region_title','touroperator.terms as to_terms','touroperator.cancellationterms as to_cancellationterms','offer.title_tag as titletag')
            ->get();

        $title=$data['singleOfferData'][0]->title_tag;
        if(!$title) {
            $title = $data['singleOfferData'][0]->title;
        }

        /*while (strlen($title) >= 65) {
            $title_parts = explode('|', $title);
            $title1 = '';
            for ($i=0; $i <sizeof($title_parts)-2 ; $i++) {
                $title1 .= $title_parts[$i].' |';
            }
            $title = $title1;
        }*/

        $meta['description']=$data['singleOfferData'][0]->meta_description;
        // $meta['title']=$data['singleOfferData'][0]->title;
        // $meta['image']='https://www.meinweekend.ch/fileadmin/img/logo.png';
        // $meta['url']="https://www.meinweekend.ch/".$offer_id."/".str_replace(" ","-",$data['singleOfferData'][0]->title);
        for($i=0;$i<count($data['singleOfferData']);$i++){
            $data['singleOfferData'][0]->person_type=$this->checkUnit($data['singleOfferData'][0]->uid);

            $prices=DB::table('price')
                ->leftJoin('options','price.selected_option','options.uid')
                ->where([['price.offer',$data['singleOfferData'][$i]->uid],['price.hidden',0],['price.deleted',0],['price.closed',0],['adult_price','!=',0]])
                ->orderBy('price.sorting','asc')
                ->get();
            if(count($prices)>0){
                $currency=$prices[0]->currency;
            }
            if($data['singleOfferData'][0]->endtime==0){
                $dates=DB::table('price')
                    ->where('offer',$data['singleOfferData'][0]->uid)
                    ->select('datelist','datelist_closed')
                    ->get();
            }

            $convertedDate=[];

            $additionals=DB::table('additional')
                ->leftJoin('options','additional.selected_option','options.uid')
                ->where([['additional.offer',$data['singleOfferData'][$i]->uid],['additional.deleted',0],['additional.hidden',0]])
                ->orderBy('additional.sorting','desc')
                ->get();

            $images=DB::table('images2')
                ->where([['offer',$data['singleOfferData'][$i]->uid],['deleted',0],['hidden',0]])
                ->select('image as identifier','title')
                ->orderBy('sorting')
                ->get();

            $relatedOffer=$data['singleOfferData'][$i]->related_offer;

            $similar=DB::table('offer')
                ->whereRaw("find_in_set (uid, '".$relatedOffer."') and hidden=0 and deleted=0")
                ->select('offer.title as related_offer_title','subtitle','hasspeciallistsettings','special_list_currency','special_list_price','offer.bodytext as related_offer_bodytext','offer.day as related_offer_days','offer.night as related_offer_nights','offer.uid',
                    DB::raw('(SELECT image from images2 where offer=offer.uid and hidden=0 and deleted=0 order by sorting limit 1) as related_offer_image'),
                    DB::raw('(SELECT value_alias from tx_realurl_uniqalias where value_id=offer.uid and tablename="tx_travel_domain_model_offer" order by uid desc limit 1) as link_name'),
                    DB::raw("(SELECT adult_price from price where price.offer=offer.uid and price.hidden=0 and price.deleted=0 and price.closed=0 order by sorting asc limit 1) as related_offer_price"))
                ->get();
            foreach($similar as &$s){
                $string=$s->link_name;
                //method on Controller.php
                $s->link_name=$this->fixLinks($string);
            }
            $data['singleOfferData'][$i]->calendar=$this->checkDates($data['singleOfferData'][$i]->uid);
            $data['singleOfferData'][$i]->images=$images;
            $data['singleOfferData'][$i]->prices=$prices;
            $data['singleOfferData'][$i]->additionals=$additionals;
            $data['singleOfferData'][$i]->related_offers=$similar;
            $data['singleOfferData'][$i]->dates=$convertedDate;
            $data['singleOfferData'][$i]->informacion=$this->convertToTable($data['singleOfferData'][$i]->informacion);
            $data['singleOfferData'][$i]->priceinfo=$this->fixRsandNs($data['singleOfferData'][$i]->priceinfo);
            $data['singleOfferData'][$i]->bodytext=$this->fixBodyText($data['singleOfferData'][$i]->bodytext);
        }
		
        $categoryId=explode(',',$data['singleOfferData'][0]->categories);
        $data['viewData']=$request->data;
        $data['exchange']=DB::table('currency')->where('uid',1)->value('value');
        $data['s_currency']=DB::table('price')->where('offer',$data['singleOfferData'][0]->uid)->value('currency');
        $getData=$this->getData();
        $getData['title_tag']=$data['singleOfferData'][0]->titletag;
		
        if($request->isNavigate==0) {
            $dataView=View::make('offerpage')
                ->with('allData',$data)
                ->with('currency',$currency)
                ->with('filteredNav',$filteredNav)
                ->with('blue',1)
                ->with('title_tag',$getData['title_tag'])
                ->with('data',$getData)
                ->with('offerUrl',$offerUrl)
                ->render();

            //echo "the title:".$title;

            return view('index')
                ->with('data',$getData)
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('dataView',$dataView)
                ->with('isNavigate',$request->isNavigate);
        }else{
            $view=View::make('offerpage')
                ->with('data',$this->getData($categoryId[0]))
                ->with('allData',$data)
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('blue',1)
                ->with('currency',$currency)
                ->with('offerUrl',$offerUrl)
                ->with('isNavigate',$request->isNavigate)
                ->with('filteredNav',$filteredNav)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();

            return response()->json(['view'=>$view,'metaView'=>$metaView,'title_tag'=>$getData['title_tag']]);
        }
    }

    public function redirectOffer1($offer){
//        return redirect('/ausflug/'.$offer);
    }

    public function fixRsandNs($string){
        return $string;
        $newString=explode('</h2>',$string);
        if(count($newString)>1){
            $split=preg_split('/\n|\r\n?/',$newString[1]);
            $finalString='';
            for($i=1;$i<count($split);$i++){
                $finalString.="<p>".$split[$i]."</p>";
            }
            $finalString=str_replace('*','*&nbsp;',$finalString);
            // $finalString=str_replace('*  ','*&nbsp;',$finalString);
            return $newString[0].'</h2>'.$finalString;
        }else{
            return $string;
        }

        $finalString=str_replace('</p><br/><p>','</p><p>',$finalString);
        $finalString=str_replace('<br><br>','<br/>',$finalString);
        $finalString=str_replace('<br/><br/>','<br/>',$finalString);
        $finalString=str_replace('<br/><br>','<br/>',$finalString);
        $finalString=str_replace('<br><br/>','<br/>',$finalString);
        $finalString=str_replace('</br></br/>','<br/>',$finalString);
        // $finalString=str_replace('<br/><br/>','<br/>',$finalString);
        // $finalString=str_replace('*  ','* ',$finalString);
        return $newString[0]."</h2>".$finalString;
    }

    public function fixBodyText($string){
        $newString=str_replace(['.<strong>','. <STRONG>'],'.<br><br><strong>',$string);
        $newString=str_replace(['.<b>','. <b>'],'.<br><br><b>',$string);
        return $newString;
    }

    public function regoverview(){
        $cats=DB::table('category as catA')
            ->leftJoin('category as catB','catB.parent','catA.uid')
            ->select('catA.title','catA.uid','catB.title ctitle','catB.uid as cuid')
            ->get();
        return view('catoverview')->with('cats',$cats);
    }

    protected function checkUnit($offer,$hasspeciallist=1){
        $specialList=DB::table('offer')->where('uid',$offer)->get();
        $pt=$specialList[0]->person_type;
        if($hasspeciallist==1){
            if($specialList[0]->hasspeciallistsettings==1){
                if($specialList[0]->special_list_person_type==99){
                    return $specialList[0]->special_list_person_type_text;
                }else{
                    $pt=$specialList[0]->special_list_person_type;
                }
            }
        }


        switch($pt){
            case(0):
                return "Person";
                break;
            case(1):
                return "Yacht";
                break;
            case(2):
                return "Zimmer";
                break;
            case(3):
                return "Package";
                break;
            case(4):
                return "Familien-Package";
                break;
            case(98):
                return "Pauschale";
                break;
            case(99):
                return DB::table('offer')->where('uid',$offer)->value('person_type_text');
                break;
            default:
                return " ";

        }
    }

    public function checkDates($offer){
        // return DB::table('price')->where([['adult_price',0],['enddate','>',time()]])->limit(80)->get();
        $prices=DB::table('price')->where([['offer',$offer],['closed',0],['hidden',0],['deleted',0],['adult_price','!=','0']])->get();
        $days=['sunday','monday','thusday','wednesday','thursday','friday','saturday'];
        $available=[];
        $cd=[];
        $od=[];
        $opened=[];
        $closed=[];
        $showCalendar=1;
        $day_available_int=[];
        //get available days
        for($i=0;$i<count($days);$i++){
            $query=DB::table('price')->where([[$days[$i],1],['enddate','>',time()],['offer',$offer],['closed',0],['hidden',0],['deleted',0],['adult_price','!=','0']])->count();
            if($query>0){
                $available[$i]=1;
            }else{
                $available[$i]=0;
            }
        }
        //$open_dates=DB::table('price')->where('offer',$offer)->value('datelist_new');
        //get list of closed and open days
	 $openDatesCount=DB::table('price')->where('offer',$offer)->where('datelist_new', '!=', '')->count();
//strlen($open_dates)>0
        if(array_sum($available)>0 || $openDatesCount>0){
            //get all prices with value more than 0
            $allPrices=DB::table('price')->where([['offer',$offer],['closed',0],['hidden',0],['deleted',0],['adult_price','!=',0]])->select('datelist_new','datelist_closed_new','selected_option','adult_price')->get();
            //get prices that have 0 value
            $zeroPrices=DB::table('price')->where([['offer',$offer],['hidden',0],['deleted',0],['adult_price',0]])->select('selected_option','uid','startdate','enddate')->get();
            $closedDates=[];
            foreach($zeroPrices as $zp){
                for($i=0;$i<count($allPrices);$i++){
                    //if the price with value more than 0 shareeckDates the same option with the one that has 0 value
                    if($allPrices[$i]->selected_option==$zp->selected_option){
                        //the price is gonna start when the 0 price ends
                        date_default_timezone_set("Europe/Zurich");
                        $startdatee=Carbon::createFromTimeStamp($zp->startdate)->format('d-m-Y');
                        $enddatee=Carbon::createFromTimeStamp($zp->enddate)->format('d-m-Y');
                        $startdate=new Carbon($startdatee);
                        $enddate=new Carbon($enddatee);
                        //generateDateRange on Controller.php
                        $closedDates[]= $this->generateDateRange($startdate,$enddate);

                    }
                }
            }

            for($i=0;$i<count($allPrices);$i++){
                $cd[]= explode(',',$allPrices[$i]->datelist_closed_new);
                $od[]= explode(',',$allPrices[$i]->datelist_new);
            }
            $cd[]=$closedDates;
            $cd=array_flatten($cd);
            $od=array_flatten($od);
            for($i=0;$i<count($od);$i++){
                if($od[$i]=='' || $od[$i]=='\r\n' || strlen($od[$i])<8){
                    unset($od[$i]);
                    continue;
                }

            }

            for($i=0;$i<count($cd);$i++){
                if(in_array($cd[$i],$od)){
                    unset($cd[$i]);
                    continue;
                }
            }

            //methods on Controller.php
            $closed=$this->validateClosedDays($cd,$offer);
            $opened=$this->validateOpenedDays($od,$offer);
            // return $closed;

        }
        //get min a max date of prices
        $min=DB::table('price')->where([['offer',$offer],['closed',0],['hidden',0],['deleted',0],['adult_price','!=',0]])->min('startdate');
        $max=DB::table('price')->where([['offer',$offer],['closed',0],['hidden',0],['deleted',0],['adult_price','!=',0]])->max('enddate');

        $max=strtotime('tomorrow',$max);

        $calendarValid=1;
        if($max<time()){
            $calendarValid=0;
            $max=strtotime('midnight',$max);
        }
        if($min<time()){
            $min=time()-43000;
        }else{
            $min=strtotime('midnight',$min);
        }
        $newAv=[];
        foreach($available as $k=>$v){
            if($v==0){
                $newAv[]=$k;
            }
        }

        if(count($opened)==0 && $max<time()){
            $showCalendar=0;
        }
        $firstOpenDate=$this->getFirstOpenDate($offer);
        return ['availableDays'=>$newAv,'min'=>$min,'max'=>$max,'od'=>$opened,'cd'=>$closed,'calendarValid'=>$calendarValid,'showCalendar'=>$showCalendar,'firstOpenDate'=>$firstOpenDate];

    }

    public function listOffers(Request $request,$region_link='alle',$offer_type_link='alle',$duration_link='alle',$keyword_link='alle',$mainCat=0,$no_index = "no"){
        // echo $request."~~".$region_link."~~".$offer_type_link."~~".$duration_link."~~".$keyword_link."~~".$mainCat;exit;
	$meta=[];
        $title='Alle Erlebnisse';
        $categoryName='Erlebnis-Schweiz';
        $bindings=[];
        $offer_type='(offer.categories>=0 or offer.categories!="")';
        $region='offer.region>=0';
        $day='offer.day>=0';
        $night='offer.night>=0';
        $keyword='(offer.title IS NOT NULL)';
        $parameters=[];
        $region_name='';
        $redText='Alle Erlebnisse';
        $filteredNav=[];
        $regionId=0;
        $category_link='';
        $category_id=0;
        $isMainCat=false;
        $parentCategory=0;
        $data=$this->getData();
        $canonical_link='https://meinweekend.ch/'.$category_link;
        if($mainCat==5000){
            return $this->get404($request);
            // return redirect('/');
        }
        if($mainCat!=0){
            $filNav=$this->getNavBarIds($mainCat);
            $parentCategory=$filNav['gjyshiStatik'];

        }
        if($no_index == "yes"){
            $meta['robots'] = "noindex";
        }
        if($offer_type_link!='alle'){
            $getCategoryId=$this->getCategoryId($parentCategory,$offer_type_link);

            if(count($getCategoryId)==0){
                if($offer_type_link=='tagesausflug'){
                    $getCategoryId=array(2);
                }else if($offer_type_link=='gruppenausfluege'){
                    $getCategoryId=array(3);
                }else if($offer_type_link=='weekend'){
                    $getCategoryId=array(1);
                }
                $isMainCat=true;
            }

            if(count($getCategoryId)>0){
                $filteredNav=$this->getNavBarIds($getCategoryId[0]);
                $categoryName=$filteredNav['gsName'];
                $redText=$categoryName;
                $category_link=$filteredNav['name_for_link'];
                $parent_name=$this->getParentName($filteredNav['gjyshiStatik']);
                if($parent_name==$category_link){
                    $canonical_link='https://meinweekend.ch/'.$category_link;
                }else{
                    $canonical_link='https://meinweekend.ch/'.$parent_name.'/'.$category_link;

                }
                $category_id=$getCategoryId[0];
                $catName=DB::table('category')->where('uid',$getCategoryId[0])->select('description_meta','title_tag','title')->get();
                // return $catName;
                //set metadata

                $meta['description']=$catName[0]->description_meta;

                if($isMainCat){
                    $title=ucfirst($offer_type_link);
                }else{
                    strlen($catName[0]->title_tag)>0?$title=$catName[0]->title_tag:$title=$catName[0]->title;
                }
                $data['title_tag']=$catName[0]->title_tag;
                $getChildCategories=DB::table('category as catA')
                    ->leftJoin('category as catB','catB.parent','catA.uid')
                    ->whereRaw("(catB.parent=$getCategoryId[0] or catB.parent in (SELECT uid from category where parent=$getCategoryId[0])) and catB.hidden=0 and catB.deleted=0")
                    ->pluck('catB.uid');
                if($isMainCat){
                    //Controller.php
                    $getChildCategories=$this->getChildCategories($getCategoryId[0]);
                    $category_link='';
                }
                if(count($getChildCategories)>0){
                    $offer_type="FIND_IN_SET($getCategoryId[0],offer.categories)";
                    for($i=0;$i<count($getChildCategories);$i++){
                        $offer_type.=" or FIND_IN_SET ($getChildCategories[$i],offer.categories)";
                    }
                }else if(count($getCategoryId)>0){
                    $offer_type="find_in_set($getCategoryId[0],offer.categories)";
                }
            }else{
                return $this->get404($request);
                // return redirect('/');
            }
            array_push($parameters,$offer_type_link);
        }

        if($region_link!='alle'){
            $getRegionId=DB::table('tx_realurl_uniqalias')
                ->where([['tablename','tx_travel_domain_model_region'],['value_alias',$region_link]])
                ->orderBy('uid','desc')
                ->limit(1)
                ->pluck('value_id');
            // return $getRegionId;
            

            if(count($getRegionId)>0){
                $region_name=DB::table('region')->where('uid',$getRegionId[0])->value('title');
                if(strlen($title)>0){
                    $title.=" - ".$region_name;
                }else{
                    $title=$region_name;
                }
                if(strlen($redText)==0){
                    $redText.=$region_name;
                }else{
                    $redText.=' - '.$region_name;
                }
                // return $region_name;
//            } else {
//                return redirect()->route('home');
            }
            if(count($getRegionId)>0){
                $subregionIds=[];
                $regionId=$getRegionId[0];
                $getSubRegionIds=DB::table('region')
                    ->where([['parent',$getRegionId[0]],['hidden',0],['deleted',0]])
                    ->pluck('uid');
                $region=" FIND_IN_SET($getRegionId[0],offer.region)";
                for($i=0;$i<count($getSubRegionIds);$i++){
                    $region.=" OR FIND_IN_SET($getSubRegionIds[$i],offer.region)";
                }
            }
            array_push($parameters,$region_link);

        }
        if($duration_link!='alle'){
            $day='offer.day=?';
            if(strlen($redText)==0){
                $redText.=$duration_link;
            }else{
                $redText.=' - '.$duration_link;
            }
            if($duration_link>1){
                $redText.=' Tage';
            }else{
                $redText.=' Tag';
            }
            array_push($bindings,$duration_link);
        }

        if($keyword_link!='alle'){
            $keyword="(offer.title LIKE ? or offer.title_tag LIKE ? or offer.subtitle LIKE ? or offer.bodytext LIKE ?)";
            $word='%'.$keyword_link.'%';
            array_push($bindings,$word,$word,$word,$word);
            array_push($parameters,$keyword_link);
            if(strlen($redText)==0){
                $redText=$keyword_link;
            }else{
                $redText.=' - '.$keyword_link;
            }
        }
/** @to-see: query composition */
        $query="SELECT * from offer
            where offer.hidden=0 and offer.deleted=0 and ($offer_type) and ($region) and ($day and $night) and $keyword
            order by offer.sorting asc";
        // return $query;
        $data['offerData']=DB::select(DB::raw($query),$bindings);

        if(count($data['offerData'])==0){
            return $this->getNooffer($request,$regionId,$category_id);
        }

        $data['exchange']=DB::table('currency')->where('currency','euro')->value('value');
        for($i=0;$i<count($data['offerData']);$i++){
            $title_for_link=str_replace(" ","-",$data['offerData'][$i]->title);
            $title_for_link2=str_replace("/","-",$title_for_link);
            $title_for_link2 = DB::table('tx_realurl_uniqalias')->where([['tablename','tx_travel_domain_model_offer'],['value_id',$data['offerData'][$i]->uid]])->orderBy('uid','desc')->limit(1)->value('value_alias');
            $title_for_link2=$this->fixLinks($title_for_link2);
            $data['offerData'][$i]->title_link=$title_for_link2;
            $prices=DB::table('price')
                ->where([['offer',$data['offerData'][$i]->uid],['hidden',0],['deleted',0],['closed',0],['adult_price','!=',0]])
                ->orderBy('sorting')
                ->get();

            $additionals=DB::table('additional')
                ->where([['offer',$data['offerData'][$i]->uid],['deleted',0],['hidden',0]])
                ->get();

            $image=DB::table('images2')
                ->where([['offer',$data['offerData'][$i]->uid],['hidden',0],['deleted',0]])
                ->orderBy('sorting')
                ->limit(1)
                ->pluck('image');
            if(count($image)>0){
                $data['offerData'][$i]->image=$image[0];
            }else{
                $data['offerData'][$i]->image='';
            }

            $data['offerData'][$i]->region_image=DB::table('region')->where('uid',$data['offerData'][$i]->region)->value('image_region');

            $data['offerData'][$i]->prices=$prices;
            $data['offerData'][$i]->additionals=$additionals;
            $data['offerData'][$i]->personType=$this->checkUnit($data['offerData'][$i]->uid,1);
        }
        $data['viewData']=$request->data;
        $cat_seo=['',''];
        if($region_link=='alle'){
            $seo=DB::table('category')->where('uid',$category_id)->value('seo');
            $cat_seo=explode('###COLUMNS###',$seo);
        }
        if($request->isNavigate==0) {
            $viewData=View::make('offers')
                ->with('region_name',$region_name)
                ->with('parameters',$parameters)
                ->with('data',$data)
                ->with('redText',$redText)
                ->with('cat_seo',$cat_seo)
                ->with('category_link',$category_link)
                ->with('filteredNav',$filteredNav)
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('blue',1)
                ->with('canoical',$canonical_link)

                ->with('offerData',$data['offerData'])
                ->with('isNavigate',$request->isNavigate)
                ->with('categoryName',$categoryName)
                ->render();
            return view('index')
                ->with('dataView',$viewData)
                ->with('data',$data)
                ->with('meta',$meta)
                ->with('canoical',$canonical_link)
                ->with('title',$title.' - MeinWeekend.ch')
                ->with('isNavigate',$request->isNavigate);

        }else if($request->isNavigate==1){
            $view= View::make('offers')
                ->with('region_name',$region_name)
                ->with('parameters',$parameters)
                ->with('data',$data)
                ->with('redText',$redText)
                ->with('cat_seo',$cat_seo)
                ->with('meta',$meta)
                ->with('category_link',$category_link)
                ->with('blue',1)
                ->with('canoical',$canonical_link)
                ->with('filteredNav',$filteredNav)
                ->with('title',$title)
                ->with('categoryName',$categoryName)
                ->with('offerData',$data['offerData'])
                ->with('isNavigate',$request->isNavigate)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('canoical',$canonical_link)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView,'title_tag'=>$data['title_tag']]);
        }
    }

    public function getNavBarIds($id){
        if($id==0){
            return false;
        }
        if($id<4){
            $children=DB::table('category')
                ->where('parent',$id)
                ->get();

            $nipat=DB::table('category')
                ->where('parent',$children[0]->uid)
                ->get();

            return [
                'gjyshiStatik'=>$id,

                'gjyshi'=>$children[0]->uid,

                'nipat'=>$nipat,

                'selected'=>$children[0]->uid,

                'selectedChild'=>0,

                'gsName'=>DB::table('category')->where('uid',$id)->value('title'),

                'name_for_link'=>DB::table('tx_realurl_uniqalias')->where([['tablename','tx_travel_domain_model_category'],['field_alias','title_url'],['value_id',$id]])->orderBy('uid','desc')->limit(1)->value('value_alias')
            ];
        }
        $getSecondCats=DB::table('category')->whereIn('parent',[1,2,3])->where([['hidden',0],['deleted',0]])->pluck('uid');

        if(in_array($id,json_decode($getSecondCats))){
            //second category is selected
            return [
                'gjyshiStatik'=>DB::table('category')->where('uid',$id)->value('parent'),

                'gjyshi'=>$id,

                'nipat'=>DB::table('category')->where('parent',$id)->pluck('uid'),

                'selected'=>$id,

                'selectedChild'=>0,

                'gsName'=>DB::table('category')->where('uid',$id)->value('title'),

                'name_for_link'=>DB::table('tx_realurl_uniqalias')->where([['tablename','tx_travel_domain_model_category'],['field_alias','title_url'],['value_id',$id]])->orderBy('uid','desc')->limit(1)->value('value_alias')

            ];

        }else{
            //third category is selected
            $secParent=DB::table('category')->where('uid',$id)->value('parent');
            return [
                'gjyshiStatik'=>DB::table('category')->where('uid',$secParent)->value('parent'),

                'gjyshi'=>$secParent,

                'nipat'=>DB::table('category')->where('parent',$secParent)->pluck('uid'),

                'selected'=>$secParent,

                'selectedChild'=>$id,

                'gsName'=>DB::table('category')->where('uid',$id)->value('title'),

                'name_for_link'=>DB::table('tx_realurl_uniqalias')->where([['tablename','tx_travel_domain_model_category'],['field_alias','title_url'],['value_id',$id]])->orderBy('uid','desc')->limit(1)->value('value_alias')

            ];

        }

    }

    public function getReservationPage(Request $request){
        $title='Reservation';
        $meta['description']="Reservation";
        $view=View::make('reservations')
            ->with('data',$request->data)
            ->with('isNavigate',$request->isNavigate)
            ->with('meta',$meta)
            ->with('title',$title)
            ->render();
        if($request->isNavigate==0){
            return view('index')
                ->with('dataView',$view)
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('isNavigate',$request->isNavigate)
                ->with('data',$this->getData());
        }else{

            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }

    }

    public function reserVationtoPdf(Request $request,$uid){
        $data=DB::table('purchases')
            ->leftJoin('tx_backoffice_application_frontenduser_mm','tx_backoffice_application_frontenduser_mm.uid_local','purchases.uid')
            ->leftJoin('fe_users','fe_users.uid','tx_backoffice_application_frontenduser_mm.uid_foreign')
            ->where('purchases.uid',$uid)
            ->select('purchases.*','purchases.offer_title as offertitle','fe_users.*','purchases.crdate as created_at' )
            ->get();
        return view('reservations')->with('allData',$data);
    }

    public function voucherInvoicePdf(Request $request,$uid){
        $data=DB::table('vauchers')
            ->leftJoin('fe_users','fe_users.uid','vauchers.customer_id')
            ->where('vauchers.uid',$uid)
            ->select('vauchers.*','vauchers.crdate as v_cdate','vauchers.uid as vid','fe_users.*')
            ->get();
        $user_payment='Rechnung';
        if($data[0]->user_payment!='Rechnung'){
            $user_payment='Rechnung / Zahlungsbestätigung';
        }
        return view('voucherPDF')->with('data',$data)->with('user_payment',$user_payment);

    }

    public function generateOfferVaucherPdf($vid,$save=0){
        // DB::enableQueryLog();
        $data=DB::table('vauchers')
            ->join('offer','offer.uid','vauchers.offer')
            ->join('offer_vauchers','vauchers.uid','offer_vauchers.uid_foreign')
            ->where('vauchers.uid',$vid)
            ->select('vauchers.*','offer.included','offer_vauchers.informacion','offer.title as offer_title','offer_vauchers.vaucher_template_offer','vauchers.crdate as v_cdate','vauchers.uid as vid')
            ->orderBy('offer_vauchers.uid','desc')
            ->limit(1)
            ->get();
        // return $data;
        switch($data[0]->vaucher_template_offer){
            case(0):
                $images=DB::table('images2')->where('offer',$data[0]->offer)->orderBy('sorting')->limit(3)->select('image')->get();
                break;
            case(1):
                $images=DB::table('images2')->where('offer',$data[0]->offer)->orderBy('sorting')->limit(1)->select('image')->get();
                break;
            case(2):
                $images=DB::table('images2')->where('offer',$data[0]->offer)->orderBy('sorting')->skip(1)->take(1)->select('image')->get();
                break;
            case(3):
                $images=DB::table('images2')->where('offer',$data[0]->offer)->orderBy('sorting')->skip(2)->take(1)->select('image')->get();
                break;
        }

        // $data[0]->informacion=$this->convertToTable($data[0]->informacion);

        $view=View::make('offerVaucherPDF')->with('data',$data)->with('images',$images);
        if($save==2){
            return $view;
        }
        $pdf=PDF::loadHtml($view);

        if($save==1){
            $pdf->save(public_path('assets/documents/Gutschein_'.$vid.'.pdf'));
            return 'Gutschein_'.$vid.'.pdf';
        }else{
            return $pdf->download('Gutschein_'.$vid.'.pdf');
        }
    }

    public function offerVaucherInvoice($vid,$save=0){

        DB::enableQueryLog();
        $data=DB::table('vauchers')
            ->leftjoin('offer_vauchers','vauchers.uid','offer_vauchers.uid_foreign')
            ->leftjoin('fe_users','fe_users.uid','vauchers.customer_id')
            ->leftjoin('offer','offer.uid','vauchers.offer')
            ->where('vauchers.uid',$vid)
            ->select('offer.title as offer_titleV','offer.included','vauchers.*','offer.uid as offer_id','vauchers.crdate as v_cdate','fe_users.*','offer_vauchers.price_table','offer_vauchers.informacion','offer_vauchers.uid_foreign','vauchers.uid as vid')
            ->orderBy('offer_vauchers.uid','desc')
            ->limit(1)
            ->get();
        // return $data;
        $file_name='Rechnung';
        $payment_type='Rechnung';
        $currency=DB::table('price')->where('offer',$data[0]->offer_id)->value('currency');
        if($data[0]->user_payment!='Rechnung'){
            $payment_type.=' / Zahlungsbestätigung';
            $file_name='Zahlungsbestaetigung';
        }
        $view=View::make('offerVaucherInvoice')->with('data',$data)->with('currency',$currency)->with('user_payment',$payment_type);
        if($save==2){
            return $view;
        }
        $pdf=PDF::loadHtml($view);
        if($save==1){
            $pdf->save(public_path('assets/documents/'.$file_name.'_'.$vid.'.pdf'));
            return $file_name.'_'.$vid.'.pdf';
        }else{
            return $pdf->download('Vaucher-Invoice'.$vid.'.pdf');
        }
    }

    public function getNewsLetter(Request $request){
        $meta['description']='Abonnieren Sie unseren Newsletter und erhalten Sie regelmässig spannende Ideen für ein Erlebnis. Als Weekend, Tagesausflug oder als Gruppenausflüge in der Schweiz. Per direkter Buchung oder mit einem Geschenkgutschein. Zur Entspannung Romantik Weekend als Loveroom Weekend zu zweit oder Wellness Weekend. Aktiv als Weekend Package, Tagesausflug oder Gruppenausflüge mit Quad fahren, Helikopter fliegen, Rundflüge.';
        $title='Aktuelle Weekend-Angebote und Specials';
        if($request->isNavigate==0){
            return view('index')
                ->with('dataView',$this->handleRequest('newsletter'))
                ->with('isNavigate',$request->isNavigate)
                ->with('meta',$meta)

                ->with('title',$title)
                ->with('data',$this->getData());
        }else{
            $view=View::make('newsletter')
                ->with('data',$request->data)
                ->with('isNavigate',$request->isNavigate)
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }

    }

    public function getContact(Request $request){
        $meta['description']='Unsere Geschenkgutscheine sind mit attraktiven Bildern und Texten auf Ihr gewünschtes Erlebnis ausgestellt, und das ansprechende www.meinweekend.ch Design macht das Schenken zum vollen Erfolg.';
        $title="Meinweekend | Kontakt";
        $data=$this->getData();
        if($request->isNavigate==0){
            return view('index')
                ->with('dataView',$this->handleRequest('contact'))
                ->with('isNavigate',$request->isNavigate)
                ->with('meta',$meta)

                ->with('title',$title)
                ->with('data',$data);
        }else{
            $view=View::make('contact')
                ->with('data',$data)
                ->with('isNavigate',$request->isNavigate)
                ->with('meta',$meta)

                ->with('title',$title)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }

    public function getAbout(Request $request){
        $meta['description']="Unsere Geschenkgutscheine sind mit attraktiven Bildern und Texten auf Ihr gewünschtes Erlebnis ausgestellt, und das ansprechende www.meinweekend.ch Design macht das Schenken zum vollen Erfolg.";
        $title='Meinweekend | Über uns';
        $meta['title']="Über uns";
        $data=$this->getData();
        if($request->isNavigate==0){
            return view('index')
                ->with('dataView',$this->handleRequest('about'))
                ->with('isNavigate',$request->isNavigate)
                ->with('meta',$meta)

                ->with('title',$title)
                ->with('data',$data);
        }else{
            $view=View::make('about')
                ->with('data',$data)

                ->with('isNavigate',$request->isNavigate)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }

    public function getGiftCard03(Request $request){
        $title='Gift Card Step 3 | Meinweekend';
        $meta['description']='Gift Card Meinweekend, step 3';
        if($request->isNavigate==0){
            return view('index')
                ->with('dataView',$this->handleRequest('giftcard03'))
                ->with('isNavigate',$request->isNavigate)
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('data',$this->getData());
        }else{
            $view=View::make('giftcard03')
                ->with('data',$request->data)
                ->with('isNavigate',$request->isNavigate)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }

    public function getGroupOffer(Request $request,$oid,$date){
        $title="Ihre Gruppenanfrage";
        $offerName=DB::table('offer')->where([['uid',$oid],['hasgroupoffer',1]])->value('title');
        $meta['description']='';
        $data=$this->getData();
        $view=View::make('gruppenanfrage')
            ->with('data',$data)
            ->with('offerName',$offerName)
            ->with('date',$date)
            ->with('isNavigate',$request->isNavigate)
            ->render();
        if($request->isNavigate==0){
            return view('index')
                ->with('dataView',$view)
                ->with('offerName',$offerName)
                ->with('date',$date)
                 ->with('title',$title)
                ->with('isNavigate',$request->isNavigate)
                ->with('meta',$meta)
                ->with('data',$data);
        }else{
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }

    public function getGiftCard02(Request $request){
        $title='Gift Card Step 2 | Meinweekend';
        $meta['description']='Gift Card Meinweekend, step 2';
        if($request->isNavigate==0){
            return view('index')
                ->with('dataView',$this->handleRequest('giftcard02'))
                ->with('isNavigate',$request->isNavigate)
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('data',$this->getData());
        }else{
            $view=View::make('giftcard02')
                ->with('data',$request->data)
                ->with('isNavigate',$request->isNavigate)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }

    public function getNoOffer(Request $request,$region_id=0,$category=0){


        $meta['description']='Meinweekend.ch';
        $categoryImage='';
        $regionImage='';
        $categoryName=false;
        $title='';
        $regionName=false;
        $region_link='';
        $category_link='';
        $canoical='';
        $parent_category='';
        $data=$this->getData();
        $filteredNav=$this->getNavBarIds($category);
        if($region_id>0){
            $regionName=DB::table('region')->where('uid',$region_id)->value('title');
            $region_link=DB::table('tx_realurl_uniqalias')->where([['tablename','tx_travel_domain_model_region'],['value_id',$region_id]])->orderBy('uid','desc')->limit(1)->value('value_alias');

            $regionImage=DB::table('sys_file_reference')
                ->join('sys_file','sys_file.uid','sys_file_reference.uid_local')
                ->where([['uid_foreign',$region_id],['sys_file_reference.tablenames','tx_travel_domain_model_region']])
                ->orderBy('sorting_foreign')
                ->limit(1)
                ->value('sys_file.identifier');
            $title=$regionName." offers";

        }
        if($category>0){
            $categoryName=DB::table('category')->where('uid',$category)->value('title');
            $categoryNameTitle=DB::table('category')->where('uid',$category)->value('title_tag');
            $category_link=DB::table('tx_realurl_uniqalias')->where([['tablename','tx_travel_domain_model_category'],['value_id',$category],['field_alias','title_url'],['value_id','>',3]])->orderBy('uid','desc')->limit(1)->value('value_alias');
            $getNavbarIds=$this->getNavBarIds($category);
            $parent_name=$this->getParentName($getNavbarIds['gjyshiStatik']);
            if($parent_name!=$category_link){
                $canoical='https://www.meinweekend.ch/'.$parent_name.'/'.$category_link;
            }else{
                $canoical='https://www.meinweekend.ch/'.$parent_name;
            }
            $meta['description']=DB::table('category')->where('uid',$category)->value('description_meta');
            $parent_category=DB::table('category')->where('uid',$getNavbarIds['gjyshiStatik'])->value('title');
            $parent_category=strtolower($parent_category);
            $parent_category=str_replace('ü','ue',$parent_category);
            $categoryImage=DB::table('sys_file_reference')
                ->join('sys_file','sys_file.uid','sys_file_reference.uid_local')
                ->where([['uid_foreign',$category],['sys_file_reference.tablenames','tx_travel_domain_model_category']])
                ->orderBy('sorting_foreign')
                ->limit(1)
                ->value('sys_file.identifier');
            if(strlen($title)>0){
                $title=$categoryNameTitle."-".$title;
            }else{
                $title=$categoryNameTitle;
            }

            if($filteredNav){
                if($filteredNav['gjyshi']>3){
                    $data['nooffer']=1;
                }
            }

        }
	if (substr($categoryImage, 0, 1) !== '/') {
            $categoryImage = '/'.$categoryImage;
        }
        if (substr($regionImage, 0, 1) !== '/') {
            $regionImage = '/'.$regionImage;
        }
        $view= View::make('nooffer')
            ->with('data',$data)
            ->with('isNavigate',$request->isNavigate)
            ->with('regionImage',$regionImage)
            ->with('categoryImage',$categoryImage)
            ->with('category_id',$category)
            ->with('parent_category',$parent_category)
            ->with('filteredNav',$filteredNav)
            ->with('region_link',$region_link)
            ->with('canoical',$canoical)
            ->with('category_link',$category_link)
            ->with('regionName',$regionName)
            ->with('categoryName',$categoryName)
            ->render();
        $metaView=View::make('metaDataView')
            ->with('meta',$meta)
            ->with('title',$title)
            ->with('canoical',$canoical)

            ->render();
        if($request->isNavigate==0){
            return view('index')
                ->with('dataView',$view)
                ->with('isNavigate',$request->isNavigate)
                ->with('title',$title)
                ->with('canoical',$canoical)
                ->with('category_id',$category)
                ->with('parent_category',$parent_category)
                ->with('category_link',$category_link)
                ->with('filteredNav',$filteredNav)
                ->with('meta',$meta)
                ->with('data',$data);
        }else{
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }

    }

    public function getAgbPage(Request $request){
        $title='AGB';
        $meta['description']='';
        $data=$this->getData();
        $view=View::make('agbPage')
            ->with('data',$data)
            ->with('isNavigate',$request->isNavigate)
            ->render();
        $metaView=View::make('metaDataView')
            ->with('meta',$meta)
            ->with('title',$title)
            ->render();
        if($request->isNavigate==0){
            return view('index')
                ->with('dataView',$view)
                ->with('isNavigate',$request->isNavigate)
                ->with('title',$title)
                ->with('meta',$meta)
                ->with('data',$data);
        }else{
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }

    public function getImpressum(Request $request){
        $title='Impressum';
        $meta['description']='';
        $data=$this->getData();
        $view=View::make('impressum')
            ->with('data',$data)
            ->with('isNavigate',$request->isNavigate)
            ->render();
        $metaView=View::make('metaDataView')
            ->with('meta',$meta)
            ->with('title',$title)
            ->render();
        if($request->isNavigate==0){
            return view('index')
                ->with('dataView',$view)
                ->with('isNavigate',$request->isNavigate)
                ->with('title',$title)
                ->with('meta',$meta)
                ->with('data',$data);
        }else{
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }

    public function getDatenschutz(Request $request){
        $title='Datenschutz';
        $meta['description']='';
        $data=$this->getData();
        $view=View::make('datenschutz')
            ->with('data',$data)
            ->with('isNavigate',$request->isNavigate)
            ->render();
        $metaView=View::make('metaDataView')
            ->with('meta',$meta)
            ->with('title',$title)
            ->render();
        if($request->isNavigate==0){
            return view('index')
                ->with('dataView',$view)
                ->with('isNavigate',$request->isNavigate)
                ->with('title',$title)
                ->with('meta',$meta)
                ->with('data',$data);
        }else{
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }
    }


    /////////////////////////////////////////////////////////////////////////////////ADMIN////////////////////////////////////////////////////////////////////////////
    public function getEditOptionsForm($oid){
        $options=DB::table('options')
            ->where('uid',$oid)
            ->get();
        return view('forms/editOptionForm')->with('data',$options)->render();
    }

    public function editOfferForm($offer_id){
        $this->deleteTempImages();
        DB::table('temp_images')->where('session_id',Session::get('user')->uid)->delete();
        $offer=DB::table('offer')
            ->where('uid',$offer_id)
            ->get();
        // return dd($offer[0]->informacion);
        if(count($offer)==0){
            return "No offer";
            // return redirect()->back();
        }

        // if($offer[0]->endtime!=0 && $offer[0]->endtime<time()){
        //     return $this->editOfferForm($offer_id+1);

        // }
        $related=DB::table('offer')
            ->whereIn('uid',explode(',',$offer[0]->related_offer))
            ->select('uid','title')
            ->get();

        $prices=DB::table('price')
            ->where([['price.offer',$offer_id],['price.deleted',0]])
            ->leftJoin('options','options.uid','price.selected_option')
            ->select('price.*','options.title as otitle', 'options.subtitle')
            ->orderBy('sorting')
            ->get();
        // if(count($prices)==0){
        //     return $this->editOfferForm($offer_id+1);
        // }
        $additionals=DB::table('additional')
            ->where([['additional.offer',$offer_id],['deleted',0]])
            ->select('additional.*')
            ->orderBy('sorting')
            ->get();
        $options=DB::table('options')
            ->where('offer',$offer_id)
            ->get();
        $images=DB::table('images2')
            ->where([['offer',$offer_id],['deleted',0]])
            ->orderBy('sorting')
            ->get();
        $tourOperator=DB::table('offer')
            ->where('offer.uid',$offer_id)
            ->leftJoin('touroperator','offer.touroperator','touroperator.uid')
            ->pluck('touroperator.title','touroperator.uid')
            ->toArray();
        $regions=DB::table('offer')
            ->where('offer.uid',$offer_id)
            ->pluck('region')
            ->toArray();
        $getAllRegions=DB::table('region')
            ->where([['hidden',0],['deleted',0]])
            ->select('title','uid')
            ->get();
        $i=0;
        $regions= implode(',',$regions);
        $regions=explode(',',$regions);
        foreach($getAllRegions as $r){
            if(in_array($r->uid,$regions)){
                $select_regions[$i]['selected']=1;
            }else{
                $select_regions[$i]['selected']=0;
            }
            $select_regions[$i]['title']=$r->title;
            $select_regions[$i]['uid']=$r->uid;
            $i++;
        }

        $categories=DB::table('offer')
            ->where('offer.uid',$offer_id)
            ->pluck('categories')
            ->toArray();
        $getAllCategories=DB::table('category')
            ->whereRaw('hidden=0 and deleted=0 and uid not in (1,2,3)')
            ->select('title','uid','parent')
            ->get();
        $i=0;
        $categories= implode(',',$categories);
        $categories=explode(',',$categories);

        foreach($getAllCategories as $c){
            if(in_array($c->uid,$categories)){
                $selected_categories[$i]['selected']=1;
            }else{
                $selected_categories[$i]['selected']=0;
            }
            $selected_categories[$i]['title']=$c->title;
            $selected_categories[$i]['uid']=$c->uid;
            $selected_categories[$i]['parent']=$c->parent;

            $i++;
        }

        $person_type=
            [
                ['index'=>0,'name'=>'Pro Person','selected'=>0],
                ['index'=>1,'name'=>'Pro Yacht','selected'=>0],
                ['index'=>2,'name'=>'Pro Room','selected'=>0],
                ['index'=>3,'name'=>'Pro Package','selected'=>0],
                ['index'=>4,'name'=>'Pro Family Package','selected'=>0],
                ['index'=>98,'name'=>'Flat-rate','selected'=>0],
                ['index'=>99,'name'=>'Without Name','selected'=>0]
            ];
        $person_type2=
            [
                ['index'=>0,'name'=>'Pro Person','selected'=>0],
                ['index'=>1,'name'=>'Pro Yacht','selected'=>0],
                ['index'=>2,'name'=>'Pro Room','selected'=>0],
                ['index'=>3,'name'=>'Pro Package','selected'=>0],
                ['index'=>4,'name'=>'Pro Family Package','selected'=>0],
                ['index'=>98,'name'=>'Flat-rate','selected'=>0],
                ['index'=>99,'name'=>'Without Name','selected'=>0]
            ];

        for($i=0;$i<count($person_type);$i++){
            if($person_type[$i]['index']==$offer[0]->person_type){
                $person_type[$i]['selected']=1;
                break;
            }
        }
        for($i=0;$i<count($person_type2);$i++){
            if($person_type2[$i]['index']==$offer[0]->special_list_person_type){
                $person_type2[$i]['selected']=1;
                break;
            }
        }
        // return ['person_type'=>$person_type,'person_type2'=>$person_type2];


        return view('forms/editOffer')
            ->with('tourOperator',$tourOperator)
            ->with('related',$related)
            ->with('selected_categories',$selected_categories)
            ->with('selected_regions',$select_regions)
            ->with('offer',$offer)
            ->with('prices',$prices)
            ->with('additionals',$additionals)
            ->with('options',$options)
            ->with('images',$images)
            ->with('person_type',$person_type)
            ->with('person_type2',$person_type2)
            ->with('data',$this->getData());
    }

    public function listRegionsForEdit(){
        $search=[['deleted',0],['uid','>',0]];
        if(isset($_GET['search'])){
            $s=$_GET['search'];
            $search=[['deleted',0],['title','like',"%$s%"]];
        }
        $data=DB::table('region')
            ->where($search)
            ->orderBy('sorting')
            ->get();
        return view('forms/editRegionsList')
            ->with('data',$data);
    }

    public function listCategoriesForEdit(){
        $search=[['deleted',0],['uid','>',0]];
        if(isset($_GET['search'])){
            $s=$_GET['search'];
            $search=[['deleted',0],['title','like',"%$s%"]];
        }
        $data=DB::table('category')
            ->where($search)
            ->orderBy('sorting')
            ->get();
        return view('forms/editCategoriesList')
            ->with('data',$data);
    }

    public function listTourOperatorsForEdit($search=0){
        $search=[['deleted',0],['uid','>',0]];
        if(isset($_GET['search'])){
            $s=$_GET['search'];
            $search=[['deleted',0],['title','like',"%$s%"]];
        }
        $data=DB::table('touroperator')
            ->where($search)
            ->orderBy('crdate','desc')
            ->get();
        $get=0;
        return view('forms/editTourOperatorsList')
            ->with('data',$data)
            ->with('get',$get);
    }

    public function listVouchersForEdit(){
        $data=DB::table('vaucher_templates')
            ->orderBy('sorting','asc')
            ->get();
        return view('forms/editVouchersList')
            ->with('data',$data);
    }

    public function editVoucherForm($vid){
        $data=DB::table('vaucher_templates')
            ->where('uid',$vid)
            ->get();
        return view('forms/editVoucherForm')->with('data',$data);
    }

    public function editBeUser($uid){
        $data=DB::table('be_users')->where('uid',$uid)->get();
        return view('forms/editBeUser')->with('data',$data);
    }

    public function editUser($uid){
        $data=DB::table('fe_users')
            ->where('uid',$uid)
            ->leftJoin('tx_backoffice_application_frontenduser_mm','tx_backoffice_application_frontenduser_mm.uid_foreign','fe_users.uid')
            ->select('fe_users.*','tx_backoffice_application_frontenduser_mm.uid_local as bookingId')
            ->orderBy('fe_users.uid','desc')
            ->limit(1)
            ->get();
        return view('forms/editUser')->with('data',$data);
    }

    public function editTourOperatorForm($tid){
        $data=DB::table('touroperator')
            ->where('uid',$tid)
            ->get();
        return view('forms/editTourOperatorForm')->with('data',$data);
    }

    public function editRegionForm($region_id){
        $pics=DB::table('temp_images')->where('session_id',Session::get('user')->uid)->get();
        foreach($pics as $p){
            File::delete('assets/temp_images/'.$p->name);
        }
        DB::table('temp_images')->where('session_id',Session::get('user')->uid)->delete();
        $region=DB::table('region')
            ->where('uid',$region_id)
            ->get();
        $region[0]->image=DB::table('sys_file_reference')
            ->join('sys_file','sys_file.uid','uid_local')
            ->where([['uid_foreign',$region_id],['identifier','like','%regionen%']])
            ->orderBy('sorting_foreign')
            ->limit(1)
            ->value('identifier');
        $parent=DB::table('region')
            ->where('uid',$region[0]->parent)
            ->pluck('title','uid')
            ->toArray();
        return view('forms/editRegion')
            ->with('data',$this->getData())
            ->with('parent',$parent)
            ->with('region',$region);
    }

    public function editCategoryForm($category_id){
        $pics=DB::table('temp_images')->where('session_id',Session::get('user')->uid)->get();
        foreach($pics as $p){
            File::delete('assets/temp_images/'.$p->name);
        }
        DB::table('temp_images')->where('session_id',Session::get('user')->uid)->delete();

        $category=DB::table('category')
            ->where('uid',$category_id)
            ->get();
        $parent=DB::table('category')
            ->where('uid',$category[0]->parent)
            ->value('uid');
        $related=DB::table('category')
            ->where('uid',$category[0]->related)
            ->value('uid');
        $image=DB::table('sys_file_reference')
            ->join('sys_file','sys_file.uid','sys_file_reference.uid_local')
            ->where([['uid_foreign',$category_id],['tablenames','tx_travel_domain_model_category']])
            ->orderBy('sorting_foreign')
            ->orderBy('sys_file_reference.uid','desc')
            ->limit(1)
            ->value('identifier');
        return view('forms/editCategory')
            ->with('data',$this->getData())
            ->with('parent',$parent)
            ->with('image',$image)
            ->with('related',$related)
            ->with('category',$category);
    }

    public function listOffersForEdit($search=0){
$img = Image::make('../public/assets/img/offers/316/Lounge.png');
                           $img->resize(300, null, function($constraint){
                                            $constraint->aspectRatio();
                                            $constraint->upsize();
                                        });

                            $img->save();\Log::info([$img]);ImageOptimizer::optimize('../public/assets/img/offers/316/Lounge.png');
        if(!isset($_GET['search'])){
            $offers=DB::table('offer')
                ->where('deleted',0)
                ->orderBy('sorting')
                ->get();


            $deleted=DB::table('offer')
                ->where('deleted',1)
                ->orderby('sorting')
                ->get();
            $get=0;
        }else{
            $search=$_GET['search'];
            $offers=DB::table('offer')
                ->where([['deleted',0],['title','like',"%$search%"]])
                ->orderBy('sorting')
                ->get();
            $deleted=DB::table('offer')
                ->where([['deleted',1],['title','like',"%$search%"]])
                ->orderBy('sorting')
                ->get();

            $get=1;
        }

        return view('editOffersList')
            ->with('get',$get)
            ->with('data',$offers)
            ->with('deleted',$deleted);
    }


    public function getOptionsForm(){
        return view('forms/options')->render();
    }

    public function getEditPricesForm($price_id){

        $prices=DB::table('price')
            ->where('price.uid',$price_id)
            ->leftJoin('options','options.uid','price.selected_option')
            ->select('price.*','options.uid as ouid','options.title as o_title','options.subtitle as o_subtitle','options.hidden as o_hidden','options.starttime as o_starttime','options.endtime as o_endtime','options.sorting as o_sorting')
            ->get();
        $options=DB::table('options')
            ->where('offer',$prices[0]->offer)
            ->get();
        return view('forms/editPriceForm')
            ->with('options',$options)
            ->with('prices',$prices);
    }

    public function getEditAdditionalsForm($additional_id){
        $additionals=DB::table('additional')
            ->where('additional.uid',$additional_id)
            ->leftJoin('options','options.uid','additional.selected_option')
            ->select('additional.*','options.uid as ouid','options.title as o_title','options.subtitle as o_subtitle','options.hidden as o_hidden','options.starttime as o_starttime','options.endtime as o_endtime','options.sorting as o_sorting')
            ->get();
        return view('forms/editAdditionalForm')
            ->with('additionals',$additionals);

    }


    public function getPricesForm($number){
        $options=DB::table('options')->where('offer',$number)->get();
        return view('/forms/prices')
            ->with('options',$options)
            ->with('data',$number)
            ->render();
    }

    public function getAdditionalsForm($number){
        return view('forms/additionals')
            ->with('data',$number)
            ->render();
    }

    public function adminCategories(){
        $this->deleteTempImages();
        return view('admin-categories')->with('data',$this->getData());
    }
    public function adminRegions(){
        $this->deleteTempImages();
        return view('admin-regions')->with('data',$this->getData());
    }
    public function adminOffers(){
        $this->deleteTempImages();

        return view('admin-offers')->with('data',$this->getData());
    }
    public function adminTourOperator(){
        return view('admin-touroperator')->with('data',$this->getData());
    }
    public function adminVouchers(){
        return view('admin-vouchers');
    }
    protected function deleteTempImages(){
        $pics=DB::table('temp_images')->where('session_id',Session::get('user')->uid)->get();
        foreach($pics as $p){
            File::delete('assets/temp_images/'.$p->name);
        }
        DB::table('temp_images')->where('session_id',Session::get('user')->uid)->delete();
    }
    public function searchRo($keyword){
        //search related offers
        $data=DB::table('offer')
            ->where('title','like',"%".$keyword."%")
            ->orWhere('title_tag','like',"%".$keyword."%")
            ->select('title','uid')
            ->orderBy('sorting')
            ->get();
        $result='';
        foreach($data as $d){
            $result.="<li class='list-group-item related-offer-pointer' onclick='appendRelatedOffer($d->uid)'>$d->title</li>";
        }
        return $result;
    }

    public function getOfferNameById($uid){
        $name=DB::table('offer')
            ->where('uid',$uid)
            ->pluck('title');
        return $name[0];
    }

    public function listBookings(){
        if(isset($_GET['confirmation_id'])){
            $data=DB::table('purchases')
                ->join('offer','purchases.offer','offer.uid')
                ->join('tx_backoffice_application_frontenduser_mm','tx_backoffice_application_frontenduser_mm.uid_local','purchases.uid')
                ->join('fe_users','tx_backoffice_application_frontenduser_mm.uid_foreign','fe_users.uid')
                ->where('confirmation_id',$_GET['confirmation_id'])
                ->select('purchases.booking_date','purchases.uid','price_total','offer.title','purchases.currency','confirmation_id','fe_users.name','purchases.crdate as created_on')
                ->orderBy('purchases.crdate','desc')
                ->paginate(150);
        }else if(isset($_GET['user_name'])){
            $data=DB::table('purchases')
                ->join('offer','purchases.offer','offer.uid')
                ->join('tx_backoffice_application_frontenduser_mm','tx_backoffice_application_frontenduser_mm.uid_local','purchases.uid')
                ->join('fe_users','tx_backoffice_application_frontenduser_mm.uid_foreign','fe_users.uid')
                ->where('fe_users.name','like',"%".$_GET['user_name']."%")
                ->select('purchases.booking_date','purchases.uid','price_total','offer.title','purchases.currency','confirmation_id','fe_users.name','purchases.crdate as created_on')
                ->orderBy('purchases.crdate','desc')
                ->paginate(150);
        }else{
            $data=DB::table('purchases')
                ->join('offer','purchases.offer','offer.uid')
                ->join('tx_backoffice_application_frontenduser_mm','tx_backoffice_application_frontenduser_mm.uid_local','purchases.uid')
                ->join('fe_users','tx_backoffice_application_frontenduser_mm.uid_foreign','fe_users.uid')
                ->select('purchases.booking_date','purchases.uid','price_total','offer.title','purchases.currency','confirmation_id','fe_users.name','purchases.crdate as created_on')
                ->orderBy('purchases.crdate','desc')
                ->paginate(150);
        }
        return view('listBookings')->with('data',$data);
    }

    public function listVauchers(){
        if(isset($_GET['search'])){
            $data=DB::table('vauchers')
                ->leftJoin('offer','vauchers.offer','offer.uid')
                ->leftJoin('fe_users','fe_users.uid','vauchers.customer_id')
                ->where([['vauchers.deleted',0],['vaucher_for','like',"%".$_GET['search']."%"]])
                ->orWhere([['vauchers.deleted',0],['fe_users.name','like',"%".$_GET['search']."%"]])
                ->select('vaucher_type','total_price','vaucher_for','vaucher_text','valid_from','vauchers.crdate','offer.title','vauchers.uid','fe_users.name','vauchers.total_currency')
                ->orderBy('crdate','desc')
                ->paginate(100);
        }else{
            $data=DB::table('vauchers')
                ->leftJoin('offer','vauchers.offer','offer.uid')
                ->leftJoin('fe_users','fe_users.uid','vauchers.customer_id')
                ->where('vauchers.deleted',0)
                ->select('vaucher_type','total_price','vaucher_for','vaucher_text','valid_from','vauchers.crdate','offer.title','vauchers.uid','fe_users.name','vauchers.total_currency')
                ->orderBy('crdate','desc')
                ->paginate(100);
        }
        // return $data;
        return view('listVauchers')->with('data',$data);
    }

    public function listRedirects(){
        $data=DB::table('tx_odsredirects_redirects')
            ->select('uid','crdate','hidden','url','destination')
            ->orderBy('tx_odsredirects_redirects.uid','desc')
            ->paginate(100);
        return view('listRedirects')->with('data',$data);
    }
    public function currencies(){
        $data=DB::table('currency')
            ->get();
        return view('admin-currencies')->with('data',$data);
    }


    public function editBooking($uid){
        $users=DB::table('fe_users')
            ->join('tx_backoffice_application_frontenduser_mm','fe_users.uid','tx_backoffice_application_frontenduser_mm.uid_foreign')
            ->where('tx_backoffice_application_frontenduser_mm.uid_local',$uid)
            ->select('fe_users.*')
            ->get();

        $offers=DB::table('offer')
            ->where([['hidden',0],['deleted',0]])
            ->select('uid','title')
            ->orderBy('sorting')
            ->get();

        $data=DB::table('purchases')
            ->where('uid',$uid)
            ->get();

        for($i=0;$i<count($offers);$i++){
            if($offers[$i]->uid==$data[0]->offer){
                $offers[$i]->selected=1;
            }else{
                $offers[$i]->selected=0;
            }
        }

        return view('forms/editBooking')
            ->with('data',$data)
            ->with('user',$users)
            ->with('offers',$offers);
    }

    public function be_users(){
        return view('admin-be_users');
    }

    public function listBeUsers(){
        $data=DB::table('be_users')->get();
        return view('listBeUsers')->with('data',$data);
    }

    public function voucherPage($vaucher){
        $data=DB::table('vauchers')
            ->leftJoin('vaucher_templates','vaucher_templates.sorting','vauchers.vaucher_type')
            ->where('vauchers.uid',$vaucher)
            ->select('vauchers.*','vaucher_templates.image','vauchers.uid as vid','vauchers.crdate as v_cdate')
            ->get();


        return view('vouchBlade')->with('data',$data);
    }

    public function getPricesForDate($date,$offer){

        $offerId=$offer;

        $timestamp=strtotime(str_replace('/','',$date));
        $dow=date('l',$timestamp);
        if($dow=='Tuesday'){
            $dow='thusday';
        }
        $dow=strtolower($dow);
        // return $dow;
        DB::enableQueryLog();

        $prices=DB::table('price')
            ->leftJoin('options','options.uid','price.selected_option')
            ->whereRaw("(price.offer=$offerId and startdate<$timestamp and $dow=1 and enddate>$timestamp and price.deleted=0 and price.hidden=0 and price.adult_price!=0 and price.closed=0 and NOT FIND_IN_SET('$date',datelist_closed_new))
                or (price.hidden=0 and price.deleted=0 and price.offer=$offerId and price.adult_price!=0 and price.closed=0 and FIND_IN_SET('$date',datelist_new))")
            ->select('price.*','options.uid as o_uid','options.title as o_title','options.subtitle as o_subtitle')
            ->orderBy('sorting')
            ->get();
        // return $prices;
        // return DB::getQueryLog();
        //delete prices that are unavailable for the date we chose
        //(which share the same option with a price that has an adult_price=0 and belong in the interval that the price with adult_price=0 is "open")
        for($i=0;$i<count($prices);$i++){
            $zero=DB::table('price')
                ->where([['offer',$offerId],['hidden',0],['deleted',0],['selected_option',$prices[$i]->selected_option],['adult_price',0]])
                ->select('startdate','enddate')
                ->get();
            if(count($zero)>0){
                //if the timestamp is in the middle
                if($timestamp>=$zero[0]->startdate && $timestamp<=$zero[0]->enddate){
                    unset($prices[$i]);
                }
            }
        }
        // return $prices;
        // return DB::getQueryLog();
        $offer=DB::table('offer')
            ->where('uid',$offer)
            ->select('min_persons','max_persons','person_type','uid')
            ->get();
        if(count($offer)>0){
            $offer[0]->person_type=$this->checkUnit($offerId,0);
        }else{
            return "Error, no offer found";
        }
        $additionals=DB::table('additional')
            ->where([['additional.offer',$offerId],['hidden',0],['deleted',0]])
            ->select('additional.*')
            ->get();
        $currency="CHF";
        if(count($prices)>0){
            $prices[0]->currency==0?$currency='CHF':$currency='EURO';
        }else{
            return "No prices available";
        }
        $exchange=DB::table('currency')->where('uid',1)->value('value');
        return view('prices/pricesTable')
            ->with('data',$prices)
            ->with('offer',$offer)
            ->with('additionals',$additionals)
            ->with('currency',$currency)
            ->with('exchange',$exchange);
    }


    public function getPricesForVaucher($offerId,$request=0){
        $prices=DB::table('price')
            ->join('options','options.uid','price.selected_option')
            ->where([['price.hidden',0],['price.deleted',0],['price.closed',0],['price.offer',$offerId]])
            ->select('price.*','options.uid as o_uid','options.title as o_title','options.subtitle as o_subtitle')
            ->orderBy('sorting')
            ->get();
        $collect=collect($prices);
        $prices=$collect->groupBy('title');
        if(count($prices)==0){
            return "No prices available for offer";
        }
        // return $prices;
        $getCurrency=DB::table('price')->where('offer',$offerId)->value('currency');
        if($getCurrency==0){
            $currency='CHF';
        }else{
            $currency='EURO';
        }
        $exchange=DB::table('currency')->where('uid',1)->value('value');
        $offer=DB::table('offer')
            ->where('uid',$offerId)
            ->select('min_persons','max_persons','person_type','vauchertext')
            ->get();
        $offer[0]->person_type=$this->checkUnit($offerId,0);
        $additionals=DB::table('additional')
            ->where([['additional.offer',$offerId],['hidden',0],['deleted',0],['hideinvaucher',0]])
            ->get();

        // $requestData['additionals']=$request->additionals;
        // $requestData['prices']=$request->prices;
        // $requestData['offer']=$request->offer;
        // $request->session()->put('selectedPrices',$requestData);
        // $request->session()->put('tableSelPrices',$pricesSelecedView);
        // $request->session()->put('firstTable',$request->firstTable);

        $viewData=View::make('prices/pricesTableForOfferVaucher')->with('data',$prices)->with('offer',$offer)->with('additionals',$additionals)->with('currency',$currency)->with('exchange',$exchange)->render();

        return $viewData;
    }


    public function selectedPrices(Request $request){
        //die('fsdfsdfsd');
        // Session::get('a');
        $request->session()->forget('isAdditinalNight');
        $pids=[];
        $aids=[];
        $data=[];
        $additionals=[];
        $total_price=$this->getTotalPrice($request);
        $isAdditinalNight='';
        
        if(isset($request->prices)){
            foreach($request->prices as $p){
                if($p['priceValue']==0){
                    continue;
                }
                array_push($pids,$p['priceId']);
            }
        }else{
            return false;
        }

        if(isset($request->additionals)){
            foreach($request->additionals as $a){
                if($a['additionalValue']==0 || $a['additionalValue']==null || $a['additionalValue']==''){
                    continue;
                }
                array_push($aids,$a['additionalId']);
            }
        }

        $prices=DB::table('price')
            ->whereIn('price.uid',$pids)
            ->join('options','options.uid','price.selected_option')
            ->select('price.*','options.title as o_title','options.subtitle as o_subtitle')
            ->get();

        $additionals=DB::table('additional')
            ->whereIn('uid',$aids)
            ->get();

        foreach($prices as &$p){
            foreach($request->prices as $rp){
                if($p->uid==$rp['priceId']){
                    $p->total_units=$rp['priceValue'];
                    $p->total_price=$p->adult_price*$rp['priceValue'];
                }
            }
        }
        if(isset($request->additionals)){
            foreach($additionals as &$a){
                if($a->isadditionalnight==1){
                    $isAdditinalNight='(+ Zusatznacht)';
                    $request->session()->put('isAdditinalNight',$isAdditinalNight);
                }
                foreach($request->additionals as $ra){
                    if($a->uid==$ra['additionalId']){
                        $a->total_units=$ra['additionalValue'];
                        $a->total_price=$a->price*$ra['additionalValue'];
                    }
                }
            }
        }


        $exchange=DB::table('currency')->where('uid',1)->value('value');
        $person_type=$this->checkUnit($request->offer,0);

        $pricesSelecedView=View::make('prices/selectedPricesTable')
            ->with('data',$prices)
            ->with('additionals',$additionals)
            ->with('person_type',$person_type)
            ->with('grand_total',$total_price)
            ->with('exchange',$exchange)
            ->with('currency',$prices[0]->currency)
            ->render();

        $requestData['additionals']=$request->additionals;
        $requestData['prices']=$request->prices;
        $requestData['offer']=$request->offer;
        if(isset($request->offerVaucherTable))
        {
            $offerVaucherD=$request->offerVaucherTable;
            $request->session()->put('offerVaucherD',$offerVaucherD);
        }
        $request->session()->put('selectedPrices',$requestData);
        $request->session()->put('tableSelPrices',$pricesSelecedView);
        $request->session()->put('firstTable',$request->firstTable);
        // return $request->session()->all();
        // Session::save();
        return response()->json(['table'=>$pricesSelecedView,'isAdditionalNight'=>$isAdditinalNight],200);
        // return response()->json(['tableView'=>$pricesSelecedView,'isAdditional'=>$isAdditinalNight],200);
    }



    public function editVoucher($vid){
        $data=DB::table('vauchers')
            ->join('fe_users','fe_users.uid','vauchers.customer_id')
            ->where('vauchers.uid',$vid)
            ->select('vauchers.*','vauchers.crdate as cdate','fe_users.*','vauchers.uid as v_uid')
            ->get();
        $offer=DB::table('offer')
            ->where([['hidden',0],['deleted',0]])
            ->get();

        return view('forms/editVoucher')->with('data',$data)->with('offer',$offer);
    }

    public function offerVaucher($vid){
        //return $vid;
        // DB::enableQueryLog();
        $data=DB::table('vauchers')
            ->join('offer','offer.uid','vauchers.offer')
            ->join('fe_users','fe_users.uid','vauchers.customer_id')
            ->where('vauchers.uid',$vid)
            ->get();
        //return $data;
        // dd(DB::getQueryLog());
        $images=DB::table('images2')->where('offer',$data[0]->offer)->orderBy('sorting')->limit(3)->get();

        return view('offerVaucher')->with('data',$data)->with('images',$images);
    }


    public function previewVaucher($vid){
        $data=DB::table('offer')
            ->where('uid',$vid)
            ->get();

        $images=DB::table('images2')->where('offer',$data[0]->uid)->orderBy('sorting')->limit(3)->get();

        return view('previewVaucher')->with('data',$data)->with('images',$images);
    }

    public function offerVaucherPage(Request $request,$offerId,$callBack=2){

        if(!$request->step)
        {
            //Session::forget('mainVaucherFormVaucher');
            Session::forget('firstTable');
            Session::forget('tableSelPrices');
            Session::forget('offerVaucherD');
            Session::forget('offerVaucherUserContact');
            Session::forget('userConfData');
            Session::forget('isAdditinalNight');
            Session::forget('offerVauchData');
            //Session::forget('userConfData');
            //Session::forget('isAdditinalNight');
        }
        $offer_url=$offerId;

        if(gettype($offerId)=='string'){
            $offer_id= DB::table('tx_realurl_uniqalias')
                ->where([['tablename','tx_travel_domain_model_offer'],['value_alias',$offerId],['offer.hidden',0],['offer.deleted',0]])
                ->leftJoin('offer','offer.uid','tx_realurl_uniqalias.value_id')
                ->orderBy('tx_realurl_uniqalias.uid','desc')
                ->limit(1)
                ->select('value_id')
                ->get();
            if(count($offer_id)>0){
                $offerId=$offer_id[0]->value_id;
            }else if($callBack==0){

                $offer_url=str_replace('ue','ü',$offer_url);
                $offer_url=str_replace('oe','ö',$offer_url);
                $offer_url=str_replace('ae','ä',$offer_url);
                return $this->offerVaucherPage($request,$offer_url,1);
            }else if($callBack==1){
                $offer_url=str_replace('ü','ue',$offer_url);
                $offer_url=str_replace('ö','oe',$offer_url);
                $offer_url=str_replace('ä','ae',$offer_url);
                return $this->offerVaucherPage($request,$offer_url,2);
            }else if($callBack==2){
                return $this->get404($request);
                // return redirect('/');
            }
        }else{
            return $this->get404($request);
            // return redirect('/');
        }

        $prices=$this->getPricesForVaucher($offerId,$request);

        $data=DB::table('offer')
            ->where('offer.uid',$offerId)
            ->get();
        $data[0]->informacion=$this->convertToTable($data[0]->informacion);
        $data[0]->included=$this->fixRsandNs($data[0]->included);
        // print_r($data[0]->list_subtitle);exit;
        $meta['description']='Geschenkgutschein: '.strip_tags($data[0]->list_subtitle)."Auch als Gutschein-Download.";
        // $meta['description'] = '';
        $title='Geschenkgutschein '.$data[0]->title;
        $images=DB::table('images2')->where('offer',$data[0]->uid)->orderBy('sorting')->limit(3)->get();
        if(count($images)<3){
            return $this->get404($request);
            // return redirect('/');
        }

        $data2['exchange']=DB::table('currency')->where('uid',1)->value('value');
        $data2['s_currency']=DB::table('price')->where('offer',$offerId)->value('currency');
        $viewData=View::make('offerVaucherPage')
            ->with('vaucherData',$data)
            ->with('data2',$data2)
            ->with('vdata',$data)
            ->with('data',$this->getData())
            ->with('offer',$offerId)
            ->with('images',$images)
            ->with('stInd',$request->step)
            ->with('prices',$prices)
            ->render();
        $metaView=View::make('metaDataView')
            ->with('meta',$meta)
            ->with('title',$title)
            ->render();


        if($request->isNavigate==0){
            return view('index')
                ->with('offer',$offerId)
                ->with('data2',$data2)
                ->with('vdata',$data)
                ->with('data',$this->getData())
                ->with('images',$images)
                ->with('prices',$prices)
                ->with('stInd',$request->step)
                ->with('dataView',$viewData)
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('isNavigate',$request->isNavigate);
        }else{
            return response()->json(['view'=>$viewData,'meta'=>$meta]);
        }

    }
    public function offerVaucherReservationPage(Request $request,$offerId,$callBack=0){
        if(!$request->step)
        {
            //Session::forget('mainVaucherFormVaucher');
            Session::forget('firstTable');
            Session::forget('tableSelPrices');
            Session::forget('offerVaucherD');
            Session::forget('offerVaucherUserContact');
            Session::forget('userConfData');
            Session::forget('isAdditinalNight');
            Session::forget('offerVauchData');
            //Session::forget('userConfData');
            //Session::forget('isAdditinalNight');
        }
        $offer_url=$offerId;

        if(gettype($offerId)=='string'){
            $offer_id= DB::table('tx_realurl_uniqalias')
                ->where([['tablename','tx_travel_domain_model_offer'],['value_alias',$offerId],['offer.hidden',0],['offer.deleted',0]])
                ->leftJoin('offer','offer.uid','tx_realurl_uniqalias.value_id')
                ->orderBy('tx_realurl_uniqalias.uid','desc')
                ->limit(1)
                ->select('value_id')
                ->get();
            if(count($offer_id)>0){
                $offerId=$offer_id[0]->value_id;
            }else if($callBack==0){
                $offer_url=str_replace('ue','ü',$offer_url);
                $offer_url=str_replace('oe','ö',$offer_url);
                $offer_url=str_replace('ae','ä',$offer_url);
                return $this->offerVaucherPage($request,$offer_url,1);
            }else if($callBack==1){
                $offer_url=str_replace('ü','ue',$offer_url);
                $offer_url=str_replace('ö','oe',$offer_url);
                $offer_url=str_replace('ä','ae',$offer_url);
                return $this->offerVaucherPage($request,$offer_url,2);
            }else if($callBack==2){
                return $this->get404($request);
                // return redirect('/');
            }
        }else{
            return $this->get404($request);
            // return redirect('/');
        }

        $prices=$this->getPricesForVaucher($offerId,$request);

        $data=DB::table('offer')
            ->where('offer.uid',$offerId)
            ->get();
        $data[0]->informacion=$this->convertToTable($data[0]->informacion);
        $data[0]->included=$this->fixRsandNs($data[0]->included);
        $meta['description']='';
        $title='Geschenkgutschein '.$data[0]->title;
        $images=DB::table('images2')->where('offer',$data[0]->uid)->orderBy('sorting')->limit(3)->get();
        if(count($images)<3){
            return $this->get404($request);
            // return redirect('/');
        }
        $data2['exchange']=DB::table('currency')->where('uid',1)->value('value');
        $data2['s_currency']=DB::table('price')->where('offer',$offerId)->value('currency');
        $viewData=View::make('offerVaucherReservationPage')
            ->with('vaucherData',$data)
            ->with('data2',$data2)
            ->with('vdata',$data)
            ->with('data',$this->getData())
            ->with('offer',$offerId)
            ->with('images',$images)
            ->with('stInd',$request->step)
            ->with('prices',$prices)
            ->render();
        $metaView=View::make('metaDataView')
            ->with('meta',$meta)
            ->with('title',$title)
            ->render();
        if($request->isNavigate==0){
            return view('index')
                ->with('offer',$offerId)
                ->with('data2',$data2)
                ->with('vdata',$data)
                ->with('data',$this->getData())
                ->with('images',$images)
                ->with('prices',$prices)
                ->with('stInd',$request->step)
                ->with('dataView',$viewData)
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('isNavigate',$request->isNavigate);
        }else{
            return response()->json(['view'=>$viewData,'meta'=>$meta]);
        }

    }

    public function offerVaucherPage2(Request $request,$vid){

       // return Redirect::to("/angebote/geschenkgutschein-geschenkidee/ideen/".$vid."/",301);

    }

    public function getBookingView($booking_id){
        $data=DB::table('purchases')
            ->join('tx_backoffice_application_frontenduser_mm','tx_backoffice_application_frontenduser_mm.uid_local','purchases.uid')
            ->join('fe_users','fe_users.uid','tx_backoffice_application_frontenduser_mm.uid_foreign')
            ->join('offer','offer.uid','purchases.offer')
            ->where('purchases.uid',$booking_id)
            ->select('purchases.*','offer.title as o_title','offer.day','offer.night','fe_users.*')
            ->get();

        return view('mails/booking')->with('data',$data);
    }


    public function getGruppenanfrage(Request $request){
        $data=$this->getData();
        $meta['description']='Gruppenanfrage';
        if($request->isNavigate==1){
            $view=View::make('gruppenanfrage')->with('data',$data)->with('meta',$meta)->render();
            return response()->json(['view'=>$view,'meta'=>$meta]);
        }else{
            return view('gruppenanfrage')->with('data',$data);
        }

    }

    // public function compress(){
    //     $images=DB::table('sys_file_reference')
    //         ->leftJoin('sys_file','sys_file.uid','sys_file_reference.uid_local')
    //         ->where('identifier','like','%category%')
    //         ->select('identifier')
    //         ->get();
    //     // return $images;
    //     foreach($images as $i){
    //         // $image = Image::make($i);
    //        ImageOptimizer::optimize('assets/'.$i->identifier,'assets/newImage'.$i->identifier);
    //     }
    //     return 'success';

    // }
    public function submitVaucherStepOne(Request $request){
        //return $request->imgForm;
        if($request->imgForm && $request->st2Price){
            $step1Form=$request->imgForm;
            $st2Price=$request->st2Price;
            $st3Price=$request->st3Price;
            $m='';
            if($step1Form)
            {

                Session::forget('mainVaucherFormVaucher');
                Session::forget('st2Price');
                Session::forget('st3Price');
                $request->session()->put('mainVaucherFormVaucher',$step1Form);
                $request->session()->put('st2Price',$st2Price);
                $request->session()->put('st3Price',$st3Price);
                $m='true';
            }
            else
            {
                $m='false';
            }
        }
        else
        {
            $m='false';
        }
        return $m;
    }
    public function submitVaucherStepTwo(Request $request){
        //return $request->imgForm;
        $data['time']=time();
        //$request->user['last_name']."/".$data['time'];
        //$orderId = strtoupper(preg_replace('/\s+/', '', $request->user['last_name'] .'/'.time();
        $formFields=[
            'ACCEPTURL'=>'https://www.meinweekend.ch/geschenkgutschein?step=2&payment=accepted',
            'AMOUNT'=>$request->total_price*100,
            'BGCOLOR'=>'#003c90',
            'BUTTONBGCOLOR'=>'007dc0',
            'CN'=>$request->user['name'],
            'CURRENCY'=>'CHF',
            'DECLINEURL'=>'https://www.meinweekend.ch/geschenkgutschein?step=2&payment=declined',
            'EMAIL'=>$request->user['email'],
            'EXCEPTIONURL'=>'https://www.meinweekend.ch/geschenkgutschein?step=2&payment=error',
            'LANGUAGE'=>'de_DE',
            'ORDERID'=>'asklfjklasj',
            'OWNERADDRESS'=>$request->user['address'],
            'OWNERTELNO'=>$request->user['telephone'],
            'OWNERTOWN'=>$request->user['city'],
            'OWNERZIP'=>$request->user['zip'],
            'PSPID'=>'meinweekend',
            'TBLBGCOLOR'=>'#e6e8ee',
            'TBLTXTCOLOR'=>'#000000',
            'TITLE'=>'Meinweekend.ch',
            'TXTCOLOR'=>'#FFFFFF',
        ];
        $shasign="asdadadadasads";
        $finalString='';
        foreach($formFields as $k=>$v){
            if($v=='' || $v==null){
                continue;
            }
            $finalString.=$k."=".$v."30fdec73f395aaec13bbe56565be4353";
        }
        $shasign=strtoupper(sha1($finalString));
        $veiwForm=View::make('vaucherForm.vaucherForm')->with('formFields',$formFields)->with('shasign',$shasign);
        if($request->imgForm)
        {
            $step1Form=$request->imgForm;
            $lastStepTable=$request->vaucherConfirmTable;
            $m='';
            if($step1Form)
            {
                Session::forget('mainVaucherStep2');
                Session::forget('mainVaucherStep3');
                $request->session()->put('mainVaucherStep2',$step1Form);
                $request->session()->put('mainVaucherStep3',$lastStepTable);
                $m='true';
            }
            else
            {
                $m='false';
            }
        }
        else
        {
            $m='false';
        }
        return $m;
    }

    public function submitVaucherStepTwoTest(Request $request){
        //return $request->imgForm;
        //$data['time']=time();

        // order
        // "PSPID" => $pspid,
        // "ORDERID" => $orderId,
        // "AMOUNT" => $finalPrice * 100,
        // "CURRENCY" => $currencyCode,
        // "LANGUAGE" => "de_DE",

        // // user
        // "CN" => $paymentData['first_name'].' '.$paymentData['last_name'],
        // "EMAIL" => $paymentData['email'],
        // "OWNERZIP" => $paymentData['zip'],
        // "OWNERADDRESS" => $paymentData['address'],
        // //"OWNERCTY" => "Swiss",
        // "OWNERTOWN" => $paymentData['city'],
        // "OWNERTELNO" => $paymentData['telephone'],

        // // style
        // "TITLE" => "MeinWeekend.ch",
        // "BGCOLOR" => "#003c90",
        // "TXTCOLOR" => "#FFFFFF",
        // "TBLBGCOLOR" => "#e6e8ee",
        // "TBLTXTCOLOR" => "#000000",
        // "BUTTONBGCOLOR" => "#007dc0",
        // "BUTTONTXTCOLOR" => "#FFFFFF",
        // //"LOGO" => "https://e-payment.postfinance.ch/images/merchant/meinweekendTEST/logo_meinweekend.png",
        // //"FONTTYPE" => "",

        // // response
        // "ACCEPTURL" => $acceptUrl,
        // "DECLINEURL" => $cancelUrl,
        // "EXCEPTIONURL" => $errorUrl,
        $data['time']=time();
        $orderId = strtoupper(preg_replace('/\s+/', '', $request->user['last_name'] .'/'.time()));
        $formFields=[
            'ACCEPTURL'=>'https://www.meinweekend.ch/mainVaucherReservation?step=2&payment=accepted',
            'AMOUNT'=>$request->total_price*100,
            'BGCOLOR'=>'#003c90',
            'BUTTONBGCOLOR'=>'#007dc0',
            'CN'=>$request->user['name'],
            'CURRENCY'=>'CHF',
            'DECLINEURL'=>'https://www.meinweekend.ch/mainVaucherReservation?step=2&payment=declined',
            'EMAIL'=>$request->user['email'],
            'EXCEPTIONURL'=>'https://www.meinweekend.ch/mainVaucherReservation?step=2&payment=error',
            'LANGUAGE'=>'de_DE',
            'ORDERID'=>$orderId,
            'OWNERADDRESS'=>$request->user['address'],
            'OWNERTELNO'=>$request->user['telephone'],
            'OWNERTOWN'=>$request->user['city'],
            'OWNERZIP'=>$request->user['zip'],
            'PSPID'=>'meinweekend',
            'TBLBGCOLOR'=>'#e6e8ee',
            'TBLTXTCOLOR'=>'#000000',
            "BUTTONTXTCOLOR" => "#FFFFFF",
            'TITLE'=>'Meinweekend.ch',
            'TXTCOLOR'=>'#FFFFFF',
        ];
        $shasign="asdadadadasads";
        ksort($formFields);
        $finalString='';
        foreach($formFields as $k=>$v){
            if($v=='' || $v==null){
                continue;
            }
            $finalString.=$k."=".$v."30fdec73f395aaec13bbe56565be4353";
        }
        $shasign=strtoupper(sha1($finalString));
        $veiwForm=View::make('vaucherForm.vaucherForm')->with('formFields',$formFields)->with('shasign',$shasign)->render();
        if($request->imgForm)
        {
            $step1Form=$request->imgForm;
            $lastStepTable=$request->vaucherConfirmTable;
            if($step1Form)
            {
                Session::forget('mainVaucherStep2');
                Session::forget('mainVaucherStep3');
                $request->session()->put('mainVaucherStep2',$step1Form);
                $request->session()->put('mainVaucherStep3',$lastStepTable);
            }
        }
        return $veiwForm;
    }
    public function submitVaucherStepThree(Request $request){
        //return $request->imgForm;
        if($request->imgForm)
        {
            $step1Form=$request->imgForm;
            $m='';
            if($step1Form)
            {
                Session::forget('mainVaucherStep3');
                $request->session()->put('mainVaucherStep3',$step1Form);
                $m='true';
            }
            else
            {
                $m='false';
            }
        }
        else
        {
            $m='false';
        }
        return $m;
    }
    public function saveUserContactOfferVaucherPay(Request $request){
        //return $request->imgForm;
        $request->session()->put('offerVauchData',$_POST);
        if(isset($request->imgForm)){
            $step1Form=$request->imgForm;
            $userVaucherOfferData=$request->saveConfOffVau;
            Session::forget('userConfData');
            $request->session()->put('userConfData',$userVaucherOfferData);
            Session::forget('offerVaucherUserContact');
            $request->session()->put('offerVaucherUserContact',$step1Form);
        }
        $orderId = strtoupper(preg_replace('/\s+/', '', $request->user['last_name'] .'/'.time()));
        $currencyDB=DB::table('price')->where('offer',$request->offer)->value('currency');
        $offer_linkDB=DB::table('tx_realurl_uniqalias')
            ->where([['value_id',$request->offer],['tablename','tx_travel_domain_model_offer']])
            ->orderBy('uid','desc')
            ->limit(1)
            ->get();
        if(count($offer_linkDB)>0){
            $offer_link=$offer_linkDB[0]->value_alias;
        }else{
            return false;
        }
        $currencyDB==0?$currency='CHF':$currency="EUR";
        $total_price=$this->getTotalPrice($request);
        $formFields=[
            'ACCEPTURL'=>'https://www.meinweekend.ch/offerVaucherReservation/'.$offer_link.'?step=3&payment=accepted',
            'AMOUNT'=>$total_price*100,
            'BGCOLOR'=>'#003c90',
            'BUTTONBGCOLOR'=>'#007dc0',
            'CN'=>$request->user['name'],
            'CURRENCY'=>$currency,
            'DECLINEURL'=>'https://www.meinweekend.ch/offerVaucherReservation/'.$offer_link.'?step=2&payment=declined',
            'EMAIL'=>$request->user['email'],
            'EXCEPTIONURL'=>'https://www.meinweekend.ch/offerVaucherReservation/'.$offer_link.'?step=2&payment=error',
            'LANGUAGE'=>'en_EN',
            'ORDERID'=>$orderId,
            'OWNERADDRESS'=>$request->user['address'],
            'OWNERTELNO'=>$request->user['telephone'],
            'OWNERTOWN'=>$request->user['city'],
            'OWNERZIP'=>$request->user['zip'],
            'PSPID'=>'meinweekendTEST',
            'TBLBGCOLOR'=>'#e6e8ee',
            'TBLTXTCOLOR'=>'#000000',
            "BUTTONTXTCOLOR" => "#FFFFFF",
            'TITLE'=>'Meinweekend.ch',
            'TXTCOLOR'=>'#FFFFFF',
        ];
        ksort($formFields);
        $finalString='';
        foreach($formFields as $k=>$v){
            if($v=='' || $v==null){
                continue;
            }
            $finalString.=$k."=".$v."30fdec73f395aaec13bbe56565be4353";
        }
        $shasign=strtoupper(sha1($finalString));
        $veiwForm=View::make('vaucherForm.vaucherForm')->with('formFields',$formFields)->with('shasign',$shasign)->render();
        if($request->imgForm)
        {
            $step1Form=$request->imgForm;
            $lastStepTable=$request->vaucherConfirmTable;
            if($step1Form)
            {
                Session::forget('mainVaucherStep2');
                Session::forget('mainVaucherStep3');
                $request->session()->put('mainVaucherStep2',$step1Form);
                $request->session()->put('mainVaucherStep3',$lastStepTable);
            }
        }
        return $veiwForm;
    }
    public function saveUserContactOfferVaucher(Request $request){
        //return $request->imgForm;
        $request->session()->put('offerVauchData',$_POST);
        $m='';
        if(isset($request->imgForm))
        {

            $step1Form=$request->imgForm;
            $userVaucherOfferData=$request->saveConfOffVau;
            Session::forget('userConfData');
            $request->session()->put('userConfData',$userVaucherOfferData);
            Session::forget('offerVaucherUserContact');
            $request->session()->put('offerVaucherUserContact',$step1Form);
            $m='true';

        }
        else
        {
            $m='false';
        }
        return $m;
    }

    public function getGeschenkgutschein(Request $request){
        //return $request;
        $step=1;
        if(!$request->step)
        {
            Session::forget('mainVaucherStep2');
            Session::forget('mainVaucherFormVaucher');
            Session::forget('mainVaucherStep3');
            Session::forget('st2Price');
            Session::forget('st3Price');

            //return 'true';
        }else{
            // switch($request->step){
            //     case(1):
            //         if(!$request->session()->has('mainVaucherFormVaucher')){
            //             return redirect('/geschenkgutschein');
            //         }
            //     break;
            //     case(2):
            //         if(!$request->session()->has('mainVaucherStep2')){
            //             $this->getLastStep($request);
            //         }
            //     break;

            // }
            $step=$request->step;
            if($request->step==3 && $request->payment=='declined'){
                $step=2;
            }
        }
        if(isset($_GET['payment'])){
            if($_GET['payment']=='accepted'){
                $step=3;
            }
            if($_GET['payment']=='declined'){
                $step=2;
            }
            if($_GET['payment']=='error'){
                $step=2;
            }
        }
        $fData=null;
        if(isset($request->pushD)){
            foreach (explode('&', $request->pushD) as $chunk) {
                $param = explode("=", $chunk);

                if ($param) {
                    //array_push($parameters,$offer_type_link);
                    $fData[$param[0]]=$param[1];
                }
            }
        }
        $vauchers=DB::table('vaucher_templates')
            ->select('image')
            ->orderBy('uid')
            ->get();
        $metaDesc="Ein Geschenkgutschein ist eine tolle Geschenkidee zum Geburtstag, zum Jubiläum, zu Weihnachten, zur Hochzeit oder als Hauptgewinn an einem Wettbewerb. www.meinweekend.ch bietet Ihnen eine breite Auswahl für ein spannendes Weekend oder einen Tagesausflug in der Schweiz. Für Freizeit-Aktivisten und Romantiker – einfach für alle Menschen, die in ihrer Freizeit einmal etwas ganz Besonderes erleben möchten.";
        $meta=['description'=>$metaDesc];
        $data=$this->getData();
        $title='Geschenkgutschein';
        if($request->isNavigate==0){
            $viewData=View::make('geschenkgutschein')
                ->with('vauchers',$vauchers)
                ->with('stInd',$step)
                ->with('data',$data)
                ->render();
            return view('index')
                ->with('dataView',$viewData)
                ->with('isNavigate',$request->isNavigate)
                ->with('title',$title)
                ->with('meta',$meta)
                ->with('data',$data);
        }else{
            $view=View::make('geschenkgutschein')
                ->with('vauchers',$vauchers)
                ->with('stInd',$step)
                ->with('data',$data)
                ->with('isNavigate',$request->isNavigate)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }

    }
    public function getGeschenkgutscheinTest(Request $request){
        //return $request;
        $step=1;
        if(!$request->step)
        {
            Session::forget('mainVaucherStep2');
            Session::forget('mainVaucherFormVaucher');
            Session::forget('mainVaucherStep3');
            Session::forget('st2Price');
            Session::forget('st3Price');

            //return 'true';
        }else{
            // switch($request->step){
            //     case(1):
            //         if(!$request->session()->has('mainVaucherFormVaucher')){
            //             return redirect('/geschenkgutschein');
            //         }
            //     break;
            //     case(2):
            //         if(!$request->session()->has('mainVaucherStep2')){
            //             $this->getLastStep($request);
            //         }
            //     break;

            // }
            $step=$request->step;
            if($request->step==3 && $request->payment=='declined'){
                $step=2;
            }
        }
        if(isset($_GET['payment'])){
            if($_GET['payment']=='accepted'){
                $step=3;
            }
            if($_GET['payment']=='declined'){
                $step=2;
            }
            if($_GET['payment']=='error'){
                $step=2;
            }
        }
        $fData=null;
        if(isset($request->pushD)){
            foreach (explode('&', $request->pushD) as $chunk) {
                $param = explode("=", $chunk);

                if ($param) {
                    //array_push($parameters,$offer_type_link);
                    $fData[$param[0]]=$param[1];
                }
            }
        }
        $vauchers=DB::table('vaucher_templates')
            ->select('image')
            ->orderBy('uid')
            ->get();
        $metaDesc="Ein Geschenkgutschein ist eine tolle Geschenkidee zum Geburtstag, zum Jubiläum, zu Weihnachten, zur Hochzeit oder als Hauptgewinn an einem Wettbewerb. www.meinweekend.ch bietet Ihnen eine breite Auswahl für ein spannendes Weekend oder einen Tagesausflug in der Schweiz. Für Freizeit-Aktivisten und Romantiker – einfach für alle Menschen, die in ihrer Freizeit einmal etwas ganz Besonderes erleben möchten.";
        $meta=['description'=>$metaDesc];
        $data=$this->getData();
        $title='Geschenkgutschein';
        if($request->isNavigate==0){
            $viewData=View::make('geschenkgutscheinTest')
                ->with('vauchers',$vauchers)
                ->with('stInd',$step)
                ->with('data',$data)
                ->render();
            return view('index')
                ->with('dataView',$viewData)
                ->with('isNavigate',$request->isNavigate)
                ->with('title',$title)
                ->with('meta',$meta)
                ->with('data',$data);
        }else{
            $view=View::make('geschenkgutscheinTest')
                ->with('vauchers',$vauchers)
                ->with('stInd',$step)
                ->with('data',$data)
                ->with('isNavigate',$request->isNavigate)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }

    }

    public function startVaucherReservation(Request $request){
        //return $request;
        $step=1;
        if(!$request->step)
        {
            Session::forget('mainVaucherStep2');
            Session::forget('mainVaucherFormVaucher');
            Session::forget('mainVaucherStep3');
            Session::forget('st2Price');
            Session::forget('st3Price');

            //return 'true';
        }else{
            // switch($request->step){
            //     case(1):
            //         if(!$request->session()->has('mainVaucherFormVaucher')){
            //             return redirect('/geschenkgutschein');
            //         }
            //     break;
            //     case(2):
            //         if(!$request->session()->has('mainVaucherStep2')){
            //             $this->getLastStep($request);
            //         }
            //     break;

            // }
            $step=$request->step;
        }
        if(isset($_GET['payment'])){
            if($_GET['payment']=='accepted'){
                $step=3;
            }
            if($_GET['payment']=='declined'){
                $step=2;
            }
            if($_GET['payment']=='error'){
                $step=2;
            }
        }
        $fData=null;
        if(isset($request->pushD)){
            foreach (explode('&', $request->pushD) as $chunk) {
                $param = explode("=", $chunk);

                if ($param) {
                    //array_push($parameters,$offer_type_link);
                    $fData[$param[0]]=$param[1];
                }
            }
        }
        $vauchers=DB::table('vaucher_templates')
            ->select('image')
            ->orderBy('uid')
            ->get();
        $metaDesc="Ein Geschenkgutschein ist eine tolle Geschenkidee zum Geburtstag, zum Jubiläum, zu Weihnachten, zur Hochzeit oder als Hauptgewinn an einem Wettbewerb. www.meinweekend.ch bietet Ihnen eine breite Auswahl für ein spannendes Weekend oder einen Tagesausflug in der Schweiz. Für Freizeit-Aktivisten und Romantiker – einfach für alle Menschen, die in ihrer Freizeit einmal etwas ganz Besonderes erleben möchten.";
        $meta=['description'=>$metaDesc];
        $data=$this->getData();
        $title='Geschenkgutschein';
        if($request->isNavigate==0){
            $viewData=View::make('geschenkgutscheinReservation')
                ->with('vauchers',$vauchers)
                ->with('stInd',$step)
                ->with('data',$data)
                ->render();
            return view('index')
                ->with('dataView',$viewData)
                ->with('isNavigate',$request->isNavigate)
                ->with('title',$title)
                ->with('meta',$meta)
                ->with('data',$data);
        }else{
            $view=View::make('geschenkgutscheinReservation')
                ->with('vauchers',$vauchers)
                ->with('stInd',$step)
                ->with('data',$data)
                ->with('isNavigate',$request->isNavigate)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView]);
        }

    }
    public function offerReservation(Request $request,$offer_id){

        $fData=null;
        foreach (explode('&', $request->pushD) as $chunk) {
            $param = explode("=", $chunk);

            if ($param) {
                //array_push($parameters,$offer_type_link);
                if(isset($param[1]))
                {
                    $fData[$param[0]]=$param[1];
                }
            }
        }
        
        // echo $request->step;
        //echo 'date selected is: '.$fData['selDate'];
        //return urldecode($request->pushD);
        setlocale(LC_TIME, "de_DE");
        //echo strftime(" in German %A %A %B.\n");
        //echo $fData['selDate']." in german" . strftime("%V,%B,%Y", strtotime($fData['selDate'])) . "\n";
        $pricesTable=$this->getPricesForDate($fData['selDate'],$offer_id);

        $currency=0;
        $catId=DB::table('offer')->where('uid',$offer_id)->value('categories');
        $explode=explode(',',$catId);
        $filteredNav=$this->getNavBarIds($explode[0]);
        $data['singleOfferData']=DB::table('offer')
            ->where('offer.uid',$offer_id)
            ->leftJoin('region','region.uid','offer.region')
            ->leftJoin('touroperator','touroperator.uid','offer.touroperator')
            ->select('offer.*','region.title as region_title','touroperator.terms as to_terms','touroperator.cancellationterms as to_cancellationterms')
            ->get();
        $title=$data['singleOfferData'][0]->title." | Meinweekend";
        $meta['description']=$data['singleOfferData'][0]->meta_description;
        $meta['title']=$data['singleOfferData'][0]->title;
        $meta['image']='https://www.meinweekend.ch/fileadmin/img/logo.png';
        $meta['url']="https://www.meinweekend.ch/".$offer_id."/".str_replace(" ","-",$data['singleOfferData'][0]->title);
        for($i=0;$i<count($data['singleOfferData']);$i++){
            $data['singleOfferData'][0]->person_type=$this->checkUnit($data['singleOfferData'][0]->uid,1);

            $prices=DB::table('price')
                ->leftJoin('options','price.selected_option','options.uid')
                ->where([['price.offer',$data['singleOfferData'][$i]->uid],['price.hidden',0],['price.deleted',0],['price.closed',0],['adult_price','!=',0]])
                ->orderBy('price.sorting','asc')
                ->get();
            if(count($prices)>0){
                $currency=$prices[0]->currency;
            }
            if($data['singleOfferData'][0]->endtime==0){
                $dates=DB::table('price')
                    ->where('offer',$data['singleOfferData'][0]->uid)
                    ->select('datelist','datelist_closed')
                    ->get();
            }

            $convertedDate=[];


            $additionals=DB::table('additional')
                ->leftJoin('options','additional.selected_option','options.uid')
                ->where([['additional.offer',$data['singleOfferData'][$i]->uid],['additional.deleted',0],['additional.hidden',0]])
                ->orderBy('additional.sorting','desc')
                ->get();

            $images=DB::table('images2')
                ->where([['offer',$data['singleOfferData'][$i]->uid],['deleted',0]])
                ->select('image as identifier')
                ->orderBy('sorting')
                ->get();
            // for($l=0;$l<count($images);$l++){
            //     $exploded=explode('.',$images[$l]->identifier);
            //     $ext=strtolower($exploded[1]);
            //     $images[$l]->identifier=$exploded[0].".".$ext;
            // }
            $relatedOffer=$data['singleOfferData'][$i]->related_offer;

            $similar=DB::table('offer')
                ->whereRaw("find_in_set (uid, '".$relatedOffer."')")
                ->select('offer.title as related_offer_title','subtitle','hasspeciallistsettings','special_list_currency','special_list_price','offer.bodytext as related_offer_bodytext','offer.day as related_offer_days','offer.night as related_offer_nights','offer.uid',
                    DB::raw('(SELECT image from images2 where offer=offer.uid order by sorting limit 1) as related_offer_image'),
                    // DB::raw('(SELECT value_alias from tx_realurl_uniqalias where value_id=offer.uid and tablename="tx_travel_domain_model_offer" and field_alias="title" order by uid desc limit 1) as link_name'),
                    DB::raw("(SELECT adult_price from price where price.offer=offer.uid and price.hidden=0 and price.deleted=0 and price.closed=0 order by sorting asc limit 1) as related_offer_price"))
                ->get();
            // return $similar;
            $data['singleOfferData'][$i]->calendar=$this->checkDates($data['singleOfferData'][$i]->uid);
            $data['singleOfferData'][$i]->images=$images;
            $data['singleOfferData'][$i]->prices=$prices;
            $data['singleOfferData'][$i]->additionals=$additionals;
            $data['singleOfferData'][$i]->related_offers=$similar;
            $data['singleOfferData'][$i]->dates=$convertedDate;
            $data['singleOfferData'][$i]->informacion=$this->convertToTable($data['singleOfferData'][$i]->informacion);
            $data['singleOfferData'][$i]->priceinfo=$this->fixRsandNs($data['singleOfferData'][$i]->priceinfo);
            $data['singleOfferData'][$i]->bodytext=$this->fixBodyText($data['singleOfferData'][$i]->bodytext);

        }
        $categoryId=explode(',',$data['singleOfferData'][0]->categories);
        $excUrl=$request->fullUrl();
        $data['fData']=$request->cData;
        $data['viewData']=$request->data;
        $data['exchange']=DB::table('currency')->where('uid',1)->value('value');
        $data['s_currency']=DB::table('price')->where('offer',$data['singleOfferData'][0]->uid)->value('currency');
        $title="::Buchen";
        $varSt=$request->step;


        $selDate = array_get($fData,'selDate');
        $selDateF = '';
        if($selDate) {
            $selDate = str_replace("/","",$selDate);
            $date = explode(".",$selDate);
            setlocale(LC_ALL, "de_DE");
            if(isset($date['1'])) {
                if($date['1'] == '3') {
                    $selDateF = strftime("%A", strtotime($selDate)) . $date['0'] . 'März' . $date['2'];
                } else {
                    $selDateF = strftime("%A, %d. %B %Y", strtotime($selDate));
                }
            }
        }


        if($request->isNavigate==0) {
            $dataView=View::make('reservation')
                ->with('allData',$data)
                ->with('currency',$currency)
                ->with('selecedPrices',$pricesTable)
                ->with('stInd',$varSt)
                ->with('selDate',$fData['selDate'])
                ->with('selDateF',$selDateF)
                ->with('filteredNav',$filteredNav)
                ->with('blue',1)
                ->with('data',$this->getData())
                ->render();
            return view('index')
                ->with('data',$this->getData())
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('dataView',$dataView)
                ->with('isNavigate',$request->isNavigate);
        }else{
            $view=View::make('reservation')
                ->with('data',$this->getData($categoryId[0]))
                ->with('allData',$data)
                ->with('meta',$meta)
                ->with('title',$title)
                ->with('stInd',$varSt)
                ->with('selDate',$fData['selDate'])
                ->with('selDateF',$selDateF)
                ->with('blue',1)
                ->with('currency',$currency)
                ->with('selecedPrices',$pricesTable)
                ->with('isNavigate',$request->isNavigate)
                ->with('filteredNav',$filteredNav)
                ->render();
            $metaView=View::make('metaDataView')
                ->with('meta',$meta)
                ->with('title',$title)
                ->render();
            return response()->json(['view'=>$view,'metaView'=>$metaView,'excUrl'=>$excUrl]);
        }

    }

    public function listLinks(){
        $links=DB::table('tx_realurl_uniqalias')->get();
        $collect=collect($links);
        $data=$collect->groupBy('tablename');
        return view('listLinks')->with('data',$data);
    }

    public function act404(Request $request){


        //return redirect()->route('home');
                
        $title='404';
        $meta['description']='';
        $data=$this->getData();
        $view=View::make('notFound')
            ->with('data',$data)
            ->with('isNavigate',$request->isNavigate)
            ->render();
        $metaView=View::make('metaDataView')
            ->with('meta',$meta)
            ->with('title',$title)
            ->render();
        if($request->isNavigate==0){
            $vieww= View::make('index')
                ->with('dataView',$view)
                ->with('isNavigate',$request->isNavigate)
                ->with('title',$title)
                ->with('meta',$meta)
                ->with('data',$data)
                ->render();
            return response($vieww,404);
        }else{
            return response()->json(['view'=>$view,'metaView'=>$metaView],404);
        }
    }

    public function get404(Request $request){
        return redirect(404);
        $title='404';
        $meta['description']='';
        $data=$this->getData();
        $view=View::make('notFound')
            ->with('data',$data)
            ->with('isNavigate',$request->isNavigate)
            ->render();
        $metaView=View::make('metaDataView')
            ->with('meta',$meta)
            ->with('title',$title)
            ->render();
        if($request->isNavigate==0){
            $vieww= View::make('index')
                ->with('dataView',$view)
                ->with('isNavigate',$request->isNavigate)
                ->with('title',$title)
                ->with('meta',$meta)
                ->with('data',$data)
                ->render();
            //echo "here".Route::getCurrentRoute()->getActionName();
            return response($vieww,404);
        }else{
            //echo "here".Route::getCurrentRoute()->getActionName();
            return response()->json(['view'=>$view,'metaView'=>$metaView],404);
        }
    }
    public function get410(Request $request){
        $title='404';
        $meta['description']='';
        $data=$this->getData();
        $view=View::make('notFound')
            ->with('data',$data)
            ->with('isNavigate',$request->isNavigate)
            ->render();
        $metaView=View::make('metaDataView')
            ->with('meta',$meta)
            ->with('title',$title)
            ->render();
        if($request->isNavigate==0){
            $vieww= View::make('index')
                ->with('dataView',$view)
                ->with('isNavigate',$request->isNavigate)
                ->with('title',$title)
                ->with('meta',$meta)
                ->with('data',$data)
                ->render();
            return response($vieww,410);
        }else{
            return response()->json(['view'=>$view,'metaView'=>$metaView],410);
        }
    }

    public function listNewsLetters(Request $request){
        $fe_users=[];
        $data=DB::table('newsletters')->get();
        $offers=DB::table('offer')->where([['hidden',0],['deleted',0]])->select('uid','title')->get();
        $fe_users['sent_newsletter_get']=DB::table('fe_users')->where('send_newsletter',0)->groupBy('username')->get();
        $fe_users['sent_newsletter']=count($fe_users['sent_newsletter_get']);
        $fe_users['unsubscribed']=DB::table('fe_users')->where('send_newsletter',2)->count();
        $fe_users['not_sent']=DB::table('fe_users')->where('send_newsletter',1)->count();
        $fe_users['total_user_clicked']=DB::table('fe_users')->where('click_email',1)->count();
        $fe_users['total_active']=DB::table('newsletters')->where('is_current',1)->count();
        return view('newsletters/listNewsLetters')->with('data',$data)->with('offers',$offers)->with('fe_users',$fe_users);
    }

    public function editNewsLetter(Request $request,$id){
        $data=DB::table('newsletters')
            ->where('uid',$id)
            ->first();
        $offers=DB::table('offer')->where([['hidden',0],['deleted',0]])->select('uid','title')->get();

        return view('newsletters/editNewsLetter')->with('d',$data)->with('offers',$offers);
    }

    public function addNewsLetterForm(Request $request){
        $offers=DB::table('offer')->where([['hidden',0],['deleted',0]])->select('uid','title')->get();

        return view('newsletters/addNewsLetter')->with('offers',$offers);
    }

    public function previewNewsLetter($id,$returnView=0){
        $data=DB::table('newsletters')->where('uid',$id)->first();
        $offer1=DB::table('offer')
            ->where('offer.uid',$data->offer_1)
            ->leftJoin('tx_realurl_uniqalias','value_id','offer.uid')
            ->select('offer.*','value_alias')
            ->orderBy('tx_realurl_uniqalias.uid','desc')
            ->limit(1)
            ->get();
        $offer2=DB::table('offer')
            ->where('offer.uid',$data->offer_2)
            ->leftJoin('tx_realurl_uniqalias','value_id','offer.uid')
            ->select('offer.*','value_alias')
            ->orderBy('tx_realurl_uniqalias.uid','desc')
            ->limit(1)
            ->get();
        $view=View::make('newsletters/newsletter')
            ->with('data',$data)
            ->with('key','asdasdasdasda')
            ->with('offer1',$offer1)
            ->with('offer2',$offer2)
            ->with('email','besnik.cani95@gmail.com')
            ->render();
        return $view;
        // return view('newsletters/newsletter')->with('data',$data)->with('offer1',$offer1)->with('offer2',$offer2);
    }

    public function unsubscribe(Request $request){
        $rows=DB::table('fe_users')->where([['username',$request->email],['password',$request->key]])->update(['send_newsletter'=>2]);
        if($rows){
            return "You have been unsubscibed from further receiving new offers from meinweekend. <a href='https://meinweekend.ch'>Return to meinweekend </a>";
        }
    }

    public function changeSeason(){
        return view('changeSeason');
    }

}

