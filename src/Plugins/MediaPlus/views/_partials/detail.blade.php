<!-- Modal -->

<div class="adminmodal modal fade" id="imageload" tabindex="-1" role="dialog" aria-labelledby="imageloadLabel">
  <div class="modal-dialog modal-lg row" role="document">
    <div class="modal-content col-md-8 p-0">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="iconaction iconClose"></i></button>
        <button type="button" class="btn btn-action-popup" title="Edit image" data-dismiss="modal" data-toggle="modal" data-target="#imageeditMode"><i class="iconaction iconEditImageGrey"></i></button>
        <button type="button" class="btn btn-action-popup" title="Download"  data-slideshow="download" ><i class="iconaction iconDownloadGrey"></i></button>
        <div class="btn-group">
          <button type="button" class="btn btn-action-popup dropdown-toggle" title="Rename" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="iconaction iconRenameGrey"></i></button>
          <div class="dropdown-menu form-inline width-sm p-l-0 p-r-0" aria-labelledby="dLabel">
            <div class="form-group col-sm-7 p-l-5">
              <input name="rename_img" id="rename_img" type="text" class="form-control" placeholder="File name will be come here"  data-slideshow="renameval">
            </div>
            <div class="form-group col-sm-5 p-r-5">
              <button class="btn btn-success btn-block" data-slideshow="save">Save</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body text-center">
        <div id="imgViewCarousel" class="carousel slide">
          <div class="carousel-inner" role="listbox" data-slideshow="view"> </div>
        </div>
      </div>
      <div class="modal-footer col-md-8">
        <h4 class="modal-title"><a href="#imgViewCarousel" role="button" data-slideshow="prev" data-nextid="" class="popuparrow" ><i class="fa fa-arrow-left"></i></a> <img src="" data-slideshow="typeext"> <span data-slideshow="title">Cars BMW</span> <a class="popuparrow" href="#imgViewCarousel" role="button" data-slideshow="next" data-nextid=""><i class="fa fa-arrow-right"></i></a> </h4>
      </div>
    </div>
    <div class="popupDetail col-md-4 p-0">
      <div class="row p-t-10 p-b-10">
        <div class="col-xs-4 col-md-4">
          <button class="btn btn-default btn-block active" type="button" data-tabaction="details">Details</button>
        </div>
        <div class="col-xs-4 col-md-4">
          <button class="btn btn-default btn-block" type="button" data-tabaction="seo">SEO</button>
        </div>
        <div class="col-xs-4 col-md-4">
          <button class="btn btn-default btn-block" type="button">Option 3</button>
        </div>
      </div>
      <div class="row rowsection collapse in" data-tabcontent="details">
        <div class="col-xs-12 col-md-12">
          <h4><i class="fa fa-bars text-primary"></i> GENERAL INFO</h4>
          <div class="table-responsive">
            <table class="table tableborder0">
              <tr>
                <th width="30%">Type</th>
                <td><img src="" data-slideshow="typeext"> <span data-slideshow="ext"></span></td>
              </tr>
              <tr>
                <th>Size</th>
                <td><span data-slideshow="size"> </span></td>
              </tr>
              <tr>
                <th>Location</th>
                <td><i class="fa fa-folder"></i> <span data-slideshow="location"></span></td>
              </tr>
              <tr>
                <th>Uploaded By</th>
                <td><span data-slideshow="uploaded_by"></span></td>
              </tr>
              <tr>
                <th>Created</th>
                <td><span data-slideshow="created_at"></span></td>
              </tr>
              <tr>
                <th>Opened</th>
                <td><span data-slideshow="updated_at"></span></td>
              </tr>
              <tr>
                <th>Version</th>
                <td>
                	<div class=" col-xs-3 p-l-0">
                    <select class="form-control"  data-slideshow="version"></select>
                  </div> 
                  	<button type="button" class="btn btn-default p-l-5 p-r-5" data-action="makeasDefault">Make as Default</button>
                  </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      
      <div class="row rowsection collapse"  data-tabcontent="seo">
     	 <div class="loadingimg lodingSeo hide" data-loadin="seo"></div>
        <div class="col-xs-12 col-md-12">
          <h4><i class="fa fa-bars text-primary"></i> Seo Detail</h4>
          <div class="table-responsive">
            <table class="table tableborder0">
              
              <tr>
                <th width="23%">Alt Tags</th>
                <td>
                    <input type="text" data-slideshow="alt_tags" class="form-control hide" value="" >
                    <div class="altTagsdata"></div>
                 </td>
              </tr>

              <tr>
                <th width="23%">Keywords</th>
                <td>
                    <input type="text" data-slideshow="keywords" class="form-control" >
                   </td>
              </tr>

		 	<tr>
                <th width="23%">Caption</th>
                <td>
                    <input type="text" data-slideshow="caption" class="form-control" >
                   </td>
              </tr>
	    <tr>
                <th width="23%">Description</th>
                <td><textarea name="description" data-slideshow="description" class="form-control"></textarea>
                    
                   </td>
              </tr>
