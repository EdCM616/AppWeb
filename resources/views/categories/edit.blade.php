@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="row page-titles">

            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Categoría</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a
                                href="{!! route('categories') !!}">Categoría</a></li>
                    <li class="breadcrumb-item active">Editar categoría</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="cat-edite-page max-width-box">
                <div class="card  pb-4">

                    <div class="card-header">
                        <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                            <li role="presentation" class="nav-item">
                                <a href="#category_information" aria-controls="description" role="tab" data-toggle="tab"
                                    class="nav-link active">Informacion de la categoría</a>
                            </li>                            
                        </ul>
                    </div>
                    <div class="card-body">

                        <div id="data-table_processing" class="dataTables_processing panel panel-default"
                             style="display: none;">Cargando</div>
                        <div class="error_top" style="display:none"></div>
                        <div class="row restaurant_payout_create" role="tabpanel">

                            <div class="restaurant_payout_create-inner tab-content">
                                <div role="tabpanel" class="tab-pane active" id="category_information">
                                    <fieldset>
                                        <legend>Editar Categoría</legend>
                                        <div class="form-group row width-100">
                                            <label class="col-3 control-label">Nombre</label>
                                            <div class="col-7">
                                                <input type="text" class="form-control cat-name">
                                                <div class="form-text text-muted">Modifique el nombre de la categoría</div>
                                            </div>
                                        </div>                                       

                                        <div class="form-group row width-100">
                                            <label class="col-3 control-label">Imagen</label>
                                            <div class="col-7">
                                                <input type="file" id="category_image">
                                                <div class="placeholder_img_thumb cat_image"></div>
                                                <div id="uploding_image"></div>
                                                <div class="form-text text-muted w-50">Cambie la imagen de la categoría</div>
                                            </div>
                                        </div>

                                       <div class="form-check row width-100">
                                        <input type="checkbox" class="item_publish" id="item_publish">
                                        <label class="col-3 control-label"
                                               for="item_publish">{{trans('lang.item_publish')}}</label>
                                       </div>
                                    </fieldset>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="review_attributes">

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="form-group col-12 text-center btm-btn">
                        <button type="button" class="btn btn-primary edit-form-btn"><i
                                    class="fa fa-save"></i> Guardar</button>
                        <a href="{!! route('categories') !!}" class="btn btn-default"><i
                                    class="fa fa-undo"></i>Cancelar</a>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    
<script>
    
    var id = "<?php echo $id;?>";
    var database = firebase.firestore();
    var ref = database.collection('categoria').where("id", "==", id);    
    var photo = "";
    var fileName="";
    var catImageFile="";
    var placeholderImage = '';
    var category = '';
    var storageRef = firebase.storage().ref('categorias');
    var storage = firebase.storage();    

    $(document).ready(function () {

        jQuery("#data-table_processing").show();
        ref.get().then(async function (snapshots) {
            category = snapshots.docs[0].data();
            $(".cat-name").val(category.nombreCat);           

            if (category.imagenCat != '' && category.imagenCat != null) {
                photo = category.imagenCat;
                catImageFile=category.imagenCat;
                $(".cat_image").append('<img onerror="this.onerror=null;this.src=\'' + placeholderImage + '\'" class="rounded" style="width:150px; height:150px" src="' + photo + '" alt="image">');
            } else {

                $(".cat_image").append('<img class="rounded" style="width:150px; height:150px" src="' + placeholderImage + '" alt="image">');
            }

            if (category.publish) {
                $("#item_publish").prop('checked', true);
            }

            jQuery("#data-table_processing").hide();
        })

        $(".edit-form-btn").click(async function () {

            var title = $(".cat-name").val();            
            var item_publish = $("#item_publish").is(":checked");                        

            if (title == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.enter_cat_title_error')}}</p>");
                window.scrollTo(0, 0);
            } else {               
                jQuery("#data-table_processing").show();
                storeImageData().then(IMG => {
                database.collection('categoria').doc(id).update({
                    'id': id,                        
                    'nombreCat': title,                        
                    'imagenCat': IMG,                        
                    'publish': item_publish,                                
                }).then(function (result) {
                    jQuery("#data-table_processing").hide();
                    window.location.href = '{{ route("categories")}}';
                });
                }).catch(err => {
                    jQuery("#data-table_processing").hide();
                    $(".error_top").show();
                    $(".error_top").html("");
                    $(".error_top").append("<p>" + err + "</p>");
                    window.scrollTo(0, 0);
                });
            }

        });

    });


    function handleFileSelect(evt) {
        var f = evt.target.files[0];
        var reader = new FileReader();
        reader.onload = (function (theFile) {
            return function (e) {

                var filePayload = e.target.result;
                var val = $('#category_image').val().toLowerCase();
                var ext = val.split('.')[1];
                var docName = val.split('fakepath')[1];
                var filename = $('#category_image').val().replace(/C:\\fakepath\\/i, '')
                var timestamp = Number(new Date());
                var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;
                var uploadTask = storageRef.child(filename).put(theFile);
                uploadTask.on('state_changed', function (snapshot) {
                    var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                }, function (error) {
                }, function () {
                    uploadTask.snapshot.ref.getDownloadURL().then(function (downloadURL) {
                        jQuery("#uploding_image").text("Upload is completed");
                        photo = downloadURL;
                        $(".cat_image").empty();
                        $(".cat_image").append('<img class="rounded" style="width:50px" src="' + photo + '" alt="image">');

                    });
                });

            };
        })(f);
        reader.readAsDataURL(f);
    }

    async function storeImageData() {
        var newPhoto = '';
        try {
            if (catImageFile != "" && photo != catImageFile) {
                var catOldImageUrlRef = await storage.refFromURL(catImageFile);
                imageBucket = catOldImageUrlRef.bucket; 
                var envBucket = "<?php echo env('FIREBASE_STORAGE_BUCKET'); ?>";
                if (imageBucket == envBucket) {
                    await catOldImageUrlRef.delete().then(() => {
                        console.log("Old file deleted!")
                    }).catch((error) => {
                        console.log("ERR File delete ===", error);
                    });
                } else {
                    console.log('Bucket not matched');  
                }
            } 
            if (photo != catImageFile) {
                photo = photo.replace(/^data:image\/[a-z]+;base64,/, "")
                var uploadTask = await storageRef.child(fileName).putString(photo, 'base64', { contentType: 'image/jpg' });
                var downloadURL = await uploadTask.ref.getDownloadURL();
                newPhoto = downloadURL;
                photo = downloadURL;

            } else {
                newPhoto = photo;
            }
        } catch (error) {
            console.log("ERR ===", error);
        }
        return newPhoto;
    }  

    //upload image with compression
    $("#category_image").resizeImg({
        
        callback: function(base64str) {
            
            var val = $('#category_image').val().toLowerCase();
            var ext = val.split('.')[1];
            var docName = val.split('fakepath')[1];
            var filename = $('#category_image').val().replace(/C:\\fakepath\\/i, '')
            var timestamp = Number(new Date());
            var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;
            photo=base64str;
            fileName=filename;
            $(".cat_image").empty();
            $(".cat_image").append('<img class="rounded" style="width:150px; height:150px" src="' + photo + '" alt="image">');
            $("#category_image").val('');

        }
    });

</script>
@endsection