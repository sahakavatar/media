<ul class="list-unstyled clearfix boxMenuList" data-dragli="menu">
@foreach($images as $image)
    <li data-name="{!! $image->title !!}" data-id="{!! $image->id !!}" data-source="/public/media/{!! $image->folder_id !!}/images/{!! $image->id !!}/{!! $image->active_variation !!}/{size}{!! $image->name !!}" >
        <a href="#">
            <img src="/{!! $image->path !!}" alt="">
            <span>{!! $image->title !!}</span>
        </a>
        <div class="hide" data-content="{!! $image->id !!}"><img src="/{!! $image->path !!}" alt=""></div>
    </li>
@endforeach
</ul>