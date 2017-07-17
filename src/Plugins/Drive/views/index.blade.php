@extends('layouts.admin')
@section('content')
    <div id="page-wrapper" class="gray-bg">

        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content {!! $settings['leftcontainer'] or null !!}">
                            <div class="file-manager">
                                <h5>Show:</h5>
                                <a href="#" class="file-control active">Ale</a>
                                <a href="#" class="file-control">Documents</a>
                                <a href="#" class="file-control">Audio</a>
                                <a href="#" class="file-control">Images</a>
                                <div class="hr-line-dashed"></div>
                                <button class="btn btn-primary btn-block {!! $settings['uploadbutton'] or null !!}">Upload Files</button>
                                <div class="hr-line-dashed"></div>

                                <h5><a class="pull-right {!! $settings['addbutton'] or null !!}" data-toggle="collapse" role="button"  href="#createFolder"  ><i class="fa fa-plus" aria-hidden="true"></i></a>Folders <span data-media="selected"><a href="#" >back Foder</a></span></h5>
                                <div class="collapse" id="createFolder">
                                    <div class="input-group" >
                                        <input type="text" class="form-control" data-mediafield="addfolder"  placeholder="Folder name">
                                        <span class="input-group-btn">
                                      <button class="btn btn-default" type="button" data-media="addfolder">Add</button>
                                    </span>
                                    </div><!-- /input-group -->
                                </div>
                                <ul class="folder-list" style="padding: 0;" data-media="folder">

                                </ul>
                                <h5 class="tag-title">Tags</h5>
                                <ul class="tag-list" style="padding: 0">
                                    <li><a href="">Family</a></li>
                                    <li><a href="">Work</a></li>
                                    <li><a href="">Home</a></li>
                                    <li><a href="">Children</a></li>
                                    <li><a href="">Holidays</a></li>
                                    <li><a href="">Music</a></li>
                                    <li><a href="">Photography</a></li>
                                    <li><a href="">Film</a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 animated fadeInRight">
                   	<div class="row">
                   			<div class="col-lg-12 m-b-10 text-right"> <button type="button" class="btn btn-default" data-role="btnUploader">Uploader</button></div>
                   	</div>
                   	<div class="row collapse"  data-targetiuploder="folder">
                   		<div class="col-lg-12 m-b-15"></div>
                   	</div>
                    <div class="row {!! $settings['rightcontainer'] or null !!}">
                        <div class="col-lg-12 " data-media="folderitem">
                        </div>
                        <div class="col-lg-12 hide"  >
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Jan 11, 2014</small>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="{!! url('public/media_template/img/p1.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            Italy street.jpg
                                            <br/>
                                            <small>Added: Jan 6, 2014</small>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="{!! url('public/media_template/img/p2.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            My feel.png
                                            <br/>
                                            <small>Added: Jan 7, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-music"></i>
                                        </div>
                                        <div class="file-name">
                                            Michal Jackson.mp3
                                            <br/>
                                            <small>Added: Jan 22, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="{!! url('public/media_template/img/p3.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Fab 11, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="img-responsive fa fa-film"></i>
                                        </div>
                                        <div class="file-name">
                                            Monica's birthday.mpg4
                                            <br/>
                                            <small>Added: Fab 18, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <a href="#">
                                    <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="file-name">
                                            Annual report 2014.xls
                                            <br/>
                                            <small>Added: Fab 22, 2014</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Jan 11, 2014</small>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="{!! url('public/media_template/img/p1.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            Italy street.jpg
                                            <br/>
                                            <small>Added: Jan 6, 2014</small>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="{!! url('public/media_template/img/p2.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            My feel.png
                                            <br/>
                                            <small>Added: Jan 7, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-music"></i>
                                        </div>
                                        <div class="file-name">
                                            Michal Jackson.mp3
                                            <br/>
                                            <small>Added: Jan 22, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="{!! url('public/media_template/img/p3.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Fab 11, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="img-responsive fa fa-film"></i>
                                        </div>
                                        <div class="file-name">
                                            Monica's birthday.mpg4
                                            <br/>
                                            <small>Added: Fab 18, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <a href="#">
                                    <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="file-name">
                                            Annual report 2014.xls
                                            <br/>
                                            <small>Added: Fab 22, 2014</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Jan 11, 2014</small>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="{!! url('public/media_template/img/p1.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            Italy street.jpg
                                            <br/>
                                            <small>Added: Jan 6, 2014</small>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="{!! url('public/media_template/img/p2.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            My feel.png
                                            <br/>
                                            <small>Added: Jan 7, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-music"></i>
                                        </div>
                                        <div class="file-name">
                                            Michal Jackson.mp3
                                            <br/>
                                            <small>Added: Jan 22, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="{!! url('public/media_template/img/p3.jpg')!!}">
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br/>
                                            <small>Added: Fab 11, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="img-responsive fa fa-film"></i>
                                        </div>
                                        <div class="file-name">
                                            Monica's birthday.mpg4
                                            <br/>
                                            <small>Added: Fab 18, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <a href="#">
                                    <div class="file {!! $settings['thumbnailclass'] or null !!}">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="file-name">
                                            Annual report 2014.xls
                                            <br/>
                                            <small>Added: Fab 22, 2014</small>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="hide">
        <div data-template="itemthumb">
            <div class="file-box" data-dragitem="{id}" data-id="{id}" data-name="{original_name}" data-mediatype="item">
                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                    <a href="#">
                        <span class="corner"></span>

                        <div class="icon">
                            <i class="fa fa-file"></i>
                        </div>
                        <div class="file-name">
                            {original_name}.{extension}
                            <br/>
                            <small>Added: {created_at}</small>
                        </div>
                    </a>
                </div>

            </div>
        </div>
        <div data-template="foldertumb">
            <div class="file-box" data-folderid="{id}" data-name="{title}" data-id="{id}" data-mediatype="folder">
                <div class="file {!! $settings['thumbnailclass'] or null !!}">
                    <a href="#" data-id="{id}" data-media="getitem">
                        <span class="corner"></span>

                        <div class="icon">
                            <i class="fa fa-folder"></i>
                        </div>
                        <div class="file-name">
                            {title}
                            <br/>
                            <small>Added: {created_at}</small>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
