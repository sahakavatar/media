<div class="contentPics m-l-15 m-r-15">
  
  <div class="row galleryList">
    <div class="responsive-list">
      <div class="imagetumb tableTH" id="tablethData">
        <div class="listv checkbox"> &nbsp; </div>
        <div class="thumbnail">Image</div>
        <div class="listv l-Key-Words"> Key Words </div>
        <div class="listv l-Alt-Tags"> Alt Tags </div>
        <div class="listv l-action"> Actions </div>
      </div>

    @foreach($media as $sngl_media)
      <div class="imagetumb" data-role="fileDrag" data-img-id="{{ $sngl_media->id }}" data-name="{{ $sngl_media->title }}" data-folderid="{{ $sngl_media->folder_id }}" data-imagename="{{ $sngl_media->path }}">
        <div class="listv l-titel"> {{ $sngl_media->title }}</div>
        <div class="listv checkbox">
          <label for="{{ $sngl_media->id }}">
            <input type="checkbox" data-role="girdcheckbox" id="{{ $sngl_media->id }}" value="{{ $sngl_media->id }}">
          </label>
        </div>
        <label class="thumbnail" for="{{ $sngl_media->id }}">
          <div class="galleryImg"><div><img src="/{{ $sngl_media->path }}" alt=""></div></div>
          <div class="caption"> <img src="/public/img/icons/{{ $sngl_media->media_type }}.png" /> {{ str_limit($sngl_media->title,10) }} </div>
        </label>
        <div class="listv l-Key-Words">
          <input name="keywords" class="form-control" type="text" data-imgmeta="keyword" placeholder="Key words" value="{{ @$sngl_media->keywords }}">
        </div>
        <div class="listv l-Alt-Tags">
          <input name="altTags" class="form-control alttags" type="text" data-imgmeta="alttags" placeholder="Alt Tags" value="{{ @$sngl_media->alt_tags }}">
        </div>
        <div class="listv l-action"> <a href="#" data-role="editalt"><i class="fa fa-pencil"></i></a> <a href="#"><i class="fa fa-trash-o"></i></a> </div>
      </div>
  @endforeach   
      
    </div>
  </div>
</div>
