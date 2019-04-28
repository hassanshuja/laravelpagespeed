<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $is_404 = false;

    public function __construct()
    {
        $this->middleware(function($request,$next)
        {
            $uri = $_SERVER['REQUEST_URI'];
            $ext = pathinfo($uri, PATHINFO_EXTENSION);
            if(strtolower($ext) == 'html') {
                return redirect()->action('mainController@get404');
            }
            return $next($request);
        });
    }

    public function Authenticate(Request $request){
        if(isset($request->username) && isset($request->password)){
            $data=DB::table('be_users')->where([['username',$request->username],['deleted',0]])->get();
            if(count($data)==0){
                Session::flash('fail','Wrong Credentials');
                return redirect()->back();
            }
            $checkPass=Hash::check($request->password,$data[0]->password);
            
            
            if($checkPass){
                $data=$data[0];
                $update=DB::table('be_users')->where('uid',$data->uid)->update(['lastlogin'=>time()]);
                $request->session()->put('user', $data);
                return redirect()->action('mainController@adminOffers');
            }else{
                Session::flash('fail','Wrong Credentials');
                return redirect()->back();
            }
        }else{
            Session::flash('fail','No Creds');
            return redirect()->back();
        }
    }

    public function getLoginPage(Request $request){
        if($request->session()->has('user')){
            return redirect()->action("mainController@adminOffers");
        }
        return view('login');
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        Session::flash('success','Logged out');
        return redirect()->route('admin');
    }


    // public function convertToTable($string){
    //     $rows=[];
        
    //     $table="<table>";
    //     $rows2=preg_split('/\n|\r\n?/', $string);
    //     for($i=0;$i<count($rows2);$i++){
    //         $rows[$i]=explode('|',$rows2[$i]);
    //     }
        
    //     for($k=0;$k<count($rows);$k++){
    //         $table.='<tr>';
    //         for($j=0;$j<count($rows[$k]);$j++){
    //             $table.='<td style="padding-right:10px">'.$rows[$k][$j].'</td>';
    //         }
    //         $table.='</tr>';
    //     }
    //     $table.='</table>';
    //     $table=str_replace(['<p>','</p>'],'',$table);
    //     return $table;
    // }

    public function convertToTable($string){
    
        $rows=[];
        $table='';
        
        $table="<table>";
        $string=nl2br($string);
        $string=str_replace(['<br /><br />','<br>','<br/>'],'<br />',$string);
        $string=str_replace('<>','',$string);
        // return $string;
        $rows2=explode('<br />', $string);
        
        for($i=0;$i<count($rows2);$i++){
            $rows[$i]=explode('|',$rows2[$i]);
        }
        
        for($k=0;$k<count($rows);$k++)
		{
			
				if(!empty(trim($rows[$k][0])))
				{
			
            $table.='<tr>';
				
			
            for($j=0;$j<count($rows[$k]);$j++)
			{
				if(!empty(trim($rows[$k][$j])))
				{
                	$table.='<td style="padding-right:10px">'.$rows[$k][$j].'</td>';
				}
            }
			
            $table.='</tr>';
			}
			
        }
		
        $table.='</table>';
        $table=str_replace(['<p>','</p>'],'',$table);
        return $table;
       
    }


    public function validateClosedDays($dates,$offer){
        $newDates=[];
        $finalDates=[];
        // return $dates;
        //convert each date into timestamp and also remove dates that are in the past as well as duplicates
        foreach($dates as $d){
            $d=str_replace(' ','',$d);
           
            if(!strtotime($d)){
                continue;
            }

            $date=Carbon::createFromFormat('d.n.Y',$d)->timestamp;
            if($date>time()){
                $newDates[$d]=$date;
            }
       }
       asort($newDates);
       DB::enableQueryLog();
    //    return $newDates;
       //check if the dates are closed
       foreach($newDates as $k=>$v){
          
            //check if a date exists in which the current date of the loop would be open
            $dow=date('l',$v);
            if($dow=='Tuesday'){
                $dow='thusday';
            }
            $dow=strtolower($dow);
            
            // return $dow;
        
            $checkIfOpen=DB::table('price')
                // ->where([['offer',$offer],['closed',0],[$dow,1],['deleted',0],['adult_price','!=',0],['datelist_closed','not like',"%\r\n$k%"],['startdate','<',$v],['enddate','>',$v]])
                ->whereRaw("offer=$offer and closed=0 and $dow=1 and deleted=0 and adult_price!=0 and NOT FIND_IN_SET('$k',datelist_closed_new) and startdate<$v and enddate>$v")
                ->select('selected_option','datelist_closed')
                ->get();
            if(count($checkIfOpen)>0){
                foreach($checkIfOpen as $open){
                    $getClosed=DB::table('price')
                        ->where([['offer',$offer],['selected_option',$open->selected_option],['adult_price',0],['hidden',0],['deleted',0],['startdate','<',$v],['enddate','>',$v]])
                        ->get();
                        
                    if(count($getClosed)==0){
                        //if the price is correct we delete the date from array and continue the loop to the next date
                        unset($newDates[$k]);
                        continue 2;
                    }    
                }
            } 
       }
    //    return DB::getQueryLog();
       //save human readable dates into new array
        foreach($newDates as $k=>$v){
            array_push($finalDates,$k);
        }
        return $finalDates;
    }

    public function validateOpenedDays($dates,$offer){
        $newDates=[];
        $finalDates=[];
        // return $dates;
        //convert each date into timestamp and also remove dates that are in the past as well as duplicates
        foreach($dates as $d){
            $d=str_replace(' ','',$d);
            
            if(!strtotime($d)){
                continue;
            }
            $date=Carbon::createFromFormat('d.n.Y',$d)->timestamp;
            if($date>time()){
                $newDates[$d]=$date;
            }
       }
        foreach($newDates as $k=>$v){
            array_push($finalDates,$k);
        }

        return $finalDates;

    }


    public function fixDates($offer){
        $prices=DB::table('price')
            ->where('offer',$offer)
            ->get();
        
        for($i=0;$i<count($prices);$i++){
            $cd=preg_split('/\n|\r\n?/', $prices[$i]->datelist);
            $finalString='';
            if(count($cd)>0){
                foreach($cd as $d){
                    $d=str_replace(' ','',$d);
                
                    if(!strtotime($d)){
                        continue;
                    }
                    $date=Carbon::createFromFormat('d.n.Y',$d)->timestamp;
                    $convertedDate=Carbon::createFromTimeStamp($date)->format('j.n.Y');
                    if($date<time()){
                        continue;
                    }
                    $finalString.=$convertedDate.",";
                }
                if(strlen($finalString)!=0){
                    $finalString=rtrim($finalString,",");
                }
            }
          
            $update=DB::table('price')
                ->where([['uid',$prices[$i]->uid],['offer',$offer]])
                ->update(['datelist_new'=>$finalString]);
              
        }

        for($i=0;$i<count($prices);$i++){
            $cd=preg_split('/\n|\r\n?/', $prices[$i]->datelist_closed);
            $finalString='';
            if(count($cd)>0){
                foreach($cd as $d){
                    $d=str_replace(' ','',$d);
                
                    if(!strtotime($d)){
                        continue;
                    }
                    $date=Carbon::createFromFormat('d.n.Y',$d)->timestamp;
                    $convertedDate=Carbon::createFromTimeStamp($date)->format('j.n.Y');
                    if($date<time()){
                        continue;
                    }
                    $finalString.=$convertedDate.",";
                   
                }
                if(strlen($finalString)!=0){
                    $finalString=rtrim($finalString,",");
                }
            }
            
            $update=DB::table('price')
                ->where([['uid',$prices[$i]->uid],['offer',$offer]])
                ->update(['datelist_closed_new'=>$finalString]);
        }

        return true;

    }

    // public function fixdatess(){
    //     $offers=DB::table('offer')
    //         ->where([['deleted',0],['hidden',0]])
    //         ->pluck('uid');
    //     $i=0;    
    //     foreach($offers as $o){
    //         $this->fixDates($o);
    //         $i++;
    //     }

    //     return $i;
    // }
    protected function generateDateRange(Carbon $start_date, Carbon $end_date)
    {
        $dates = [];
    
        for($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[] = $date->format('j.n.Y');
        }
    
        return $dates;
    }

