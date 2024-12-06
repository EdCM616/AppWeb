@extends('layouts.app')

@section('content')

<div id="main-wrapper" class="page-wrapper" style="min-height: 207px;">
    <div class="container-fluid">
        <div id="data-table_processing" class="dataTables_processing panel panel-default"
             style="display: none;margin-top:20px;">Cargando...
        </div>
        <div class="card mb-3 business-analytics">  
            <div class="card-body">
                <div class="row flex-between align-items-center g-2 mb-3 order_stats_header">
                    <div class="col-sm-6">
                        <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
                            Datos de Ikam Multitiendas</h4>
                    </div>
                </div>
                <div class="row business-analytics_list">
                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card-box" onclick="location.href='{!! route('stores') !!}'">
                            <h5>Total de Pymes</h5>
                            <h2 id="vendor_count"></h2>
                            <i class="mdi mdi-shopping"></i>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card-box" onclick="location.href='{!! route('users') !!}'">
                            <h5>Total de Usuarios</h5>
                            <h2 id="users_count"></h2>
                            <i class="mdi mdi-account"></i>
                        </div>
                    </div>    
                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card-box" onclick="location.href='{!! route('users') !!}'">
                            <h5>Total de Usuarios Pymes</h5>
                            <h2 id="users_p_count"></h2>
                            <i class="mdi mdi-account"></i>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card-box" onclick="location.href='{!! route('users') !!}'">
                            <h5>Total de Usuarios Clientes</h5>
                            <h2 id="users_c_count"></h2>
                            <i class="mdi mdi-account"></i>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card-box" onclick="location.href='{!! route('orders') !!}'">
                            <h5>Total de Categorias</h5>
                            <h2 id="order_count"></h2>
                            <i class="mdi mdi-cart"></i>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card-box" onclick="location.href='{!! route('items') !!}'">
                            <h5>Total de Sub Categorias</h5>
                            <h2 id="product_count"></h2>
                            <i class="mdi mdi-buffer"></i>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card-box" onclick="location.href='{!! route('orders') !!}'">
                            <h5>Preguntas</h5>
                            <h2 id="questions_count"></h2>
                            <i class="mdi mdi-cart"></i>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card-box" onclick="location.href='{!! route('orders') !!}'">
                            <h5>Soporte</h5>
                            <h2 id="sup_count"></h2>
                            <i class="mdi mdi-cart"></i>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-3">
                        <div class="card-box" onclick="location.href='{!! route('orders') !!}'">
                            <h5>Colonias</h5>
                            <h2 id="col_count"></h2>
                            <i class="mdi mdi-cart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="{{asset('js/chart.js')}}"></script>

<script>
    jQuery("#data-table_processing").show();
    var db = firebase.firestore();
    $(document).ready(function () {
        // Almacena todas las promesas de las operaciones asíncronas
        const promises = [];

        // Agrega las promesas de las consultas
        promises.push(
            db.collection('pyme').where('nombre_pyme', '!=', "").get().then((snapshot) => {
                jQuery("#vendor_count").empty();
                jQuery("#vendor_count").text(snapshot.docs.length);
            })
        );

        promises.push(
            db.collection('users').get().then((snapshot) => {
                jQuery("#users_count").empty();
                jQuery("#users_count").append(snapshot.docs.length);
            })
        );

        promises.push(
            db.collection('users').where("isPyme", "==", true).get().then((snapshot) => {
                jQuery("#users_p_count").empty();
                jQuery("#users_p_count").append(snapshot.docs.length);
            })
        );

        promises.push(
            db.collection('users').where("isPyme", "==", false).get().then((snapshot) => {
                jQuery("#users_c_count").empty();
                jQuery("#users_c_count").append(snapshot.docs.length);
            })
        );

        promises.push(
            db.collection('categoria').orderBy("nombreCat", 'desc').get().then((snapshot) => {
                jQuery("#order_count").empty();
                jQuery("#order_count").text(snapshot.docs.length);
            })
        );

        promises.push(
            db.collection('subCategoria').get().then((snapshot) => {
                jQuery("#product_count").empty();
                jQuery("#product_count").text(snapshot.docs.length);
            })
        );

        promises.push(
            db.collection('preguntas').get().then((snapshot) => {
                jQuery("#questions_count").empty();
                jQuery("#questions_count").append(snapshot.docs.length);
            })
        );

        promises.push(
            db.collection('soporte').get().then((snapshot) => {
                jQuery("#sup_count").empty();
                jQuery("#sup_count").append(snapshot.docs.length);
            })
        );

        promises.push(
            db.collection('colonia').get().then((snapshot) => {
                jQuery("#col_count").empty();
                jQuery("#col_count").append(snapshot.docs.length);
            })
        );
        
        Promise.all(promises).then(() => {            
            jQuery("#data-table_processing").hide();
        }).catch((error) => {
            console.error("Error al procesar las consultas: ", error);                        
        });
    });
</script>

@endsection

