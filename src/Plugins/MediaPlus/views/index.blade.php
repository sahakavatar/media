@extends('layouts.admin')
@section('content')
<div class="row p-t-0" >
 
  
  <div class="col-sm-12 col-md-3 leftpenl">
    <div class="mediaLeft col-sm-12 col-md-2">
    
      
      <h3 class="mediaheading "><span class="bg-red mediaicon"><i class="fa fa-folder-open"></i></span> <strong>All Albums</strong>
        <button class="btn btn-default btnadd" data-action="addnew" data-rolesetting="allow_folder_sub" data-toggle="collapse" data-target="#addnewform"><span class="mediaSprite icon-add"></span></button>
      </h3>
     <div id="addnewform" class="collapse form-inline addnewitems">
     		
            <div class="form-group">
          		<input id="addtext" name="addtext" type="text" placeholder="Albums Name" class="form-control">
       		 </div>
             <button type="button" class="btn btn-success save" data-action="save" data-role="addnew">Save</button>
            
     </div>
      <div class="media-dd" id="mediaNestable" data-menudata=''>
        		<ol class="dd-list" id="nestedSortablemedia">
		 		 </ol>
      </div>
      
      <textarea id="mediaNestable-output" class="form-control hide"></textarea>
    </div>
  </div>
  <div class="col-sm-12 col-md-9 rightpenl ">
  
  	<div class="actionbar">
      <button type="button" class="btn btn-white btn-lg pull-right f-adj clickable collapsed"  aria-expanded="true" data-role="btnUploader" data-rolesetting="allow_item_upload"><span class="mediaSprite iconsDownload"></span> Upload</button>
      @include('MediaPlus::_partials.actionbar')
    </div>
    
    <div class="panel panel-media">
      <div class="panel-body p-0">
      	<div class="row collapse" data-role="deleteimage" id="deleteimage">
        	<div class="col-md-12 p-t-10 deleteimagerow">
            	<div class="pull-right"><button type="button" class="btn btn-grey" data-role="decline"> Decline</button> <button type="button" class="btn btn-red" data-img-action="confirm"> Confirm</button></div>
            	<h5>Are you sure you want to delete the following items?</h5>
                <ul class="deleteImglist list">
                	<li>
                    	<div><img src="/public/img/delete-img-01.jpg" alt=""></div>
                       <input type="checkbox" checked id="Option" class="customcheckboxinput"><label class="customcheckbox" for="Option">SGF0215896l  </label> 
                    </li>
                    <li>
                    	<div><img src="/public/img/delete-img-01.jpg" alt=""></div>
                       <input type="checkbox" checked id="Option2" class="customcheckboxinput"><label class="customcheckbox" for="Option2">SGF0215896l </label> 
                    </li>
                </ul>
            </div>	
        </div>
      	<div class="row" >
        	<div role="alertBox" class="alertalertBox"></div>
        
          <div id="media_upload" class="collapse fileUploads col-md-12 margin-15">
         		<!-- Select Basic -->
				<input id="uploader" class="file-loading" multiple name="item[]" data-upload-url="/admin/media/drive/api-media/upload" type="file">
				
				

				
          </div>
        </div>
        <div class="row p-t-10 ">
          <div class="col-xs-2">
            
              <div class="form-group">
                <label class="sr-only" for="sortBy">Sort By</label>
                {!! BBGetMediaSorting() !!}
              </div>
          
			</div>
           <div class="col-xs-8">
            {!! BBGetMediaSearchBar() !!}
			</div>
           <div class="col-xs-2">
            <div class="pull-right btnsortby">
              <div class="dropdown-menu form-inline p-10 searchDropmenu">
              	<div class="form-group">	
                <input name="Search" id="search" type="text" class="form-control width-xs " placeholder="Search"> </div> <div class="form-group"><button class="btn btn-default" data-role="search">Go</button></div>
              </div>
              
              
              <div class="btn-group" role="group">
                <button type="button" class="btn btn-default clickable f-adj" id="listView" data-toggle="collapse" data-target="#media_list"><i class="fa fa-th-list"></i></button>
                <button type="button" class="btn btn-default  clickable f-adj activebtn" id="gridView" data-toggle="collapse" data-target="#media_thumb"><i class="fa fa-th-large"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div id="contents"> </div>
      </div>
    </div>
  </div> 
  
  <div class="infoss"></div>
  
