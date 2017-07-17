<!-- Modal -->

<div class="adminmodal modal fade" id="imageeditMode" tabindex="-1" role="dialog" aria-labelledby="imageloadLabel">
  <div class="modal-dialog modal-lg row" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="iconaction iconClose"></i></button>
        <button type="button" class="btn btn-action-popup" title="view image" data-dismiss="modal" data-toggle="modal" data-target="#imageload"><i class="iconaction iconView"></i></button>
        <button type="button" class="btn btn-action-popup" data-slideshow="download" title="Download"><i class="iconaction iconDownloadGrey"></i></button>
        <button type="button" class="btn btn-action-popup" data-editimg-action="save" title="save"><i class="fa fa-floppy-o fa-2x" aria-hidden="true"></i></button>
      </div>
      <div class="modal-body text-center">
        <div class="privewLightbox" data-slideshow="editimages"></div>
        <canvas id="imgcanvas" width="800" height="600"></canvas>
      </div>
      <div class="modal-footer">
        <div id="crops" class="collapse formeditmode">
          <div class=" form-inline p-b-15 p-t-15">
            <div class="form-group">
              <label for="height">Width</label>
              <input type="text" class="form-control form-black" id="height" placeholder="1200px">
            </div>
            <div class="form-group"> <a href="#" class="btn btn-link"><i class="fa fa-chain-broken"></i></a> </div>
            <div class="form-group">
              <label for="height">Height</label>
              <input type="text" class="form-control form-black" id="height" placeholder="1200px">
            </div>
            <div class="form-group">
              <button type="button"  class="btn btn-default" data-role="crop">Crop</button>
              <button type="button"  class="btn btn-danger" data-img="reset">Reset</button>
            </div>
          </div>
        </div>
        <div id="fileadjust" class="collapse  formeditmode">
          <div class="row form-inline p-b-10 ">
            <div class="col-sm-3 p-t-10">
              <label for="Brightness" class="col-sm-3 text-right">Brightness</label>
              <div id="brightnessSlider" class="col-sm-9 uislider" data-adjust="brightness" data-slide-min="-100" data-slide-max="100" data-slide-val="0"></div>
            </div>
            <div class="col-sm-3 p-t-10">
              <label for="contrastslider" class="col-sm-3 text-right">Contrast</label>
              <div id="contrastslider" class="col-sm-9 uislider" data-adjust="contrast" data-slide-min="-100" data-slide-max="100" data-slide-val="0" ></div>
            </div>
            <div class="col-sm-3 p-t-10">
              <label for="saturationSlider" class="col-sm-3 text-right">saturation</label>
              <div id="saturationSlider" class="col-sm-9 uislider" data-adjust="saturation" data-slide-min="-100" data-slide-max="100" data-slide-val="0"></div>
            </div>
            <div class="col-sm-3 p-t-10">
              <label for="vibranceSlider" class="col-sm-3 text-right">vibrance</label>
              <div id="vibranceSlider" class="col-sm-9 uislider" data-adjust="vibrance" data-slide-min="-100" data-slide-max="100" data-slide-val="0"></div>
            </div>
            <div class="col-sm-3 p-t-10">
              <label for="exposureSlider" class="col-sm-3 text-right">exposure</label>
              <div id="exposureSlider" class="col-sm-9 uislider" data-adjust="exposure" data-slide-min="-100" data-slide-max="100" data-slide-val="0"></div>
            </div>
            <div class="col-sm-3 p-t-10">
              <label for="HUEslider" class="col-sm-3 text-right">HUE</label>
              <div id="HUEslider" class="col-sm-9 uislider" data-adjust="hue" data-slide-min="0" data-slide-max="100" data-slide-val="0"></div>
            </div>
            <div class="col-sm-3 p-t-10">
              <label for="sepiaSlider" class="col-sm-3 text-right">sepia</label>
              <div id="sepiaSlider" class="col-sm-9 uislider" data-adjust="sepia" data-slide-min="0" data-slide-max="100" data-slide-val="0"></div>
            </div>
            <div class="col-sm-3 p-t-10">
              <label for="gammaSlider" class="col-sm-3 text-right">gamma</label>
              <div id="gammaSlider" class="col-sm-9 uislider" data-adjust="gamma" data-slide-min="0" data-slide-max="100" data-slide-val="0"></div>
            </div>
            <div class="col-sm-3 p-t-10">
              <label for="noiseSlider" class="col-sm-3 text-right">noise</label>
              <div id="noiseSlider" class="col-sm-9 uislider" data-adjust="noise" data-slide-min="0" data-slide-max="100" data-slide-val="0"></div>
            </div>
            <div class="col-sm-3 p-t-10">
              <label for="clipSlider" class="col-sm-3 text-right">clip</label>
              <div id="clipSlider" class="col-sm-9 uislider" data-adjust="clip" data-slide-min="0" data-slide-max="100" data-slide-val="0"></div>
            </div>
            <div class="col-sm-3 p-t-10">
              <label for="sharpenSlider" class="col-sm-3 text-right">sharpen</label>
              <div id="sharpenSlider" class="col-sm-9 uislider" data-adjust="sharpen" data-slide-min="0" data-slide-max="100" data-slide-val="0"></div>
            </div>
            <div class="col-sm-3 p-t-10">
              <label for="stackBlurSlider" class="col-sm-3 text-right">stackBlur</label>
              <div id="stackBlurSlider" class="col-sm-9 uislider" data-adjust="stackBlur" data-slide-min="0" data-slide-max="100" data-slide-val="0"></div>
            </div>
            <div class="col-sm-3 p-t-10 text-right">
              <button type="button"  class="btn btn-danger" data-reset="adjust">Reset</button>
            </div>
          </div>
        </div>
        <div id="fileMagicMode" class="collapse  formeditmode">
          <div class="MagicModecontainer mCustomScrollbar p-b-15 m-t-15" data-mcs-theme="dark">
            <ul>
              <li><a href="#"><img src="/public/img/edit-magic-mode.jpg" /><span>Original</span></a></li>
              <li><a href="#" data-preset="vintage"><img data-caman="vintage()"  src="/public/img/edit-magic-mode.jpg"/><span>Vintage</span></a></li>
              <li><a href="#" data-preset="lomo"><img data-caman="lomo()" src="/public/img/edit-magic-mode.jpg" /><span>Lomo</span></a></li>
              <li><a href="#" data-preset="clarity"><img data-caman="clarity()" src="/public/img/edit-magic-mode.jpg" /><span>Clarity</span></a></li>
              <li><a href="#" data-preset="sinCity"><img data-caman="sinCity()" src="/public/img/edit-magic-mode.jpg" /><span>Sin City</span></a></li>
              <li><a href="#" data-preset="sunrise"><img data-caman="sunrise()" src="/public/img/edit-magic-mode.jpg" /><span>Sunrise</span></a></li>
              <li><a href="#" data-preset="crossProcess"><img data-caman="crossProcess()" src="/public/img/edit-magic-mode.jpg" /><span>Cross Process</span></a></li>
              <li><a href="#" data-preset="orangePeel"><img data-caman="orangePeel()" src="/public/img/edit-magic-mode.jpg" /><span>Orange Peel</span></a></li>
              <li><a href="#" data-preset="love"><img data-caman="love()" src="/public/img/edit-magic-mode.jpg" /><span>Love</span></a></li>
              <li><a href="#" data-preset="grungy"><img data-caman="grungy()" src="/public/img/edit-magic-mode.jpg" /><span>Grungy</span></a></li>
              <li><a href="#" data-preset="jarques"><img data-caman="jarques()" src="/public/img/edit-magic-mode.jpg" /><span>Jarques</span></a></li>
              <li><a href="#" data-preset="pinhole"><img data-caman="pinhole()" src="/public/img/edit-magic-mode.jpg" /><span>Pinhole</span></a></li>
              <li><a href="#" data-preset="oldBoot"><img data-caman="oldBoot()" src="/public/img/edit-magic-mode.jpg" /><span>Old Boot</span></a></li>
              <li><a href="#" data-preset="glowingSun"><img data-caman="glowingSun()" src="/public/img/edit-magic-mode.jpg" /><span>Glowing Sun</span></a></li>
              <li><a href="#" data-preset="hazyDays"><img data-caman="hazyDays()" src="/public/img/edit-magic-mode.jpg" /><span>Hazy Days</span></a></li>
              <li><a href="#" data-preset="herMajesty"><img data-caman="herMajesty()" src="/public/img/edit-magic-mode.jpg" /><span>Her Majesty</span></a></li>
              <li><a href="#" data-preset="nostalgia"><img data-caman="nostalgia()" src="/public/img/edit-magic-mode.jpg" /><span>Nostalgia</span></a></li>
              <li><a href="#" data-preset="hemingway"><img data-caman="hemingway()" src="/public/img/edit-magic-mode.jpg" /><span>Hemingway</span></a></li>
              <li><a href="#" data-preset="concentrate"><img data-caman="concentrate()" src="/public/img/edit-magic-mode.jpg" /><span>Concentrate</span></a></li>
            </ul>
          </div>
        </div>
        <div id="fileTextMode" class="collapse  formeditmode text-left">
          <div class="row form-inline  p-t-10 p-b-10 ">
            <button type="button" class="btn  btn-action-popup"><i class="fa fa-plus fa-2x"></i></button>
          </div>
        </div>
        <button type="button" class="btn btn-action-popup" data-editmoode-action="#crops"><i class="fa fa-arrows fa-2x"></i></button>
        <button type="button" class="btn btn-action-popup" data-editmoode-action="#fileadjust"><i class="fa fa-adjust fa-2x"></i></button>
        <button type="button" class="btn btn-action-popup" data-editmoode-action="#fileMagicMode" ><i class="fa fa-magic fa-2x"></i></button>
        <button type="button" class="btn btn-action-popup"  data-editmoode-action="#fileTextMode"><i class="fa fa-2x">T</i></button>
      </div>
    </div>
  </div>
</div>
