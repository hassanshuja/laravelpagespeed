<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Input as Input;
use File;
use DateTime;
use Session;
use PDF;
use PDF2;
use Mail;
use SnappyImage;
use View;
use \Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Log;

class updateController extends Controller
{
    public function uploadOfferPics(Request $r,$offerId){
        //return $request;
        $sorting=0;
        foreach($r->picture as $pic){
            $file= $pic;
            $image = Image::make($file);
            $mainFileName=time()."-".rand(10000000,999999999);
            
            if(!$file){
                return false;
            }
    
            $mime = $file->getMimeType();
            $ext=explode("/",$mime);
            $ext=$ext[1];
            $acceptedFormats=array('jpg','jpeg','png','gif','mp4','mov','wav','avi','webp');
            
            if(!in_array($ext,$acceptedFormats)){
                return false;
            }

            //landscape
            $image->resize(null, 760, function($constraint){
                $constraint->aspectRatio();
            });
    
            $img_name=time().'.'.$ext;
            $path='../public/assets/temp_images/'.$img_name;

            if($image->save($path)){
                $fileName=$file->getClientOrignalName();
                if(substr($mime, 0, 5) == 'image'){
                    //upload image
                    if(in_array($ext,$acceptedFormats)){
                        $dirImage="../public/assets/img/tx_travel";  
                    }else{
                        continue;
                    }
                        
                    if(!is_dir($dirImage)){
                        if(!File::makeDirectory($dirImage, 0775, true)){
                            break;
                        }
                    } 

                    if(!File::move($path,$dirImage."/".$fileName)){
                        continue;
                    }

                }else{
                    continue;
                }

            }else{
                continue;
            }
            
            //insert to db here

            $insert=DB::table('images2')
                ->insert([
                    'image'=>'tx_travel/'.$fileName.".".$ext,
                    'offer'=>$offerId,
                    'image_src'=>$fileName.".".$ext,
                    'crdate'=>time(),
                    'sorting'=>$sorting
                ]);
            $sorting++;    
        }
    }
    public function previewPhoto(Request $r){
       $i=0;
        $data=[];
        foreach($r->picture as $pic){
            $file= $pic;
            $image = Image::make($file);
            if(!$file){
                return false;
            }
    
            $mime = $file->getMimeType();
            $ext=explode("/",$mime);
            $ext=$ext[1];
            $acceptedFormats=array('jpg','jpeg','png','gif','mp4','mov','wav','avi','webp');
            
            if(!in_array($ext,$acceptedFormats)){
                return false;
            }

            //landscape
            $image->resize(500, null, function($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            });
    
            $img_name=$pic->getClientOriginalName();
            $path='../public/assets/temp_images/'.$img_name;

            if($image->save($path)){
                $save=DB::table('temp_images')->insert(['name'=>$img_name,'sorting'=>$i,'session_id'=>Session::get('user')->uid]);
            }
            $i++;
        }
        return DB::table('temp_images')->where('session_id',Session::get('user')->uid)->get();
    }
    public function previewPhotoSingle(Request $r){
        DB::table('temp_images')->where('session_id',Session::get('user')->uid)->delete();
        return $this->previewPhoto($r);
    }

    public function uploadRegionPic($regionId){
        // DB::table('sys_file_reference')
        //     ->join('sys_file','sys_file.uid','sys_file_reference.uid_local')
        //     ->where([['uid_foreign',$regionId],['identifier','like','%regionen%']])->delete();
        $pics=DB::table('temp_images')->where('session_id',Session::get('user')->uid)->get();
        foreach($pics as $p){
            $ext=explode(".",$p->name);
            $data['tstamp']=time();
            $data['identifier']='images/regionen/'.$p->name;
            $data['creation_date']=time();
            $data['extension']=$ext[1];
            $data['mime_type']="image/".$ext[1];
            $insertToSysFile=DB::table('sys_file')->insert($data);
            $uid=DB::table('sys_file')->max('uid');
            $data2['crdate']=time();
            $data2['uid_local']=$uid;
            $data2['uid_foreign']=$regionId;
            $data2['fieldname']='image';
            $data2['tablenames']='tx_travel_domain_model_region';
            $insertToSysFileReference=DB::table('sys_file_reference')->insert($data2);
            File::move('../public/assets/temp_images/'.$p->name,'../public/assets/images/regionen/'.$p->name);
        }
        return true;
    }

    public function uploadCategoryPic($catId){
        $pics=DB::table('temp_images')->where('session_id',Session::get('user')->uid)->get();
        $delete=DB::table('sys_file_reference')
            ->join('sys_file','sys_file_reference.uid_local','sys_file.uid')
            ->where([['uid_foreign',$catId],['identifier','like','%category%']])
            ->delete();
        $gjyshi=DB::table('category')->where('uid',$catId)->value('parent');
        if($gjyshi>3){
            $gjyshi=DB::table('category')->where('uid',$gjyshi)->value('parent');
            if($gjyshi>3){
                $gjyshi=DB::table('category')->where('uid',$gjyshi)->value('parent');                
            }
        }
        $catName=DB::table('category')->where('uid',$gjyshi)->value('title');

        $catName=strtolower($catName);
        $catName=str_replace('ü','ue',$catName);
        
        foreach($pics as $p){
            $ext=explode(".",$p->name);
            $data['tstamp']=time();
            $data['identifier']='/images/category/'.$catName.'/'.$p->name;
            $data['creation_date']=time();
            $data['extension']=$ext[1];
            $data['mime_type']="image/".$ext[1];
            $insertToSysFile=DB::table('sys_file')->insert($data);
            $uid=DB::table('sys_file')->max('uid');
            $data2['crdate']=time();
            $data2['uid_local']=$uid;
            $data2['uid_foreign']=$catId;
            $data2['fieldname']='image';
            $data2['tablenames']='tx_travel_domain_model_category';
            $data2['sorting_foreign']=1;
            $insertToSysFileReference=DB::table('sys_file_reference')->insert($data2);
            File::move('../public/assets/temp_images/'.$p->name,'../public/assets/images/category/'.$catName."/".$p->name);
        }
        return true;
    }


    public function deleteTmp($uid){
        $getName=DB::table('temp_images')->where('id',$uid)->value('name');

        $delete=DB::table('temp_images')->where('id',$uid)->delete();

        unlink('assets/temp_images/'.$getName);

        return response()->json(['message'=>'deleted','success'=>1],200);

    }


    public function addRegion(Request $r){
    
       
        $insert=DB::table('region')
            ->insert([
                'title'=>$r->title,
                'description'=>$r->description,
                'parent'=>$r->parent,
                'tstamp'=>time(),
                'crdate'=>time(),
                'hidden'=>0,
                'sorting'=>$r->sorting,
                'svgcode'=>$r->svg_code,
                'seo'=>$r->seo
            ]);
        if($insert){
            $lastId=DB::table('region')->max('uid');
            $this->uploadRegionPic($lastId);
            $titleForLink=$this->formatForTitle($r->title);
            $checkIfLinkExists=DB::table('tx_realurl_uniqalias')->where([['tablename','tx_travel_domain_model_region'],['value_alias',$titleForLink]])->count();
            if($checkIfLinkExists>0){
                $titleForLink.='-1';
            }
            $insertToLinks=DB::table('tx_realurl_uniqalias')   
                ->insert([
                        'tablename'=>'tx_travel_domain_model_region',
                        'field_alias'=>'title',
                        'field_id'=>'uid',
                        'value_alias'=>$titleForLink,
                        'value_id'=>$lastId
                        ]);       
            Session::flash('success','Region Inserted');
            return redirect()->action('mainController@listRegionsForEdit');  
        }else{
            Session::flash('fail','Something went wrong');
            return back()->withInput();  
        }
    }