</div>
<div class="loading"></div>

 <!-- modal Rename -->
<div class="modal fade" id="renameIMg" tabindex="-1" role="dialog" aria-labelledby="renameIMgLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      		 <h4 class="modal-title">Rename</h4>
      </div>
      <div class="modal-body">
           <div class="form-group">
            <input type="text" class="form-control" value="" id="In_img_rename">
          </div>
      </div>
      <div class="modal-footer">
      		<button type="button" class="btn btn-default"  data-dismiss="modal" data-img-action="raname">Update</button>
      </div>
     </div>
    </div>
   </div>
   
   <!-- modal transferIMg -->
   <div class="modal fade" id="transferIMg" tabindex="-1" role="dialog" aria-labelledby="transferIMgLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      		 <h4 class="modal-title">Transfer</h4>
      </div>
      <div class="modal-body">
           <div class="form-group">
            <select class="form-control" id="moveTransferfolder">
                </select>
          </div>
      </div>
      <div class="modal-footer">
      		<button type="button" class="btn btn-default"  data-dismiss="modal" data-img-action="transfer">Update</button>
      </div>
     </div>
    </div>
   </div>
   
   
    <!-- modal img-linksIMg -->
   <div class="modal fade" id="img-linksIMg" tabindex="-1" role="dialog" aria-labelledby="linksIMgLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      		 <h4 class="modal-title">Get link</h4>
      </div>
      <div class="modal-body">
          <div class="row">
                	<div class="col-xs-12 col-md-12">
                    	
                        
                    		
                    	<div class="btn-group btn-group-justified btn-tab p-b-15" role="group" aria-label="">
                           <div class="btn-group" role="group" >
                            <a href="#OrginalLink" class="btn btn-default active" data-toggle="tab">Orginal</a>
                          </div>
                          <div class="btn-group" role="group">
                            <a href="#smallThumb" class="btn btn-default" data-toggle="tab">Small thumb</a>
                          </div>
                          <div class="btn-group" role="group">
                            <a href="#MedThumb" class="btn btn-default" data-toggle="tab">Med thumb</a>
                          </div>
                          <div class="btn-group" role="group">
                            <a href="#LargeThumb" class="btn btn-default" data-toggle="tab">Large thumb</a>
                          </div>
                           
                        </div>
                        <div class="tab-content">
                        	  <div role="tabpanel" class="tab-pane active" id="OrginalLink">
                       			 <div class="form-horizontal">
                              <div class="form-group m-l-0 m-r-0">
                                <label for="linktophotos" class="col-sm-3 control-label text-left">Link to Photo</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="linktophotos" data-getlink="photo" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                 <div class="input-group-addon addon-red" data-clipboard-target="#linktophotos"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="directlink" class="col-sm-3 control-label text-left">Direct Link</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="directlink" data-getlink="directlink" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#directlink"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="downloadlink" class="col-sm-3 control-label text-left">Download Link</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="downloadlink" data-getlink="download" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#downloadlink"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="embedHTML" class="col-sm-3 control-label text-left">Embed HTML</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="embedHTML" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#embedHTML"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="embedForum" class="col-sm-3 control-label text-left">Embed Forum</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="embedForum" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#embedForum"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                            
                        </div>
                       		 </div>
                        	
                             <div role="tabpanel" class="tab-pane" id="smallThumb">
                             	<div class="form-horizontal">
                              <div class="form-group m-l-0 m-r-0">
                                <label for="linktophotosm" class="col-sm-3 control-label text-left">Link to Photo</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="linktophotosm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                 <div class="input-group-addon addon-red" data-clipboard-target="#linktophotosm"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="Directlinksm" class="col-sm-3 control-label text-left">Direct Link</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="Directlinksm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#Directlinksm"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="downloadlinksm" class="col-sm-3 control-label text-left">Download Link</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="downloadlinksm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#downloadlinksm"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="embedHTMLsm" class="col-sm-3 control-label text-left">Embed HTML</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="embedHTMLsm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#embedHTMLsm"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="embedForumsm" class="col-sm-3 control-label text-left">Embed Forum</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="embedForumsm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#embedForumsm"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                            
                        </div>
                             </div>
                             
                             <div role="tabpanel" class="tab-pane" id="MedThumb">
                             	<div class="form-horizontal">
                              <div class="form-group m-l-0 m-r-0">
                                <label for="linktophotomt" class="col-sm-3 control-label text-left">Link to Photo</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="linktophotomt" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                 <div class="input-group-addon addon-red" data-clipboard-target="#linktophotomt"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="directlinkmt" class="col-sm-3 control-label text-left">Direct Link</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="directlinkmt" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#directlinkmt"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="downloadlinkmt" class="col-sm-3 control-label text-left">Download Link</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="downloadlinkmt" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#downloadlinkmt"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="embedHTMLmt" class="col-sm-3 control-label text-left">Embed HTML</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="embedHTMLmt" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#embedHTMLmt"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="embedForummt" class="col-sm-3 control-label text-left">Embed Forum</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="embedForummt" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red"  data-clipboard-target="#embedForummt"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                            
                        </div>
                             </div>
                             
                             <div role="tabpanel" class="tab-pane" id="LargeThumb">
                             	<div class="form-horizontal">
                              <div class="form-group m-l-0 m-r-0">
                                <label for="linktophotolg" class="col-sm-3 control-label text-left">Link to Photo</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="linktophotolg" value="LargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                 <div class="input-group-addon addon-red" data-clipboard-target="#linktophotolg"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="directlinklg" class="col-sm-3 control-label text-left">Direct Link</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="directlinklg" value="LargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red"  data-clipboard-target="#directlinklg"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="downloadlinklg" class="col-sm-3 control-label text-left">Download Link</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="downloadlinklg" value="LargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#downloadlinklg"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="embedHTMLlg" class="col-sm-3 control-label text-left">Embed HTML</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="embedHTMLlg" value="LargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red" data-clipboard-target="#embedHTMLlg"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                              <div class="form-group m-l-0 m-r-0">
                                <label for="embedForumlg" class="col-sm-3 control-label text-left">Embed Forum</label>
                                <div class="col-sm-9 input-group">
                                  <input type="text" class="form-control" id="embedForumlg" value="LargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                                   <div class="input-group-addon addon-red"  data-clipboard-target="#embedForumlg"><i class="iconCopys"></i></div>
                                </div>
                              </div>
                            
                        </div>
                             </div>
                        </div>
                        
                    		
                    </div>
                </div>
          
      </div>
      <div class="modal-footer">
      		<button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
      </div>
     </div>
    </div>
   </div>
   
   
   
   <script type="template" data-template="contentdata">
   		<div class="contentPics m-l-15 m-r-15">
			 <div class=row>
						<ul class="nav nav-tabs tab-album" data-media="foldertree">
						</ul>
	   			</div>
		  <div class="row galleryList">
		  	
		  
			<div class="responsive-list">
				
			  <div class="imagetumb tableTH" id="tablethData">
				<div class="listv checkbox"> &nbsp; </div>
				<div class="thumbnail">Item</div>
				<div class="listv l-Key-Words"> Key Words </div>
				<div class="listv l-Alt-Tags"> Alt Tags </div>
				<div class="listv l-action"> Actions </div>
			  </div>
			 
			  
			  <div data-media="folderitem"></div>	


			</div>
		  </div>
		  <div class="row">
	   				<div class="col-sm-12" data-display_item="pagination">
	   							<nav aria-label="Page navigation">
								  <ul class="pagination" data-pagiantion="media">
									
								  </ul>
								</nav>
	   				</div>
					<div class="col-sm-12 text-center p-b-10" data-display_item="button">
								<button type="button" class="btn btn-primary">Load More</button>
					</div>
					<div class="col-sm-12" data-display_item="lazyload">
							
						
					</div>
					
	   		</div>
		</div>
  		
  </script>
  
     <script type="template" data-template="folderhumb">
	 		<li><a href="#" data-id="{id}" data-media="getitem"><i class="mediaSprite iconsFolder">{childrenCount}</i>{title}</a></li>
       
	</script>
   
   
   <script type="template" data-template="itemthumb">
   
   			    <div class="imagetumb animated fadeInDown" data-role="fileDrag" data-img-id="{id}" data-name="{real_name}" data-folderid="{folder_id}" data-imagename="{url}" data-jsoninfo="{json}">
				<div class="listv l-titel"> {real_name}</div>
				<div class="listv checkbox">
				  <label for="{id}">
					<input type="checkbox" data-role="girdcheckbox" id="{id}" value="{id}">
				  </label>
				</div>
				<label class="thumbnail" for="{id}">
				  <div class="galleryImg"><div><img src="{url}" alt=""></div></div>
				  <div class="caption"> <img src="/resources/assets/img/icons/images.png" /> {real_name} </div>
				</label>
				<div class="listv l-Key-Words">
				  <input name="keywords" class="form-control" type="text" data-imgmeta="keyword" placeholder="Key words" value="{keywords}">
				</div>
				<div class="listv l-Alt-Tags">
				  <input name="altTags" class="form-control alttags" type="text" data-imgmeta="alttags" placeholder="Alt Tags" value="{alt_tags}">
				</div>
				<div class="listv l-action"> <a href="#" data-role="editalt"><i class="fa fa-pencil"></i></a> <a href="#"><i class="fa fa-trash-o"></i></a> </div>
			  </div>            
       
	</script>

