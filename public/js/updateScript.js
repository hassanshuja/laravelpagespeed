var br="https://www.meinweekend.ch/",filesForUpload=[];$(document).ready(function(){$(document).on("change","#offerPhotos",function(){var token=$("input[name=_token]").val();var offerForm=$("#newOfferForm")||$("#newCategoryForm")||$("#newRegionForm");regexp=/^[^[\]]+/;var imgfile=document.getElementById("offerPhotos");var fileInputName=regexp.exec(imgfile.name);formdata=new FormData();var post_sup_ar=$('#post_support_area');if(filesForUpload.length>0)
{for(var i=0;i<imgfile.files.length;i++){const eFile=imgfile.files[i];console.log('file name',imgfile.files[i].name)}}
else{for(var i=0;i<imgfile.files.length;i++){const eFile=imgfile.files[i];console.log('file name',imgfile.files[i].name)}
    filesForUpload=imgfile.files}
    console.log('filesForUpload',filesForUpload.name);for(var i=0;i<imgfile.files.length;i++){const eFile=imgfile.files[i];if(eFile.size>5242880||eFile.fileSize>5242880){errorMessage='Files must be less than 5MB.'}
        offerForm.append("picture[]",eFile);var sF=offerForm.serialize();formdata.append("picture[]",eFile)}
    console.log('sF',sF);formdata.append("_token",token);$.ajax({url:br+"update/previewPhoto",type:"POST",data:formdata,dataType:"json",processData:!1,contentType:!1,beforeSend:function(){},success:function(data){var imTableTr=$('#imageTableOffer tr'),currRows=imTableTr.length;$("#offerPhotos").replaceWith('<input type="file" id="offerPhotos" multiple="multiple" style="display:none;" />');console.log('data',data);$("#imageTableOffer").html('');data.forEach(element=>{console.log('element '+element);var newRow=`<tr id='image_`+element.id+`'>
            <td>
                <img src="/assets/temp_images/`+element.name+`" id="imageZ_`+element.id+`" onclick="showModalImage(`+element.id+`)" />
            </td>
            <td>
                    <button onClick='removeTempImg("`+element.id+`")' type='button' class='btn btn-primary'>Delete</button>
            </td> 
            <td>
                    <button onClick='moveUpImg("`+element.id+`")' type='button'>▲</button>
                    <button onClick='moveDownImg("`+element.id+`")' type='button'>▼</button>
            </td>  
        </tr>`;$("#imageTableOffer").append(newRow)})},error:function(data){},complete:function(){}})})});$(document).ready(function(){$(document).on("change","#categoryPhoto",function(){var token=$("input[name=_token]").val();console.log('poto for category tonken ',token);var offerForm=$("#categoryForm");console.log('poto for categoryForm ',offerForm);regexp=/^[^[\]]+/;var imgfile=document.getElementById("categoryPhoto");console.log('poto for imgfile ',imgfile);var fileInputName=regexp.exec(imgfile.name);console.log('poto for imgfile ',imgfile);formdata=new FormData();if(filesForUpload.length>0)
{for(var i=0;i<imgfile.files.length;i++){const eFile=imgfile.files[i];console.log('file name more',imgfile.files[i].name)}}
else{for(var i=0;i<imgfile.files.length;i++){const eFile=imgfile.files[i];console.log('file name less',imgfile.files[i].name)}
    filesForUpload=imgfile.files}
    console.log('filesForUpload',filesForUpload.name);for(var i=0;i<imgfile.files.length;i++){const eFile=imgfile.files[i];if(eFile.size>5242880||eFile.fileSize>5242880){errorMessage='Files must be less than 5MB.'}
        var createInput=document.createElement('input');createInput.type='hidden';createInput.name="hasPicture";createInput.value=1;offerForm.append(createInput);var sF=offerForm.serialize();formdata.append("picture[]",eFile)}
    console.log('sF',sF);formdata.append("_token",token);$.ajax({url:br+"update/previewPhotoSingle",type:"POST",data:formdata,dataType:"json",processData:!1,contentType:!1,beforeSend:function(){},success:function(data){var cImg=$('#categoryImage'),currT=data.length;if(currT>0)
        {cImg[0].src="https://www.meinweekend.ch/assets/temp_images/"+data[(currT-1)].name}},error:function(data){},complete:function(){}})})});$(document).ready(function(){$(document).on("change","#regionPhotos",function(){var token=$("input[name=_token]").val();var offerForm=$("#regionForm");regexp=/^[^[\]]+/;var imgfile=document.getElementById("regionPhotos");var fileInputName=regexp.exec(imgfile.name);formdata=new FormData();if(filesForUpload.length>0)
{for(var i=0;i<imgfile.files.length;i++){const eFile=imgfile.files[i];console.log('file name',imgfile.files[i].name)}}
else{for(var i=0;i<imgfile.files.length;i++){const eFile=imgfile.files[i];console.log('file name',imgfile.files[i].name)}
    filesForUpload=imgfile.files}
    console.log('filesForUpload',filesForUpload.name);for(var i=0;i<imgfile.files.length;i++){const eFile=imgfile.files[i];if(eFile.size>5242880||eFile.fileSize>5242880){errorMessage='Files must be less than 5MB.'}
        var createInput=document.createElement('input');createInput.type='hidden';createInput.name="hasPicture";createInput.value=1;offerForm.append(createInput);var sF=offerForm.serialize();formdata.append("picture[]",eFile)}
    console.log('sF',sF);formdata.append("_token",token);$.ajax({url:br+"update/previewPhotoSingle",type:"POST",data:formdata,dataType:"json",processData:!1,contentType:!1,beforeSend:function(){},success:function(data){var cImg=$('#regionImage'),currT=data.length;if(currT>0)
        {cImg[0].src="https://www.meinweekend.ch/assets/temp_images/"+data[(currT-1)].name}},error:function(data){},complete:function(){}})})});function addNewPhoto(){$('#offerPhotos').click()}
function catAddNewPhoto(){$('#categoryPhoto').click()}
function regAddNewPhoto(){$('#regionPhotos').click()}
function removeTempImg(id){$.ajax({method:"GET",url:br+"admin/deleteTempImage/"+id}).done(function(msg){$("#image_"+id).remove()})}
function createOption(){$.ajax({method:"GET",url:br+"admin/getOptionsForm"}).done(function(msg){$("#optionHolder").html(msg)})}
function editOption(oId){$.ajax({method:"GET",url:br+"admin/getEditOptionsForm/"+oId}).done(function(msg){$("#editOptionHolder").html(msg)})}
function submitEditOption(){var oT=$("#eoptionTitle").val(),oSt=$("#eoptionSubtitle").val(),oUid=$("#eoptionId").val();var token=$("input[name=_token]").val();optionData={_token:token,title:oT,subtitle:oSt,uid:oUid}
    $.ajax({method:"POST",url:br+"admin/submitEditOption/",data:optionData}).done(function(msg){location.reload()})}
function submitOption(){var oT=$("#optionTitle").val(),oSt=$("#optionSubtitle").val(),oOffId=$("#eOfferUid").val();var token=$("input[name=_token]").val();console.log('ot',oT,oSt);optionData={_token:token,title:oT,subtitle:oSt,offer:oOffId}
    $.ajax({method:"POST",url:br+"admin/tempOptions",data:optionData}).done(function(msg){location.reload()})}
