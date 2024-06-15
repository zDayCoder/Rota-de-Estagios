<x-app-layout>
    <h2 class="titulo-curriculo">Criando Currículo</h2>
    <div class="container-curriculo">

        <!-- The Grid -->
        <div class="w3-row-padding">

            <!-- Left Column -->
            <div class="w3-third">
                <div class="w3-white w3-text-grey w3-card-4" style="border-radius:20px;padding:4px">

                    <div class="w3-container">

                        <!-- Formulário de Criação -->
                        <form action="{{ route('curricula.store') }}" method="POST">
                            @csrf
                            <div class=" dados-basicos ">
                                <div class="row">
                                    <div class="col-xl-3 image-user"  id="view_photo">
                                        <div class="img-thumbnail image-uploader" data-base-width="150" data-base-height="150">
                                            <label for="uploader">click</label>
                                            <img id='uploader' style="height:100px; width=100px"></div>
                                            <input type="file" name="   ">
                                        </div>
                                    </div>
                                    <div class="col-md-9 ">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="name">Nome:</label>
                                                <input type="text" id="name" name="name"
                                                    value="{{ $user->name }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row d-flex">


                                            <div class="col-8">
                                                <label for="email">Email:</label>
                                                <input type="email" id="email" name="email"
                                                    value="{{ $user->email }}" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="phone">Telefone:</label>
                                                <input type="tel" id="phone" name="phone" class="form-control"
                                                    placeholder="(XX) XXXXX-XXXX">
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="dados-pessoais p-3">
                                <h3>Resumo</h3>

                                <textarea id="summary" name="summary" rows="4" class="w3-input w3-border"></textarea>
                            </div>
                            <div class="dados-pessoais p-3">
                                <!-- Experiência -->
                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id ="addExperience">
                                    <h3>Experiência</h3>

                                    <button type="button" id="addExperience">Adicionar Experiência</button>
                                </div>
                            </div>
                            <div id="experiences"></div>
                            <!-- Habilidades -->

                            <div class="dados-pessoais p-3">

                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id ="addSkill">
                                    <h3>Habilidades</h3>
                                    <button type="button" id="addSkill" class="rounded-circle"><span
                                            class="material-symbols-outlined ">
                                            add
                                        </span>
                                    </button>
                                </div>
                                <div id="skills"></div>

                            </div>
                            <!-- Idiomas -->
                            <div class="dados-pessoais p-3">
                                <div class="d-flex justify-content-between align-items-center conteudo-card"
                                    id ="addLanguage">
                                    <h3>Idiomas</h3>

                                    <button type="button" id="addLanguage" class="rounded-circle"><span
                                            class="material-symbols-outlined ">
                                            add
                                        </span></button>
                                </div>
                                <div id="languages"></div>

                            </div>

                            <!-- Certificações -->
                            <h3>Certificações</h3>
                            <div id="certifications"></div>
                            <button type="button" id="addCertification">Adicionar Certificação</button>

                            <!-- Escolaridade/Formações -->
                            <h3>Escolaridade/Formações</h3>
                            <div id="educations"></div>
                            <button type="button" id="addEducation">Adicionar Formação</button>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <!-- Botão de Envio -->
                            <div class="submit">
                                <button type="submit">Salvar</button>
                            </div>


                        </form>

                    </div>
                </div><br>

                <!-- End Left Column -->
            </div>

            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script src="{{ asset('assets/js/curriculum.js') }}"></script>
    <script>
        jQuery.event.props.push('dataTransfer');