<!-- Modal -->
<div id="foldersetting" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Settings <span data-settingmodal="settingtitel"></span></h4>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#bbsettingfoler">Folder Settings</a>
					</li>
					<li><a data-toggle="tab" href="#bbuploadersetting">Uploader Settings</a>
					</li>
				</ul>
				<div class="tab-content p-15">
					<div id="bbsettingfoler" class="tab-pane active">
								<input name="folder_id"  data-selectmenu="folder_id" type="hidden">
								<form data-settingmodal="setting">
									
									<div class="form-group">
										<label for="Action">Action</label>
										<select class="form-control" multiple data-selectmenu="action" name="action">
											<option value="all_access">all_access</option>
											<option value="no_access">no_access</option>
											<option value="edit">edit</option>
											<option value="delete">delete</option>
											<option value="upload">upload</option>
											<option value="create_folder">create_folder</option>
											<option value="create_item">create_item</option>
										</select>
									</div>

									<div class="form-group">
										<label for="function">Function</label>
										<select class="form-control" name="function" data-selectmenu="function"><option value="">fucntion</option></select>
									</div>

									<div class="form-group">
										<label for="description">Description</label>
										<textarea class="form-control" rows="3" name="description" data-selectmenu="description"></textarea>

									</div>
									<div class="form-group hide">
										<label for="uploader">Uploader</label>
										<select class="form-control" name="uploader_slug" data-selectmenu="Uploader-s">

										</select>

									</div>
								</form>
					</div>
					<div id="bbuploadersetting" class="tab-pane" >
						<form data-settingmodal="uploder">
							
						</from>
					
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-settingmodal="save" data-dismiss="modal">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

    {!! Form::hidden(null,'drive',['data-type'=>'folder']) !!}
@stop
@section('CSS')
{{--@push("css")--}}
{!! HTML::style("/resources/assets/js/animate/css/animate.css") !!}
{!! HTML::style("/public/media_template/css/style.css") !!}
{!! HTML::style("/resources/assets/js/bootstrap-select/css/bootstrap-select.min.css") !!}
{!! HTML::style("/resources/assets/js/tag-it/css/jquery.tagit.css") !!}
{{--@endpush--}}
@stop
@section("JS")
{!! HTML::script("/resources/assets/js/nestedSortable/jquery.mjs.nestedSortable.js") !!}
{!! HTML::script("/resources/assets/js/bootstrap-select/js/bootstrap-select.min.js") !!}
{!! HTML::script("/resources/assets/js/tag-it/js/tag-it.js") !!}

