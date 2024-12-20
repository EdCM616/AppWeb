@extends('layouts.app')
@section('content')

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Agregar pyme</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{!! route('stores') !!}">Pymes</a></li>
                <li class="breadcrumb-item active">Agregar</li>
            </ol>
        </div>
        <label class="col-12 control-label">{{ $user->name  }} </label>                                
        <div> 
            <div class="card-body">
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
            <div class="form-group col-12 text-center">
                <button type="button" class="btn btn-primary  save-form-btn"><i class="fa fa-save"></i>
                    Guardar
                </button>
                <a href="{!! route('stores') !!}" class="btn btn-default"><i class="fa fa-undo"></i>Cancelar</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.1.1/compressor.min.js" integrity="sha512-VaRptAfSxXFAv+vx33XixtIVT9A/9unb1Q8fp63y1ljF+Sbka+eMJWoDAArdm7jOYuLQHVx5v60TQ+t3EA8weA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var createdAt = firebase.firestore.FieldValue.serverTimestamp();
    var database = firebase.firestore();    
    var photo = "";
    var menuPhotoCount = 0;
    var restaurantMenuPhotos = "";
    var restaurant_menu_filename = [];
    var restaurantPhoto = '';
    var resPhotoFileName = '';
    var restaurantOwnerId = "";
    var restaurantOwnerOnline = false;
    var photocount = 0;
    var restaurnt_photos = [];
    var restaurant_photos_filename = [];
    var ownerphoto = '';
    var ownerFileName = '';
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
    var storevideoDuration = 1000;
    var story_vedios = [];
    var videoPush = "";
    var story_thumbnail = '';
    var story_thumbnail_filename = '';
    var storyCount = 0;

    let subCategorias = [];
    var filenamepath = '';

    var storageRef = firebase.storage().ref('pymes');
    var storyRef = firebase.storage().ref('videos');    

    var userRef = "<?php echo $user->name; ?>"    

    $(document).ready(async function() {
        jQuery("#data-table_processing").show();
        /*
        await email_templates.get().then(async function(snapshots) {
            emailTemplatesData = snapshots.docs[0].data();
        });
        await emailSetting.get().then(async function(snapshots) {
            var emailSettingData = snapshots.data();
            adminEmail = emailSettingData.userName;
        });*/        

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

    var nombrePyme = $("#pyme_nombre").val();   
    
    
    $(".save-form-btn").click(async function() {        

        $(".error_top").hide();       

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

        if (nombre_pyme == "") {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Es necesario agregar el nombre de la Pyme</p>");
            window.scrollTo(0, 0);
            return;
        }

        if (nombreCategoria == "" || nombreCategoria == undefined) {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>De favor ingrese la Categoria de la Pyme</p>");
            window.scrollTo(0, 0);            
            return;
        }
        
        if (num_cel == "" && num_local == "") {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>De favor ingrese un numero celular o un numero telefonico</p>");                                    
            window.scrollTo(0, 0);
            return;
        }
        
        if (nomColonia == "") {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>De favor ingrese la Colonia donde se encuentra la Pyme</p>");
            window.scrollTo(0, 0);                 
            return;
        }

        if (direccion == "") {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>De favor ingrese la Direccion de la Pyme</p>");            
            window.scrollTo(0, 0);   
            return;
        }

        if (url_maps == "") {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>De favor ingrese la URL de maps de la direccion de la PYME</p>");                        
            window.scrollTo(0, 0);   
            return;
        }

        if (descripcion == "") {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>De favor ingrese una descripció sobre la PYME</p>");                                    
            window.scrollTo(0, 0);   
            return;
        }

        if (horario_apertura == "" && horario_cierre == "") {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>De favor ingrese los Horarios de la tienda</p>");                                    
            window.scrollTo(0, 0);   
            return;
        }        

        const tiendaData = {
            nombre_pyme: nombre_pyme,
            nombreCategoria: nombreCategoria,
            nombreSubcate: nombreSubcate,
            num_cel: num_cel,
            num_local: num_local,
            nomColonia: nomColonia,
            direccion: direccion,
            url_maps: url_maps,
            horario_apertura: horario_apertura,
            horario_cierre: horario_cierre,
            descripcion: descripcion,
            url_facebook:url_facebook,
            url_instagram: url_instagram,
            url_tiktok: url_tiktok, 
            video: videoPush,      
            userRef: userRef,             
            createdAT: createdAT
        };     
        
            jQuery("#data-table_processing").show();

            try { 
                await galeriaImages().then(async (GalleryIMG) => {                     
                    for (let index = 0; index < GalleryIMG.length; index++) {
                        tiendaData[`imagen${index + 1}`] = GalleryIMG[index];
                    }
                })                                
                await firebase.firestore().collection('pyme').add(tiendaData);
                console.log('Datos de tienda guardados correctamente');
                window.location.href = '{{ route("stores") }}';
            } catch (error) {
                console.error('Error al guardar en tiendas:', error);
                $(".error_top").show().html(`<p>${error.message}</p>`);
            } finally {
                jQuery("#data-table_processing").hide();
            }
        return;       
    })

    // Carga del video a firebase

    function handleStoryFileSelect(evt) {
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
                    filenamepath = (f.name).replace(/C:\\fakepath\\/i, '').split('.')[0] + "_" + Date.now() + '.' + ext;
                    var uploadTask = storyRef.child(filename).put(theFile);
                    uploadTask.on('state_changed', function(snapshot) {
                        var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                        console.log('Upload is ' + progress + '% done');
                        jQuery("#uploding_story_video").text("Video se esta cargando a firebase espere de favor...");
                    }, function(error) {}, function() {
                        uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                            jQuery("#uploding_story_video").text("La carga a terminado");
                            setTimeout(function() {
                                jQuery("#uploding_story_video").empty();
                            }, 3000);
                            var nextCount = $("#story_vedios").children().length;
                            html = '<div class="col-md-3" id="story_div_' + nextCount + '">\n' +
                                '<div class="video-inner"><video width="320px" height="240px"\n' +
                                '                                   controls="controls">\n' +
                                '                            <source src="' + downloadURL + '"\n' +
                                '            type="video/mp4"></video><span class="remove-story-video" data-id="' + nextCount + '" data-img="' + downloadURL + '"><i class="fa fa-remove"></i></span></div></div>';
                            jQuery("#story_vedios").append(html);
                            story_vedios.push(downloadURL);
                            videoPush = downloadURL;
                            $("#video_file").val('');
                        });
                    });
                };
            })(f);
            reader.readAsDataURL(f);
        }
        video.src = URL.createObjectURL(f);
    }

    $(document).on("click", ".remove-story-video", function() {
        var id = $(this).attr('data-id');
        var photo_remove = $(this).attr('data-img');
        
        $("#story_div_" + id).remove();
        index = story_vedios.indexOf(photo_remove);
        $("#video_file").val('');
        if (index > -1) {
            story_vedios.splice(index, 1); // 2nd parameter means remove one item only
        }
        var newhtml = '';
        if (story_vedios.length > 0) {
            for (var i = 0; i < story_vedios.length; i++) {
                newhtml += '<div class="col-md-3" id="story_div_' + i + '">\n' +
                    '<div class="video-inner"><video width="320px" height="240px"\n' +
                    'controls="controls">\n' +
                    '<source src="' + story_vedios[i] + '"\n' +
                    'type="video/mp4"></video><span class="remove-story-video" data-id="' + i + '" data-img="' + story_vedios[i] + '"><i class="fa fa-remove"></i></span></div></div>';
            }
        }
        jQuery("#story_vedios").html(newhtml);                
        deleteFileFromStorage('videos/'+filenamepath);
    });

    async function deleteFileFromStorage(filePath) {
        const storageRef = firebase.storage().ref();

        try {        
            const fileRef = storageRef.child(filePath);
            await fileRef.delete();
            console.log('Archivo eliminado exitosamente');
        } catch (error) {
            console.error('Error al intentar eliminar el archivo:', error);
        }
    }

    // termina Carga del video a firebase

    // Carga de las imagenes
    async function galeriaImages() {
        var newPhoto = [];
        if (restaurnt_photos.length > 0) {
            const photoPromises = restaurnt_photos.map(async (resPhoto, index) => {
                resPhoto = resPhoto.replace(/^data:image\/[a-z]+;base64,/, "");
                const fileName = `/${restaurant_photos_filename[index]}`;
                const uploadTask = await storageRef.child(fileName).putString(resPhoto, 'base64', {
                    contentType: 'image/jpg'
                });
                const downloadURL = await uploadTask.ref.getDownloadURL();
                return { index, downloadURL };
            });
            const photoResults = await Promise.all(photoPromises);
            photoResults.sort((a, b) => a.index - b.index);
            newPhoto = photoResults.map(photo => photo.downloadURL);          
        } 
        return newPhoto;
    }

    $(document).on("click", ".remove-btn", function() {
        var id = $(this).attr('data-id');
        var photo_remove = $(this).attr('data-img');
       
        $("#photo_" + id).remove();
        index = restaurnt_photos.indexOf(photo_remove);
        if (index > -1) {
            restaurnt_photos.splice(index, 1); // 2nd parameter means remove one item only
        }
    });

    async function storeImageData() {
        var newPhoto = [];
        newPhoto['ownerImage'] = '';
        newPhoto['restaurantImage'] = '';
        newPhoto['storyThumbnailImage'] = '';
        try {
            if (ownerphoto != '') {
                ownerphoto = ownerphoto.replace(/^data:image\/[a-z]+;base64,/, "")
                var uploadTask = await storageRef.child(ownerFileName).putString(ownerphoto, 'base64', {
                    contentType: 'image/jpg'
                });
                var downloadURL = await uploadTask.ref.getDownloadURL();
                newPhoto['ownerImage'] = downloadURL;
                ownerphoto = downloadURL;
            }
            if (restaurantPhoto != '') {
                restaurantPhoto = restaurantPhoto.replace(/^data:image\/[a-z]+;base64,/, "")
                var uploadTask = await storageRef.child(resPhotoFileName).putString(restaurantPhoto, 'base64', {
                    contentType: 'image/jpg'
                });
                var downloadURL = await uploadTask.ref.getDownloadURL();
                newPhoto['restaurantImage'] = downloadURL;
            }
            if (story_thumbnail != '') {
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
                                photos_html = '<span class="image-item" id="photo_' + photocount + '"><span class="remove-btn" data-id="' + photocount + '" data-img="' + photo + '"><i class="fa fa-remove"></i></span><img width="100px" id="" height="auto" src="' + photo + '"></span>';
                                $("#photos").append(photos_html);
                                restaurnt_photos.push(photo);
                                restaurant_photos_filename.push(filename);
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

    async function storeGalleryImageData() {
        var newPhoto = [];
        if (restaurnt_photos.length > 0) {
            const photoPromises = restaurnt_photos.map(async (resPhoto, index) => {
                resPhoto = resPhoto.replace(/^data:image\/[a-z]+;base64,/, "");
                const uploadTask = await storageRef.child(restaurant_photos_filename[index]).putString(resPhoto, 'base64', {
                    contentType: 'image/jpg'
                });
                const downloadURL = await uploadTask.ref.getDownloadURL();
                return { index, downloadURL };
            });
            const photoResults = await Promise.all(photoPromises);
            photoResults.sort((a, b) => a.index - b.index);
            newPhoto = photoResults.map(photo => photo.downloadURL);
          
        } 
        return newPhoto;
    }

    function handleFileSelectGallary(evt, type) {
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
                        if (photo) {
                            photocount++;
                            photos_html = '<span class="image-item" id="photo_' + photocount + '"><span class="remove-btn" data-id="' + photocount + '" data-img="' + photo + '"><i class="fa fa-remove"></i></span><img width="100px" id="" height="auto" src="' + photo + '"></span>';
                            $("#photos").append(photos_html);
                            restaurnt_photos.push(photo);
                            restaurant_photos_filename.push(filename);
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


    $(document).on("click", ".remove-story-thumbnail", function() {
        var photo_remove = $(this).attr('data-img');
        
        $("#story_thumbnail").empty();
        $('#file').val('');
        story_thumbnail = '';
        deleteStoryfromCollection();
    });

    function deleteStoryfromCollection() {
        if (story_vedios.length == 0 && story_thumbnail == '') {
            database.collection('story').where('vendorID', '==', restaurant_id).get().then(async function(snapshot) {
                if (snapshot.docs.length > 0) {
                    database.collection('story').doc(restaurant_id).delete();
                }
            });
        }
    }      

    async function storeStoryImageData() {
        var newPhoto = [];
        newPhoto['storyThumbnailImage'] = '';
        try {
            if (story_thumbnail != '') {
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

    function handleStoryThumbnailFileSelect(evt) {
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

    async function storeMenuImageData() {
        var newPhoto = [];
        if (restaurant_menu_photos.length > 0) {
            await Promise.all(restaurant_menu_photos.map(async (menuPhoto, index) => {
                menuPhoto = menuPhoto.replace(/^data:image\/[a-z]+;base64,/, "");
                var uploadTask = await storageRef.child(restaurant_menu_filename[index]).putString(menuPhoto, 'base64', {
                    contentType: 'image/jpg'
                });
                var downloadURL = await uploadTask.ref.getDownloadURL();
                newPhoto.push(downloadURL);
            }));
        }
        return newPhoto;
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

    $(".add_working_hours_restaurant_btn").click(function() {
        $(".working_hours_div").show();
    })

    var countAddhours = 1;
    function addMorehour(day, day2, count) {
        count = countAddhours;
        $(".restaurant_discount_options_" + day + "_div").show();
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
            document.getElementById(msg).innerHTML = "Solo se aceptan numero";
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
            $(".error_top").append("<p>Please enter store open time</p>");
            window.scrollTo(0, 0); 
        }
        else if (to == '') {
            $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>Please enter store close time</p>");
            window.scrollTo(0, 0);
        } 
        else if(from>to){
             $(".error_top").show();
            $(".error_top").html("");
            $(".error_top").append("<p>To time can not be less than From time</p>");
            window.scrollTo(0, 0);
       }else {
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
    
</script>
@endsection