// IIFE to prevent globals
(function() {

  var s;
  var UserImage = {

    settings: [],
    uploaded: [],

    init: function(settings) {
      UserImage.settings = settings;
      s = settings;
      UserImage.bindUIActions();
    },

    bindUIActions: function() {

      var timer;

      for(i = 0; i < s.length; i++)
      {
        s[i].each(function(index) {
          $(this)
            .data('width', $(this).data('base-width'))
            .data('height', $(this).data('base-height'))
            .data('zoom-factor', 0);
          $(this).css({
            'width': $(this).data('base-width'),
            'height': $(this).data('base-height')
          });
          $('.image', $(this)).css({
            'width': $(this).data('base-width'),
            'height': $(this).data('base-height')
          });
        });
        
        s[i].on("dragover", function(event) {
          clearTimeout(timer);
          UserImage.showDroppableArea($(event.currentTarget));

          // Required for drop to work
          return false;
        });

        s[i].on('dragleave', function(event) {
          // Flicker protection
          timer = setTimeout(function() {
            UserImage.hideDroppableArea($(event.currentTarget));
          }, 200);
        });

        s[i].on('drop', function(event) {
          // Or else the browser will open the file
          event.preventDefault();
          $('.zoom', $(event.currentTarget)).show('fade');
          UserImage.handleDrop($(event.currentTarget), event.dataTransfer.files);
        });
      }
      $('.zoom .plus').click(function (event) {
        UserImage.zoom($(event.currentTarget).parent().parent(), 1);
      });
      $('.zoom .minus').click(function (event) {
        UserImage.zoom($(event.currentTarget).parent().parent(), -1);
      });
      $('.zoom .close').click(function (event) {
        UserImage.reset($(event.currentTarget).parent().parent());
      });
      
      $('.image-uploader .image').on('click', function(event) {
        $('#uploader',$(event.currentTarget).parent()).trigger('click');
      });
      
      $("#uploader").on('change', function(event) {
        $('.zoom', $(event.currentTarget).parent()).show('fade');
        UserImage.handleDrop($(event.currentTarget).parent(),
                             event.target.files);
      });
    },

    showDroppableArea: function(elt) {
      elt.addClass("droppable");
    },

    hideDroppableArea: function(elt) {
      elt.removeClass("droppable");
    },

    handleDrop: function(elt, files) {

      UserImage.hideDroppableArea(elt);

      // Multiple files can be dropped. Lets only deal with the "first" one.
      var file = files[0];

      if (file.type.match('image.*')) {
        UserImage.handleImage(elt, file);
      } else {
        alert("This file is not an image.");
      }

    },
    
    handleImage: function(elt, file) {
      UserImage.resizeImage(elt, file, elt.data('width'), elt.data('height'), function(data, width, height) {
          UserImage.placeImage(elt, data);
          var pos = $(elt).position();
          $('img', elt)
            .css({
              'left': elt.data('pos-x'), 
              'top': elt.data('pos-y')
            })
            .draggable({ 
              containment: 
                [pos.left - width + elt.data('base-width'), 
                 pos.top - height + elt.data('base-height'), 
                 pos.left, 
                 pos.top]
            });

          UserImage.uploaded[elt] = file;
        });
    },

    resizeImage: function(elt, file, width, height, callback) {
      var fileTracker = new FileReader;
      fileTracker.onload = function() {
        Resample(
         elt,
         this.result,
         width,
         height,
         callback
       );
      }
      fileTracker.readAsDataURL(file);

      fileTracker.onabort = function() {
        alert("The upload was aborted.");
      }
      fileTracker.onerror = function() {
        alert("An error occured while reading the file.");
      }

    },

    placeImage: function(elt, data) {
      elt.addClass('filled');
      $('img', elt).attr("src", data);
    },
    
    reset: function(elt) {
      $('img', elt)
        .attr('src', 'https://s.cdpn.io/24822/empty.png')
        .css({position:'', top:'', left:''})
        .draggable('destroy');
      $(elt)
        .data('width', $(elt).data('base-width'))
        .data('height', $(elt).data('base-height'))
        .data('zoom-factor', 0)
        .removeClass('filled');
      UserImage.uploaded[elt] = null;
      $('.zoom', elt).hide();
    },
    
    zoom: function(elt, factor) {
      var currentWidth, currentHeight, originalWidth, originalHeight, baseWidth, baseHeight, currentZoom, posx, posy;
      currentWidth = elt.data('width');
      currentHeight = elt.data('height');
      originalWidth = elt.data('original-width');
      originalHeight = elt.data('original-height');
      baseWidth = elt.data('base-width');
      baseHeight = elt.data('base-height');
      currentZoom = elt.data('zoom-factor');
      
      /* don't zoom if natural resolution */
      if( (currentWidth >= originalWidth && currentHeight >= originalHeight && factor > 0) || currentZoom + factor < 0)
        return;
      
      /* save relative pos */
      posx = (-$('img', elt).position().left + (baseWidth / 2)) / currentWidth;
      posy = (-$('img', elt).position().top + (baseHeight / 2)) / currentHeight;
      
      /* update zoom and dimensions */
      currentZoom += factor;
      $(elt).data('zoom-factor', currentZoom);
      
      var imgRatio = originalWidth / originalHeight;
      var currentWidth = imgRatio <= 1 ?  baseWidth : Math.round(originalWidth * baseHeight / originalHeight);
      var currentHeight = imgRatio > 1 ? baseHeight : Math.round(originalHeight * baseWidth / originalWidth);
      
      currentWidth = currentWidth * (1 + currentZoom * 0.1);
      currentHeight = currentHeight * (1 + currentZoom * 0.1);
      
      /* save new relative pos */
      posx = -(Math.round(posx * currentWidth) - (baseWidth / 2));
      posy = -(Math.round(posy * currentHeight) - (baseHeight / 2));
      $(elt).data('pos-x', posx);
      $(elt).data('pos-y', posy);
      $(elt).data('width', currentWidth);
      $(elt).data('height', currentHeight);
      
      var file = UserImage.uploaded[elt];
      UserImage.handleImage(elt, file);
    }
  }

  UserImage.init([$(".image-uploader")]);

})();