<tr>
                <th width="23%">Alt Text</th>
                <td>
                    <input type="text" data-slideshow="alt_text" class="form-control" >
                   </td>
              </tr>
              
              
              <tr>
                <th></th>
                <td>
                	
                  	<button type="button" class="btn btn-default p-l-5 p-r-5" data-action="saveSeo">Save Detail</button>
                  </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      
      <div class="row rowsection hide" data-slideshow="getlink">
        <div class="col-xs-12 col-md-12">
          <h4><i class="glyphicon glyphicon-link text-primary"></i> GET lINKS</h4>
          <div class="btn-group btn-group-justified btn-tab p-b-15" role="group" aria-label="">
            <div class="btn-group" role="group" data-gl='core'> <a href="#slideOrginalLink" class="btn btn-default active" data-toggle="tab">Orginal</a> </div>
            <div class="btn-group" role="group" data-gl='sm'> <a href="#slidesmallThumb" class="btn btn-default" data-toggle="tab">Small thumb</a> </div>
            <div class="btn-group" role="group" data-gl='md'> <a href="#slideMedThumb" class="btn btn-default" data-toggle="tab">Med thumb</a> </div>
            <div class="btn-group" role="group" data-gl='lg'> <a href="#slideLargeThumb" class="btn btn-default" data-toggle="tab">Large thumb</a> </div>
          </div>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="slideOrginalLink">
              <div class="form-horizontal">
                <div class="form-group m-l-0 m-r-0">
                  <label for="slidedirectlinkcore" class="col-sm-3 control-label text-left">Direct Link</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slidedirectlinkcore" data-getlink="directlinkcore" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slidedirectlinkcore"><i class="iconCopys"></i></div>
                  </div>
                </div>
                <div class="form-group m-l-0 m-r-0">
                  <label for="slidedownloadlink" class="col-sm-3 control-label text-left">Download Link</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slidedownloadlink" data-getlink="downloadcore" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slidedownloadlink"><i class="iconCopys"></i></div>
                  </div>
                </div>
                <div class="form-group m-l-0 m-r-0">
                  <label for="slideembedHTML" class="col-sm-3 control-label text-left">Embed HTML</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slideembedHTML" data-getlink="linkcore" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slideembedHTML"><i class="iconCopys"></i></div>
                  </div>
                </div>
                <div class="form-group m-l-0 m-r-0">
                  <label for="slideembedForum" class="col-sm-3 control-label text-left">Embed Forum</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slideembedForum" data-getlink="Forumcore" value="Orginal/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slideembedForum"><i class="iconCopys"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="slidesmallThumb">
              <div class="form-horizontal">
                <div class="form-group m-l-0 m-r-0">
                  <label for="slideDirectlinksm" class="col-sm-3 control-label text-left">Direct Link</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slideDirectlinksm" data-getlink="directlinksm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slideDirectlinksm"><i class="iconCopys"></i></div>
                  </div>
                </div>
                <div class="form-group m-l-0 m-r-0">
                  <label for="slidedownloadlinksm" class="col-sm-3 control-label text-left">Download Link</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slidedownloadlinksm" data-getlink="downloadsm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slidedownloadlinksm"><i class="iconCopys"></i></div>
                  </div>
                </div>
                <div class="form-group m-l-0 m-r-0">
                  <label for="slideembedHTMLsm" class="col-sm-3 control-label text-left">Embed HTML</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slideembedHTMLsm" data-getlink="linksm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slideembedHTMLsm"><i class="iconCopys"></i></div>
                  </div>
                </div>
                <div class="form-group m-l-0 m-r-0">
                  <label for="slideembedForumsm" class="col-sm-3 control-label text-left">Embed Forum</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slideembedForumsm" data-getlink="Forumsm" value="smallthumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slideembedForumsm"><i class="iconCopys"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="slideMedThumb">
              <div class="form-horizontal">
                <div class="form-group m-l-0 m-r-0">
                  <label for="slidedirectlinkmt" class="col-sm-3 control-label text-left">Direct Link</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slidedirectlinkmt" data-getlink="directlinkmd" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slidedirectlinkmt"><i class="iconCopys"></i></div>
                  </div>
                </div>
                <div class="form-group m-l-0 m-r-0">
                  <label for="slidedownloadlinkmt" class="col-sm-3 control-label text-left">Download Link</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slidedownloadlinkmt" data-getlink="downloadmd" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slidedownloadlinkmt"><i class="iconCopys"></i></div>
                  </div>
                </div>
                <div class="form-group m-l-0 m-r-0">
                  <label for="slideembedHTMLmt" class="col-sm-3 control-label text-left">Embed HTML</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slideembedHTMLmt" data-getlink="linkmd" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slideembedHTMLmt"><i class="iconCopys"></i></div>
                  </div>
                </div>
                <div class="form-group m-l-0 m-r-0">
                  <label for="slideembedForummt" class="col-sm-3 control-label text-left">Embed Forum</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slideembedForummt" data-getlink="Forummd" value="MedThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red"  data-clipboard-target="#slideembedForummt"><i class="iconCopys"></i></div>
                  </div>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="slideLargeThumb">
              <div class="form-horizontal">
                <div class="form-group m-l-0 m-r-0">
                  <label for="slidedirectlinklg" class="col-sm-3 control-label text-left">Direct Link</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="directlinklg" data-getlink="directlinklg"  value="slideLargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red"  data-clipboard-target="#directlinklg"><i class="iconCopys"></i></div>
                  </div>
                </div>
                <div class="form-group m-l-0 m-r-0">
                  <label for="slidedownloadlinklg" class="col-sm-3 control-label text-left">Download Link</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slidedownloadlinklg" data-getlink="downloadlg" value="LargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slidedownloadlinklg"><i class="iconCopys"></i></div>
                  </div>
                </div>
                <div class="form-group m-l-0 m-r-0">
                  <label for="slideembedHTMLlg" class="col-sm-3 control-label text-left">Embed HTML</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slideembedHTMLlg" data-getlink="linklg" value="LargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red" data-clipboard-target="#slideembedHTMLlg"><i class="iconCopys"></i></div>
                  </div>
                </div>
                <div class="form-group m-l-0 m-r-0">
                  <label for="slideembedForumlg" class="col-sm-3 control-label text-left">Embed Forum</label>
                  <div class="col-sm-9 input-group">
                    <input type="text" class="form-control" id="slideembedForumlg" data-getlink="Forumlg" value="LargeThumb/view/photo/sgpxlqrjttlt0z1d/Child.jpg" readonly>
                    <div class="input-group-addon addon-red"  data-clipboard-target="#slideembedForumlg"><i class="iconCopys"></i></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
