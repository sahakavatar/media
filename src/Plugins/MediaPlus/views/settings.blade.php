@extends('layouts.mTabs',['index'=>'module_settings'])
@section('tab')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default p-0">
                    <div class="panel-heading">Ui Setting</div>
                    {!! Form::open(['url' => url('/admin/media/mediaplus/ui-settings')]) !!}
                    <div class="panel-body">
                        <div class="form-group row">
                            <label for="parpageitem" class="col-sm-4 control-label">Display items as</label>
                            <div class="col-sm-8">
                                <label class="radio-inline">
                                    <input type="radio" name="display_item" id="inlineRadio1" checked
                                           value="pagination"> Pagination
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="display_item" id="inlineRadio2" value="button"> Load more
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="display_item" id="inlineRadio3" value="lazyload"> Lazy
                                    load
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="parpageitem" class="col-sm-4 control-label">Per Page Item</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" value="10" name="per_page_item_count"
                                       id="parpageitem" placeholder="10">
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row">
                            <label for="allow" class="col-sm-4 control-label">Allow Folder</label>
                            <div class="col-sm-8 p-l-20">
                                <div class="row">
                                    <label class="col-sm-6 checkbox">
                                        <input type="hidden" name="allow_folder[create][enabled]" value="0"/>
                                        <input type="checkbox" id="create" name="allow_folder[create][enabled]"
                                               data-allowtarget="create" value="1"> Create
                                    </label>

                                    <div class="col-sm-6" data-allowrole="create">
                                        {!! Form::select('allow_folder[create][roles][]', BBGetRolesList(), 'superadmin', ['data-custom'=>'select', 'multiple' => 'multiple'])!!}
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-6 checkbox">
                                        <input type="hidden" name="allow_folder[delete][enabled]" value="0"/>
                                        <input type="checkbox" id="delete" name="allow_folder[delete][enabled]"
                                               data-allowtarget="delete" value="1"> Delete
                                    </label>

                                    <div class="col-sm-6" data-allowrole="delete">
                                        {!! Form::select('allow_folder[delete][roles][]', BBGetRolesList(), 'superadmin', ['data-custom'=>'select', 'multiple' => 'multiple'])!!}
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-6 checkbox">
                                        <input type="hidden" name="allow_folder[edit][enabled]" value="0"/>
                                        <input type="checkbox" id="edit" name="allow_folder[edit][enabled]"
                                               data-allowtarget="edit" value="1"> Edit
                                    </label>

                                    <div class="col-sm-6" data-allowrole="edit">
                                        {!! Form::select('allow_folder[edit][roles][]', BBGetRolesList(), 'superadmin', ['data-custom'=>'select', 'multiple' => 'multiple'])!!}
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-6 checkbox">
                                        <input type="hidden" name="allow_folder[copy][enabled]" value="0"/>
                                        <input type="checkbox" id="copy" name="allow_folder[copy][enabled]"
                                               data-allowtarget="copy" value="1"> Copy
                                    </label>

                                    <div class="col-sm-6" data-allowrole="copy">
                                        {!! Form::select('allow_folder[copy][roles][]', BBGetRolesList(), 'superadmin', ['data-custom'=>'select', 'multiple' => 'multiple'])!!}
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-6 checkbox">
                                        <input type="hidden" name="allow_folder[sub][enabled]" value="0"/>
                                        <input type="checkbox" id="sub" name="allow_folder[sub][enabled]"
                                               data-allowtarget="sub" value="1"> Sub Folder
                                    </label>

                                    <div class="col-sm-6" data-allowrole="sub">
                                        {!! Form::select('allow_folder[sub][roles][]', BBGetRolesList(), 'superadmin', ['data-custom'=>'select', 'multiple' => 'multiple'])!!}
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-6 checkbox">
                                        <input type="hidden" name="allow_folder[download][enabled]" value="0"/>
                                        <input type="checkbox" id="Download" name="allow_folder[download][enabled]"
                                               data-allowtarget="download" value="1"> Download
                                    </label>

                                    <div class="col-sm-6" data-allowrole="download">
                                        {!! Form::select('allow_folder[download][roles][]', BBGetRolesList(), 'superadmin', ['data-custom'=>'select', 'multiple' => 'multiple'])!!}
                                    </div>
                                </div>


                            </div>
                        </div>
                        <hr>

                        <div class="form-group row">
                            <label for="allow" class="col-sm-4 control-label">Allow Item</label>
                            <div class="col-sm-8 p-l-20">

                                <div class="row">
                                    <label class="col-sm-6 checkbox">
                                        <input type="hidden" name="allow_item[upload][enabled]" value="0"/>
                                        <input type="checkbox" id="itemupload" name="allow_item[upload][enabled]"
                                               data-allowtarget="itemupload" value="1"> Upload
                                    </label>

                                    <div class="col-sm-6" data-allowrole="itemupload">
                                        {!! Form::select('allow_item[upload][roles][]', BBGetRolesList(), 'superadmin', ['data-custom'=>'select', 'multiple' => 'multiple'])!!}
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-6 checkbox">
                                        <input type="hidden" name="allow_item[delete][enabled]" value="0"/>
                                        <input type="checkbox" id="itemdelete" name="allow_item[delete][enabled]"
                                               data-allowtarget="itemdelete" value="1"> Delete
                                    </label>

                                    <div class="col-sm-6" data-allowrole="itemdelete">
                                        {!! Form::select('allow_item[delete][roles][]', BBGetRolesList(), 'superadmin', ['data-custom'=>'select', 'multiple' => 'multiple'])!!}
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-6 checkbox">
                                        <input type="hidden" name="allow_item[edit][enabled]" value="0"/>
                                        <input type="checkbox" id="itemedit" name="allow_item[edit][enabled]"
                                               data-allowtarget="itemedit" value="1"> Edit
                                    </label>

                                    <div class="col-sm-6" data-allowrole="itemedit">
                                        {!! Form::select('allow_item[edit][roles][]', BBGetRolesList(), 'superadmin', ['data-custom'=>'select', 'multiple' => 'multiple'])!!}
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-6 checkbox">
                                        <input type="hidden" name="allow_item[copy][enabled]" value="0"/>
                                        <input type="checkbox" id="itemcopy" name="allow_item[copy][enabled]"
                                               data-allowtarget="itemcopy" value="1"> Copy
                                    </label>

                                    <div class="col-sm-6" data-allowrole="itemcopy">
                                        {!! Form::select('allow_item[copy][roles][]', BBGetRolesList(), 'superadmin', ['data-custom'=>'select', 'multiple' => 'multiple'])!!}
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-6 checkbox">
                                        <input type="hidden" name="allow_item[download][enabled]" value="0"/>
                                        <input type="checkbox" id="itemDownload" name="allow_item[download][enabled]"
                                               data-allowtarget="itemDownload" value="1"> Download
                                    </label>

                                    <div class="col-sm-6" data-allowrole="itemDownload">
                                        {!! Form::select('allow_item[download][roles][]', BBGetRolesList(), 'superadmin', ['data-custom'=>'select', 'multiple' => 'multiple'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
            <div class="col-sm-6">
                <div class="panel panel-default p-0">
                    <div class="panel-heading">Default Settings</div>
                    <div class="panel-body">
                        {!! Form::open(['class' => '']) !!}
                        <div class="form-group">
                            {!! Form::label('directory_default_max_size','Default Max Size',[])!!}
                            {!! Form::text('directory_default_max_size',isset($settings['directory_default_max_size']) ? $settings['directory_default_max_size'] : null,['class'=>'form-control','placeholder'=>'Enter folder default max size'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('directory_default_extension','Default Extension',[])!!}
                            {!! Form::text('directory_default_extension',isset($settings['directory_default_extension']) ? $settings['directory_default_extension'] : '.*',['class'=>'form-control','placeholder'=>'Enter folder default accepted extension'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('directory_default_uploader','Default Uploader',[])!!}
                            {!! Form::select('directory_default_uploader', $uploaders, isset($settings['directory_default_uploader']) ? $settings['directory_default_uploader'] : null, ['class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Store',['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="panel panel-default p-0">
                    <div class="panel-heading">Sorting Options</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => url('/admin/media/mediaplus/sorting-settings')]) !!}
                        @php
                            $sortings = \Config::get('sorting');

                        @endphp
                        @if(count($sortings))
                            @foreach($sortings as $key => $sorting)
                                <div class="form-group">
                                    <label class="checkbox">
                                        <input type="hidden" name="sorting[{{$key}}][enabled]" value="0"/>
                                        <input type="checkbox" id="delete" name="sorting[{{$key}}][enabled]"
                                               {!! (isset($savedSorting[$key]) && $savedSorting[$key]['enabled'] == 1) ? "checked='checked'" : '' !!} value="1"> {!! $sorting !!}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                        <div class="form-group">
                            {!! Form::submit('Enable Options',['class' => 'btn btn-warning']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>

            </div>

            <div class="col-sm-6">
                <div class="panel panel-default p-0">
                    <div class="panel-heading">Search bar</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => url('/admin/media/mediaplus/search-bar')]) !!}
                        <div class="form-group">
                            {!! Form::label('','Select unit',[])!!}
                            {!! BBbutton('units','search_bar','Select Unit',['class'=>'select_style btn form-control','data-type'=>'backend','data-group'=>'Search']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Activate',['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('resources::assests.magicModal')
@stop
@section('CSS')
    {!! HTML::style('/resources/assets/js/bootstrap-select/css/bootstrap-select.min.css') !!}
@stop
@section('JS')
    {!! HTML::script("resources/assets/js/UiElements/bb_styles.js?v.5") !!}
    {!! HTML::script('/resources/assets/js/bootstrap-select/js/bootstrap-select.min.js') !!}
    <script>
        $(function () {
            var currenltvalue = ''
            $('[data-custom="select"]').selectpicker().on('show.bs.select', function (e) {
                currenltvalue = $(this).val()
            }).on('changed.bs.select', function (event, clickedIndex, newValue, oldValue) {
                var newvalue = $(this).val()
                if (!newvalue) {
                    $(this).selectpicker('val', currenltvalue)
                } else {
                    currenltvalue = newvalue;
                }

            })

            $('[data-allowtarget]').change(function () {
                var gettarget = $(this).data('allowtarget');
                if ($(this).is(':checked')) {
                    $('[data-allowrole="' + gettarget + '"]').removeClass('hide')
                } else {
                    $('[data-allowrole="' + gettarget + '"]').addClass('hide')
                }
            })
            updatedallow()
            function updatedallow() {
                $('[data-allowtarget]').each(function () {
                    var gettarget = $(this).data('allowtarget');
                    if ($(this).is(':checked')) {
                        $('[data-allowrole="' + gettarget + '"]').removeClass('hide')
                    } else {
                        $('[data-allowrole="' + gettarget + '"]').addClass('hide')
                    }

                })

            }
        })
    </script>

@stop