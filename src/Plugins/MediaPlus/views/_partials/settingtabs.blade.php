
<ul role="tablist" class="nav nav-tabs">
      <li class="@if( Request::path() == 'admin/media/setting') active @endif"><a role="tab" aria-controls="general" href="/admin/media/setting" >General Settings</a></li>
      <li class="@if( Request::path() == 'admin/media/setting/thumbs') active @endif"><a role="tab" href="/admin/media/setting/thumbs" >Thumbs</a></li>
      <li class="@if( Request::path() == 'admin/media/setting/albums') active @endif"><a role="tab" href="/admin/media/setting/albums" >Albums</a></li>
      <li class="@if( Request::path() == 'admin/media/setting/wm') active @endif"><a role="tab" href="#water_marks" >Water Marks</a></li>
      <li class="@if( Request::path() == 'admin/media/setting/editor') active @endif"><a role="tab" href="#editor" >Editor</a></li>
      <li class="@if( Request::path() == 'admin/media/setting/seo') active @endif"><a role="tab" href="/admin/media/setting/seo">SEO</a></li>
      <li class="@if( Request::path() == 'admin/media/setting/impexp') active @endif"><a role="tab" href="/admin/media/setting/impexp">Export/Import</a></li>
      <li class="pull-right">
       
         {!! Form::submit('Save Settings', ['class' => 'btn btn-primary','id'=>'submit_btn']) !!}
       
      </li>
    </ul>