    public function addOffer(Request $r){
        // return $r;
        $totalOptions=0;
        $dataToInsert=[];
        $exceptions=['_token','related_offer','related','images','picture','options','additionals','additional','option','regions','categories'];
        foreach($_POST as $k=>$v){
            if(in_array($k,$exceptions) || $v=='' || $v==null){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        if(isset($r->related)){
            $dataToInsert['related_offer']=$r->related[0];
            if(count($r->related)>1){
                for($i=1;$i<count($r->related);$i++){
                    $dataToInsert['related_offer'].=','.$r->related[$i];
                }
            }
        }
        if(isset($r->categories)){
            if(count($r->categories)==1){
                $dataToInsert['categories']=$r->categories[0];
            }else{
                $dataToInsert['categories']=$r->categories[0];
                for($i=1;$i<count($r->categories);$i++){
                    $dataToInsert['categories'].=','.$r->categories[$i];
                }
            }
        }
        if(isset($r->regions)){
            if(count($r->regions)==1){
                $dataToInsert['region']=$r->regions[0];
            }else{
                $dataToInsert['region']=$r->regions[0];
                for($i=1;$i<count($r->regions);$i++){
                    $dataToInsert['region'].=','.$r->regions[$i];
                }
            }
        }

        if(!isset($r->title) || $r->title=='' || $r->title==null){
            Session::flash('fail','Title required');
            return back()->withInput();
        }
    
        if(Input::hasFile('picture')){
            $dataToInsert['images']=count($r->picture);
        }

       if(isset($r->additionals)){
           $dataToInsert['additionals']=count($r->additionals);
       }

       if(isset($r->categories)){
           $cats='';
           $i=0;
           foreach($r->categories as $cat){
                if($i==0){
                    $cats.=$cat;
                }else{
                    $cats.=",$cat";
                }
                $i++;
           }
           $dataToInsert['categories']=$cats;
       }

       if(isset($r->options)){
           $dataToInsert['options']=DB::table('options')->where([['offer',0],['cruser_id',Session::get('user')->uid]])->count();
       }
       
       if(isset($r->prices)){
           $dataToInsert['prices']=count($r->prices);
       }

       if(isset($r->starttime)){
            $dataToInsert['starttime']=strtotime($r->starttime);
       }

       if(isset($r->endtime)){
            $dataToInsert['endtime']=strtotime($r->endtime);
       }
        $dataToInsert['crdate']=time();
        $dataToInsert['hidden']=1;
        $titleForLink=$this->formatForTitle($dataToInsert['title']);
        $checkIfLinkExists=DB::table('tx_realurl_uniqalias')->where([['value_alias',$titleForLink],['tablename','tx_travel_domain_model_offer']])->count();
        if($checkIfLinkExists>0){
            $titleForLink.='-1';
        }
        $lastOffer1=DB::table('offer')->insert($dataToInsert);
        $lastOffer=DB::table('offer')->max('uid');
        if($lastOffer1){
            $insertToLinks=DB::table('tx_realurl_uniqalias')
                ->insert([
                    'tablename'=>'tx_travel_domain_model_offer',
                    'field_alias'=>'title',
                    'field_id'=>'uid',
                    'value_alias'=>$titleForLink,
                    'value_id'=>$lastOffer]);
        }
        $updateOptions=DB::table('options')->where([['offer',0],['cruser_id',Session::get('user')->uid]])->update(['offer'=>$lastOffer]);
        if($lastOffer>0){     
            //insert pictures
            $images=$this->insertPics($lastOffer);
            $update=DB::table('offer')->where('uid',$lastOffer)->update(['images'=>$images]);
            if(isset($r->prices)){ 
                foreach($_POST['prices'] as $price){
                    $pricesToInsert=['offer'=>$lastOffer];
                    $optionsToInsert=[];
                    foreach($price as $k=>$v){
                        if($v==''){
                            continue;
                        }
                       
                        $pricesToInsert[$k]=$v;
                    }   
                    //insert prices
                    $pricesToInsert['startdate']=strtotime($pricesToInsert['startdate']);
                    $pricesToInsert['enddate']=strtotime($pricesToInsert['enddate']);
                    $insertPrice=DB::table('price')
                        ->insert($pricesToInsert);
                } 
            }
           
            if($r->additionals){
                foreach($_POST['additionals'] as $additional){
                    $additioanlsToInsert=['offer'=>$lastOffer];
                    $optionsToInsert=[];
                    foreach($additional as $k=>$v){
                        if($v==''){
                            continue;
                        }
                        $additioanlsToInsert[$k]=$v;
                    }
                    $insertAdditional=DB::table('additional')
                        ->insert($additioanlsToInsert);
                }
            }
            Session::flash('success','Offer Saved, '.$images.' inserted');
            return redirect()->action('mainController@editOfferForm',['offer_id'=>$lastOffer]);
        }else{
            Session::flash('fail','Something went wrong');
            return redirect()->back()->withInput();
        }
    }

    public function addTourOperator(Request $request){
        $dataToInsert=[];
        foreach($_POST as $k=>$v){
            if($v=='' || $k=='_token'){
                continue;
            }else{
                $dataToInsert[$k]=$v;
            }
        }
        $dataToInsert['crdate']=time();
        if(!isset($request->title)){
            return response()->json(['message'=>'No title','success'=>0]);
        }
       
        $insert=DB::table('touroperator')
            ->insert($dataToInsert);
        if($insert){
            Session::flash('success','Tour Operator  <b>'.$request->title.'</b> Added');
            return redirect()->action('mainController@listTourOperatorsForEdit');
        }else{
            Session::flash('fail','Tour  Operator <b>'.$request->title.'</b> Could not be added');
            return redirect()->action('mainController@listTourOperatorsForEdit');
        }
    }

    protected function insertPics($offer){
        $pics=DB::table('temp_images')->where('session_id',Session::get('user')->uid)->get();
        $i=0;

        foreach($pics as $p){
            $path='../public/assets/temp_images/'.$p->name;
            File::move($path,"../public/assets/img/tx_travel/".$p->name);
            DB::table('images2')->insert(['offer'=>$offer,'image'=>"/tx_travel/".$p->name,'crdate'=>time(),'sorting'=>$p->sorting,'image_src'=>'/tx_travel/'.$p->name]);
            $i++;
        }
        $delete=DB::table('temp_images')->where('session_id',Session::get('user')->uid)->delete();
        if($delete){
            return $i;
        }else{
            return false;
        }
    }


    public function addCategory(Request $request){
        return $request;
        foreach($_POST as $k=>$v){
            if($v==null || $k=='_token' || $k=='picture'){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        
        if($request->title=='' || $request->title==null || !isset($request->title)){
            Session::flash('fail','Title required');
            return back()->withInput();
        }

        $dataToInsert['crdate']=time();
        $insert=DB::table('category')->insert($dataToInsert);
        $lastId=DB::table('category')->max('uid');
        $titleForLink=$this->formatForTitle($dataToInsert['title']);
        $checkIfLinkExists=DB::table('tx_realurl_uniqalias')->where([['tablename','tx_travel_domain_model_category'],['value_alias',$titleForLink]])->count();
        if($checkIfLinkExists>0){
            $titleForLink.='-1';
        }
        if($insert){
            $this->uploadCategoryPic($lastId);
            $insertToLinks=DB::table('tx_realurl_uniqalias')
                ->insert(['tablename'=>'tx_travel_domain_model_category',
                    'field_alias'=>'title',
                    'field_id'=>'uid',
                    'value_alias'=>$titleForLink,
                    'value_id'=>$lastId
                    ]);
            Session::flash('success','Category Inserted');
            return redirect()->action('mainController@editCategoryForm',['category_id'=>$lastId]);  
        }else{
            Session::flash('fail','Could not insert');
            return back()->withInput();
        }
    }
    
    public function addVoucher(Request $request){
        foreach($_POST as $k=>$v){
            if($k=='_token' || $k=='picture'){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        $dataToInsert['date']=strtotime($request->date);
        if(isset($request->picture)){
            $file=$request->file('picture');
            $file->move('assets/voucher',$file->getClientOriginalName());
            $dataToInsert['image']=$file->getClientOriginalName();
        }
        $dataToInsert['crdate']=time();
        $insert=DB::table('vaucher_templates')->insert($dataToInsert);
        if($insert){
            Session::flash('success','Voucher Added');
            return redirect()->action('mainController@listVouchersForEdit');
        }else{
            Session::flash('fail','Could not add, error');
            return redirect()->back();
        }
    }
 
    public function submitEditVoucher(Request $request){
       
        foreach($_POST as $k=>$v){
            if($k=='_token' || $k=='picture'){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        $dataToInsert['date']=strtotime($request->date);
        if(isset($request->picture)){
            $file=$request->file('picture');
            $file->move('assets/voucher',$file->getClientOriginalName());
            $dataToInsert['image']=$file->getClientOriginalName();
        }
        $update=DB::table('vaucher_templates')->where('uid',$request->uid)->update($dataToInsert);
        if($update){
            Session::flash('success','Voucher Added');
            return redirect()->action('mainController@listVouchersForEdit');
        }else{
            Session::flash('fail','Could not edit, error');
            return redirect()->back();
        }

    }

    public function offerActions($offer_id,$action){
        $offerTitle=DB::table('offer')->where('uid',$offer_id)->pluck('title');
        switch($action){
            case('delete'):
                $update=DB::table('offer')
                    ->where('uid',$offer_id)
                    ->update(['deleted'=>1]);
                $message='Deleted';     
                break;
            case('unDelete'):
                $update=DB::table('offer')
                    ->where('uid',$offer_id)
                    ->update(['deleted'=>0]);
                $message='Un-deleted';  
                break;
            case('hide'):
                $update=DB::table('offer')
                    ->where('uid',$offer_id)
                    ->update(['hidden'=>1]);
                 $message='Hidden';  
                break;
            case('unHide'):
                $update=DB::table('offer')
                    ->where('uid',$offer_id)
                    ->update(['hidden'=>0]);
                $message='Un-Hidden';    
                break;
            
        }
        if($update){
            Session::flash('success',"Offer <b>".$offerTitle[0]."</b> ".$message);
            return response()->json(['success'=>'1','message'=>'Updated'],200);
        }else{
            Session::flash('fail','Error, could not complete action');
            return response()->json(['success'=>'1','message'=>'Updated'],200);
        }


    }

    public function imageActions($image_id,$action){
        switch($action){
            case('delete'):
                $update1=DB::table('images2')
                    ->where('uid',$image_id)
                    ->delete();
                 
                $message='Deleted';    
                break;  
            // case('unDelete'):
            //     $update1=DB::table('images2')
            //         ->where('uid',$image_id)
            //         ->update(['deleted'=>0]);
                
            
            //     $message='un-Deleted';
            //     break;
            case('Hide'):
                $update1=DB::table('images2')
                    ->where('uid',$image_id)
                    ->update(['hidden'=>1]);
                $message='Hidden';
            
            break;
            case('unHide'):
                $update1=DB::table('images2')
                    ->where('uid',$image_id)
                    ->update(['hidden'=>0]);
                $message='un-Hidden';
            
            break;
        }
        Session::flash('success','Image '.$message);
        return response('success',200);
    }

    public function priceActions($price_id,$action){
        switch($action){
            case('hide'):
                $query=DB::table('price')
                    ->where('uid',$price_id)
                    ->update(['hidden'=>1]);
                
                $offer_id=DB::table('price')
                    ->where('uid',$price_id)
                    ->pluck('offer');

                $message='Hidden';    
            break;
            case('unHide'):
                $query=DB::table('price')
                    ->where('uid',$price_id)
                    ->update(['hidden'=>0]);
                
                $offer_id=DB::table('price')
                    ->where('uid',$price_id)
                    ->pluck('offer');

                
                $message='unHidden'; 
            break;
            case('delete'):
                $query=DB::table('price')
                    ->where('uid',$price_id)
                    ->update(['deleted'=>1]);
                
                $offer_id=DB::table('price')
                    ->where('uid',$price_id)
                    ->pluck('offer');

                $updateOffer=DB::table('offer')
                    ->where('uid',$offer_id[0])
                    ->decrement('prices',1);
                $message='Deleted'; 

            break;
            case('unDelete'):
                $query=DB::table('price')
                    ->where('uid',$price_id)
                    ->update(['deleted'=>0]);
                
                $offer_id=DB::table('price')
                    ->where('uid',$price_id)
                    ->pluck('offer');

                $updateOffer=DB::table('offer')
                    ->where('uid',$offer_id[0])
                    ->increment('prices',1);
                $message='un deleted'; 
            break;
        }
        Session::flash('success','Price '.$message);
        return response('success',200);

    }

    public function additionalActions($additional_id,$action){
        $offer=DB::table('additional')->where('uid',$additional_id)->pluck('offer');
        switch($action){
            case('delete'):
                $update=['deleted'=>1]; 
             
            break;
            case('unDelete'):
                $update=['deleted'=>0];
               
            break;
            case('hide'):
                $update=['hidden'=>1];
                $message='Hidden';
            break;
            case('unHide'):
                $update=['hidden'=>0];
                $message='Un Hidden';
            break;
        }
        $updateAdditionals=DB::table('additional')->where('uid',$additional_id)->update($update);
        Session::flash('success','Additional '.$message);
        return response('success',200);
    }
    
    public function regionActions($region_id,$action){
        switch($action){
            case('delete'):
                $update=['deleted'=>1];
                $message='Deleted';
            break;
            case('unDelete'):
                $update=['deleted'=>0];
                $message='Un Deleted';
            break;
            case('hide'):
                $update=['hidden'=>1];
                $message='Hidden';
            break;
            case('unHide'):
                $update=['hidden'=>0];
                $message='Un Hidden';
            break;
        }
        $updateRegion=DB::table('region')->where('uid',$region_id)->update($update);
        Session::flash('success','Region '.$message);
        return response('success',200);


    }

    public function categoryActions($category_id,$action){
        switch($action){
            case('delete'):
                $update=['deleted'=>1];
                $message='deleted';
            break;
            case('unDelete'):
                $update=['deleted'=>0];
                $message='un deleted';
            break;
            case('hide'):
                $update=['hidden'=>1];
                $message='hidden';
            break;
            case('unHide'):
                $update=['hidden'=>0];
                $message='unhiden';
            break;
        }
        $updateCategory=DB::table('category')->where('uid',$category_id)->update($update);
        Session::flash('success','Category '.$message);
        return response('success',200);
    }

    public function deleteRegionImage($region_id){
        $update=DB::table('region')
            ->where('uid',$region_id)
            ->update(['image'=>'']);
        Session::flash('success','Image Deleted');
        return response('success',200);
    }

    public function be_userActions($action,$user_id){
        
        switch($action){
            case('delete'):
                $data=['deleted'=>1];
                $message='Deleted';
            break;
            case('unDelete'):
                $data=['deleted'=>0];
                $message='Undeleted';
            break;    
        }
        
        $update=DB::table('be_users')
            ->where('uid',$user_id)
            ->update($data);
        if($update){
            Session::flash('success','User '.$message );
            return response('success',200);
        }    
    }
    
    public function tourOperatorActions($tid,$action){
        $name=DB::table('touroperator')->where('uid',$tid)->pluck('title');
        switch($action){
            case('delete'):
                $update=['deleted'=>1];
                $message='deleted';
            break;
            case('unDelete'):
                $update=['deleted'=>0];
                $message='un deleted';
            break;
            case('hide'):
                $update=['hidden'=>1];
                $message='hidden';
            break;
            case('unHide'):
                $update=['hidden'=>0];
                $message='un hidden';
            break;
        }
        $updateTo=DB::table('touroperator')->where('uid',$tid)->update($update);
        Session::flash('success','Tour operator <b>'.$name[0].'</b> '.$message);
        return response('success',200);
    }

    public function voucherActions($vid,$action){
        switch($action){
            case('hide'):
                $dataToInsert=['hidden'=>1];
                $message='hidden';
                break;
            case('unHide'):
                $dataToInsert=['hidden'=>0];
                $message='unhidden';
            break;
        }
        $update=DB::table('vaucher_templates')->where('uid',$vid)->update($dataToInsert);
        if($update){
            Session::flash('success','Vaucher '.$message);
        }else{
            Session::flash('fail','Vaucher '.$message);
        }
    }

    public function submitEditPrice(Request $r){
 
        foreach($_POST['prices'] as $k=>$v){
            if($k=='_token'){
                continue;
            }
            $pricesToInsert[$k]=$v;
        }
       
        $pricesToInsert['startdate']=strtotime($pricesToInsert['startdate']);
        $pricesToInsert['enddate']=strtotime($pricesToInsert['enddate']);
        // return $pricesToInsert;
        $updatePrices=DB::table('price')
            ->where('uid',$_POST['uid'])
            ->update($pricesToInsert);    
   
        $offer_id=DB::table('price')
            ->where('uid',$_POST['uid'])
            ->value('offer');

        $this->fixDates($offer_id);    
        Session::flash('success','Price edited successfully'); 
        return redirect()->back()->withInput();
     
    }

    public function submitEditRegion(Request $request){
        $dataToInsert=[];
        $uid=$request->uid;
        foreach($_POST as $k=>$v){
            if($k=='_token' || $k=='uid' || $k=='hasPicture'){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        
        if(Input::hasFile('logo')){
            $photoName=$request->logo->getClientOriginalName();
            $request->logo->move(public_path('assets/img/regionen'),$photoName);
            $dataToInsert['image_region']='/img/regionen/'.$photoName;
        }
        //update URL
        // $finalString=$this->formatForTitle($dataToInsert['title']);

        // $updateUrl=DB::table('tx_realurl_uniqalias')
        //     ->where([['value_id',$request->uid],['tablename','tx_travel_domain_model_region']])
        //     ->update(['value_alias'=>$finalString]);

        $updatePic=$this->uploadRegionPic($request->uid);  
        
        $update=DB::table('region')
            ->where('uid',$uid)
            ->update($dataToInsert);
        if($update || $updatePic){
            Session::flash('success','Region Edited');  
            return redirect()->action('mainController@listRegionsForEdit');
        }else{  
            Session::flash('fail','Something went wrong');
            return redirect()->action('mainController@listRegionsForEdit');  
        }

    }

    public function submitEditTourOperator(Request $request){
        $dataToInsert=[];
        foreach($_POST as $k=>$v){
            if($k=='_token' || $k=='uid'){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        $update=DB::table('touroperator')
            ->where('uid',$request->uid)
            ->update($dataToInsert);
        if($update){
            Session::flash('success','Tour operator updated');  
            return redirect()->action('mainController@listTourOperatorsForEdit');
        }else{
            Session::flash('fail','Failed');  
            return redirect()->action('mainController@listTourOperatorsForEdit');
        }    
    }

    public function submitEditCategory(Request $request){
        $dataToInsert=[];
        $changePic=false;
        foreach($_POST as $k=>$v){
            if($k=='_token' || $k=='uid' || $k=='hasPicture'){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        if(isset($request->hasPicture)){
            $changePic=$this->uploadCategoryPic($request->uid);
        }
        //update URL
       
        $finalString=$this->formatForTitle($dataToInsert['title']);

        
        $checkIfExists=DB::table('tx_realurl_uniqalias')
            ->where([['tablename','tx_travel_domain_model_category'],['value_id','!=',$request->uid],['field_alias','title_url'],['value_alias',$finalString]])
            ->count();
        if($checkIfExists>0){
            $finalString.='-1';
        }    
        // $updateUrl=DB::table('tx_realurl_uniqalias')
        //     ->where([['value_id',$request->uid],['tablename','tx_travel_domain_model_category']])
        //     ->update(['value_alias'=>$finalString]);
        
        $update=DB::table('category')
            ->where('uid',$request->uid)
            ->update($dataToInsert);
        if($update || $changePic){
            Session::flash('success','Category Updated');
            return redirect()->back()->withInput();
        }else{
            Session::flash('fail','Something went wrong');
            return redirect()->action('mainController@listCategoriesForEdit');
        }    
    }

    public function submitEditAdditional(Request $request){
        foreach($request->additionals as $k=>$v){
            $additionalToInsert[$k]=$v;
        }   

        $updateAdditional=DB::table('additional')
            ->where('uid',$request->uid)
            ->update($additionalToInsert);

   

        $offer_id=DB::table('additional')
            ->where('uid',$_POST['uid'])
            ->pluck('offer');
        Session::flash('success','Additional Updated');
        return redirect()->back()->withInput();
        
    }

    public function submitEditOption(Request $request){
        DB::table('options')->where('uid',$request->uid)->update(['title'=>$request->title,'subtitle'=>$request->subtitle]);
        Session::flash('success','Option Saved');
    }

    public function submitEditOffer(Request $request){

	if (!$request->get('entered_tab')) {
		$fullUrl = \URL::previous();
		$params = explode('?activeTab=', $fullUrl);
		if (!isset($params[1])) {
			$activeTab = 'home';
		} else {
			$activeTab = $params[1];
		}
		
	} else {
		$activeTab = $request->get('entered_tab');
	}
$request->offsetUnset('entered_tab');
        // return $request->related;
        // dd($request->informacion);
        $totalOptions=0;
        $dataToInsert=[];
        if(isset($request->categories)){
            if(count($request->categories)==1){
                $dataToInsert['categories']=$request->categories[0];
            }else{
                $dataToInsert['categories']=$request->categories[0];
                for($i=1;$i<count($request->categories);$i++){
                    $dataToInsert['categories'].=','.$request->categories[$i];
                }
            }
        }
//dd($request->uid);
        $picsInserted=$this->insertPics($request->uid);
        if(isset($request->regions)){
            if(count($request->regions)==1){
                $dataToInsert['region']=$request->regions[0];
            }else{
                $dataToInsert['region']=$request->regions[0];
                for($i=1;$i<count($request->regions);$i++){
                    $dataToInsert['region'].=','.$request->regions[$i];
                }
            }
        }
       
        if(isset($request->prices)){
            $option=0;
            foreach($_POST['prices'] as $price){
                $pricesToInsert=['offer'=>$request->uid];
               
                foreach($price as $k=>$v){
                    if($v==''){
                        continue;
                    }
                    $pricesToInsert[$k]=$v;
                }   
                //insert prices
                $pricesToInsert['startdate']=strtotime($pricesToInsert['startdate']);
              
                $pricesToInsert['enddate']=strtotime($pricesToInsert['enddate']);
                $insertPrice=DB::table('price')
                    ->insert($pricesToInsert);
            } 
        }
      
        if(isset($request->categories)){
            if(count($request->categories)==1){
                $dataToInsert['categories']=$request->categories[0];
            }else{
                $dataToInsert['categories']=$request->categories[0];
                for($i=1;$i<count($request->categories);$i++){
                    $dataToInsert['categories'].=','.$request->categories[$i];
                }
            }
        }
        if(isset($request->regions)){
            if(count($request->regions)==1){
                $dataToInsert['region']=$request->regions[0];
            }else{
                $dataToInsert['region']=$request->regions[0];
                for($i=1;$i<count($request->regions);$i++){
                    $dataToInsert['region'].=','.$request->regions[$i];
                }
            }
        }

        if(isset($request->additionals)){
            $option=0;
            foreach($_POST['additionals'] as $additional){
                $additioanlsToInsert=['offer'=>$request->uid];
                foreach($additional as $k=>$v){
                    if($v=='' || $k=='region' || $k=='categories'){
                        continue;
                    }
                  
                    $additioanlsToInsert[$k]=$v;
                }
                
                $insertAdditional=DB::table('additional')
                    ->insert($additioanlsToInsert);
            }
        }

                
      
        
        $exceptions=['options','prices','additionals','images','pictures','_token','related','regions','region','category','categories','selectedOption'];
        $exceptions2=['touroperator','region','categories','category'];
        foreach($_POST as $k=>$v){
            if(in_array($k,$exceptions)){
                continue;
            }
            if(in_array($k,$exceptions2)&& $v==null){
                $dataToInsert[$k]=0;
                continue;
            }
            $dataToInsert[$k]=$v;
        }

        
        //update URL
       
        // $finalString=$this->formatForTitle($dataToInsert['title']);
        // $updateUrl=DB::table('tx_realurl_uniqalias')
        //     ->where([['value_id',$request->uid],['tablename','tx_travel_domain_model_offer']])
        //     ->update(['value_alias'=>$finalString]);


        if(isset($request->related)){
            $dataToInsert['related_offer']=$request->related[0];
            if(count($request->related)>1){
                for($i=1;$i<count($request->related);$i++){
                    $dataToInsert['related_offer'].=','.$request->related[$i];
                }
            }
        }
        // return $dataToInsert;

        $dataToInsert['starttime']=strtotime($dataToInsert['starttime']);
        $dataToInsert['endtime']=strtotime($dataToInsert['endtime']);
        DB::enableQueryLog();
        unset($dataToInsert['entered_tab']);
        // return $dataToInsert;
        $update=DB::table('offer')
            ->where('uid',$request->uid)
            ->update($dataToInsert);
     
        Session::flash('success','Offer Updated');
	

        return redirect()->action('mainController@editOfferForm',['offer_id'=>$request->uid,'activeTab'=>$activeTab]); 
    }

    public function submitEditSeason(Request $request){
        if($request->season==1){
            //winter
            $update1=DB::table('category')
                ->where('category_season',1)
                ->orWhere('category_season',2)
                ->update(['season_order'=>1]);
            $update2=DB::table('category')
                ->where('category_season',3)
                ->orWhere('category_season',4)
                ->update(['season_order'=>0]);
        }else if($request->season==0){
            //summer
            $update1=DB::table('category')
                ->where('category_season',1)
                ->orWhere('category_season',2)
                ->update(['season_order'=>0]);
            $update2=DB::table('category')
                ->where('category_season',3)
                ->orWhere('category_season',4)
                ->update(['season_order'=>1]);
        }
        Session::flash('success','Season Changed');
        return redirect()->back();
    }

    //function that is used to create an array that is gonna be used to insert options
    public function optionMagic($option){
        foreach($option as $k=>$v){
            if($k=='title' && $v==''){
                return false;
            }
            if($v!=''){
                $data[$k]=$v;
            }
        }
        return $data;
    }

    public function swapOfferRank($offer1,$offer2){
        $offer1Rank=DB::table('offer')->where('uid',$offer1)->pluck('sorting');
        $offer2Rank=DB::table('offer')->where('uid',$offer2)->pluck('sorting');
        $update=DB::table('offer')->where('uid',$offer1)->update(['sorting'=>$offer2Rank[0]]);
        $update2=DB::table('offer')->where('uid',$offer2)->update(['sorting'=>$offer1Rank[0]]);
        if($update && $update2){
            Session::flash('success','Rank Updated');
        }else{
            Session::flash('fail','Rank not Updated');
        }
    }

    public function swapOfferRankDrop($offer1,$offer2){
        if($offer1==$offer2){
            return response('error',500);
        }
        // return ['offer1'=>$offer1,'offer2'=>$offer2];
        $offer1Rank=DB::table('offer')->where('uid',$offer1)->pluck('sorting');
        $offer2Rank=DB::table('offer')->where('uid',$offer2)->pluck('sorting');
        $update2=DB::table('offer')->where('uid',$offer2)->update(['sorting'=>$offer1Rank[0]]);
        $update3=DB::table('offer')->where('uid',$offer1)->increment('sorting',0.01);
        $tbl=DB::table('offer')
            ->where('sorting','>',$offer1Rank[0])
            ->orderBy('sorting')
            ->get();
        for($i=0;$i<count($tbl);$i++){
            $update=DB::table('offer')->where('uid',$tbl[$i]->uid)->increment('sorting',0.01);
            if($tbl[$i+1]->sorting>$tbl[$i]->sorting+0.01){
                break;
            }
        }
        if($update2){
            Session::flash('success','Rank Updated');
            return response('Success',200);
        }else{
            Session::flash('fail','Rank not Updated');
            return response('Not update error',500);
        }
    }
    
    public function swapCategoryRank($cat1,$cat2){
        $cat1Rank=DB::table('category')->where('uid',$cat1)->pluck('sorting');
        $cat2Rank=DB::table('category')->where('uid',$cat2)->pluck('sorting');
        $update=DB::table('category')->where('uid',$cat1)->update(['sorting'=>$cat2Rank[0]]);
        $update2=DB::table('category')->where('uid',$cat2)->update(['sorting'=>$cat1Rank[0]]);
        if($update && $update2){
            Session::flash('success','Rank Updated');
        }else{
            Session::flash('fail','Rank not Updated');
        }
    }
    
    public function swapCategoryRankDrop($cat1,$cat2){
        if($cat1==$cat2){
            return response('error',500);
        }
        $cat1Rank=DB::table('category')->where('uid',$cat1)->pluck('sorting');
        $cat2Rank=DB::table('category')->where('uid',$cat2)->pluck('sorting');
        $update2=DB::table('category')->where('uid',$cat2)->update(['sorting'=>$cat1Rank[0]]);
        $update3=DB::table('category')->where('uid',$cat1)->increment('sorting',0.01);
  
        $tbl=DB::table('category')
            ->where('sorting','>',$cat1Rank[0])
            ->orderBy('sorting')
            ->get();
        for($i=0;$i<count($tbl);$i++){
            $update=DB::table('category')->where('uid',$tbl[$i]->uid)->increment('sorting',0.01);
            if($tbl[$i+1]->sorting>$tbl[$i]->sorting+0.01){
                break;
            }
        }
        if($update2 && $update3){
            return "updated";
            Session::flash('success','Rank Updated');
        }else{
            return "not updated";
            Session::flash('fail','Rank not Updated');
        }
    }

    public function swapPriceRank($price1,$price2){
        $price1Rank=DB::table('price')->where('uid',$price1)->pluck('sorting');
        $price2Rank=DB::table('price')->where('uid',$price2)->pluck('sorting');
        $update=DB::table('price')->where('uid',$price1)->update(['sorting'=>$price2Rank[0]]);
        $update2=DB::table('price')->where('uid',$price2)->update(['sorting'=>$price1Rank[0]]);
        if($update && $update2){
            Session::flash('success','Rank Updated');
        }else{
            Session::flash('fail','Rank not Updated');
        }
    }

    public function swapPriceRankDrop($price1,$price2){
        $price1Rank=DB::table('price')->where('uid',$price1)->pluck('sorting');
        $price2Rank=DB::table('price')->where('uid',$price2)->pluck('sorting');
        $update2=DB::table('price')->where('uid',$price2)->update(['sorting'=>$price1Rank[0]]);
        $update3=DB::table('price')->where('uid',$price1)->increment('sorting',0.01);
        $tbl=DB::table('price')
            ->where('sorting','>',$price1Rank[0])
            ->orderBy('sorting')
            ->get();
        for($i=0;$i<count($tbl);$i++){
            $update=DB::table('price')->where('uid',$tbl[$i]->uid)->increment('sorting',0.01);
            if($tbl[$i+1]->sorting>$tbl[$i]->sorting+0.01){
                break;
            }
        }
        if($update2 && $update3){
            Session::flash('success','Rank Updated');
        }else{
            Session::flash('fail','Rank not Updated');
        }
    }

    public function swapAditionalRank($add1,$add2){
        $add1Rank=DB::table('additional')->where('uid',$add1)->pluck('sorting');
        $add2Rank=DB::table('additional')->where('uid',$add2)->pluck('sorting');
        $update=DB::table('additional')->where('uid',$add1)->update(['sorting'=>$add2Rank[0]]);
        $update2=DB::table('additional')->where('uid',$add2)->update(['sorting'=>$add1Rank[0]]);
        if($update && $update2){
            Session::flash('success','Rank Updated');
        }else{
            Session::flash('fail','Rank not Updated');
        }
    }
    
    public function swapAditionalRankDrop($add1,$add2){
        $add1Rank=DB::table('additional')->where('uid',$add1)->pluck('sorting');
        $add2Rank=DB::table('additional')->where('uid',$add2)->pluck('sorting');
        $update2=DB::table('additional')->where('uid',$add2)->update(['sorting'=>$add1Rank[0]]);
        $update3=DB::table('additional')->where('uid',$add1)->increment('sorting',0.01);
        $tbl=DB::table('additional')
            ->where('sorting','>',$add1Rank[0])
            ->orderBy('sorting')
            ->get();
        for($i=0;$i<count($tbl);$i++){
            $update=DB::table('additional')->where('uid',$tbl[$i]->uid)->increment('sorting',0.01);
            if($tbl[$i+1]->sorting>$tbl[$i]->sorting+0.01){
                break;
            }
        }
        if($update2 && $update3){
            Session::flash('success','Rank Updated');
        }else{
            Session::flash('fail','Rank not Updated');
        }
    }

    public function swapImageRank($image1,$image2){
        $i1R=DB::table('images2')->where('uid',$image1)->value('sorting');
        $i2R=DB::table('images2')->where('uid',$image2)->value('sorting');
        $uR1=DB::table('images2')->where('uid',$image2)->update(['sorting'=>$i1R]);
        $uR2=DB::table('images2')->where('uid',$image1)->update(['sorting'=>$i2R]);
        if($uR1 && $uR2){
            Session::flash('success','Image Rank Updated');
        }else{
            Session::flash('fail','Image Rank Not updated');
        }
    }

    public function swapImageRankDrop($image1,$image2){
        $i1R=DB::table('images2')->where('uid',$image1)->value('sorting');
        $i2R=DB::table('images2')->where('uid',$image2)->value('sorting');
        $uR1=DB::table('images2')->where('uid',$image2)->update(['sorting'=>$i1R]);
        $uR2=DB::table('images2')->where('uid',$image1)->increment('sorting',0.01);
        $tbl=DB::table('images2')
            ->where('sorting','>',$i1R)
            ->orderBy('sorting')
            ->get();
        for($i=0;$i<count($tbl);$i++){
            $update=DB::table('images2')->where('uid',$tbl[$i]->uid)->increment('sorting',0.01);
            if($tbl[$i+1]->sorting>$tbl[$i]->sorting+0.01){
                break;
            }
        }
        if($uR1 && $uR2){
            Session::flash('success','Image Rank Updated');
        }else{
            Session::flash('fail','Image Rank Not updated');
        }
    }

    public function pdf($uid,$save=0){
        $allData=DB::table('purchases')
            ->join('tx_backoffice_application_frontenduser_mm','tx_backoffice_application_frontenduser_mm.uid_local','purchases.uid')
            ->join('fe_users','fe_users.uid','tx_backoffice_application_frontenduser_mm.uid_foreign')
            ->join('offer','offer.uid','purchases.offer')
            ->where('purchases.uid',$uid)
            ->select('purchases.*','offer.title as offertitle','fe_users.*','purchases.crdate as created_at','purchases.confirmation_conditions as cc')
            ->orderBy('created_at','desc')
            ->limit(1)
            ->get();
        $html=View::make('reservations')->with('allData',$allData)->render();
        // $pdf = SnappyImage::loadView('reservations',compact('allData'));
        if($save==1){
            return $html;
        }



        $pdf = PDF::loadHtml($html);

    
        return @$pdf->download('Reservations-Bestätigung_'.$allData[0]->confirmation_id.'.pdf');
    }
    
    public function submitVaucher(Request $request){
		
        $user=$this->addFeUser($request);
        if($request->imgForm){
            $step1Form=$request->imgForm;
            if($step1Form){
                Session::forget('mainVaucherStep3');
                $request->session()->put('mainVaucherStep3',$step1Form);
            }
        }
        foreach($_POST as $k=>$v){
            if($k=='_token' || $v=='' || $k=='user'|| $k=='message' || $k=='send_type' ||$k=='payment_type'){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        $dataToInsert['customer_id']=$user;
        
        $dataToInsert['crdate']=time();
        $explode=explode('-',date("d-m-Y",strtotime($dataToInsert['valid_from'])));
        $dataToInsert['valid_from']=date("Y-m-d",strtotime($dataToInsert['valid_from']));
        $insert=DB::table('vauchers')
            ->insertGetId($dataToInsert);
        if($insert){
            $user_payment=request()->get('payment_type');
            $file_name='Rechnung';
            $data=DB::table('vauchers')
                ->leftJoin('vaucher_templates','vaucher_templates.sorting','vauchers.vaucher_template')
                ->where('vauchers.uid',$insert)
                ->select('vauchers.*','vaucher_templates.image','vauchers.uid as vid','vauchers.crdate as v_cdate')
                ->get();
            $data2=DB::table('vauchers')
                ->leftJoin('fe_users','fe_users.uid','vauchers.customer_id')
                ->where('vauchers.uid',$insert)
                ->select('vauchers.*','vauchers.uid as vid','fe_users.*','vauchers.crdate as v_cdate')
                ->get();
            if($user_payment!='Rechnung'){
                $user_payment.=' / Zahlungsbestätigung';
                $file_name='Zahlungsbestaetigung';
            }    
            $html=View::make('vouchBlade')->with('data',$data)->with('user_payment',$user_payment)->render();
            $pdf = PDF::loadHtml($html);//->setOption('margin-left', 0)->setOption('margin-right',0)->setOption('margin-top',0)->setOption('margin-bottom',0);
            $fp = public_path('assets/documents/Gutschein_'.$insert.'.pdf');

            if (file_exists($fp)) {
                unlink($fp);
            }
            $pdf->save($fp);

            $html2=View::make('voucherPDF')->with('data',$data2)->with('user_payment', $user_payment)->render();
            $pdf=PDF::loadHtml($html2);
            $fp2 = public_path('assets/documents/'.$file_name.'_'.$insert.'.pdf');

            if (file_exists($fp2)) {
                unlink($fp2);
            }
            $pdf->save($fp2);

            // send mail to the user that is registered
            $email=$request->user['email'];
            if($request->send_type=='Postversand'){
                Mail::send('mails/vaucher',['data'=>$data,'request'=>$request],function($message) use ($email,$insert){
                    $message->to($email, 'Meinweekend.ch: Ihr Wertgutschein')->subject('Meinweekend.ch: Ihr Wertgutschein');
                    $message->from('info@meinweekend.ch','Meinweekend');
                });
            }else{
                Mail::send('mails/vaucher',['data'=>$data,'request'=>$request],function($message) use ($email,$insert,$file_name){
                    $message->to($email, 'Meinweekend.ch: Ihr Wertgutschein')->subject('Meinweekend.ch: Ihr Wertgutschein');
                    $message->attach(public_path('assets/documents/Gutschein_'.$insert.'.pdf'),['as'=>'Gutschein_'.$insert.'.pdf','mime'=>'application/pdf']);
                    $message->attach(public_path('assets/documents/'.$file_name.'_'.$insert.'.pdf'),['as'=>$file_name.'_'.$insert.'.pdf','mime'=>'application/pdf']);
                    $message->from('info@meinweekend.ch','Meinweekend');
                });
            }
            
            Mail::send('mails/vaucher-meinweekend',['data'=>$data,'request'=>$request],function($message) use ($email,$insert,$file_name){
                $message->to('info@meinweekend.ch', 'Meinweekend.ch: Ihr Wertgutschein')->subject('Meinweekend.ch: Ihr Wertgutschein');
                $message->attach(public_path('assets/documents/Gutschein_'.$insert.'.pdf'),['as'=>'Gutschein_'.$insert.'.pdf','mime'=>'application/pdf']);
                $message->attach(public_path('assets/documents/'.$file_name.'_'.$insert.'.pdf'),['as'=>$file_name.'_'.$insert.'.pdf','mime'=>'application/pdf']);
                $message->from('info@meinweekend.ch','Meinweekend');
            });
            unlink(public_path('assets/documents/Gutschein_'.$insert.'.pdf'));
            unlink(public_path('assets/documents/'.$file_name.'_'.$insert.'.pdf'));
            return response()->json(['message'=>'inserted'],200);
        }else{
            return response()->json(['message'=>'Failed'],500);
        }
    }

   
    private function addFeUser(Request $request){
        foreach($request->user as $k=>$v){
            if($v==''){
                continue;
            }
            $userToInsert[$k]=$v;
        }
        if(isset($userToInsert['gender'])){
            if($userToInsert['gender']=='Herr'){
                $userToInsert['gender']=0;
            }else{
                $userToInsert['gender']=1;
            }
        }
        
        if (!isset($userToInsert['username']))
            $userToInsert['username'] = '--';
        
        $userToInsert['password']=bcrypt($userToInsert['username']);
        $userToInsert['language']=0;
        
        $user=DB::table('fe_users')->insert($userToInsert);
        $lastUser=DB::table('fe_users')->max('uid');
        
        return $lastUser;
    }

    public function submitCurrency(Request $request){
        $update=DB::table('currency')
            ->where('uid',1)
            ->update(['value'=>$request->value]);
        if($update){
            Session::flash('success','Currency updated');
            return redirect()->back()->withInput();
        }else{
            Session::flash('fail','Currency could not be updated');
            return redirect()->back()->withInput();            
        }   
    }

    public function submitEditBooking(Request $request){
        foreach($_POST as $k=>$v){
            if($k=='_token' || $v=='' || $k=='uid' || $k=='user'){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        $dataToInsert['crdate']=time();
        $dataToInsert['tstamp']=time();
        $dataToInsert['booking_date']=strtotime($request->booking_date);
        $update=DB::table('purchases')->where('uid',$request->uid)->update($dataToInsert);
        if($update){
            Session::flash('success','Booking Updated');
        return redirect()->action('mainController@editBooking',['uid'=>$request->uid]); 
      
        }else{
            Session::flash('fail','Booking Could not be Updated');
            return redirect()->back()->withInput();
        }
        return $dataToInsert;
    }

    public function submitEditUser(Request $request){
        $compHere=false;
        foreach($_POST as $k=>$v){
            if($k=='_token' || $v=='' || $k=='uid' || $k=='bookingId' || $k=='source'){
                continue;
            }
            if($k=="company")
            {
                $compHere=true;
            }
            $dataToInsert[$k]=$v;
        }
        if($compHere===false)
        {
            $dataToInsert['company']='';
        }
        $update=DB::table('fe_users')
            ->where('uid',$request->uid)
            ->update($dataToInsert);
        
        if($update){
            Session::flash('success','User Updated');
        }else{
            Session::flash('fail','User Could not be updated');
        }
        if(isset($request->source)){
            return redirect('/admin/editVoucherReservation/'.$request->source);           
        }else{
            return redirect()->action('mainController@editBooking',$request->bookingId);
        }
    }

    public function submitBooking(Request $request){
        $dataToInsert=[];
        
        $selectedPrices = Session::get('selectedPrices',null);
        
        $booking_date=$request->booking_date;
        if($request->booking_date==0){
            if(isset($_GET['selDate'])){
                $booking_date=$_GET['selDate'];
            }
        }
        if($booking_date==0){
            return response()->json(['message'=>'No date given','success'=>0],500);
        }
        
        $viewData=$this->confirmationTable2($request,$selectedPrices,$request->booking_date,$request->offer);
        
        $viewData=$this->confirmationTable($request);
        if(!$viewData){
            return response()->json(['message'=>'No prices provided'],500);
        }
          
        $dataToInsert['confirmation_services']=$this->confirmationServices($request);
        $dataToInsert['confirmation_table']=$viewData['view'];
        $dataToInsert['application_type']='IG\BackofficeTravel\Booking';
        $dataToInsert['crdate']=time();
        $dataToInsert['offer']=$request->offer;
        $dataToInsert['price_total']=$viewData['grand_total'];
        $dataToInsert['currency']=$viewData['currency'];
        $dataToInsert['tx_extbase_type']='Tx_BackofficeTravel_Booking';
        $dataToInsert['booking_date']=Carbon::CreateFromFormat('d.n.Y',$booking_date)->timestamp;
        $dataToInsert['crdate']=time();
        $dataToInsert['confirmation_id']=0;
        $dataToInsert['booking_items']='';
        $dataToInsert['confirmation_intro']='Herzlichen Dank für Ihre Buchung. Gerne senden wir Ihnen wie folgt die Reservations-Bestätigung:';
        $dataToInsert['confirmation_conditions']=DB::table('offer')->where('offer.uid',$request->offer)->leftJoin('touroperator','touroperator.uid','offer.touroperator')->value('terms_confirmation');
        $dataToInsert['confirmation_wishes']='Wir wünschen Ihnen bereits heute einen wunderschönen Aufenthalt.';
        $dataToInsert['reservationgarantee_cardtype']=$request->reservationgarantee_cardtype;
        $dataToInsert['reservationgarantee_cardno']=$request->reservationgarantee_cardno;
        $dataToInsert['reservationgarantee_exp_month']=$request->reservationgarantee_exp_month;
        $dataToInsert['reservationgarantee_exp_year']=$request->reservationgarantee_exp_year;
        $dataToInsert['reservationgarantee_name']=$request->reservationgarantee_name;
        $dataToInsert['note']=$request->note;
        if($request->vaucher_code!=''){
            $dataToInsert['vaucher_code']=$request->vaucher_code;
        }
        if($request->marketing_code!=''){
            $dataToInsert['marketing_code']=$request->marketing_code;
        }
        if($request->vaucher_amount!=''){
            $dataToInsert['vaucher_amount']=$request->vaucher_amount;
        }
        $dataToInsert['offer_title']=DB::table('offer')->where('uid',$request->offer)->value('title');
        $insert=DB::table('purchases')->insert($dataToInsert);
        $lastId=DB::table('purchases')->orderBy('uid','desc')->limit(1)->pluck('uid');
        $insert=$lastId[0];
        $update=DB::table('purchases')->where('uid',$insert)->update(['confirmation_id'=>$insert."-1"]);
        $dataToInsert2=['uid_foreign'=>$this->addFeUser($request),'uid_local'=>$insert,'sorting'=>1,'sorting_foreign'=>0];
        $insertToTable2=DB::table('tx_backoffice_application_frontenduser_mm')->insert($dataToInsert2);
        //herolind
        $var=$this->sendBookingMail($request,$insert);
        if($insert>0 && $update){
            $userContact=$request->saveUserContact;
            $request->session()->put('userContactForm',$userContact);
            return response()->json(['message'=>'Inserted','success'=>1,'mail'=>$var],200);
        }
        
    }

    public function submitOfferVaucher(Request $request){
        $dataToInsert=[];
        $currency=DB::table('offer')->where('offer.uid',$request->offer)->leftJoin('price','price.offer','offer.uid')->limit(1)->pluck('currency');
        $customer_id=$this->addFeUser($request);
        $dataToInsert['offer']=$request->offer;
        $dataToInsert['offer_title']=DB::table('offer')->where('uid',$request->offer)->value('title');
        $dataToInsert['customer_id']=$this->addFeUser($request);
        $dataToInsert['valid_from']=$request->valid_from;
        $dataToInsert['vaucher_for']=$request->vaucher_for;
        $dataToInsert['total_currency']=$currency[0];
        $dataToInsert['vaucher_text']=$request->vaucher_text;
        $dataToInsert['total_price']=$this->getTotalPrice($request);
        $dataToInsert['user_payment']=$request->payment_type;
        $dataToInsert['crdate']=time();
        $insert=DB::table('vauchers')->insertGetId($dataToInsert);
        $viewData=$this->price_table_for_offer_vaucher($request,$insert);
        
        $dataToInsert2['price_table']=$viewData['price_table'];
        $dataToInsert2['informacion']=$viewData['informacion'];
        $dataToInsert2['vaucher_template_offer']=$request->vaucher_template;
        $dataToInsert2['uid_foreign']=$insert;
        $insert2=DB::table('offer_vauchers')->insert($dataToInsert2);
       
        
        $userVaucherOfferData=$request->saveConfOffVau;
        Session::forget('userConfData');
        $request->session()->put('userConfData',$userVaucherOfferData);
        if($this->sendOfferVaucherMails($request,$dataToInsert['customer_id'],$insert)){
            Session::forget('firstTable');
            Session::forget('tableSelPrices');
            Session::forget('offerVaucherD');
            Session::forget('offerVaucherUserContact');
            Session::forget('userConfData');
            Session::forget('isAdditinalNight');
            Session::forget('offerVauchData');
            
            return response('Inserted',200);
        }
        

    }

    

    protected function sendOfferVaucherMails(Request $request,$user,$insert){
        $ids=[];
        $aids=[];
        $email=DB::table('fe_users')->where('uid',$user)->value('email');
        $offer=DB::table('offer')->where('uid',$request->offer)->get();
        $currency=DB::table('price')->where('offer',$offer[0]->uid)->value('currency');
        $userData=DB::table('fe_users')->where('uid',$user)->get();
        $exchange=DB::table('currency')->where('uid',1)->value('value');
        $additionals=[];
        if($currency==0){
            $currency='CHF';
        }else{
            $currency='EURO';
            
        }
        $total_price=$this->getTotalPrice($request);
        if(isset($request->prices)){
            foreach($request->prices as $p){
                if($p['priceValue']==0){
                    continue;
                }
                array_push($ids,$p['priceId']);
            }
            
            $prices=DB::table('price')
                ->join('options','options.uid','price.selected_option')
                ->whereIn('price.uid',$ids)
                ->select('price.*','price.currency as pc','options.title as o_title','options.subtitle as o_subtitle')
                ->get();
            $grand_total=0;
        
            foreach($request->prices as $p){
                for($i=0;$i<count($prices);$i++){
                    if($p['priceId']==$prices[$i]->uid){
                        $prices[$i]->priceValue=$p['priceValue'];
                       
                        continue;
                    }
                } 
            }
        }else{
            //no prices set
            return false;
        }

        
        if(isset($request->additionals)){
            foreach($request->additionals as $a){
                if($a['additionalValue']==0){
                    continue;
                }
                array_push($aids,$a['additionalId']);
            }
            $additionals=DB::table('additional')->whereIn('uid',$aids)->get();
            foreach($additionals as &$a){
                foreach($request->additionals as $ad){
                    if($a->uid==$ad['additionalId']){
                        $a->total_items=$ad['additionalValue'];
                        $a->current_total=$a->price*$ad['additionalValue'];
                    }
                }
            }
        }
        $array=[
            'prices'=>$prices,
            'request'=>$request,
            'offer'=>$offer,
            'additionals'=>$additionals,
            'userData'=>$userData,
            'currency'=>$currency,
            'exchange'=>$exchange,
            'grand_total'=>$total_price,
            'person_type'=>$this->checkUnit($offer[0]->uid,0)
        ];
        
        //the method offervaucherinvoice is called from mainController which returns the path where the offer vaucher pdf is saved
        $pdf=app('App\Http\Controllers\mainController')->generateOfferVaucherPdf($insert,1);
        //the method offervaucherinvoice is called from mainController  which returns the path that the offer vaucher invoice is saved
        $invoice=app('App\Http\Controllers\mainController')->offerVaucherInvoice($insert,1);
        
        
        Mail::send('mails/vaucher_confirmation_meinweekend',$array,function($message) use ($email,$pdf,$invoice){
            $message->to('info@meinweekend.ch','Bestellung Erlebnisgutschein')->subject('Bestellung Erlebnisgutschein');
            $message->attach(public_path('assets/documents/'.$pdf),['as'=>$pdf,'mime'=>'application/pdf']);
            $message->attach(public_path('assets/documents/'.$invoice),['as'=>$invoice,'mime'=>'application/pdf']);
            $message->from('info@meinweekend.ch','Meinweekend');
        });
        if($request->send_type=='Postversand'){
            Mail::send('mails/vaucher_confirmation_client',$array,function($message) use ($email,$pdf,$invoice){
                $message->to($email,'Bestellung Erlebnisgutschein')->subject('Bestellung Erlebnisgutschein');
                $message->from('info@meinweekend.ch','Meinweekend');
            });
        }else if($request->send_type=='print@home'){
            Mail::send('mails/vaucher_confirmation_client',$array,function($message) use ($email,$pdf,$invoice){
                $message->to($email,'Bestellung Erlebnisgutschein')->subject('Bestellung Erlebnisgutschein');
                $message->attach(public_path('assets/documents/'.$pdf),['as'=>$pdf,'mime'=>'application/pdf']);
                $message->attach(public_path('assets/documents/'.$invoice),['as'=>$invoice,'mime'=>'application/pdf']);
                $message->from('info@meinweekend.ch','Meinweekend');
            });
        }
      

        unlink(public_path('assets/documents/'.$pdf));
        unlink(public_path('assets/documents/'.$invoice));

        return true;
    }


    public function sendBookingMail(Request $request,$booking_id){
        $total_price=0;
        $data=DB::table('purchases')
            ->join('tx_backoffice_application_frontenduser_mm','tx_backoffice_application_frontenduser_mm.uid_local','purchases.uid')
            ->join('fe_users','fe_users.uid','tx_backoffice_application_frontenduser_mm.uid_foreign')
            ->join('offer','offer.uid','purchases.offer')
            ->where('purchases.uid',$booking_id)
            ->select('purchases.*','offer.title as o_title','offer.day','offer.night','fe_users.*','offer.creditcard_required','offer.uid as ouid')
            ->orderBy('purchases.crdate','desc')
            ->limit(1)
            ->get();
        $pricesIds=[];
        $additionalIds=[];
        $additional['insert']=0;    
        $cc['no_cc']=$request->reservationgarantee_nocard;    
        $cc['cc_type']=$request->reservationgarantee_cardtype;    
        $cc['cc_number']=$request->reservationgarantee_cardno;    
        $cc['cc_m_y']=$request->reservationgarantee_exp_month."/".$request->reservationgarantee_exp_year;    
        $cc['cc_name']=$request->reservationgarantee_name;   
        $other_data['offer_url']=DB::table('tx_realurl_uniqalias')->where([['value_id',$request->offer],['tablename','tx_travel_domain_model_offer']])->orderBy('uid','desc')->limit(1)->value('value_alias');
        //check if is selected option is additional night
        if(isset($request->additionals)){
            for($i=0;$i<count($request->additionals);$i++){
                if($request->additionals[$i]['additionalValue']==0){
                    continue;
                }
                $additionalsInfo=DB::table('additional')
                    ->where('uid',$request->additionals[$i]['additionalId'])
                    ->select('uid','isadditionalnight','title','price')
                    ->get();
                if($additionalsInfo[0]->isadditionalnight==1){
                    $additional['insert']=1;
                }
                $total_price=$total_price+($additionalsInfo[0]->price*$request->additionals[$i]['additionalValue']);
                array_push($additionalIds,$additionalsInfo[0]->uid);
            }
        } 
        
        if(isset($request->prices)){
            for($i=0;$i<count($request->prices);$i++){
                $priceInfo=DB::table('price')
                    ->leftJoin('options','options.uid','price.selected_option')
                    ->where('price.uid',$request->prices[$i]['priceId'])
                    ->select('price.title as title','price.uid as puid','options.title as o_title','adult_price','price.currency as currency')
                    ->get();

                $total_price=$total_price+($priceInfo[0]->adult_price*$request->prices[$i]['priceValue']);
                array_push($pricesIds,$priceInfo[0]->puid);
                $priceInfo[0]->currency==0?$currency="CHF":$currency="EUR";
            }
        } 
        $exchange=DB::table('currency')->where('uid',1)->value('value');
        if (!isset($currency)) $currency = '';
        if($currency=="CHF"){
            $alternateCurrency="EUR";
            $total_converted=floor($total_price/$exchange);
        }else{
            $alternateCurrency="CHF";
            $total_converted=floor($total_price*$exchange);
        }
        // DB::enableQueryLog();
        $allPrices=DB::table('price')
            ->leftJoin('options','options.uid','price.selected_option')
            ->whereIn('price.uid',$pricesIds)
            ->select('price.title as ptitle','price.uid','options.title as o_title','adult_price','price.currency','options.subtitle as o_sub')
            ->get();
        // return DB::getQueryLog();
            // return $allPrices;
        $allAdditionals=DB::table('additional')
            ->whereIn('uid',$additionalIds)    
            ->select('uid','title','price')
            ->get();
        if(isset($request->prices)){
            for($i=0;$i<count($request->prices);$i++){
                foreach($allPrices as &$p){
                    if($request->prices[$i]['priceId']==$p->uid){
                        $p->priceValue=$request->prices[$i]['priceValue'];
                        $p->current_total=$request->prices[$i]['priceValue']*$p->adult_price;
                    }
                }
            }
        }
        
        if(isset($request->additionals)){
            for($j=0;$j<count($request->additionals);$j++){
                foreach($allAdditionals as &$a){
                    if($request->additionals[$j]['additionalId']==$a->uid){
                        $a->additionalValue=$request->additionals[$j]['additionalValue'];
                        $a->current_total=$request->additionals[$j]['additionalValue']*$a->price;
                    }
                }
            }
        }
        $offer_title=DB::table('offer')->where('uid',$request->offer)->value('title');
        $other_data['total_price']=$total_price;    
        $other_data['total_converted']=$total_converted;    
        $other_data['currency']=$currency;    
        $other_data['alternateCurrency']=$alternateCurrency;   
        $other_data['person_type']=$this->checkUnit($request->offer,0); 

        $other_data['message']=$request->message;
        $email=$request->user['email'];
        setlocale(LC_TIME, "de_DE");
        $other_data['translated_date']=strftime("%A, %d. %B %Y", strtotime($request->booking_date));

        if(isset($request->booking_date) && $request->booking_date != '')
        {             
            $selDate = str_replace("/","",$request->booking_date);
            $date = explode(".",$selDate);
            
            if(isset($date['1']))
            {
                if($date['1'] == '3')
                {
                    $other_data['translated_date'] = strftime("%A", strtotime($selDate)).', '. $date['0']. '. März '. $date['2'];     
                }
                else    
                {                                    
                    $other_data['translated_date'] = strftime("%A, %d. %B %Y", strtotime($selDate)); 
                } 
            }
        }

        try{
            Mail::send('mails/booking-client',['other_data'=>$other_data,'data'=>$data,'cc'=>$cc,'additional'=>$additional,'allPrices'=>$allPrices,'allAdditionals'=>$allAdditionals],function($message) use ($email,$offer_title){
                $message->to($email, 'MeinWeekend.ch: Ihre Buchungsanfrage: '.$offer_title)->subject('MeinWeekend.ch: Ihre Buchungsanfrage: '.$offer_title);
                $message->from('info@meinweekend.ch','Meinweekend');
            });
        } catch (\Exception $e){
            \Log::info('email error');
		$other_data['email_error'] = 1;
        }
        Mail::send('mails/booking-meinweekend',['other_data'=>$other_data,'data'=>$data,'cc'=>$cc,'booking_id'=>$booking_id,'additional'=>$additional,'allPrices'=>$allPrices,'allAdditionals'=>$allAdditionals],function($message) use ($email,$offer_title){
            $message->to('info@meinweekend.ch', 'Buchungsanfrage: '.$offer_title)->subject('Buchungsanfrage: '.$offer_title);
            $message->from('info@meinweekend.ch','Meinweekend');
        });

        return true;
    }
protected function confirmationTable2(Request $request,$selectPrices,$booking_date,$offer){
        $total_price=0;
        $pids=[];
        $aids=[];
        $prices=[];
        $additionals=[];
        $day=DB::table('offer')
            ->where('uid',$offer)
            ->value('night');
        $person_type=DB::table('offer')
            ->where('uid',$offer)
            ->value('person_type');
        $person_type=$this->checkUnit($offer,0);
        $total_price=$this->getTotalPrice($request);
        
        if(isset($selectPrices['prices'])){
            foreach($selectPrices['prices'] as $p){
                if($p['priceValue']==0){
                    continue;
                }
                array_push($pids,$p['priceId']);
            }
        }else{
            return false;
        }

        if(isset($selectPrices['additionals'])){
            foreach($selectPrices['additionals'] as $a){
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
            foreach($selectPrices['prices'] as $rp){
                if($p->uid==$rp['priceId']){
                    $p->total_units=$rp['priceValue'];
                    $p->total_price=$p->adult_price*$rp['priceValue'];
                }
            }
        }   
        if(isset($selectPrices['additionals'])){
            foreach($additionals as &$a){
                foreach($request->additionals as $ra){
                    if($a->uid==$ra['additionalId']){
                        $a->total_units=$ra['additionalValue'];
                        $a->total_price=$a->price*$ra['additionalValue'];
                    }
                }
            }
        }
       
      
        $date=Carbon::CreateFromFormat('d.m.Y',$booking_date)->timestamp;
        $view=View::make('bookings/confirmation_table')
            ->with('day',$day)
            ->with('prices',$prices)
            ->with('additionals',$additionals)
            ->with('currency',$prices[0]->currency)
            ->with('grand_total',$total_price)
            ->with('person_type',$person_type)
            ->with('date',$date)
            ->render();
        return ['view'=>$view,'grand_total'=>$total_price,'currency'=>$prices[0]->currency];    

    }
    protected function confirmationTable(Request $request){
        $total_price=0;
        $pids=[];
        $aids=[];
        $prices=[];
        $additionals=[];
        $day=DB::table('offer')
            ->where('uid',$request->offer)
            ->value('night');
        $person_type=DB::table('offer')
            ->where('uid',$request->offer)
            ->value('person_type');
        $person_type=$this->checkUnit($request->offer,0);
        $total_price=$this->getTotalPrice($request);
        
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
                foreach($request->additionals as $ra){
                    if($a->uid==$ra['additionalId']){
                        $a->total_units=$ra['additionalValue'];
                        $a->total_price=$a->price*$ra['additionalValue'];
                    }
                }
            }
        }
       
      
        $date=Carbon::CreateFromFormat('d.m.Y',$request->booking_date)->timestamp;
        $view=View::make('bookings/confirmation_table')
            ->with('day',$day)
            ->with('prices',$prices)
            ->with('additionals',$additionals)
            ->with('currency',$prices[0]->currency)
            ->with('grand_total',$total_price)
            ->with('person_type',$person_type)
            ->with('date',$date)
            ->render();
        return ['view'=>$view,'grand_total'=>$total_price,'currency'=>$prices[0]->currency];    

    }

    public function price_table_for_offer_vaucher(Request $request,$max){
        $total_price=$this->getTotalPrice($request);
        $ids=[];
        $aids=[];

        if(isset($request->prices)){
            for($i=0;$i<count($request->prices);$i++){
                if($request->prices[$i]['priceValue']==0){
                    continue;
                }
                $getPrice=DB::table('price')->where('uid',$request->prices[$i]['priceId'])->value('adult_price');
                $current_total=$getPrice*$request->prices[$i]['priceValue'];
                $current_totall[$i]=$current_total;
                array_push($ids,$request->prices[$i]['priceId']);
            }
        }
        
        if(isset($request->additionals)){
            for($j=0;$j<count($request->additionals);$j++){
                if($request->additionals[$j]['additionalValue']==0){
                    continue;
                }
                $getName=DB::table('additional')->where('uid',$request->additionals[$j]['additionalId'])->value('title');
                array_push($aids,$request->additionals[$j]['additionalId']);
            }
        }

        $additionals=DB::table('additional')
            ->whereIn('uid',$aids)
            ->select('title','uid','price')
            ->get();
    
        foreach($additionals as &$a){
            foreach($request->additionals as $ad){
                if($a->uid==$ad['additionalId']){
                    $a->current_total=$ad['additionalValue']*$a->price;
                    $a->totalItems=$ad['additionalValue'];
                }
            }
        }
    
        $currency=DB::table('price')->where('uid',$request->prices[0]['priceId'])->value('currency');
        $type=DB::table('offer')->where('uid',$request->offer)->value('person_type');
        $unit=$this->checkUnit($request->offer,0);
        $view=View::make('prices/price_table_for_offer_vaucher')
            ->with('now',time())
            ->with('request',$request)
            ->with('total_price',$total_price)
            ->with('current_total',$current_totall)
            ->with('additionals',$additionals)
            ->with('max',$max)
            ->with('unit',$unit)
            ->with('currency',$currency);

        $data=DB::table('price')
            ->join('options','options.uid','price.selected_option')
            ->whereIn('price.uid',$ids)
            ->select('price.title as ptitle','options.title as otitle','options.subtitle as o_subtitle','price.uid','price.subtitle as psubtitle')
            ->get();
        
      
        foreach($data as &$d){
            foreach($request->prices as $p){
                if($d->uid==$p['priceId']){
                    $d->totalItems=$p['priceValue'];
                }
            }
        }   

       
        

        $informacion=DB::Table('offer')->where('uid',$request->offer)->value('informacion');
        $info=$this->convertToTable($informacion);    
        $offer=DB::table('offer')->where('uid',$request->offer)->get();
        $informacion2=View::make('prices/informacion_for_offer_vaucher')
            ->with('request',$request)
            ->with('info',$info)
            ->with('offer',$offer)
            ->with('unit',$unit)
            ->with('additionals',$additionals)
            ->with('data',$data);    
        
        return ['price_table'=>$view,'informacion'=>$informacion2];    
    }

    protected function confirmationServices(Request $request){

        $offer=DB::table('offer')->where('uid',$request->offer)->first();
        $offer->informacion_confirmation =$this->convertToTable($offer->informacion_confirmation);
        $viewData=View::make('bookings/confirmation_services')->with('data',$offer)->render();
        return $viewData;
    }



    public function submitEditBeUser(Request $request){
        $update=DB::table('be_users')
            ->where('uid',$request->uid)
            ->update(['username'=>$request->username,'admin'=>$request->admin,'password'=>bcrypt($request->password)]);
        Session::flash('success','User '.$request->username.' updated');    
        return redirect()->back()->withInput();   

    }

    public function addBeUser(Request $request){
        foreach($_POST as $k=>$v){
            if($k=='_token' || $v==''){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        $dataToInsert['password']=bcrypt($dataToInsert['password']);
        $dataToInsert['crdate']=time();

        $insert=DB::table('be_users')->insert($dataToInsert);
        if($insert){
            Session::flash('success','Backend User: <b>'.$request->username.' </b> Inserted');
            return redirect()->action('mainController@listBeUsers');
        }else{
            Session::flash('fail','Backend User: <b>'.$request->username.' </b> could not be inserted');
            return redirect()->back();
        }
    }


    protected function checkUnit($offer,$hasspeciallist=1){
        $specialList=DB::table('offer')->where('uid',$offer)->get();
        if($hasspeciallist==1){
            if($specialList[0]->hasspeciallistsettings==1){
                if($specialList[0]->special_list_person_type==99){
                    return $specialList[0]->special_person_type_text;
                }
            }
        }
        $pt=$specialList[0]->person_type;
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

   
    public function submitVoucherReservationEdit(Request $request){
        foreach($_POST as $k=>$v){
            if($k=='_token'|| $v=='' || $k=='uid'){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        $update=DB::Table('vauchers')->where('uid',$request->uid)->update($dataToInsert);
        if($update){
            Session::flash('success','Vaucher Updated');
            return redirect()->back()->withInput();
        }else{
            Session::flash('fail','Vaucher Could not be updated');
            return redirect()->back()->withInput();
            
        }
    }


    public function generateVoucherPdf($vid,$save=0){
        
        $data=DB::table('vauchers')
            ->leftJoin('vaucher_templates','vaucher_templates.sorting','vauchers.vaucher_template')
            ->where('vauchers.uid',$vid)
            ->select('vauchers.*','vaucher_templates.image','vauchers.uid as vid','vauchers.crdate as v_cdate')
            ->get();
        
        $html=View::make('vouchBlade')->with('data',$data)->render();
        if($save>0){
            return $html;
        }
        $pdf = PDF::loadHtml($html)->setOption('margin-left',0)->setOption('margin-right',0)->setOption('margin-top',0);
        return $pdf->download("Gutschein_".$vid.".pdf");

   
    }

    public function generateVoucherInvoice($vid,$save=0){
        
        $data2=DB::table('vauchers')
            ->leftJoin('fe_users','fe_users.uid','vauchers.customer_id')
            ->where('vauchers.uid',$vid)
            ->select('vauchers.*','vauchers.uid as vid','fe_users.*','vauchers.crdate as v_cdate')
            ->get();
  
        $user_payment='Rechnung';
        $file_name='Rechnung';
        if($data2[0]->user_payment!='Rechnung'){
            $user_payment.=' / Zahlungsbestätigung';
            $file_name='Zahlungsbestaetigung';
        }
        $html2=View::make('voucherPDF')->with('data',$data2)->with('user_payment',$user_payment)->render();
        if($save>0){
            return $html2;
        }
        $pdf=PDF::loadHtml($html2);
        return $pdf->download($file_name.'_'.$vid."-".$data2[0]->name.".pdf");
    }


    public function tempOptions(Request $request){
        $dataToInsert['title']=$request->title;
        $dataToInsert['subtitle']=$request->subtitle;
        $dataToInsert['offer']=$request->offer;
        $dataToInsert['cruser_id']=Session::get('user')->uid;
        $dataToInsert['hidden']=0;
        $insert=DB::table('options')->insert($dataToInsert);
        $data= DB::table('options')->max('uid');
        return ['title'=>$request->title,'uid'=>$data];

    }

    public function submitGroupApplication(Request $request){
        $email=$request->email;
        $data=$request;
        Mail::send('mails/groupoffer',['data'=>$request],function($message){
            $message->to('info@meinweekend.ch', 'Gruppenanfrage')->subject('Gruppenanfrage');
            $message->from('info@meinweekend.ch','Meinweekend');
        });

        Mail::send('mails/groupoffer-client',['data'=>$request],function($message) use ($email){
            $message->to($email, 'Gruppenanfrage')->subject('Gruppenanfrage');
            $message->from('info@meinweekend.ch','Meinweekend');
        });
        return response()->json(['message'=>'mail Sent','success'=>1],200);
    }

    public function submitContact(Request $request){
        Mail::send('mails/contact',['request'=>$request],function($message) use ($request){
            $message->to('info@meinweekend.ch', 'Ihre Kontaktanfrage')->subject('Ihre Kontaktanfrage');
            $message->from('info@meinweekend.ch','Meinweekend');
			// $message->to('amit.narmadatech@gmail.com', 'Ihre Kontaktanfrage')->subject('Ihre Kontaktanfrage');
            // $message->from('amit.narmadatech@gmail.com','Meinweekend');
        });
        return response()->json(['message'=>'Mail Sent','success'=>1],200);
    }

    public function saveImageDescription(Request $request){
    
        $update=DB::table('images2')->where('uid',$request->id)->update(['title'=>$request->msg]);

        return 'Success';
    }

    public function addNewsLetter(Request $request){
        // return $request;
        $dataToInsert=[];
        foreach($_POST as $k=>$v){
            if($k=='_token'){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        if(Input::hasFile('image_1')){
            $file=$request->file('image_1');
            $destination_path='newsletter_images';
            $dataToInsert['offer_1_pic']=$file->move($destination_path,time()."_".$file->getClientOriginalName());

        }
        
        if(Input::hasFile('image_2')){
            $file=$request->file('image_2');
            $destination_path='newsletter_images';
            $dataToInsert['offer_2_pic']=$file->move($destination_path,time()."_".$file->getClientOriginalName());

        }

        $dataToInsert['crdate']=time();
        unset($dataToInsert['image_1']);
        unset($dataToInsert['image_2']);
        $insert=DB::table('newsletters')->insert($dataToInsert);
        if($insert){
            return redirect('admin/listNewsLetters');
            Session::flash('success','Newsletter inserted');
        }else{
            Session::flash('fail','Newsletter could not be inserted');

            return redirect()->back()->withInput();
        }
    }
    public function submitEditNewsLetter(Request $request){
        // return $request;
        $dataToInsert=[];
        foreach($_POST as $k=>$v){
            if($k=='_token' || $k=='uid'){
                continue;
            }
            $dataToInsert[$k]=$v;
        }
        if(Input::hasFile('image_1')){
            $file=$request->file('image_1');
            $destination_path='newsletter_images';
            $dataToInsert['offer_1_pic']=$file->move($destination_path,time()."_".$file->getClientOriginalName());
        }
        
        if(Input::hasFile('image_2')){
            $file=$request->file('image_2');
            $destination_path='newsletter_images';
            $dataToInsert['offer_2_pic']=$file->move($destination_path,time()."_".$file->getClientOriginalName());
        }
        unset($dataToInsert['image_1']);
        unset($dataToInsert['image_2']);
        $update=DB::table('newsletters')->where('uid',$request->uid)->update($dataToInsert);
        if($update){
            Session::flash('success','Newsletter updated');
            return redirect('/admin/listNewsLetters');
        }else{
            Session::flash('fail','Newsletter could not be updated');

            return redirect()->back()->withInput();
        }
    }

    public function deleteNewsletter($id){
        $delete=DB::table('newsletters')->where('uid',$id)->delete();
        if($delete){
            Session::flash('success','Newsletter Deleted');
        }else{
            Session::flash('fail','Newsletter could not be deleted');
        }
    }

    public function submitDataForCC(Request $request){
        $finalString='';
        foreach($_POST as $k=>$v){
            if($k=='_token' || $v==''){
                continue;
            }
            $finalString.=$k."=".$v."30fdec73f395aaec13bbe56565be4353";
        }
        // return $finalString;
        return sha1($finalString);
    }

    public function sendNewsLetterMail($id){
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
        
    
        Mail::send('newsletters/newsletter',['data'=>$data,'offer1'=>$offer1,'offer2'=>$offer2,'email'=>'besnik.cani95@gmail.com'],function($message) use ($data){
            $message->to(['besnik.cani95@gmail.com','info@meinweekend.ch'], 'Meinweekend')->subject($data->newsletter_title);
            $message->from('info@meinweekend.ch','Meinweekend');
        }); 
    }

    public function makeCurrentNewsLetter($id){
        $update1=DB::table('newsletters')->update(['is_current'=>0]);
        $update=DB::table('newsletters')->where('uid',$id)->update(['is_current'=>1]);
        Session::flash('success','Current Newsletter updated');
    }

    public function deactivateNewsletter(){
        $is_active=DB::table('newsletters')->update(['is_current'=>0]);

        Session::flash('success','Newsletters deactivated');
    }
}