/*
 * Image resizing
 */
var Resample = (function (canvas) {

 // (C) WebReflection Mit Style License

 function Resample(elt, img, width, height, onresample) {
  var

   load = typeof img == "string",
   i = load || img;

  // if string, a new Image is needed
  if (load) {
   i = new Image;
   i.onload = onload;
   i.onerror = onerror;
  }

  i._onresample = onresample;
  i._width = width;
  i._height = height;
  i._elt = elt;
  load ? (i.src = img) : onload.call(img);
 }

 function onerror() {
  throw ("not found: " + this.src);
 }

 function onload() {
  var
   img = this,
   width = img._width,
   height = img._height,
   onresample = img._onresample
  ;
   
  img._elt.data('original-width', img.width);
  img._elt.data('original-height', img.height);
  // if width and height are both specified
  // the resample uses these pixels
  // if width is specified but not the height
  // the resample respects proportions
  // accordingly with orginal size
  // same is if there is a height, but no width
  var minValue = Math.min(img.height, img.width);
  var imgRatio = img.width / img.height;
  var targetRatio =  height / width;
  var targetWidth = imgRatio <= 1 ?  width : round(img.width * height / img.height);
  var targetHeight = imgRatio > 1 ? height : round(img.height * width / img.width);
  //width == null && (width = round(img.width * height / img.height));
  //height == null && (height = round(img.height * width / img.width));

  img._elt.data('width', targetWidth);
  img._elt.data('height', targetHeight);
   
  delete img._onresample;
  delete img._width;
  delete img._height;

  // when we reassign a canvas size
  // this clears automatically
  // the size should be exactly the same
  // of the final image
  // so that toDataURL ctx method
  // will return the whole canvas as png
  // without empty spaces or lines
  canvas.width = targetWidth;
  canvas.height = targetHeight;
  // drawImage has different overloads
  // in this case we need the following one ...
  context.drawImage(
   // original image
   img,
   // starting x point
   0,
   // starting y point
   0,
   // image width
   img.width,
   // image height
   img.height,
   // destination x point
   0,
   // destination y point
   0,
   // destination width
   targetWidth,
   // destination height
   targetHeight
  );
  // retrieve the canvas content as
  // base4 encoded PNG image
  // and pass the result to the callback
  onresample(canvas.toDataURL("image/png"), targetWidth, targetHeight);
 }

 var context = canvas.getContext("2d"),
  // local scope shortcut
  round = Math.round
 ;

 return Resample;

}(
 this.document.createElement("canvas"))
);
        </script>
</x-app-layout>