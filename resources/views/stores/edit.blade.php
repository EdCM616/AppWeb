@extends('layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Actualizar PYME</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">{{trans('lang.dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{!! route('stores') !!}">{{trans('lang.store_plural')}}</a></li>
                <li class="breadcrumb-item active">{{trans('lang.store_edit')}}</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="resttab-sec">
                    <div id="data-table_processing" class="dataTables_processing panel panel-default" style="display: none;">{{trans('lang.processing')}}
                    </div>
                    <div class="error_top"></div>
                    <div class="row restaurant_payout_create">
                    <div class="restaurant_payout_create-inner">                        
                        <fieldset>                            
                            <legend>Datos Generales de la Pyme</legend>                            
                            <div class="form-group row width-50">
                                <label class="col-3 control-label">Nombre</label>
                                <div class="col-7">
                                    <input type="text" id='pyme_nombre' class="form-control restaurant_name" required>
                                    <div class="form-text text-muted">
                                        Inserte el nombre de la PYME
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row width-50">
                                <label class="col-3 control-label">Categoria</label>
                                <div class="col-7">
                                    <select id='pyme-categoria' class="form-control" required>
                                        <option value="">Seleccione la categoria</option>
                                    </select>
                                    <div class="form-text text-muted">
                                        Seleccione la categoria de la Pyme
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row width-50">
                                <label class="col-3 control-label">Sub Categoria</label>
                                <div class="col-7">
                                    <select id='pyme-Subcategoria' class="form-control" required>
                                        <option value="">Seleccione la sub categoria</option>
                                    </select>
                                    <div class="form-text text-muted">
                                        Seleccione la sub Categoria de la Pyme
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row width-50">
                                <label class="col-3 control-label">Numero Celular</label>
                                <div class="col-7">
                                    <input type="text" id='pyme_cel' class="form-control restaurant_phone" onkeypress="return chkNumbers(event,'error2')" required>
                                    <div id="error2" class="err"></div>
                                    <div class="form-text text-muted">
                                        Inserte numero celular
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row width-50">
                                <label class="col-3 control-label">Numero telefonico</label>
                                <div class="col-7">
                                    <input type="text" id='pyme_tel' class="form-control restaurant_phone" onkeypress="return chkNumbers(event,'error2')" required>
                                    <div id="error2" class="err"></div>
                                    <div class="form-text text-muted">
                                        Inserte numero telefonico
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row width-50">
                                <label class="col-3 control-label">Colonia<span
                                            class="required-field"></span></label>
                                <div class="col-7">
                                    <select id='pyme_colonia' class="form-control">
                                    <option value="">Seleccione la colonia</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row width-50">
                                <label class="col-3 control-label">Direccion de la pyme</label>
                                <div class="col-7">
                                    <input type="text" id='pyme_direccion' class="form-control restaurant_address" required>
                                    <div class="form-text text-muted">
                                        Inserte la direccion de la pyme (calle, numero, colonia, codigo postal, Cd, País)
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row width-50">
                                <label class="col-3 control-label">Direccion de la pyme - URL</label>
                                <div class="col-7">
                                    <input type="text" id='pyme_maps' class="form-control restaurant_address" required>
                                    <div class="form-text text-muted">
                                        Inserte la URL de MAPS de la direccion de la PYME
                                    </div>
                                </div>
                                <div class="form-text text-muted ml-3">
                                    Ingresa al en lace para obtener la url<a target="_blank" href="https://www.google.com/maps/@19.4546182,-99.0867996,21z?entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D">Maps</a>
                                </div>
                            </div>
                            <div class="form-group row width-50">
                                <label class="col-3 control-label">Horarios de Apertura</label>
                                <div class="col-7">
                                    <input type="text" id='pyme_apertura' class="form-control restaurant_name" required>
                                    <div class="form-text text-muted">
                                        inserte los Horarios de Apertura
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row width-50">
                                <label class="col-3 control-label">Horarios de cierre</label>
                                <div class="col-7">
                                    <input type="text" id='pyme_cierre' class="form-control restaurant_name" required>
                                    <div class="form-text text-muted">
                                        inserte los Horarios de cierre
                                    </div>
                                </div>
                            </div>
                            
                            {{-- 
                            <div class="form-group row width-50">
                                <label class="col-3 control-label">{{trans('lang.store_latitude')}}</label>
                                <div class="col-7">
                                    <input class="form-control restaurant_latitude" type="number" min="-90" max="90">
                                    <div class="form-text text-muted">
                                        {{ trans("lang.store_latitude_help") }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row width-50">
                                <label class="col-3 control-label">{{trans('lang.store_longitude')}}</label>
                                <div class="col-7">
                                    <input class="form-control restaurant_longitude" type="number" min="-180" max="180">
                                    <div class="form-text text-muted">
                                        {{ trans("lang.store_longitude_help") }}
                                    </div>
                                </div>
                                <div class="form-text text-muted ml-3">
                                    Don't Know your cordinates ? use <a target="_blank" href="https://www.latlong.net/">Latitude and Longitude Finder</a>
                                </div>
                            </div>
                            --}}                            

                            <!-- <div class="form-group row width-50">
                                <label class="col-3 control-label">{{trans('lang.store_image')}}</label>
                                <div class="col-7">
                                    <input type="file" onChange="handleFileSelect(event,'photo')">
                                    <div id="uploding_image_restaurant"></div>
                                    <div class="uploaded_image" style="display:none;"><img id="uploaded_image" src="" width="150px" height="150px;"></div>
                                    <div class="form-text text-muted">
                                        {{ trans("lang.store_image_help") }}
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group row width-100">
                                <label class="col-3 control-label ">Descripción</label>
                                <div class="col-7">
                                    <textarea rows="7" class="restaurant_description form-control" id='pyme_descripcion'></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Galeria de la Pyme</legend>
                            <div class="form-group row width-50 restaurant_image">
                                <div class="">
                                    <div id="photos"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div>
                                    <input type="file" id="galleryImage" onChange="handleFileSelect(event,'photos')">
                                    <div id="uploding_image_photos"></div>
                                </div>
                            </div>
                        </fieldset>

                        {{-- 
                        <fieldset>
                            <legend>{{trans('lang.working_hours')}}</legend>
                            <div class="form-group row">
                                <div class="form-group row width-100">
                                    <div class="col-7">
                                        <button type="button" class="btn btn-primary  add_working_hours_restaurant_btn">
                                            <i></i>{{trans('lang.add_working_hours')}}
                                        </button>
                                    </div>
                                </div>
                                <div class="working_hours_div" style="display:none">
                                    <div class="form-group row mb-0">
                                        <label class="col-1 control-label">{{trans('lang.sunday')}}</label>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary add_more_sunday" onclick="addMorehour('Sunday','sunday', '1')">
                                                {{trans('lang.add_more')}}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="restaurant_discount_options_Sunday_div restaurant_discount mb-5" style="display:none">
                                        <table class="booking-table" id="working_hour_table_Sunday">
                                            <tr>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-1 control-label">{{trans('lang.monday')}}</label>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary add_more_sunday" onclick="addMorehour('Monday','monday', '1')">
                                                {{trans('lang.add_more')}}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="restaurant_discount_options_Monday_div restaurant_discount mb-5" style="display:none">
                                        <table class="booking-table" id="working_hour_table_Monday">
                                            <tr>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-1 control-label">{{trans('lang.tuesday')}}</label>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary" onclick="addMorehour('Tuesday','tuesday', '1')">
                                                {{trans('lang.add_more')}}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="restaurant_discount_options_Tuesday_div restaurant_discount mb-5" style="display:none">
                                        <table class="booking-table" id="working_hour_table_Tuesday">
                                            <tr>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-1 control-label">{{trans('lang.wednesday')}}</label>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary" onclick="addMorehour('Wednesday','wednesday', '1')">
                                                {{trans('lang.add_more')}}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="restaurant_discount_options_Wednesday_div restaurant_discount mb-5" style="display:none">
                                        <table class="booking-table" id="working_hour_table_Wednesday">
                                            <tr>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-1 control-label">{{trans('lang.thursday')}}</label>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary" onclick="addMorehour('Thursday','thursday', '1')">
                                                {{trans('lang.add_more')}}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="restaurant_discount_options_Thursday_div restaurant_discount mb-5" style="display:none">
                                        <table class="booking-table" id="working_hour_table_Thursday">
                                            <tr>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-1 control-label">{{trans('lang.friday')}}</label>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary" onclick="addMorehour('Friday','friday', '1')">
                                                {{trans('lang.add_more')}}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="restaurant_discount_options_Friday_div restaurant_discount mb-5" style="display:none">
                                        <table class="booking-table" id="working_hour_table_Friday">
                                            <tr>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-1 control-label">{{trans('lang.Saturday')}}</label>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary" onclick="addMorehour('Saturday','Saturday','1')">
                                                {{trans('lang.add_more')}}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="restaurant_discount_options_Saturday_div restaurant_discount mb-5" style="display:none">
                                        <table class="booking-table" id="working_hour_table_Saturday">
                                            <tr>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.from')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.to')}}</label>
                                                </th>
                                                <th>
                                                    <label class="col-3 control-label">{{trans('lang.actions')}}</label>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        --}}   

                        <fieldset>
                            <legend>Redes sociales</legend>
                            <div class="form-group row">
                                <div class="form-group row width-100">
                                    <label class="col-4 control-label">FaceBook</label>
                                    <div class="col-7">
                                        <input type="text" id='pyme_facebook' class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row width-100">
                                    <label class="col-4 control-label">Instagram</label>
                                    <div class="col-7">
                                        <input type="text" id='pyme_instagram' class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row width-100">
                                    <label class="col-4 control-label">Tik Tok</label>
                                    <div class="col-7">
                                        <input type="text" id='pyme_tiktok' class="form-control">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset id="story_upload_div" style="display: block;">
                            <legend>Video</legend>
                            <div class="form-group row width-50 vendor_image">
                                <label class="col-3 control-label">Cuando el video se a terminado de cargar se ah subido a firebase, si es que acaso no se va a guardar la informacion debe dar tache en el video para que se baje de firebase</label>                                
                            </div>                            
                            <div class="form-group row vendor_image">
                                <label class="col-3 control-label">Selecciona el video</label>
                                <div class="">
                                    <div id="story_vedios" class="row"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div>
                                    <input type="file" id="video_file" onChange="handleStoryFileSelect(event)">
                                    <div id="uploding_story_video"></div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-12 text-center btm-btn">
            <button type="button" class="btn btn-primary  edit-form-btn"><i class="fa fa-save"></i> {{trans('lang.save')}}
            </button>
            <a href="{!! route('stores') !!}" class="btn btn-default"><i class="fa fa-undo"></i>{{trans('lang.cancel')}}</a>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.1.1/compressor.min.js" integrity="sha512-VaRptAfSxXFAv+vx33XixtIVT9A/9unb1Q8fp63y1ljF+Sbka+eMJWoDAArdm7jOYuLQHVx5v60TQ+t3EA8weA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var id = "<?php echo $id; ?>";
    var rest_id = "<?php echo $id; ?>";
    var database = firebase.firestore();
    //var ref_deliverycharge = database.collection('settings').doc("DeliveryCharge");
    var ref = database.collection('pyme').where("id", "==", id);
    var storageRef = firebase.storage().ref('images');
    var storage = firebase.storage();
    var restaurantOwnerId = "";
    var restaurantOwnerOnline = false;
    var photo = "";
    var menuPhotoCount = 0;
    var restaurantMenuPhotos = "";
    var new_added_restaurant_menu_filename = [];
    var new_added_restaurant_menu = [];
    var menuImageToDelete = [];
    var restaurantPhoto = '';
    var resPhotoFileName = '';
    var resPhotoOldImageFile = '';
    var restaurnt_photos = [];
    var new_added_restaurant_photos_filename = [];
    var new_added_restaurant_photos = [];
    var new_added_restaurant_story_filename = [];
    var new_added_restaurant_story = [];
    var galleryImageToDelete = [];
    var ownerphoto = '';
    var ownerFileName = '';
    var ownerOldImageFile = '';
    var photocount = 0;
    var ownerPhoto = '';
    var ownerId = '';
    var placeholderImage = '';
    var workingHours = [];
    var timeslotworkSunday = [];
    var timeslotworkMonday = [];
    var timeslotworkTuesday = [];
    var timeslotworkWednesday = [];
    var timeslotworkFriday = [];
    var timeslotworkSaturday = [];
    var timeslotworkThursday = [];
    var specialDiscount = [];
    var timeslotSunday = [];
    var timeslotMonday = [];
    var timeslotTuesday = [];
    var timeslotWednesday = [];
    var timeslotFriday = [];
    var timeslotSaturday = [];
    var timeslotThursday = [];
    var story_upload_time = [];
    var story_vedios = [];
    var story_thumbnail = '';
    var story_thumbnail_filename = '';
    var story_thumbnail_oldfile = '';
    var storevideoDuration = 10000;
    var storyCount = 0;

    let subCategorias = [];
    var filenamepath = '';
    var imagen1 = '';
    var imagen2 = '';
    var imagen3 = '';
    var imagen4 = '';
    var imagen5 = '';

    var storageRef = firebase.storage().ref('pymes');
    var storyRef = firebase.storage().ref('videos');  
    var createdAt = firebase.firestore.FieldValue.serverTimestamp();  

    //var userRef = "< ?php echo $user->name; ?>" 

    /*
    var storyRef = firebase.storage().ref('Story');
    var storyImagesRef = firebase.storage().ref('Story/images');
    var placeholder = database.collection('settings').doc('placeHolderImage');

    placeholder.get().then(async function(snapshotsimage) {
        var placeholderImageData = snapshotsimage.data();
        placeholderImage = placeholderImageData.image;
    })

    database.collection('zone').where('publish', '==', true).orderBy('name','asc').get().then(async function (snapshots) {
        snapshots.docs.forEach((listval) => {
            var data = listval.data();
            var area = [];
            data.area.forEach((location) => {
                area.push({'latitude': location.latitude,'longitude': location.longitude});
            });
            $('#zone').append($("<option></option>")
                .attr("value", data.id)
                .attr("data-area", JSON.stringify(area))
                .text(data.name));
        })
    });
    

    $("#send_mail").click(function() {
        if ($("#reset_password").is(":checked")) {
            var email = $(".user_email").val();
            firebase.auth().sendPasswordResetEmail(email)
                .then((res) => {
                    alert('{{trans("lang.store_mail_sent")}}');
                })
                .catch((error) => {
                    console.log('Error password reset: ', error);
                });
        } else {
            alert('{{trans("lang.error_reset_store_password")}}');
        }
    });

    ref_deliverycharge.get().then(async function(snapshots_charge) {
        var deliveryChargeSettings = snapshots_charge.data();
        try {
            if (deliveryChargeSettings.vendor_can_modify) {
                $("#delivery_charges_per_km").val(deliveryChargeSettings.delivery_charges_per_km);
                $("#minimum_delivery_charges").val(deliveryChargeSettings.minimum_delivery_charges);
                $("#minimum_delivery_charges_within_km").val(deliveryChargeSettings.minimum_delivery_charges_within_km);
            } else {
                $("#delivery_charges_per_km").val(deliveryChargeSettings.delivery_charges_per_km);
                $("#minimum_delivery_charges").val(deliveryChargeSettings.minimum_delivery_charges);
                $("#minimum_delivery_charges_within_km").val(deliveryChargeSettings.minimum_delivery_charges_within_km);
                $("#delivery_charges_per_km").prop('disabled', true);
                $("#minimum_delivery_charges").prop('disabled', true);
                $("#minimum_delivery_charges_within_km").prop('disabled', true);
            }
        } catch (error) {
        }
    });
    database.collection('settings').doc("story").get().then(async function(snapshots) {
        var story_data = snapshots.data();
        if (story_data.isEnabled) {
            $("#story_upload_div").show();
        }
        storevideoDuration = story_data.videoDuration;
    });
    database.collection('settings').doc("specialDiscountOffer").get().then(async function(snapshots) {
        var specialDiscountOffer = snapshots.data();
        specialDiscountOfferisEnable = specialDiscountOffer.isEnable;
    });
    var currentCurrency = '';
    var currencyAtRight = false;
    var refCurrency = database.collection('currencies').where('isActive', '==', true);
    refCurrency.get().then(async function(snapshots) {
        var currencyData = snapshots.docs[0].data();
        currentCurrency = currencyData.symbol;
        currencyAtRight = currencyData.symbolAtRight;
    });
    */


    $(document).ready(function() {
        $(document).on("click", ".remove-btn", function() {
            var id = $(this).attr('data-id');
            var photo_remove = $(this).attr('data-img');
            var status = $(this).attr('data-status');
            if (status == "old") {
                galleryImageToDelete.push(firebase.storage().refFromURL(photo_remove));
            }
            $("#photo_" + id).remove();
            index = restaurnt_photos.indexOf(photo_remove);
            if (index > -1) {
                restaurnt_photos.splice(index, 1); // 2nd parameter means remove one item only
            }
            index = new_added_restaurant_photos.indexOf(photo_remove);
            if (index > -1) {
                new_added_restaurant_photos.splice(index, 1); // 2nd parameter means remove one item only
                new_added_restaurant_photos_filename.splice(index, 1);
            }
        });
        
        jQuery("#data-table_processing").show();
        database.collection('categoria').orderBy('nombreCat').get().then(async function(snapshots) {
            snapshots.docs.forEach((listval) => {                
                var data = listval.data();                
                $('#pyme-categoria').append($("<option></option>")
                    .attr("value", data.nombreCat)                    
                    .text(data.nombreCat));
            });
        });

        database.collection('subCategoria').orderBy('nombre').get().then(async function(snapshots) {
            snapshots.docs.forEach((listval) => {
                var data = listval.data();
                subCategorias.push({
                    nombre: data.nombre,
                    categoria: data.categoria
                });
            })            
        });
        
        database.collection('colonia').orderBy('nombreCol').get().then( async function(snapshots) {
            snapshots.docs.forEach(element => {
                var data = element.data()
                $('#pyme_colonia').append($("<option></option>")
                    .attr("value", data.nombreCol)                    
                    .text(data.nombreCol));                
            });
            
        })

        ref.get().then(async function(snapshots) {
            try {
                var pyme = snapshots.docs[0].data();                

                $("#pyme_nombre").val(pyme.nombre_pyme);
                $("#pyme-categoria").val(pyme.nombreCategoria);
                $("#pyme-Subcategoria").val(pyme.nombreSubcate);
                $("#pyme_cel").val(pyme.num_cel);
                $("#pyme_tel").val(pyme.num_local);
                $("#pyme_colonia").val(pyme.nomColonia);
                $("#pyme_direccion").val(pyme.direccion);
                $("#pyme_maps").val(pyme.url_maps);
                $("#pyme_apertura").val(pyme.horario_apertura);
                $("#pyme_cierre").val(pyme.horario_cierre);
                $("#pyme_descripcion").val(pyme.descripcion);
                $("#pyme_facebook").val(pyme.url_facebook);
                $("#pyme_instagram").val(pyme.url_instagram);
                $("#pyme_tiktok").val(pyme.url_tiktok);   

                /*
                if(restaurant.phonenumber!="" && restaurant.phonenumber!=null){
                    $(".restaurant_phone").val(shortEditNumber(restaurant.phonenumber));
                }

                $(".restaurant_name").val(restaurant.title);
                if (restaurant.filters) {
                    $(".restaurant_cuisines").val(restaurant.filters.Cuisine);
                }
                
                $(".restaurant_address").val(restaurant.location);
                $(".restaurant_latitude").val(restaurant.latitude);
                $(".restaurant_longitude").val(restaurant.longitude);
                $(".restaurant_description").val(restaurant.description);
                

                if (pyme.photo) {
                    if (restaurant.photo != '' && restaurant.photo != null) {
                        restaurantPhoto = restaurant.photo;
                        resPhotoOldImageFile = restaurant.photo;
                        $("#uploaded_image").attr('src', restaurant.photo);
                        $(".uploaded_image").show();
                    } else {
                        $("#uploaded_image").attr('src', placeholderImage);
                        $(".uploaded_image").show();
                    }
                } else {
                    $("#uploaded_image").attr('src', placeholderImage);
                    $(".uploaded_image").show();
                }

                if (restaurant.photo != '' && restaurant.photo != null) {
                    restaurantPhoto = restaurant.photo;
                    resPhotoOldImageFile = restaurant.photo;
                }
                
                if (restaurant.hasOwnProperty('restaurantMenuPhotos')) {
                    restaurantMenuPhotos = restaurant.restaurantMenuPhotos;
                }

                for (var key in restaurant.filters) {
                    if (key == "Free Wi-Fi" && restaurant.filters[key] == "Yes") {
                        $("#Free_Wi_Fi").prop("checked", true);
                    }
                    if (key == "Good for Breakfast" && restaurant.filters[key] == "Yes") {
                        $("#Good_for_Breakfast").prop("checked", true);
                    }
                    if (key == "Good for Dinner" && restaurant.filters[key] == "Yes") {
                        $("#Good_for_Dinner").prop("checked", true);
                    }
                    if (key == "Good for Lunch" && restaurant.filters[key] == "Yes") {
                        $("#Good_for_Lunch").prop("checked", true);
                    }
                    if (key == "Live Music" && restaurant.filters[key] == "Yes") {
                        $("#Live_Music").prop("checked", true);
                    }
                    if (key == "Outdoor Seating" && restaurant.filters[key] == "Yes") {
                        $("#Outdoor_Seating").prop("checked", true);
                    }
                    if (key == "Takes Reservations" && restaurant.filters[key] == "Yes") {
                        $("#Takes_Reservations").prop("checked", true);
                    }
                    if (key == "Vegetarian Friendly" && restaurant.filters[key] == "Yes") {
                        $("#Vegetarian_Friendly").prop("checked", true);
                    }
                }

                if(restaurant.hasOwnProperty('specialDiscountEnable')){
                    if (restaurant.specialDiscountEnable){
                        $("#specialDiscountEnable").prop("checked", true);
                    }
                }

                if (restaurant.hasOwnProperty('specialDiscount')) {
                    for (i = 0; i < restaurant.specialDiscount.length; i++) {
                        var day = restaurant.specialDiscount[i]['day'];
                        if (restaurant.specialDiscount[i]['timeslot'].length != 0) {
                            for (j = 0; j < restaurant.specialDiscount[i]['timeslot'].length; j++) {
                                $(".restaurant_discount_options_" + day + "_div").show();
                                var timeslot = restaurant.specialDiscount[i]['timeslot'][j];
                                var discount = restaurant.specialDiscount[i]['timeslot'][j]['discount'];
                                var TimeslotVar = {
                                    'discount': timeslot[`discount`],
                                    'from': timeslot[`from`],
                                    'to': timeslot[`to`],
                                    'type': timeslot[`type`],
                                    'discount_type': timeslot[`discount_type`]
                                };
                                if (day == 'Sunday') {
                                    timeslotSunday.push(TimeslotVar);
                                } else if (day == 'Monday') {
                                    timeslotMonday.push(TimeslotVar);
                                } else if (day == 'Tuesday') {
                                    timeslotTuesday.push(TimeslotVar);
                                } else if (day == 'Wednesday') {
                                    timeslotWednesday.push(TimeslotVar);
                                } else if (day == 'Thursday') {
                                    timeslotThursday.push(TimeslotVar);
                                } else if (day == 'Friday') {
                                    timeslotFriday.push(TimeslotVar);
                                } else if (day == 'Saturday') {
                                    timeslotSaturday.push(TimeslotVar);
                                }
                                $('#special_offer_table_' + day + ' tr:last').after('<tr>' +
                                    '<td class="" style="width:10%;"><input type="time" class="form-control ' + i + '_' + j + '_row" value="' + timeslot[`from`] + '" id="openTime' + day + j + i + '"></td>' +
                                    '<td class="" style="width:10%;"><input type="time" class="form-control ' + i + '_' + j + '_row" value="' + timeslot[`to`] + '" id="closeTime' + day + j + i + '"></td>' +
                                    '<td class="" style="width:30%;">' +
                                    '<input type="number" class="form-control ' + i + '_' + j + '_row" value="' + timeslot[`discount`] + '" style="width:60%;" id="discount' + day + j + i + '">' +
                                    '<select id="discount_type' + day + j + i + '" class="form-control ' + i + '_' + j + '_row"  style="width:40%;"><option value="percentage"/>%</option><option value="amount"/>' + currentCurrency + '</option></select></td>' +
                                    '<td style="width:30%;"><select id="type' + day + j + i + '" class="form-control ' + i + '_' + j + '_row"><option value="delivery"/>Delivery Discount</option></select>' +
                                    '</td>' +
                                    '<td class="action-btn" style="width:20%;">' +
                                    '<button type="button" class="btn btn-primary ' + i + '_' + j + '_row"  onclick="updateMoreFunctionButton(`' + day + '`,`' + j + '`,`' + i + '`)" ><i class="fa fa-edit"></i></button>' +
                                    '&nbsp;&nbsp;<button type="button" class="btn btn-primary ' + i + '_' + j + '_row" onclick="deleteOffer(`' + day + '`,`' + j + '`,`' + i + '`)" ><i class="fa fa-trash"></i></button>' +
                                    '</td></tr>');
                                if (timeslot[`type`] == 'amount') {
                                    $('#discount_type' + day + j + i).val(timeslot[`type`]);
                                }
                            }
                            $('.special_offer_div').css('display', 'block');
                        }
                    }
                }

                if (restaurant.hasOwnProperty('workingHours')) {
                    for (i = 0; i < restaurant.workingHours.length; i++) {
                        var day = restaurant.workingHours[i]['day'];
                        if (restaurant.workingHours[i]['timeslot'].length != 0) {
                            for (j = 0; j < restaurant.workingHours[i]['timeslot'].length; j++) {
                                $(".restaurant_working_hour_" + day + "_div").show();
                                var timeslot = restaurant.workingHours[i]['timeslot'][j];
                                var discount = restaurant.workingHours[i]['timeslot'][j]['discount'];
                                var TimeslotHourVar = {
                                    'from': timeslot[`from`],
                                    'to': timeslot[`to`]
                                };
                                if (day == 'Sunday') {
                                    timeslotworkSunday.push(TimeslotHourVar);
                                } else if (day == 'Monday') {
                                    timeslotworkMonday.push(TimeslotHourVar);
                                } else if (day == 'Tuesday') {
                                    timeslotworkTuesday.push(TimeslotHourVar);
                                } else if (day == 'Wednesday') {
                                    timeslotworkWednesday.push(TimeslotHourVar);
                                } else if (day == 'Thursday') {
                                    timeslotworkThursday.push(TimeslotHourVar);
                                } else if (day == 'Friday') {
                                    timeslotworkFriday.push(TimeslotHourVar);
                                } else if (day == 'Saturday') {
                                    timeslotworkSaturday.push(TimeslotHourVar);
                                }
                                $('#working_hour_table_' + day + ' tr:last').after('<tr>' +
                                    '<td class="" style="width:50%;"><input type="time" class="form-control ' + i + '_' + j + '_row" value="' + timeslot[`from`] + '" id="from' + day + j + i + '" ></td>' +
                                    '<td class="" style="width:50%;"><input type="time" class="form-control ' + i + '_' + j + '_row" value="' + timeslot[`to`] + '" id="to' + day + j + i + '" ></td>' +
                                    '<td class="action-btn" style="width:20%;">' +
                                    '<button type="button" class="btn btn-primary ' + i + '_' + j + '_row workingHours_' + i + '_' + j + '"  onclick="updatehoursFunctionButton(`' + day + '`,`' + j + '`,`' + i + '`)" ><i class="fa fa-edit"></i></button>' +
                                    '&nbsp;&nbsp;<button type="button" class="btn btn-primary ' + i + '_' + j + '_row" onclick="deleteWorkingHour(`' + day + '`,`' + j + '`,`' + i + '`)" ><i class="fa fa-trash"></i></button>' +
                                    '</td></tr>');
                            }
                            $('.working_hours_div').css('display', 'block');
                        }
                    }
                }
                */

                //restaurnt_photos = restaurant.photos;
                restaurnt_photos.push(pyme.imagen1);
                restaurnt_photos.push(pyme.imagen2);
                restaurnt_photos.push(pyme.imagen3);
                restaurnt_photos.push(pyme.imagen4);
                restaurnt_photos.push(pyme.imagen5);
                var photos = '';
                var menuCardPhotos = ''

                restaurnt_photos.forEach((photo) => {                                        
                    photocount++;
                    photos = photos + '<span class="image-item" id="photo_' + photocount + '"><span class="remove-btn" data-id="' + photocount + '" data-img="' + photo + '" data-status="old"><i class="fa fa-remove"></i></span><img width="100px" id="" height="auto" src="' + photo + '"></span>';
                })

                if (photos) {
                    $("#photos").html(photos);
                } else {
                    $("#photos").html('<p>photos not available.</p>');
                }

                //var nextCount = $("#story_vedios").children().length;
                var nextCount = 456;

                html = '<div class="col-md-3" id="story_div_' + nextCount + '">\n' +
                    '<div class="video-inner"><video width="320px" height="240px"\n' +
                    '                                   controls="controls">\n' +
                    '                            <source src="' + pyme.video + '"\n' +
                    '            type="video/mp4"></video><span class="remove-story-video" data-id="' + nextCount + '" data-img="' + pyme.video + '"><i class="fa fa-remove"></i></span></div></div>';
                
                jQuery("#story_vedios").append(html);
                
                /*
                restaurantOwnerOnline = restaurant.isActive;
                restaurantOwnerId = restaurant.author;
                
                if(restaurant.author != null && restaurant.author != ''){
                    var userRes = await database.collection('users').doc(restaurant.author).get();
                    if(userRes.exists){
                        var user = userRes.data();
                        $(".user_first_name").val(user.firstName);
                        $(".user_last_name").val(user.lastName);
                        if(user.email != "" && user.email != null){
                            $(".user_email").val(shortEmail(user.email));
                        }
                        if(user.phoneNumber != "" && user.phoneNumber != null){
                            $(".user_phone").val(shortEditNumber(user.phoneNumber));
                        }
                        if (user.profilePictureURL != '' && user.profilePictureURL != null) {
                            ownerphoto = user.profilePictureURL
                            ownerOldImageFile = user.profilePictureURL;
                            $("#uploaded_image_owner").attr('src', user.profilePictureURL);
                            $(".uploaded_image_owner").show();
                        } else {
                            $("#uploaded_image_owner").attr('src', placeholderImage);
                            $(".uploaded_image_owner").show();
                        }
                        if (user.active) {
                            restaurant_active = true;
                            $("#is_active").prop("checked", true);
                        }
                        if (user.userBankDetails) {
                            if (user.userBankDetails.bankName != undefined) {
                                $("#bankName").val(user.userBankDetails.bankName);
                            }
                            if (user.userBankDetails.branchName != undefined) {
                                $("#branchName").val(user.userBankDetails.branchName);
                            }
                            if (user.userBankDetails.holderName != undefined) {
                                $("#holderName").val(user.userBankDetails.holderName);
                            }
                            if (user.userBankDetails.accountNumber != undefined) {
                                $("#accountNumber").val(user.userBankDetails.accountNumber);
                            }
                            if (user.userBankDetails.otherDetails != undefined) {
                                $("#otherDetails").val(user.userBankDetails.otherDetails);
                            }
                        }
                    }
                }
                
               
                await database.collection('vendor_categories').where('publish', '==', true).get().then(async function(snapshots) {
                    snapshots.docs.forEach((listval) => {
                        var data = listval.data();
                        if (data.id == restaurant.categoryID) {
                            $('#restaurant_cuisines').append($("<option selected></option>")
                                .attr("value", data.id)
                                .text(data.title));
                        } else {
                            $('#restaurant_cuisines').append($("<option></option>")
                                .attr("value", data.id)
                                .text(data.title));
                        }
                    })
                });

                if (restaurant.hasOwnProperty('phonenumber')) {
                    $(".restaurant_phone").val(shortEditNumber(restaurant.phonenumber));
                }
                
                if (restaurant.DeliveryCharge) {
                    $("#delivery_charges_per_km").val(restaurant.DeliveryCharge.delivery_charges_per_km);
                    $("#minimum_delivery_charges").val(restaurant.DeliveryCharge.minimum_delivery_charges);
                    $("#minimum_delivery_charges_within_km").val(restaurant.DeliveryCharge.minimum_delivery_charges_within_km);
                }

                await getRestaurantStory(restaurant.id);
                if (story_vedios.length > 0) {
                    var html = '';
                    for (var i = 0; i < story_vedios.length; i++) {
                        html += '<div class="col-md-3" id="story_div_' + i + '">\n' +
                            '<div class="video-inner"><video width="320px" height="240px"\n' +
                            '                                   controls="controls">\n' +
                            '                            <source src="' + story_vedios[i] + '"\n' +
                            '            type="video/mp4"></video><span class="remove-story-video" data-id="' + i + '" data-img="' + story_vedios[i] + '"><i class="fa fa-remove"></i></span></div></div>';
                    }
                    jQuery("#story_vedios").append(html);
                }

                if (story_thumbnail) {
                    html = '<div class="col-md-3"><div class="thumbnail-inner"><span class="remove-story-thumbnail" data-img="' + story_thumbnail + '"><i class="fa fa-remove"></i></span><img id="story_thumbnail_image" src="' + story_thumbnail + '" width="150px" height="150px;"></div></div>';
                    jQuery("#story_thumbnail").html(html);
                }
                */

            } catch (error) {
            }
            /*
            if (restaurant.hasOwnProperty('zoneId') && restaurant.zoneId != '') {
                $("#zone").val(restaurant.zoneId);
            }
                */

            jQuery("#data-table_processing").hide();
        })

        $('#pyme-categoria').on('change', function() {
            var selectedValue = $(this).val(); 

            $('#pyme-Subcategoria').empty();        
            if (selectedValue) {
                subCategorias.forEach((data) => {                 
                    if (data.categoria == selectedValue) {                        
                        $('#pyme-Subcategoria').append($("<option></option>")
                        .attr("value", data.nombre)                    
                        .text(data.nombre));                                                            
                    }
                }); 
            } else {            
                $('#pyme-Subcategoria').append(
                    $("<option></option>")
                        .text("Selecciona una categoría")
                );
            }
        });

        async function getRestaurantStory(restaurantId) {
            await database.collection('story').where('vendorID', '==', restaurantId).get().then(async function(snapshots) {
                if (snapshots.docs.length > 0) {
                    var story_data = snapshots.docs[0].data();
                    story_vedios = story_data.videoUrl;
                    story_thumbnail = story_data.videoThumbnail;
                    story_thumbnail_oldfile = story_data.videoThumbnail;
                }
            });
        }

        function checkLocationInZone(area,address_lng,address_lat){
            var vertices_x = [];
            var vertices_y = [];
            for (j = 0; j < area.length; j++) {
                var geopoint = area[j];
                vertices_x.push(geopoint.longitude);
                vertices_y.push(geopoint.latitude);
            }
            var points_polygon = (vertices_x.length)-1;
            if(is_in_polygon(points_polygon, vertices_x, vertices_y, address_lng, address_lat)){
                return true;
            }else{
                return false;
            }
        }

        function is_in_polygon($points_polygon, $vertices_x, $vertices_y, $longitude_x, $latitude_y){
            $i = $j = $c = $point = 0;
            for ($i = 0, $j = $points_polygon ; $i < $points_polygon; $j = $i++) {
                $point = $i;
                if( $point == $points_polygon )
                    $point = 0;
                if ( (($vertices_y[$point]  >  $latitude_y != ($vertices_y[$j] > $latitude_y)) && ($longitude_x < ($vertices_x[$j] - $vertices_x[$point]) * ($latitude_y - $vertices_y[$point]) / ($vertices_y[$j] - $vertices_y[$point]) + $vertices_x[$point]) ) )
                    $c = !$c;
            }
            return $c;
        }

        /*
        $(".edit-form-btn").click(async function() {
            var restaurantname = $(".restaurant_name").val();
            var cuisines = $("#restaurant_cuisines option:selected").val();
            var address = $(".restaurant_address").val();
            var latitude = parseFloat($(".restaurant_latitude").val());
            var longitude = parseFloat($(".restaurant_longitude").val());
            var description = $(".restaurant_description").val();
            var phonenumber = $(".restaurant_phone").val();
            var categoryTitle = $("#restaurant_cuisines option:selected").text();
            var userFirstName = $(".user_first_name").val();
            var userLastName = $(".user_last_name").val();
            var email = $(".user_email").val();
            var userPhone = $(".user_phone").val();
            var reststatus = true;
            var specialDiscountEnable = false;
            var zoneId = $('#zone option:selected').val();
            var zoneArea = $('#zone option:selected').data('area');
            var isInZone = false;

            if(zoneId && zoneArea){
                isInZone = checkLocationInZone(zoneArea,longitude,latitude);
            }
            if ($("#specialDiscountEnable").is(':checked')) {
                specialDiscountEnable = true;
            }
            var specialDiscount = [];
            var sunday = {
                'day': 'Sunday',
                'timeslot': timeslotSunday
            };
            var monday = {
                'day': 'Monday',
                'timeslot': timeslotMonday
            };
            var tuesday = {
                'day': 'Tuesday',
                'timeslot': timeslotTuesday
            };
            var wednesday = {
                'day': 'Wednesday',
                'timeslot': timeslotWednesday
            };
            var thursday = {
                'day': 'Thursday',
                'timeslot': timeslotThursday
            };
            var friday = {
                'day': 'Friday',
                'timeslot': timeslotFriday
            };
            var Saturday = {
                'day': 'Saturday',
                'timeslot': timeslotSaturday
            };
            specialDiscount.push(monday);
            specialDiscount.push(tuesday);
            specialDiscount.push(wednesday);
            specialDiscount.push(thursday);
            specialDiscount.push(friday);
            specialDiscount.push(Saturday);
            specialDiscount.push(sunday);
            var workingHours = [];
            var sunday = {
                'day': 'Sunday',
                'timeslot': timeslotworkSunday
            };
            var monday = {
                'day': 'Monday',
                'timeslot': timeslotworkMonday
            };
            var tuesday = {
                'day': 'Tuesday',
                'timeslot': timeslotworkTuesday
            };
            var wednesday = {
                'day': 'Wednesday',
                'timeslot': timeslotworkWednesday
            };
            var thursday = {
                'day': 'Thursday',
                'timeslot': timeslotworkThursday
            };
            var friday = {
                'day': 'Friday',
                'timeslot': timeslotworkFriday
            };
            var Saturday = {
                'day': 'Saturday',
                'timeslot': timeslotworkSaturday
            };
            workingHours.push(monday);
            workingHours.push(tuesday);
            workingHours.push(wednesday);
            workingHours.push(thursday);
            workingHours.push(friday);
            workingHours.push(Saturday);
            workingHours.push(sunday);
            var restaurant_active = false;
            if ($("#is_active").is(':checked')) {
                restaurant_active = true;
            }
            var Free_Wi_Fi = "No";
            if ($("#Free_Wi_Fi").is(':checked')) {
                Free_Wi_Fi = "Yes";
            }
            var Good_for_Breakfast = "No";
            if ($("#Good_for_Breakfast").is(':checked')) {
                Good_for_Breakfast = "Yes";
            }
            var Good_for_Dinner = "No";
            if ($("#Good_for_Dinner").is(':checked')) {
                Good_for_Dinner = "Yes";
            }
            var Good_for_Lunch = "No";
            if ($("#Good_for_Lunch").is(':checked')) {
                Good_for_Lunch = "Yes";
            }
            var Live_Music = "No";
            if ($("#Live_Music").is(':checked')) {
                Live_Music = "Yes";
            }
            var Outdoor_Seating = "No";
            if ($("#Outdoor_Seating").is(':checked')) {
                Outdoor_Seating = "Yes";
            }
            var Takes_Reservations = "No";
            if ($("#Takes_Reservations").is(':checked')) {
                Takes_Reservations = "Yes";
            }
            var Vegetarian_Friendly = "No";
            if ($("#Vegetarian_Friendly").is(':checked')) {
                Vegetarian_Friendly = "Yes";
            }
            var filters_new = {
                "Free Wi-Fi": Free_Wi_Fi,
                "Good for Breakfast": Good_for_Breakfast,
                "Good for Dinner": Good_for_Dinner,
                "Good for Lunch": Good_for_Lunch,
                "Live Music": Live_Music,
                "Outdoor Seating": Outdoor_Seating,
                "Takes Reservations": Takes_Reservations,
                "Vegetarian Friendly": Vegetarian_Friendly
            };
            if (userFirstName == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.enter_owners_name_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (userLastName == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.enter_owners_last_name_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (userPhone == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.enter_owners_phone')}}</p>");
                window.scrollTo(0, 0);
            } else if (restaurantname == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.store_name_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (cuisines == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.store_cuisine_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (phonenumber == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.store_phone_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (address == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.store_address_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (zoneId == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.select_zone_help')}}</p>");
                window.scrollTo(0, 0);
            } else if (isNaN(latitude)) {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.store_lattitude_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (latitude < -90 || latitude > 90) {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.store_lattitude_limit_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (isNaN(longitude)) {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.store_longitude_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (longitude < -180 || longitude > 180) {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.store_longitude_limit_error')}}</p>");
                window.scrollTo(0, 0);
            } else if (isInZone == false) {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.invalid_location_zone')}}</p>");
                window.scrollTo(0, 0);
            } else if (description == '') {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>{{trans('lang.store_description_error')}}</p>");
                window.scrollTo(0, 0);
            } else {
                jQuery("#data-table_processing").show();
                var bankName = $("#bankName").val();
                var branchName = $("#branchName").val();
                var holderName = $("#holderName").val();
                var accountNumber = $("#accountNumber").val();
                var otherDetails = $("#otherDetails").val();
                var userBankDetails = {
                    'bankName': bankName,
                    'branchName': branchName,
                    'holderName': holderName,
                    'accountNumber': accountNumber,
                    'accountNumber': accountNumber,
                    'otherDetails': otherDetails,
                };
                var delivery_charges_per_km = parseInt($("#delivery_charges_per_km").val());
                var minimum_delivery_charges = parseInt($("#minimum_delivery_charges").val());
                var minimum_delivery_charges_within_km = parseInt($("#minimum_delivery_charges_within_km").val());
                var DeliveryCharge = {
                    'delivery_charges_per_km': delivery_charges_per_km,
                    'minimum_delivery_charges': minimum_delivery_charges,
                    'minimum_delivery_charges_within_km': minimum_delivery_charges_within_km
                };
                coordinates = new firebase.firestore.GeoPoint(latitude, longitude);

                await storeStoryData().then(async (resStoryVid) => {
                    await storeImageData().then(async (IMG) => {
                        await storeGalleryImageData().then(async (GalleryIMG) => {
                            database.collection('users').doc(restaurantOwnerId).update({
                                'firstName': userFirstName,
                                'lastName': userLastName,
                                'email': email,
                                'phoneNumber': userPhone,
                                'profilePictureURL': IMG.ownerImage,
                                'active': restaurant_active,
                                'userBankDetails': userBankDetails
                                }).then(function(result) {
                                geoFirestore.collection('vendors').doc(id).update({
                                    'title': restaurantname,
                                    'description': description,
                                    'latitude': latitude,
                                    'longitude': longitude,
                                    'location': address,
                                    'authorProfilePic': IMG.ownerImage,
                                    'photo': (Array.isArray(GalleryIMG) && GalleryIMG.length > 0) ? GalleryIMG[0] : null,
                                    'photos': GalleryIMG,
                                    'categoryID': cuisines,
                                    'phonenumber': phonenumber,
                                    'categoryTitle': categoryTitle,
                                    'coordinates': coordinates,
                                    'filters': filters_new,
                                    'reststatus': reststatus,
                                    'enabledDiveInFuture': false,
                                    
                                    'restaurantMenuPhotos': [],
                                    'restaurantCost': 0,
                                    
                                    'openDineTime': '',
                                    
                                    'closeDineTime': '',
                                    
                                    'DeliveryCharge': DeliveryCharge,
                                    'specialDiscount': specialDiscount,
                                    'specialDiscountEnable':specialDiscountEnable,
                                    'workingHours': workingHours,
                                    'zoneId': zoneId
                                }).then(function(result) {
                                    if (resStoryVid.length > 0 || story_thumbnail != '') {
                                        if (resStoryVid.length > 0 && story_thumbnail == '') {
                                            jQuery("#data-table_processing").hide();
                                            $(".error_top").show();
                                            $(".error_top").html("");
                                            $(".error_top").append("<p>{{trans('lang.story_error')}}</p>");
                                            window.scrollTo(0, 0);
                                        } else if (story_thumbnail && resStoryVid.length == 0) {
                                            jQuery("#data-table_processing").hide();
                                            $(".error_top").show();
                                            $(".error_top").html("");
                                            $(".error_top").append("<p>{{trans('lang.story_error')}}</p>");
                                            window.scrollTo(0, 0);
                                        } else {
                                            database.collection('story').doc(id).set({
                                                'createdAt': new Date(),
                                                'vendorID': id,
                                                'videoThumbnail': IMG.storyThumbnailImage,
                                                'videoUrl': resStoryVid,
                                            }).then(function(result) {
                                                jQuery("#data-table_processing").hide();
                                                window.location.href = '{{ route("stores")}}';
                                            });
                                        }
                                    } else {
                                        jQuery("#data-table_processing").hide();
                                        window.location.href = '{{ route("stores")}}';
                                    }
                                });
                            })
                        }).catch(err => {
                            jQuery("#data-table_processing").hide();
                            $(".error_top").show();
                            $(".error_top").html("");
                            $(".error_top").append("<p>" + err + "</p>");
                            window.scrollTo(0, 0);
                        });
                    }).catch(err => {
                        jQuery("#data-table_processing").hide();
                        $(".error_top").show();
                        $(".error_top").html("");
                        $(".error_top").append("<p>" + err + "</p>");
                        window.scrollTo(0, 0);
                    });
                }).catch(err => {
                    jQuery("#data-table_processing").hide();
                    $(".error_top").show();
                    $(".error_top").html("");
                    $(".error_top").append("<p>" + err + "</p>");
                    window.scrollTo(0, 0);
                });
            }
        })
        */

        $(".edit-form-btn").click(async function() {

            var nombre_pyme = $("#pyme_nombre").val();
            var nombreCategoria = $("#pyme-categoria option:selected").val();
            var nombreSubcate = $("#pyme-Subcategoria option:selected").val();
            var num_cel = $("#pyme_cel").val();
            var num_local = $("#pyme_tel").val();
            var nomColonia = $("#pyme_colonia option:selected").val();
            var direccion = $("#pyme_direccion").val();
            var url_maps = $("#pyme_maps").val();
            var horario_apertura = $("#pyme_apertura").val();
            var horario_cierre = $("#pyme_cierre").val();
            var descripcion = $("#pyme_descripcion").val();
            var url_facebook = $("#pyme_facebook").val();
            var url_instagram = $("#pyme_instagram").val();
            var url_tiktok = $("#pyme_tiktok").val();               
            var createdAT = createdAt;                   
                
                await storeStoryData().then(async (resStoryVid) => {                    
                        await storeGalleryImageData().then(async (GalleryIMG) => {
                            for (let index = 0; index < GalleryIMG.length; index++) {
                                imagen${index + 1} = GalleryIMG[index];
                            }
                            
                            database.collection('pyme').doc(id).update({
                                'id': id,
                                'nombre_pyme': nombre_pyme,
                                'nombreCategoria': nombreCategoria,
                                'nombreSubcate': nombreSubcate,
                                'num_cel': num_cel,
                                'num_local': num_local,
                                'nomColonia': nomColonia,
                                'direccion': direccion,
                                'url_maps': url_maps,
                                'horario_apertura': horario_apertura,
                                'horario_cierre': horario_cierre,
                                'descripcion': descripcion,
                                'url_facebook':url_facebook,
                                'url_instagram': url_instagram,
                                'url_tiktok': url_tiktok, 
                                'video': resStoryVid,                                                                                
                                'createdAT': createdAT
                                }).then(function(result) {
                                    jQuery("#data-table_processing").hide();
                                    window.location.href = '{{ route("stores")}}';
                                });                            
                        }).catch(err => {
                            jQuery("#data-table_processing").hide();
                            $(".error_top").show();
                            $(".error_top").html("");
                            $(".error_top").append("<p>" + err + "</p>");
                            window.scrollTo(0, 0);
                        });                    
                }).catch(err => {
                    jQuery("#data-table_processing").hide();
                    $(".error_top").show();
                    $(".error_top").html("");
                    $(".error_top").append("<p>" + err + "</p>");
                    window.scrollTo(0, 0);
                });
        })
    })

    function handleStoryFileSelect(evt) {
        var rests = ["0CwIcsoYhSxYba9DlwuE", "NjYpnm5IhQi0GeeVKXiX", "NjYpnm5IhQi0GeeVKXiX", "XrDAfl3rOWZS11lEIPkI", "a4rYm0HQHskPDGXAlWEt", "wkSUMpzIxl6KmDIKuDVQ"];
        if (jQuery.inArray(rest_id, rests) != -1) {
            alert(doNotUpdateAlert);
            return false;
        }
        var f = evt.target.files[0];
        var reader = new FileReader();
        var story_video_duration = $("#story_video_duration").val();
        var isVideo = document.getElementById('video_file');
        var videoValue = isVideo.value;
        var allowedExtensions = /(\.mp4)$/i;;
        if (!allowedExtensions.exec(videoValue)) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Error: Invalid video type</p>");
            window.scrollTo(0, 0);
            isVideo.value = '';
            return false;
        }
        var video = document.createElement('video');
        video.preload = 'metadata';
        video.onloadedmetadata = function() {
            window.URL.revokeObjectURL(video.src);
            if (video.duration > storevideoDuration) {
                $(".error_top").show();
                $(".error_top").html("");
                $(".error_top").append("<p>Error: Story video duration maximum allow to " + storevideoDuration + " seconds</p>");
                window.scrollTo(0, 0);
                evt.target.value = '';
                return false;
            }
            reader.onload = (function(theFile) {
                return function(e) {
                    var filePayload = e.target.result;
                    var val = f.name;
                    var ext = val.split('.')[1];
                    var docName = val.split('fakepath')[1];
                    var filename = (f.name).replace(/C:\\fakepath\\/i, '')
                    var timestamp = Number(new Date());
                    var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;
                    var nextCount = $("#story_vedios").children().length;
                    html = '<div class="col-md-3" id="story_div_' + nextCount + '">\n' +
                        '<div class="video-inner"><video width="320px" height="240px"\n' +
                        '                                   controls="controls">\n' +
                        '                            <source src="' + filePayload + '"\n' +
                        '            type="video/mp4"></video><span class="remove-story-video" data-id="' + nextCount + '" data-img="' + filename + '"><i class="fa fa-remove"></i></span></div></div>';
                    jQuery("#story_vedios").append(html);
                    $("#video_file").val('');
                    new_added_restaurant_story.push(theFile);
                    new_added_restaurant_story_filename.push(filename);
                };
            })(f);
            reader.readAsDataURL(f);
        }
        video.src = URL.createObjectURL(f);
    }

    $(document).on("click", ".remove-story-video",async function() {
        var rests = ["0CwIcsoYhSxYba9DlwuE", "NjYpnm5IhQi0GeeVKXiX", "NjYpnm5IhQi0GeeVKXiX", "XrDAfl3rOWZS11lEIPkI", "a4rYm0HQHskPDGXAlWEt", "wkSUMpzIxl6KmDIKuDVQ"];
        if (jQuery.inArray(rest_id, rests) != -1) {
            alert(doNotUpdateAlert);
            return false;
        }
        var id = $(this).attr('data-id');
        var photo_remove = $(this).attr('data-img');
        var story_remove_videos = (photo_remove && /^data:video\/(mp4|webm|ogg);base64,/.test(photo_remove)) ? null : (photo_remove && /^https?:\/\/[^ "]+$/.test(photo_remove)) ? firebase.storage().refFromURL(photo_remove) : console.log("Invalid video format.");
        if(story_remove_videos) {
            story_remove_videos.getMetadata()
                .then((metadata) => {
                    var storyBucket = story_remove_videos.bucket;
                    var envBucket = "<?php echo env('FIREBASE_STORAGE_BUCKET'); ?>";
                    if (storyBucket === envBucket) {
                        story_remove_videos.delete().then(() => {
                            console.log("Old file deleted!");
                        }).catch((error) => {
                            console.log("Error deleting file:", error);
                        });
                    } else {
                        console.log('Bucket not matched');
                    }
                })
                .catch((error) => {
                    if (error.code === 'storage/object-not-found') {
                        console.log("File does not exist");
                    } else {
                        console.log("Error retrieving file metadata:", error);
                    }
                });
        }
        $("#story_div_" + id).remove();
        index = new_added_restaurant_story_filename.indexOf(photo_remove);
        if (index > -1) {
            new_added_restaurant_story.splice(index, 1);
            new_added_restaurant_story_filename.splice(index, 1);
        }
        index = story_vedios.indexOf(photo_remove);
        $("#video_file").val('');
        if (index > -1) {
            story_vedios.splice(index, 1);
        }
        if (new_added_restaurant_story.length === 0 && story_vedios.length === 0) {
            alert("{{trans('lang.story_video_alert')}}");
        }
        deleteStoryfromCollection();
    });

    $(document).on("click", ".remove-story-thumbnail", function() {
        var rests = ["0CwIcsoYhSxYba9DlwuE", "NjYpnm5IhQi0GeeVKXiX", "NjYpnm5IhQi0GeeVKXiX", "XrDAfl3rOWZS11lEIPkI", "a4rYm0HQHskPDGXAlWEt", "wkSUMpzIxl6KmDIKuDVQ"];
        if (jQuery.inArray(rest_id, rests) != -1) {
            alert(doNotUpdateAlert);
            return false;
        }
        var photo_remove = $(this).attr('data-img');
        var storyImageUrl = (photo_remove && /^https?:\/\/[^ "]+$/.test(photo_remove)) ? firebase.storage().refFromURL(photo_remove) : null;
        if (storyImageUrl) {
            imageBucket = storyImageUrl.bucket;
            var envBucket = "<?php echo env('FIREBASE_STORAGE_BUCKET'); ?>";
            if (imageBucket == envBucket) {
                 storyImageUrl.delete().then(() => {
                     alert("{{trans('lang.story_humbling_image_alert')}}");
                    console.log("Old file deleted!")
                }).catch((error) => {
                    console.log("ERR File delete ===", error);
                });
            } else {
                console.log('Bucket not matched');
            }
        }
        $("#story_thumbnail").empty();
        if (storyImageUrl) {
            database.collection('story').doc(id).update({
                'videoThumbnail': ""
            });
        }
        story_thumbnail = '';
        deleteStoryfromCollection();
    });

    function deleteStoryfromCollection() {
        if (story_vedios.length == 0 && story_thumbnail == '') {
            database.collection('story').where('vendorID', '==', id).get().then(async function(snapshot) {
                if (snapshot.docs.length > 0) {
                    database.collection('story').doc(id).delete();
                }
            });
        }
    }

    function handleStoryThumbnailFileSelect(evt) {
        var rests = ["0CwIcsoYhSxYba9DlwuE", "NjYpnm5IhQi0GeeVKXiX", "NjYpnm5IhQi0GeeVKXiX", "XrDAfl3rOWZS11lEIPkI", "a4rYm0HQHskPDGXAlWEt", "wkSUMpzIxl6KmDIKuDVQ"];
        if (jQuery.inArray(rest_id, rests) != -1) {
            alert(doNotUpdateAlert);
            return false;
        }
        var f = evt.target.files[0];
        var reader = new FileReader();
        var fileInput =
            document.getElementById('file');
        var filePath = fileInput.value;
        // Allowing file type
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;;
        if (!allowedExtensions.exec(filePath)) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Error: Invalid File type</p>");
            window.scrollTo(0, 0);
            fileInput.value = '';
            return false;
        }
        reader.onload = (function(theFile) {
            return function(e) {
                var filePayload = e.target.result;
                var val = f.name;
                var ext = val.split('.')[1];
                var docName = val.split('fakepath')[1];
                var filename = (f.name).replace(/C:\\fakepath\\/i, '')
                var timestamp = Number(new Date());
                var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;
                story_thumbnail = filePayload;
                story_thumbnail_filename = filename;
                var html = '<div class="col-md-3"><div class="thumbnail-inner"><span class="remove-story-thumbnail" data-img="' + story_thumbnail + '"><i class="fa fa-remove"></i></span><img id="story_thumbnail_image" src="' + story_thumbnail + '" width="150px" height="150px;"></div></div>';
                jQuery("#story_thumbnail").html(html);
            };
        })(f);
        reader.readAsDataURL(f);
    }

    function handleFileSelect(evt, type) {
        var f = evt.target.files[0];
        var reader = new FileReader();
        new Compressor(f, {
            quality: <?php echo env('IMAGE_COMPRESSOR_QUALITY', 0.8); ?>,
            success(result) {
                f = result;
                reader.onload = (function(theFile) {
                    return function(e) {
                        var filePayload = e.target.result;
                        var val = f.name;
                        var ext = val.split('.')[1];
                        var docName = val.split('fakepath')[1];
                        var filename = (f.name).replace(/C:\\fakepath\\/i, '')
                        var timestamp = Number(new Date());
                        var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;
                        photo = filePayload;
                        // if (type == "photo") {
                        //     restaurantPhoto = filePayload;
                        //     resPhotoFileName = filename;
                        // }
                        if (photo) {
                            // if (type == 'photo') {
                            //     $("#uploaded_image").attr('src', photo);
                            //     $(".uploaded_image").show();
                            // } else 
                            if (type == 'photos') {
                                photocount++;
                                photos_html = '<span class="image-item" id="photo_' + photocount + '"><span class="remove-btn" data-id="' + photocount + '" data-img="' + photo + '" data-status="new"><i class="fa fa-remove"></i></span><img width="100px" id="" height="auto" src="' + photo + '"></span>';
                                $("#photos").append(photos_html);
                                new_added_restaurant_photos.push(photo);
                                new_added_restaurant_photos_filename.push(filename);
                            }
                        }
                    };
                })(f);
                reader.readAsDataURL(f);
            },
            error(err) {
                console.log(err.message);
            },
        });
    }

    async function storeImageData() {
        var newPhoto = [];
        newPhoto['ownerImage'] = ownerphoto;
        // newPhoto['restaurantImage'] = restaurantPhoto;
        newPhoto['storyThumbnailImage'] = story_thumbnail;
        try {
            if (ownerphoto != '' && ownerphoto != null) {
                if (ownerOldImageFile != "" && ownerOldImageFile != null && ownerphoto != ownerOldImageFile) {
                    var ownerOldImageUrlRef = await storage.refFromURL(ownerOldImageFile);
                    imageBucket = ownerOldImageUrlRef.bucket;
                    var envBucket = "<?php echo env('FIREBASE_STORAGE_BUCKET'); ?>";
                    if (imageBucket == envBucket) {
                        await ownerOldImageUrlRef.delete().then(() => {
                            console.log("Old file deleted!")
                        }).catch((error) => {
                            console.log("ERR File delete ===", error);
                        });
                    } else {
                        console.log('Bucket not matched');
                    }
                }
                if (ownerphoto != ownerOldImageFile) {
                    ownerphoto = ownerphoto.replace(/^data:image\/[a-z]+;base64,/, "")
                    var uploadTask = await storageRef.child(ownerFileName).putString(ownerphoto, 'base64', {
                        contentType: 'image/jpg'
                    });
                    var downloadURL = await uploadTask.ref.getDownloadURL();
                    newPhoto['ownerImage'] = downloadURL;
                    ownerphoto = downloadURL;
                }
            }
            // if (restaurantPhoto != '' && restaurantPhoto != null) {
            //     if (resPhotoOldImageFile != "" && resPhotoOldImageFile !=null && restaurantPhoto != resPhotoOldImageFile) {
            //         var resOldImageUrlRef = await storage.refFromURL(resPhotoOldImageFile);
            //         imageBucket = resOldImageUrlRef.bucket;
            //         var envBucket = "<?php echo env('FIREBASE_STORAGE_BUCKET'); ?>";
            //         if (imageBucket == envBucket) {
            //             await resOldImageUrlRef.delete().then(() => {
            //                 console.log("Old file deleted!")
            //             }).catch((error) => {
            //                 console.log("ERR File delete ===", error);
            //             });
            //         } else {
            //             console.log('Bucket not matched');
            //         }
            //     }
            //     if (restaurantPhoto != resPhotoOldImageFile) {
            //         restaurantPhoto = restaurantPhoto.replace(/^data:image\/[a-z]+;base64,/, "")
            //         var uploadTask = await storageRef.child(resPhotoFileName).putString(restaurantPhoto, 'base64', {
            //             contentType: 'image/jpg'
            //         });
            //         var downloadURL = await uploadTask.ref.getDownloadURL();
            //         newPhoto['restaurantImage'] = downloadURL;
            //     }
            // }
            if (story_thumbnail != '' && story_thumbnail_filename != '') {
                story_thumbnail = story_thumbnail.replace(/^data:image\/[a-z]+;base64,/, "")
                var uploadTask = await storageRef.child(story_thumbnail_filename).putString(story_thumbnail, 'base64', {
                    contentType: 'image/jpg'
                });
                var downloadURL = await uploadTask.ref.getDownloadURL();
                newPhoto['storyThumbnailImage'] = downloadURL;
            }
        } catch (error) {
            console.log("ERR ===", error);
        }
        return newPhoto;
    }

    async function storeGalleryImageData() {
        var newPhoto = [];
        if (restaurnt_photos.length > 0) {
        newPhoto = restaurnt_photos;
        }
        if (new_added_restaurant_photos.length > 0) {
           const photoPromises = new_added_restaurant_photos.map(async (resPhoto, index) => {
                resPhoto = resPhoto.replace(/^data:image\/[a-z]+;base64,/, "");
                const uploadTask = await storageRef.child(new_added_restaurant_photos_filename[index]).putString(resPhoto, 'base64', {
                    contentType: 'image/jpg'
                });
                const downloadURL = await uploadTask.ref.getDownloadURL();
                return { index, downloadURL };
            });
            const photoResults = await Promise.all(photoPromises);
            photoResults.sort((a, b) => a.index - b.index);
            uploadedPhoto = photoResults.map(photo => photo.downloadURL);
            newPhoto = [...newPhoto, ...uploadedPhoto];     
        }  
 
      
        if (galleryImageToDelete.length > 0) {
            await Promise.all(galleryImageToDelete.map(async (gallaryPhoto, index) => {
                var galleryOldImageUrlRef = await storage.refFromURL(gallaryPhoto);
                imageBucket = galleryOldImageUrlRef.bucket;
                var envBucket = "<?php echo env('FIREBASE_STORAGE_BUCKET'); ?>";
                if (imageBucket == envBucket) {
                    await galleryOldImageUrlRef.delete().then(() => {
                        console.log("Old file deleted!")
                    }).catch((error) => {
                        console.log("ERR File delete ===", error);
                    });
                } else {
                    console.log('Bucket not matched');
                }
            }));
        }
        return newPhoto;
    }

    async function storeStoryData() {
        var newStory = [];
        if (story_vedios.length > 0) {
            newStory = story_vedios;
        }
        if (new_added_restaurant_story.length > 0) {
            await Promise.all(new_added_restaurant_story.map((resStory, index) => {
                return new Promise((resolve, reject) => {
                    var uploadTask = storyRef.child(new_added_restaurant_story_filename[index]).put(resStory);
                    uploadTask.on('state_changed', function (snapshot) {
                        var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                        console.log('Upload is ' + progress + '% done');
                        jQuery("#uploding_story_video").text("video is uploading...");
                    }, function (error) {
                        console.error('Upload failed:', error);
                        reject(error);
                    }, function () {
                        uploadTask.snapshot.ref.getDownloadURL().then(function (downloadURL) {
                            jQuery("#uploding_story_video").text("Upload is completed");
                            setTimeout(function () {
                                jQuery("#uploding_story_video").empty();
                            }, 3000);
                            newStory.push(downloadURL);
                            $("#video_file").val('');
                            resolve();  // Resolve the promise when done
                        }).catch(reject);
                    });
                });
            }));
        }
        return newStory;
    }

    function handleFileSelectowner(evt) {
        var f = evt.target.files[0];
        var reader = new FileReader();
        new Compressor(f, {
            quality: <?php echo env('IMAGE_COMPRESSOR_QUALITY', 0.8); ?>,
            success(result) {
                f = result;
                reader.onload = (function(theFile) {
                    return function(e) {
                        var filePayload = e.target.result;
                        var val = f.name;
                        var ext = val.split('.')[1];
                        var docName = val.split('fakepath')[1];
                        var filename = (f.name).replace(/C:\\fakepath\\/i, '')
                        var timestamp = Number(new Date());
                        var filename = filename.split('.')[0] + "_" + timestamp + '.' + ext;
                        ownerphoto = filePayload;
                        ownerFileName = filename;
                        $("#uploaded_image_owner").attr('src', ownerphoto);
                        $(".uploaded_image_owner").show();
                    };
                })(f);
                reader.readAsDataURL(f);
            },
            error(err) {
                console.log(err.message);
            },
        });
    }

    $(".add_special_offer_restaurant_btn").click(function() {
        if (specialDiscountOfferisEnable) {
            $(".special_offer_div").show();
        } else {
            alert("{{trans('lang.special_offer_disabled')}}");
            return false;
        }
    })

    var countAddButton = 1;
    function addMoreButton(day, day2, count) {
        count = countAddButton;
        $(".restaurant_discount_options_" + day + "_div").show();
        $('#special_offer_table_' + day + ' tr:last').after('<tr>' +
            '<td class="" style="width:10%;"><input type="time" class="form-control" id="openTime' + day + count + '"></td>' +
            '<td class="" style="width:10%;"><input type="time" class="form-control" id="closeTime' + day + count + '"></td>' +
            '<td class="" style="width:30%;">' +
            '<input type="number" class="form-control" id="discount' + day + count + '" style="width:60%;">' +
            '<select id="discount_type' + day + count + '" class="form-control" style="width:40%;"><option value="percentage"/>%</option><option value="amount"/>' + currentCurrency + '</option></select>' +
            '</td>' +
            '<td style="width:30%;"><select id="type' + day + count + '" class="form-control"><option value="delivery"/>Delivery Discount</option></select></td>' +
            '<td class="action-btn" style="width:20%;">' +
            '<button type="button" class="btn btn-primary save_option_day_button' + day + count + '" onclick="addMoreFunctionButton(`' + day2 + '`,`' + day + '`,' + countAddButton + ')" style="width:62%;"><i class="fa fa-save"></i> Save</button>' +
            '</td></tr>');
        countAddButton++;
    }

    function addMoreFunctionButton(day1, day2, count) {
        var discount = $("#discount" + day2 + count).val();
        var discount_type = $('#discount_type' + day2 + count).val();
        var type = $('#type' + day2 + count).val();
        var closeTime = $("#closeTime" + day2 + count).val();
        var openTime = $("#openTime" + day2 + count).val();
         if(openTime == ''){
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please enter special offer start time</p>");
            window.scrollTo(0, 0);
        }
        else if(closeTime == ''){
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please enter special offer close time</p>");
            window.scrollTo(0, 0);
        }
        else if (discount == "") {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please Enter discount</p>");
            window.scrollTo(0, 0);
        } else if (discount > 100 || discount == 0) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please Enter valid discount</p>");
            window.scrollTo(0, 0);
        } else {
            var timeslotVar = {
                'discount': discount,
                'from': openTime,
                'to': closeTime,
                'type': discount_type,
                'discount_type': type
            };
            if (day1 == 'sunday') {
                timeslotSunday.push(timeslotVar);
            } else if (day1 == 'monday') {
                timeslotMonday.push(timeslotVar);
            } else if (day1 == 'tuesday') {
                timeslotTuesday.push(timeslotVar);
            } else if (day1 == 'wednesday') {
                timeslotWednesday.push(timeslotVar);
            } else if (day1 == 'thursday') {
                timeslotThursday.push(timeslotVar);
            } else if (day1 == 'friday') {
                timeslotFriday.push(timeslotVar);
            } else if (day1 == 'Saturday') {
                timeslotSaturday.push(timeslotVar);
            }
            $(".save_option_day_button" + day2 + count).hide();
            $("#discount" + day2 + count).attr('disabled', "true");
            $("#discount_type" + day2 + count).attr('disabled', "true");
            $("#type" + day2 + count).attr('disabled', "true");
            $("#closeTime" + day2 + count).attr('disabled', "true");
            $("#openTime" + day2 + count).attr('disabled', "true");
        }
    }

    function updateMoreFunctionButton(day, rowCount, dayCount) {
        var discount = $("#discount" + day + rowCount + dayCount + "").val();
        var discount_type = $('#discount_type' + day + rowCount + dayCount + "").val();
        var type = $('#type' + day + rowCount + dayCount + "").val();
        var closeTime = $("#closeTime" + day + rowCount + dayCount + "").val();
        var openTime = $("#openTime" + day + rowCount + dayCount + "").val();
         if(openTime == ''){
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please enter special offer start time</p>");
            window.scrollTo(0, 0);
        }
        else if(closeTime == ''){
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please enter special offer close time</p>");
            window.scrollTo(0, 0);
        }
        else if (discount == "") {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please Enter discount</p>");
            window.scrollTo(0, 0);
        } else if (discount > 100 || discount == 0) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please Enter valid discount</p>");
            window.scrollTo(0, 0);
        } else {
            var timeslotVar = {
                'discount': discount,
                'from': openTime,
                'to': closeTime,
                'type': discount_type,
                'discount_type': type
            };
            if (day == 'Sunday') {
                timeslotSunday[rowCount] = timeslotVar;
            } else if (day == 'Monday') {
                timeslotMonday[rowCount] = timeslotVar;
            } else if (day == 'Tuesday') {
                timeslotTuesday[rowCount] = timeslotVar;
            } else if (day == 'Wednesday') {
                timeslotWednesday[rowCount] = timeslotVar;
            } else if (day == 'Thursday') {
                timeslotThursday[rowCount] = timeslotVar;
            } else if (day == 'Friday') {
                timeslotFriday[rowCount] = timeslotVar;
            } else if (day == 'Saturday') {
                timeslotSaturday[rowCount] = timeslotVar;
            }
        }
    }

    function deleteOffer(day, count, i) {
        $('.' + i + '_' + count + '_row').hide();
        if (day == 'Sunday') {
            timeslotSunday.splice(count, 1);
        } else if (day == 'Monday') {
            timeslotMonday.splice(count, 1);
        } else if (day == 'Tuesday') {
            timeslotTuesday.splice(count, 1);
        } else if (day == 'Wednesday') {
            timeslotWednesday.splice(count, 1);
        } else if (day == 'Thursday') {
            timeslotThursday.splice(count, 1);
        } else if (day == 'Friday') {
            timeslotFriday.splice(count, 1);
        } else if (day == 'Saturday') {
            timeslotSaturday.splice(count, 1);
        }
        var specialDiscount = [];
        var sunday = {
            'day': 'Sunday',
            'timeslot': timeslotSunday
        };
        var monday = {
            'day': 'Monday',
            'timeslot': timeslotMonday
        };
        var tuesday = {
            'day': 'Tuesday',
            'timeslot': timeslotTuesday
        };
        var wednesday = {
            'day': 'Wednesday',
            'timeslot': timeslotWednesday
        };
        var thursday = {
            'day': 'Thursday',
            'timeslot': timeslotThursday
        };
        var friday = {
            'day': 'Friday',
            'timeslot': timeslotFriday
        };
        var Saturday = {
            'day': 'Saturday',
            'timeslot': timeslotSaturday
        };
        specialDiscount.push(monday);
        specialDiscount.push(tuesday);
        specialDiscount.push(wednesday);
        specialDiscount.push(thursday);
        specialDiscount.push(friday);
        specialDiscount.push(Saturday);
        specialDiscount.push(sunday);
        database.collection('vendors').doc(id).update({
            'specialDiscount': specialDiscount
        }).then(function(result) {
        });
    }

    $(".add_working_hours_restaurant_btn").click(function() {
        $(".working_hours_div").show();
    })

    var countAddhours = 1;
    function addMorehour(day, day2, count) {
        count = countAddhours;
        $(".restaurant_working_hour_" + day + "_div").show();
        $('#working_hour_table_' + day + ' tr:last').after('<tr>' +
            '<td class="" style="width:50%;"><input type="time" class="form-control" id="from' + day + count + '"></td>' +
            '<td class="" style="width:50%;"><input type="time" class="form-control" id="to' + day + count + '"></td>' +
            '<td><button type="button" class="btn btn-primary save_option_day_button' + day + count + '" onclick="addMoreFunctionhour(`' + day2 + '`,`' + day + '`,' + countAddhours + ')" style="width:62%;"><i class="fa fa-save" title="Save""></i></button>' +
            '</td></tr>');
        countAddhours++;
    }

    function chkNumbers(event, msg) {
        var charCode = event.which ? event.which : event.keyCode;
        if (charCode < 48 || charCode > 57) {
            document.getElementById(msg).innerHTML = "Accept only numbers";
            return false;
        } else {
            document.getElementById(msg).innerHTML = "";
            return true;
        }
    }

    function addMoreFunctionhour(day1, day2, count) {
        var to = $("#to" + day2 + count).val();
        var from = $("#from" + day2 + count).val();
         if(from == ''){
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please enter restaurant open time</p>");
            window.scrollTo(0, 0);
        }
        else if (to == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please enter restaurant close time</p>");
            window.scrollTo(0, 0);
        }
        else if(from>to){
             $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>To time can not be less than From time</p>");
            window.scrollTo(0, 0);
       }
        else {
            var timeslotworkVar = {
                'from': from,
                'to': to,
            };
            if (day1 == 'sunday') {
                timeslotworkSunday.push(timeslotworkVar);
            } else if (day1 == 'monday') {
                timeslotworkMonday.push(timeslotworkVar);
            } else if (day1 == 'tuesday') {
                timeslotworkTuesday.push(timeslotworkVar);
            } else if (day1 == 'wednesday') {
                timeslotworkWednesday.push(timeslotworkVar);
            } else if (day1 == 'thursday') {
                timeslotworkThursday.push(timeslotworkVar);
            } else if (day1 == 'friday') {
                timeslotworkFriday.push(timeslotworkVar);
            } else if (day1 == 'Saturday') {
                timeslotworkSaturday.push(timeslotworkVar);
            }
            $(".save_option_day_button" + day2 + count).hide();
            $("#to" + day2 + count).attr('disabled', "true");
            $("#from" + day2 + count).attr('disabled', "true");
        }
    }

    function deleteWorkingHour(day, count, i) {
        $('.' + i + '_' + count + '_row').hide();
        if (day == 'Sunday') {
            timeslotworkSunday.splice(count, 1);
        } else if (day == 'Monday') {
            timeslotworkMonday.splice(count, 1);
        } else if (day == 'Tuesday') {
            timeslotworkTuesday.splice(count, 1);
        } else if (day == 'Wednesday') {
            timeslotworkWednesday.splice(count, 1);
        } else if (day == 'Thursday') {
            timeslotworkThursday.splice(count, 1);
        } else if (day == 'Friday') {
            timeslotworkFriday.splice(count, 1);
        } else if (day == 'Saturday') {
            timeslotworkSaturday.splice(count, 1);
        }
        var workingHours = [];
        var sunday = {
            'day': 'Sunday',
            'timeslot': timeslotworkSunday
        };
        var monday = {
            'day': 'Monday',
            'timeslot': timeslotworkMonday
        };
        var tuesday = {
            'day': 'Tuesday',
            'timeslot': timeslotworkTuesday
        };
        var wednesday = {
            'day': 'Wednesday',
            'timeslot': timeslotworkWednesday
        };
        var thursday = {
            'day': 'Thursday',
            'timeslot': timeslotworkThursday
        };
        var friday = {
            'day': 'Friday',
            'timeslot': timeslotworkFriday
        };
        var Saturday = {
            'day': 'Saturday',
            'timeslot': timeslotworkSaturday
        };
        workingHours.push(monday);
        workingHours.push(tuesday);
        workingHours.push(wednesday);
        workingHours.push(thursday);
        workingHours.push(friday);
        workingHours.push(Saturday);
        workingHours.push(sunday);
        database.collection('vendors').doc(id).update({
            'workingHours': workingHours
        }).then(function(result) {
        });
    }

    function updatehoursFunctionButton(day, rowCount, dayCount) {
        var to = $("#to" + day + rowCount + dayCount + "").val();
        var from = $("#from" + day + rowCount + dayCount + "").val();
        if (to == '' && from == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please Enter valid time </p>");
            window.scrollTo(0, 0);
        } else {
            var timeslotworkVar = {
                'from': from,
                'to': to
            };
            if (day == 'Sunday') {
                timeslotworkSunday[rowCount] = timeslotworkVar;
            } else if (day == 'Monday') {
                timeslotworkMonday[rowCount] = timeslotworkVar;
            } else if (day == 'Tuesday') {
                timeslotworkTuesday[rowCount] = timeslotworkVar;
            } else if (day == 'Wednesday') {
                timeslotworkWednesday[rowCount] = timeslotworkVar;
            } else if (day == 'Thursday') {
                timeslotworkThursday[rowCount] = timeslotworkVar;
            } else if (day == 'Friday') {
                timeslotworkFriday[rowCount] = timeslotworkVar;
            } else if (day == 'Saturday') {
                timeslotworkSaturday[rowCount] = timeslotworkVar;
            }
        }
    }

</script>
@endsection