@include('MediaPlus::_partials.detail')
@include('MediaPlus::_partials.edit')

<input name="parent_id" type="hidden" value="0" id="parent_id"/>
<input name="rename_id" type="hidden" value="0" id="rename_id"/>
<input name="selectimg_ID" type="hidden" value="0" id="selectimg_ID"/>
<input name="active_id" type="hidden" value="1" id="active_id"/>

<input type="hidden" id="ui_settings" value="{!! htmlentities($settings) !!}" />
<input type="hidden" id="user_access" value="{!! htmlentities(json_encode($roleAccess)) !!}" />

    {!! Form::hidden(null,'mediaplus',['data-type'=>'folder']) !!}
@stop
@section('CSS')
	{!! HTML::style('/resources/assets/js/dropzone/css/dropzone.min.css') !!}
   {!! HTML::style('/resources/assets/js/animate/css/animate.css') !!}
   {!! HTML::style('/resources/assets/js/blue.monday/css/jplayer.blue.monday.css') !!}
   {!! HTML::style('/resources/assets/js/jquery.mCustomScrollbar/css/jquery.mCustomScrollbar.css') !!}
   {!! HTML::style('/resources/assets/js/bootstrap-fileinput/css/fileinput.css') !!}
   {!! HTML::style('/resources/assets/js/bootstrap-select/css/bootstrap-select.min.css') !!}
   {!! HTML::style('/resources/assets/js/bootstrap-editable/css/bootstrap-editable.css') !!}
   {!! HTML::style('/resources/assets/css/media-plus.css') !!}