<script>
    $(document).ready(function(){
        /*$('.file-box').each(function() {
         animationHover(this, 'pulse');
         });*/
        postSendAjax = function (url, data, success, error) {
            url='/admin/media/drive'+url;
            $.ajax({
                type:'post',
                url:url,
                cache: false,
                datatype: "json",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $("input[name='_token']").val()
                },
                success:function(data) {
                    if (success) {
                        success(data);
                    }
                    return data;
                },
                error: function(errorThrown){
                    if(error){
                        error(errorThrown);
                    }
                    return errorThrown;
                }
            });
        };

		ajaxMedia= function (url, data, success, error) {
            $.ajax({
                type:'post',
                url:url,
                cache: false,
                datatype: "json",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $("input[name='_token']").val()
                },
                success:function(data) {
                    if (success) {
                        success(data);
                    }
                    return data;
                },
                error: function(errorThrown){
                    if(error){
                        error(errorThrown);
                    }
                    return errorThrown;
                }
            });
        };
		
		
        var selectedFolder = '';
        var activefolderid = ''
        var mainfoderid = false;
        var editbuttonclass = "{!! $settings['editbutton'] or null !!}"
        var settingbuttonclass = "{!! $settings['settingbutton'] or null !!}"
        var deletebuttonclass = "{!! $settings['deletebutton'] or null !!}"

        var getfolderli = function(datajosn){
			
            var htmlli= $('<li data-treefolder="'+datajosn.id+'"></li>');
            var dragdiv= $('<div></div>');
            var htmla = $('<a href="'+datajosn.path+'" data-dropnewitem="'+datajosn.name+'" data-media="getitem"><i class="fa fa-folder"></i> '+datajosn.name+'</a>');
            var editfolder = $('<button class="btn btn-default btn-xs pull-right '+editbuttonclass+'" type="button" data-name="'+datajosn.name+'" data-mediaedit="'+datajosn.id+'" data-media="editfolder"><i class="fa fa-pencil" aria-hidden="true"></i></button>')
            var setingfolder = $('<button class="btn btn-default btn-xs pull-right m-r-5 '+settingbuttonclass+'" type="button" data-name="'+datajosn.name+'" data-mediaedit="'+datajosn.id+'" data-media="settingfolder"><i class="fa fa-cog" aria-hidden="true"></i></button>')
            var deletefolder = $('<button class="btn btn-default btn-xs pull-right m-r-5 '+deletebuttonclass+'" type="button" data-name="'+datajosn.name+'" data-mediaedit="'+datajosn.id+'" data-media="deletefolder"><i class="fa fa-trash-o" aria-hidden="true"></i></button>')

            dragdiv.append(editfolder);
            dragdiv.append(setingfolder);
            dragdiv.append(deletefolder);
            $.each(datajosn, function(key, val){
                htmla.attr('data-'+key, val);
            })

            dragdiv.append(htmla);
            htmlli.append(dragdiv)
            return htmlli;
        }
        var getitmeimage = function(datajosn){
            var html = $('[data-template="itemthumb"]').html()
            html =  html.replace(/{original_name}/g, datajosn.original_name);
            html =  html.replace(/{real_name}/g, datajosn.real_name);
            html =  html.replace(/{extension}/g, datajosn.extension);
            html =  html.replace(/{size}/g, datajosn.size);
            html =  html.replace(/{id}/g, datajosn.id);
            html =  html.replace(/{created_at}/g, datajosn.created_at);
            html =  html.replace(/{updated_at}/g, datajosn.updated_at);
            $.each(datajosn, function(key,val){
            })
            return html;
        }
        var getitmeFolder = function(datajosn){
            var html = $('[data-template="foldertumb"]').html()
            html =  html.replace(/{title}/g, datajosn.title);
            html =  html.replace(/{id}/g, datajosn.id);
            html =  html.replace(/{updated_at}/g, datajosn.updated_at);
            html =  html.replace(/{created_at}/g, datajosn.created_at);
            $.each(datajosn, function(key,val){
            })
            return html;
        }
        var getfolder = function(data){
            if(!data.error){
                if(data.data){
                    if(!mainfoderid){
                        mainfoderid = data.data.id
                    }
                    var appedndata = '';
                    activefolderid = data.data.id;
					$('[data-targetiuploder="folder"]').collapse('hide');
                    //selectedFolder = ' '+ data.data.name;
                    selectedFolder = '/ <a href="'+data.data.path+'" data-id="'+data.data.parent_id+'" data-dropnewitem="'+data.data.parent_id+'" data-media="getitem"><i class="fa fa-folder"></i> Parent Folder</a> / '+ data.data.title + ' ';
                    var parentid = data.data.parent_id;
                    if(data.data.parent_id == null){
                        selectedFolder = ' '+ data.data.name;
                    }
                    $('[data-media="selected"]').html(selectedFolder)
                    $('[data-media="folderitem"]').empty();
                    var appendselecter = $('li[data-treefolder="'+activefolderid+'"]');
                    $('[data-media="folder"] li').removeClass('active');
                    appendselecter.addClass('active');
				
                    if( parentid==null || parentid=='0'){
					    appendselecter = $('[data-media="folder"]');
                    }
                    var noitemandfoder = true;

                    if(data.data.childs){
                        if(data.data.childs != ''){
                            noitemandfoder = false
                            if(!appendselecter.children('ul').is('ul')){
                                appendselecter.append('<ul></ul>');
                            }
                            $.each(data.data.childs, function(key, val){
                                $('[data-media="folderitem"]').append(getitmeFolder(val))
								
                                if(parentid==null || parentid== 0){
									if ($('li[data-treefolder="'+val.id+'"]').length == 0){
                                        appendselecter.append(getfolderli(val))
                                    }
                                    
                                }else{
									if ($('li[data-treefolder="'+val.id+'"]').length == 0){
										
                                        appendselecter.children('ul:first').append(getfolderli(val))
                                    }
                                    
                                }
                            })
                        }
                    }else{

                    }
                    if(data.data.items){
                        if(data.data.items != ''){
                            noitemandfoder = false
                            $.each(data.data.items, function(key, val){
                                $('[data-media="folderitem"]').append(getitmeimage(val))
                            })
                        }
                    }else{

                    }
                    if(noitemandfoder){
                        $('[data-media="folderitem"]').append('<h2>Sorry, No have any item or any sub Folder in <b class="text-danger">'+ data.data.title +'</b> Folder</h2>');
                    }
                    //$('[data-media="folder"]').html(appedndata)
                    draganddrop()
                }
            }else{
                alert(JSON.stringify(data.message));
            }

        }

        var createnewfolder = function(datajson){
            if(!datajson.error){
                var parentid = datajson.data.parent_id;
                var appendselecter = $('li[data-treefolder="'+activefolderid+'"]');
                if($('li[data-treefolder="'+parentid+'"]').length == 0){
                    appendselecter = $('[data-media="folder"]');
                }
                if(!appendselecter.children('ul').is('ul')){
                    appendselecter.append('<ul></ul>');
                }

                if($('li[data-treefolder="'+parentid+'"]').length > 0){
                    if ($('li[data-treefolder="'+datajson.data.id+'"]').length == 0){
                        appendselecter.children('ul:first').append(getfolderli())
                        $('[data-media="folderitem"]').append(getitmeFolder(datajson.data))
                    }
                }else{
                    if ($('li[data-treefolder="'+datajson.data.id+'"]').length == 0){
                        $('[data-media="folderitem"]').append(getitmeFolder(datajson.data))
                        appendselecter.append(getfolderli(datajson.data))
                    }
                }

                draganddrop();
                $('#createFolder').collapse('hide');
                $('[data-mediafield="addfolder"]').val(' ')
            }else{
                alert(JSON.stringify(datajson.message))
            }
        }
        var renameFolder = function(datajson){
            if(!datajson.error){
                alert(JSON.stringify(datajson))
            }else{
                alert(JSON.stringify(datajson.message))
            }
        }

        var sortFolder = function(datajson){
            if(!datajson.error){
                if(datajson.data){
                    $('[data-folderid="'+datajson.data.id+'"]').remove();
                }
                //alert(JSON.stringify(datajson))
            }else{
                alert(JSON.stringify(datajson.message))
            }
        }

        var itemmove = function(datajson){
            if(!datajson.error){
                $('[data-dragitem="'+datajson.data.id+'"]').remove();
            }else{
                alert(JSON.stringify(datajson.message))
            }
        }

        var testajax = function(datajson){
            if(!datajson.error){
                alert(JSON.stringify(datajson))
            }else{
                alert(JSON.stringify(datajson.message))
            }
        }



        var settingFolder = function(datajson){
            if(!datajson.error){
                var jsoninfo = datajson.data;
				
				$('#foldersetting').modal('show');
				
                //alert(JSON.stringify(datajson))
                $('[data-selectmenu="action"]').val(jsoninfo.settings.action)
                $('[data-selectmenu="function"]').val(jsoninfo.settings.function)
				$('[data-selectmenu="description"]').val(jsoninfo.settings.description)
				$('[data-selectmenu="Uploader"]').change()
                $('[data-selectmenu]').selectpicker()

            }else{
                alert(JSON.stringify(datajson.message))
            }
        }
		
		function uploadersmedia (d){
			if(typeof d == 'object'){
				if(!d.error && d.data){
					var options = ''	
					$.each(d.data, function(key, value){
						 options += '<option value="'+value.slug+'">'+value.title+'</option>';
					})
					$('[data-selectmenu="Uploader"]').html(options);
					
				}
			}
			
			
		}

        //var getfloderid = {folder_id:'1','access_token':'string'  }
        var getfolderSlug = $('input[data-type="folder"]').val();
		var jsondata = {slug:getfolderSlug, files:true, access_token:'string'}
        postSendAjax('/api-media/get-folder-childs', jsondata, getfolder)
		
		ajaxMedia('/admin/media/drive/api-media/get-media-uploaders', {}, uploadersmedia)
		$('[data-selectmenu="Uploader"]').change(function(){
			var getvalue = $(this).val()
			var htmlsdata = function(d){
				if(d.html){
					$('[data-settingmodal="uploder"]').html(d.html);
				}
			}
			ajaxMedia('/admin/media/drive/api-media/get-media-uploaders-settings', {slug:getvalue}, htmlsdata)
		})
		
		$('[data-role="btnUploader"]').click(function(){
			var afterajax = function(d){
				if(d.error){
					alert(JSON.stringify(d.message));
				}else{
					if(d.html){
						var htmlsdata  = $('<div></div>')
						htmlsdata.append(d.html)
						var token = $("input[name='_token']").val()
						var dataid ={folder_id:activefolderid, _token:token }
						
						htmlsdata.find('input[data-upload-url]').attr('data-upload-extra-data', JSON.stringify(dataid)) 
						//alert(htmlsdata.html())
						$('[data-targetiuploder="folder"] > div').html(htmlsdata.html())
						$('[data-targetiuploder="folder"]').collapse('show');
					}
				}
				
			}
			ajaxMedia('/admin/media/drive/api-media/get-media-uploader-rendered', {folder_id:activefolderid}, afterajax)
		})
		
		$('[data-settingmodal="save"]').click(function(){
				var getformdata = $('[data-settingmodal="setting"]').serializeArray();
				var getuploaderdata = $('[data-settingmodal="uploder"]').serializeArray();
				var data = {
					folder_settings:{},
					uploader_data :{},
					folder_id:$('[data-selectmenu="folder_id"]').val()
					
				}
				
				$.each(getformdata, function(key, val){
					var name = val.name
					data.folder_settings[name] = val.value;
				})
				$.each(getuploaderdata, function(key, val){
					var name = val.name
					data.uploader_data[name] = val.value;
				})
				
				var afterajax = function(d){
					
				}
				
				ajaxMedia('/admin/media/drive/api-media/get-edit-folder-settings', data, afterajax)
			
				
		})
		
        function createnestd (){
            var sortselected = ''
            var sortparent = ''
            $('[data-media="folder"]').nestedSortable({
                forcePlaceholderSize: true,
                handle: 'div',
                helper:	'clone',
                items: 'li',
                listType:'ul',
                opacity: .6,
                placeholder: 'placeholder',
                revert: 250,
                tabSize: 25,
                tolerance: 'pointer',
                toleranceElement: '> div',
                isTree: true,
                expandOnHover: 700,
                startCollapsed: false,
                isAllowed:function (placeholder, placeholderParent, currentItem) {
                    sortselected = $(currentItem).data('treefolder');
                    sortparent =  $(placeholderParent).closest('[data-treefolder]').data('treefolder')
                    return true;
                },
                relocate: function(event, ui){
                    if(!sortparent){
                        sortparent = mainfoderid
                    }
                    var jsondata = {folder_id:sortselected, parent_id:sortparent, access_token:'string'}
                    postSendAjax('/api-media/get-sort-folder', jsondata, sortFolder)
                    console.log('change item'+ sortselected+' parent'+sortparent);

                }
            });

        }

        function draganddrop(){
            $('[data-dragitem], [data-folderid]').draggable({
                revert: true,
                helper: function(n) {
                    return document.body.classList.add("dragging"), '<div id="photo-file-drag" class="photo-file-drag" data-type="'+$(this).data('mediatype')+'" data-id="'+$(this).data("id")+'"><i class="fa fa-picture-o"></i> '+ $(this).data("name")+'</div>';

                }
            });
            $('[data-folderid], a[data-dropnewitem]').droppable({
                accept: "[data-dragitem], [data-folderid]",
                hoverClass: "draggable-over",
                drop: function(event, ui ) {
                    var targetfolderid = $( this ).data('id')
                    var itemid = $('.photo-file-drag').data('id')
                    var type = $('.photo-file-drag').data('type')
                    console.log('change item'+ itemid+' Folderd'+targetfolderid);
                    if(type=="folder"){
                        var jsondata = {folder_id:itemid, parent_id:targetfolderid, access_token:'string'}
                        postSendAjax('/api-media/get-sort-folder', jsondata, sortFolder)

                    }else if(type=="item"){
                        var jsondata = {folder_id:targetfolderid, item_id:itemid, access_token:'string'}
                        postSendAjax('/api-media/get-sort-item', jsondata, itemmove);
                    }
                    $('.photo-file-drag').remove()
                },
                tolerance: "pointer"
            });

        }

        createnestd()
        $('body').on('click','[data-media="getitem"]', function(e){
            e.preventDefault()
            var fid = $(this).data('id')
            if(fid == null){
                fid = 1;
            }
            var jsondata = {folder_id:fid, files:true, access_token:'string'}
			postSendAjax('/api-media/get-folder-childs', jsondata, getfolder);

        }).on('click', '[data-media="addfolder"]', function(){
            var getFoldername = $('[data-mediafield="addfolder"]').val()
            if(getFoldername !=''){
                var jsondata = {folder_id:activefolderid, folder_name:getFoldername, access_token:'string'}
                postSendAjax('/api-media/get-create-folder-child', jsondata, createnewfolder)

            }
        }).on('click','[data-media="editfolder"]', function(){
            var editfodlerid = $(this).data('mediaedit');
            var editfodlername = $(this).data('name');
            /*bootbox.prompt("Rename "+editfodlername +" Folder", function(result){
             if(result){
             var jsondata = {folder_id:editfodlerid, folder_name:result, access_token:'string'}
             postSendAjax('/api-media/get-edit-folder', jsondata, renameFolder);
             }
             });*/
        }).on('click','[data-media="settingfolder"]', function(){
            var editfodlerid = $(this).data('mediaedit');
            var editfodlername = $(this).data('name');
            var jsondata = {folder_id:editfodlerid,  access_token:'string'}
			$('[data-selectmenu="folder_id"]').val(editfodlerid);
            postSendAjax('/api-media/get-folder-info', jsondata, settingFolder);
            /*bootbox.prompt("Rename "+editfodlername +" Folder", function(result){
             if(result){

             }
             });*/
        }).on('click','[data-media="deletefolder"]', function(){
            var editfodlerid = $(this).data('mediaedit');
            var editfodlername = $(this).data('name');
            var deleteoption ='<div class="form-group">'+
                '<select class="form-control" data-selectmenu="delete"><option value="delete">Delete</option><option value="trash">move too trash</option></select>'+
                '</div>'
            var moveoption ='<div class="form-group  hide" data-movetype="move">'+
                '<label for="function">Move to</label>'+
                '<select class="form-control" data-selectmenu="function"><option>select option</option></select>'+
                '</div>'

            var deleteFolder = function(datajson){
                if(!datajson.error){
                    $('[data-treefolder="'+editfodlerid+'"]').remove();
                    $('[data-folderid="'+editfodlerid+'"]').remove();
                }else{
                    alert(JSON.stringify(datajson.message))
                }
            }

            bootbox.dialog({
                title:"Delete "+editfodlername,
                message: deleteoption,
                buttons: {
                    confirm: {
                        label: 'Save',
                        className: 'btn-success',
                        callback: function() {
                            var jsondata = {folder_id:editfodlerid, trash:0, access_token:'string'}
                            if($('[data-selectmenu="delete"]').val()=='trash'){
                                jsondata['trash'] = 1;
                            }
                            postSendAjax('/api-media/get-remove-folder', jsondata, deleteFolder);

                        }
                    },
                    cancel: {
                        label: 'cancel',
                        className: 'btn-danger'
                    }
                }
            });

            $('[data-selectmenu]').selectpicker()

        })


    });
</script>
@stop