//    public function getQuery($query){
//        // return DB::table('offer')->where([['bodytext','like','%href=%'],['hidden',0],['deleted',0]])->select('uid','bodytext')->get();
//        // return DB::table('category')->whereIn('parent',[1,2,3])->where('cruser_id',19)->get();
//        if(strpos(strtolower($query),'delete')!==false){
//            return "Wrong";
//        }
//        if(strpos(strtolower($query),'drop')!==false){
//            return "Wrong";
//        }
//        if(strpos(strtolower($query),'update')!==false){
//            return "Wrong";
//        }
//        $getQ=DB::Select(DB::raw($query));
//        // foreach($getQ as $a){
//        //     echo $a->title."<br/>";
//        // }
//        return $getQ;
//    }

    public function getChildCategories($cat){
        if($cat==0){
            return [];
        }
    
        $data=DB::table('category as catA')
            ->leftJoin('category as catB','catB.parent','catA.uid')
            ->where([['catA.parent',$cat],['catB.hidden',0],['catB.deleted',0]])
            ->pluck('catB.uid');
        
        return $data;   
    }

    public function getFirstChildren($cat){
        if($cat==0){
            return [];
        }

        $data=DB::table('category')
            ->where('parent',$cat)
            ->pluck('uid');

        return $data;    
    }
    public function getCategoryId($parentCategory,$offer_type_link){
        if($parentCategory==0){
            $getCategoryId=DB::table('tx_realurl_uniqalias')
                ->where([['value_alias',$offer_type_link],['tablename','tx_travel_domain_model_category'],['field_alias','title_url'],['value_id','>',3]])
                ->orderBy('tx_realurl_uniqalias.uid','desc')
                ->limit(1)
                ->pluck('value_id');
            return $getCategoryId;    
        }
        $getCategoryId=DB::table('tx_realurl_uniqalias')
            ->where([['value_alias',$offer_type_link],['tablename','tx_travel_domain_model_category'],['field_alias','title_url'],['value_id','>',3]])
            ->orderBy('tx_realurl_uniqalias.uid','desc')
            ->pluck('value_id');
        $childCategoriesOfParent=$this->getChildCategories($parentCategory);    
        $childCategoriesOfParent=json_decode($childCategoriesOfParent);
        foreach($getCategoryId as $k){
            if(in_array($k,$childCategoriesOfParent)){
                return [$k];
            }
        }
        $firstChildren=$this->getFirstChildren($parentCategory);
        $firstChildren=json_decode($firstChildren);
        foreach($getCategoryId as $k){
            if(in_array($k,$firstChildren)){
                return [$k];
            }
        }
        return [];   
    }

    // public function getRedirects(){
    //     $redirects=DB::table('tx_odsredirects_redirects')->get();
    //     $finalString='';
    //     foreach($redirects as $r){
    //         $finalString.="Route::get('".$r->url."',function(){return redirect('".$r->destination."');});\r\n";
    //     }
    //     return $finalString;
    // }

   public function fixBookings(){
       $bookings=DB::table('purchases')  
            ->where('uid',25096)
            ->value('confirmation_conditions');
    
        $noPs=str_replace('<p>','',$bookings);
        $noEndPs=str_replace('</p>','<br/>',$noPs);
        $endString='<p>'.$noEndPs.'</p>';
        $update=DB::table('purchases')
            ->where('uid',25096)
            ->update(['confirmation_conditions'=>$endString]);
        return $endString;
    }

    public function getParent($parent){
        $parents = [
            ''
        ];
        $v=1;
        $parents=['Tagesausflug','tagesausflug','gruppenausfluege','Gruppenausfluege','gruppenausflüge','Gruppenausflüge'];
        if($parent=='ausflug'){
            return 5000;
        }
        if($parent=='Tagesausflug' || $parent=='tagesausflug'){
           $v=2;
        }else if($parent=='gruppenausfluege' || $parent=='gruppenausflüge' || $parent=='Gruppenausfluege' || $parent=='Gruppenausflüge'){
            $v=3;
        }
        return $v;
    }

    public function getParentTwo($parent){
        $parents = [
            ''
        ];
        $v=0;
        $parents=['Tagesausflug','tagesausflug','gruppenausfluege','Gruppenausfluege','gruppenausflüge','Gruppenausflüge'];
        if($parent=='ausflug'){
            return 5000;
        }
        if($parent=='weekend'){
            $v=1;
        }
        else if($parent=='Tagesausflug' || $parent=='tagesausflug'){
            $v=2;
        }else if($parent=='gruppenausfluege' || $parent=='gruppenausflüge' || $parent=='Gruppenausfluege' || $parent=='Gruppenausflüge'){
            $v=3;
        }
        return $v;
    }

    protected function getTotalPrice($request){
        $total_price=0;
        $prices = $request->input('prices', null);
        $additionals = $request->input('additionals', null);
        if($prices){
            foreach($prices as $p){
                $adult_price=DB::table('price')->where('uid',$p['priceId'])->value('adult_price');
                $total_price=$total_price+($adult_price*$p['priceValue']);
            }
        }
        if($additionals){
            foreach($additionals as $a){
                $price=DB::table('additional')->where('uid',$a['additionalId'])->value('price');
                $total_price=$total_price+($price*$a['additionalValue']);
            }
        }
       
       
        return $total_price;
    }
    public function testtest(Request $request){
        $data=DB::table('tx_realurl_uniqalias')
            ->where([['value_id',278],['tablename','tx_travel_domain_model_offer']])
            ->orderBy('uid','desc')
            ->limit(1)
            ->get();

        return $data;
    }
    public function formatForTitle($string){
        $newAlias=str_replace(['%','@','/','|','&','.',','],'-',$string);
        $newAlias=str_replace('ä','ae',$newAlias);
        $newAlias=str_replace('ü','ue',$newAlias);
        $newAlias=str_replace('ö','oe',$newAlias);
        $newAlias=str_replace(' ','-',$newAlias);
        $newAlias=str_replace('--','-',$newAlias);
        $newAlias=str_replace('--','-',$newAlias);
        $newAlias=explode('-',$newAlias);
        $finalString='';

        foreach($newAlias as $n){
            $finalString.=lcfirst($n)."-";
        }
        $finalString=rtrim($finalString,'-');
        return $finalString;
    }
    // public function statusCode(){
    //     return response('a',404);
    // }

    public function getFirstOpenDate($offer){
        $mins=[];
        $minss=[];
        $min=9999999999999;
        $prices=DB::table('price')
            ->leftJoin('options','options.uid','price.selected_option')
            ->where([['price.offer',$offer],['price.hidden',0],['price.deleted',0],['price.adult_price','!=',0]])
            ->select('price.*')
            ->get();
        foreach($prices as &$p){
            if($p->startdate<time()){
                $p->startdate=time();
            }
            if($p->enddate>time()){
                $closed=DB::table('price')
                    ->where([['offer',$offer],['price.adult_price',0],['hidden',0],['deleted',0],['selected_option',$p->selected_option]])
                    ->select('startdate','enddate')
                    ->get();
                if(count($closed)>0){
                    if($p->startdate>$closed[0]->startdate && $p->startdate<$closed[0]->enddate){
                        $mins[]=$closed[0]->enddate;
                        if($this->checkIfDateOpen($closed[0]->enddate,$offer,$p->uid)){
                            if($closed[0]->enddate<$min){
                                $min=$closed[0]->enddate;
                            }
                        }else{
                            $minimum=$this->findNextOpenDate($closed[0]->enddate,$offer,$p->uid);
                            if($minimum<$min){
                                $min=$minimum;
                            }
                        }
                    }
                }else{
                    if($this->checkIfDateOpen(strtotime('tomorrow',$p->startdate),$offer,$p->uid)){
                        if($p->startdate<$min){
                            $min=$p->startdate;
                        }
                    }else{
                        $minimum=$this->findNextOpenDate(strtotime('tomorrow',$p->startdate),$offer,$p->uid);
                        if($minimum<$min){
                            $min=$minimum;
                        }
                    }
                }
            }
           
            if($p->datelist_new!=null){
                $datelist=explode(',',$p->datelist_new);
                foreach($datelist as $d){
                    $toTimeStamp=Carbon::createFromFormat('j.n.Y',$d)->timestamp;
                    if($toTimeStamp>time()){
                       if($toTimeStamp<$min){
                           $min=$toTimeStamp;
                       }
                    }
                }
            }

        }
        if($min==9999999999999){
            return time();
        }
        return $min;
        
        return Carbon::CreateFromTimestamp($min)->format('n/j/Y');
    }

    // public function getFirst(){
    //     $offers=DB::table('offer')->where([['hidden',0],['deleted',0]])->get();
    //     $dates=[];
    //     foreach($offers as $o){
    //         $dates[$o->title]=$this->getFirstOpenDate($o->uid);
    //     }
    //     return $dates;
    // }

    public function getParentName($id){
        $name='weekend';
        if($id==2){
            //$name='Tagesauslfug'; tagesausflug
            $name='tagesausflug';
        }else if($id==3){
            $name='gruppenausfluege';
        }
        return $name;
    }

    public function checkIfDateOpen($date,$offer,$priceId){
        $price=DB::table('price')->where([['offer',$offer],['uid',$priceId]])->value('datelist_closed_new');
        if(strlen($price)==0){
            return true;
        }
        $timestamp_to_date=Carbon::CreateFromTimestamp($date)->format('j.n.Y');
        $exp_prices=explode(',',$price);
        foreach($exp_prices as $p){
            if($p==$timestamp_to_date){
                return false;
            }
        }
        return true;
    }

    public function findNextOpenDate($date,$offer,$uid){
        $enddate=DB::table('price')->where('uid',$uid)->value('enddate');
        for($i=$date;$i<$enddate;$i+=86400){
            if($this->checkIfDateOpen($i,$offer,$uid)){
                return $i;
            }
        }
        return 999999999999999999;
    }

    public function getMainParent($category,$return_id=0){
    
        if(strlen($category)>3){
            $id=DB::table('category')->where('title',$category)->value('uid');
            if($id==null || $id==''){
                $id=DB::table('tx_realurl_uniqalias')->where([['tablename','tx_travel_domain_model_category'],['value_alias',$category]])->value('value_id');
                if($id==null || $id==''){
                    return $id.'=null';
                }
            }
        }else{
            $id=$category;
        }

        $parent=DB::table('category')
            ->join('category as CB','category.parent','CB.uid')
            ->where('category.uid',$id)
            ->select('CB.uid','CB.title','CB.parent')
            ->get();
        if($parent[0]->uid<4){
            if($return_id==1){
                return $parent[0]->uid;
            }
            $parent_name=$parent[0]->title;
        }else{
            if($return_id==1){
                return DB::table('category')->where('uid',$parent[0]->parent)->value('uid');
            }
            $parent_name=DB::table('category')->where('uid',$parent[0]->parent)->value('title');
        }
        $parent_name=str_replace('ü','ue',$parent_name);
        return strtolower($parent_name);
    }

    public function stats(){
     
        $dates=DB::Select(DB::raw('SELECT DATE(FROM_UNIXTIME(crdate)) as order_day, sum(price_total) as bookingTotal, count(uid) as NumberOfBooking from purchases group by order_day'));
        echo "<table style='float:left'>";
        echo "<tr>";
        echo "<th>Booking Date</th>";
        echo "<th>Number Of Bookings</th>";
        echo "<th>Total Bookings</th>";
        echo "</tr>";
        foreach($dates as $de)
        {
            echo "<tr>";
            echo "<td>$de->order_day</td>";
            echo "<td>$de->NumberOfBooking</td>";
            echo "<td>$de->bookingTotal</td>";
            //echo $de->order_day." total:".$de->order_day."</br>";
            echo "</tr>";
        }
        $dates=DB::Select(DB::raw("SELECT CONCAT(YEAR(FROM_UNIXTIME(crdate)),'/' ,WEEK(FROM_UNIXTIME(crdate))) as order_week, sum(price_total) as bookingTotal, count(uid) as NumberOfBooking from purchases group by order_week"));
        echo "<table style='float:left'>";
        echo "<tr>";
        echo "<th>Booking Week</th>";
        echo "<th>Number Of Bookings</th>";
        echo "<th>Total Bookings</th>";
        echo "</tr>";
        foreach($dates as $de)
        {
            echo "<tr>";
            echo "<td>$de->order_week</td>";
            echo "<td>$de->NumberOfBooking</td>";
            echo "<td>$de->bookingTotal</td>";
            //echo $de->order_day." total:".$de->order_day."</br>";
            echo "</tr>";
        }
        echo "</table>";
        $dates=DB::Select(DB::raw('SELECT DATE(FROM_UNIXTIME(crdate)) as order_day, sum(price_total) as bookingTotal, count(uid) as NumberOfBooking from purchases group by order_day order by bookingTotal desc'));
        echo "<table>";
        echo "<tr>";
        echo "<th>Booking Date</th>";
        echo "<th>Number Of Bookings</th>";
        echo "<th>Total Bookings</th>";
        echo "</tr>";
        foreach($dates as $de)
        {
            echo "<tr>";
            echo "<td>$de->order_day</td>";
            echo "<td>$de->NumberOfBooking</td>";
            echo "<td>$de->bookingTotal</td>";
            //echo $de->order_day." total:".$de->order_day."</br>";
            echo "</tr>";
        }
        echo "</table>";
        //return $dates;
    }

    public function fixLinks($string){
        $string=str_replace('ö','oe',$string);
        $string=str_replace('ü','ue',$string);
        $string=str_replace('ä','ae',$string);

        return $string;
    }
}


// startdate 1462053600 - 1475272800
// enddate	1632866400 - 1619733600