@stop
@section("JS")
 	{!! HTML::script('/resources/assets/js/bootstrap-notify/js/bootstrap-notify.min.js') !!}
   {!! HTML::script('/resources/assets/js/jquery.nestable/js/jquery.nestable.js') !!}
   {!! HTML::script('/resources/assets/js/nestedSortable/jquery.mjs.nestedSortable.js') !!}
   {!! HTML::script('/resources/assets/js/jquery.jplayer/js/jquery.jplayer.min.js') !!} 
   {!! HTML::script('/resources/assets/js/clipboard/clipboard.min.js') !!}
   {!! HTML::script('/resources/assets/js/fabric/js/fabric.min.js') !!}
   {!! HTML::script('/resources/assets/js/caman/caman.full.js') !!}
   {!! HTML::script('/resources/assets/js/jquery.mCustomScrollbar/js/jquery.mCustomScrollbar.min.js') !!}
   {!! HTML::script('/resources/assets/js/jquery.easing/js/jquery.easing.1.3.js') !!}
   {!! HTML::script('/resources/assets/js/dropzone/js/dropzone.js') !!}
   {!! HTML::script('/resources/assets/js/bootstrap-fileinput/js/fileinput.js') !!}
   {!! HTML::script('/resources/assets/js/bootstrap-select/js/bootstrap-select.min.js') !!} 
   {!! HTML::script('/resources/assets/js/bootstrap-editable/js/bootstrap-editable.js') !!} 
   {!! HTML::script('/resources/assets/js/jquery.twbsPagination/jquery.twbsPagination.js') !!} 
   {!! HTML::script('/resources/assets/js/media-gallery-plus.js?v=0.2') !!} 
   {!! HTML::script('/resources/assets/js/media-edit-img.js') !!}
    {!! BBGetGroupedScripts() !!}
 @stop
