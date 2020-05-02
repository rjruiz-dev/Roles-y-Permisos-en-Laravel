@extends('admin.layout')

@section('header')
    <h1>
        CLIENTES
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Clientes</li>
    </ol>
    
    <!-- search.blade -->
    &nbsp;
    <div class="row">
      <div class="col-md-4 col-xs-12">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Buscar por nombre">
          <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div>      
      </div>    
      <div class="col-xs-1">
        <div id="loader" class="text-center"></div>      
      </div>
      <div class="col-md-7 col-xs-12 ">
        <div class="btn-group pull-right">
          <button onclick="clientes_excel();" class="btn btn-default"><i class="fa fa-download"></i> Descargar</button>
          <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-file"></i> Importar datos <span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#importar_modal" data-toggle="modal"><i class="fa fa-file-excel-o "></i> Hoja de cálculo</a></li>
                <li><a href="dist/template/formato_importacion_clientes.xlsx"><i class="fa fa-download"></i> Descargar formato</a></li>                    
              </ul>
          </div>        
            <button type="button" class="btn btn-default modal-show" id="createNewClient"><i class="fa fa-plus"></i> Nuevo</button>   
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Mostrar
            <span class="caret"></span>
            </button>            
            <ul class="dropdown-menu pull-right">
              <li class="active" onclick="per_page(15);" id="15"><a href="#">15</a></li>
              <li onclick="per_page(25);" id="25"><a href="#">25</a></li>
              <li onclick="per_page(50);" id="50"><a href="#">50</a></li>
              <li onclick="per_page(100);" id="100"><a href="#">100</a></li>
              <li onclick="per_page(1000000);" id="1000000"><a href="#">Todos</a></li>
            </ul>
        </div>
      </div>
        <input type="hidden" id="per_page" value="15">    
    </div> 
    <!-- fin search-blade -->   
  
@stop

@section('content')
<div class="box box-info">  
  <div class="box-header">
    <h3 class="box-title">Listado de Clientes</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">      
      <table id="clientes_table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th class="col-sm-2">Registro fiscal</th>
            <th class="col-sm-3">Cliente</th>
            <th class="col-sm-2">Direccion</th>
            <th class="col-sm-3">Contacto</th>     
            <th class="col-sm-3"></th>                 
          </tr>
        </thead>
        <tbody>          
        </tbody>
      </table>     
    </div>
  </div>
</div> 


<div class="modal fade" id="modal_agregar" role="dialog"  aria-labelledby="myModalLabel">
<form class="form-horizontal" id="form_agregar" method="POST" action="{{ route('customers.clientes.store') }}">
  {{ csrf_field() }}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" name="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="modal-title">Nuevo Cliente</h4>
      </div> 
      <!-- <div id="message-error" class="alert alert-danger danger" role="alert" sytle="display: none">
        <strong id="error"></strong>
      </div>      -->
      <!-- <div class="alert alert-danger" style="display:none"></div> -->
      
      <div class="modal-body" id="modal-body">          
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab" id="empresa">Empresa</a></li>
            <li><a href="#timeline" data-toggle="tab" id="contacto">Contacto</a></li>
            <li><a href="#settings" data-toggle="tab" id="direccion">Dirección</a></li>
          </ul>
          <form class="form-horizontal"> 
          <div class="tab-content" >             
            <div class="active tab-pane" id="activity">             
              <div class="form-group">
                <label for="nombre_empresa" class="col-sm-3 control-label">Nombre Empresa</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Nombre empresa" id="nombre_empresa" name="nombre_empresa" autofocus>                          
                  </div>
              </div>               
              <div class="form-group">
                <label for="registro_fiscal" class="col-sm-3 control-label">Registro Fiscal</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="Cuit" id="registro_fiscal" name="registro_fiscal">               
                  <span class="help-block small">example: 33-xxxxxxxx-9</span>                
                </div>
              </div>              
              <div class="form-group">
                <label for="sitio_web" class="col-sm-3 control-label">Sitio Web</label>
                <div class="col-sm-9">
                  <input type="url" class="form-control" id="sitio_web" name="sitio_web">
                </div>
              </div>
              <div class="form-group">
                <label for="telefono" class="col-sm-3 control-label">Teléfono Empresa</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" placeholder="Telefono empresa" id="telefono" name="telefono"> 
                  <span class="help-block small">example: 342xxxxxxx</span>                 
                </div>
              </div>              
            </div>           
            <div class="tab-pane" id="timeline">             
              <div class="form-group">
                <label for="nombre_cliente" class="col-sm-3 control-label">Nombres</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="Nombres" id="nombre_cliente" name="nombre_cliente">                
                </div>
              </div>
              <div class="form-group">
                <label for="apellido" class="col-sm-3 control-label">Apellidos</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="Apellidos" id="apellido" name="apellido">                  
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Correo Electrónico</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" placeholder="correro electronico" id="email" name="email"> 
                                   
                </div>
              </div>
              <div class="form-group">
                <label for="telefono_contacto" class="col-sm-3 control-label">Teléfono Contacto</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" placeholder="Telefono contacto" id="telefono_contacto" name="telefono_contacto">
                  <span class="help-block small">example: 342xxxxxxx</span>                  
                </div>
              </div>              
            </div>
            <div class="tab-pane" id="settings">               
              <div class="form-group">
                <label for="calle" class="col-sm-3 control-label">Calle</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="calle" name="calle">
                </div>
              </div>
              <div class="form-group">
                <label for="ciudad" class="col-sm-3 control-label">Ciudad</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="ciudad" name="ciudad">
                </div>
              </div>
              <div class="form-group">
                <label for="provincia" class="col-sm-3 control-label">Región/Provincia</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="provincia" name="provincia">
                </div>
              </div>
              <div class="form-group">
                <label for="codigo_postal" class="col-sm-3 control-label">Código Postal</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="codigo_postal" name="codigo_postal">
                </div>
              </div>
              <div class="form-group">
                <label for="pais" class="col-sm-3 control-label">País</label>
                <div class="col-sm-9">
                  <select class="form-control" name="pais_id" id="pais_id">
                    <option value="0">Selecciona</option>		
                    <option value="1">Argentina</option>																
                  </select>
                </div>
              </div>             
            </div>          
          </div>
          </form>
        </div>        
      </div>
      <div class="modal-footer" id="modal-footer">
        <input type="hidden" name="action" id="action"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="guardar_datos" class="btn btn-primary add">Registrar</button>
      </div>    
    </div>
  </div>  
</form>  
</div>  


@stop

@push('styles')
  <link rel="stylesheet" href="/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">  
@endpush

@push('scripts')
  <script src="/adminlte/bower_components/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> 
 
  <script>    
    $(function () {  

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }          
      });      

      $('#clientes_table').DataTable({        
        responsive  : true,
        processing  : true,        
        serverSide  : true,
        ajax        : '{!! route('customers.table') !!}',                      
        columns     :  [
          {data: 'id',                name: 'id'},
          {data: 'registro_fiscal',   name: 'registro_fiscal'},          
          {data: 'cliente',           name: 'cliente'},
          {data: 'direccion',         name: 'direccion'},
          {data: 'contacto',          name: 'contacto'},
          {data: 'accion',            name: 'accion'}                   
        ], 
        order: [ [0, 'desc'] ],      
        aoColumnDefs: [
            { "bSortable": true, "aTargets": [0] },
            { "sWidth": "20px", "aTargets": [0] },
            { "sWidth": "50px", "aTargets": [1,2,3] },
            { "sWidth": "80px", "aTargets": [4] },
            { "sWidth": "20px", "aTargets": [5] },
        ],
        bAutoWidth  : false         
      });  

      $('#createNewClient').click(function(e) {   
        event.preventDefault();     
        $('#modal_agregar').modal('show');
      }); 

      $('.modal-footer').on('click', '.add', function(e){
        event.preventDefault();

        var form_data = $('#form_agregar').serialize();
      
        $('.help-block').remove();
        $('.form-group').find('div:first').removeClass('has-error');
             
        $.ajax({
          data: form_data,
          url: "{{ route('customers.clientes.store') }}",         
          dataType: 'json',
          type: 'POST',
          success: function (data){           
            
            $('#form_agregar').trigger('reset');         
            $('#modal_agregar').modal('hide'); 
            $('#clientes_table').DataTable().ajax.reload();  
            swal({
                type : 'success',
                title : 'Success!',
                text : 'Data has been saved!'
            });
          },
          error : function(xhr){
            var res = xhr.responseJSON;            
            if($.isEmptyObject(res) == false){
              $.each(res.errors, function (key, value){
                $('#' + key)                 
                  .closest('.form-group').find('div:first')       
                  .addClass('has-error')                      
                  .append('<span class="help-block"><strong>' + value + '</strong></span>');                   
                  validaForm();                
              });
            } 
          }
        });        
      });    
      function validaForm(){
        // Campos de texto      
        if($("#nombre_empresa").val() == ""){  
            $('#empresa').tab('show');          
            $("#nombre_empresa").focus(); 
            return false;
        }
        if($("#registro_fiscal").val() == ""){    
            $('#empresa').tab('show');       
            $("#registro_fiscal").focus();
            return false;
        }
        if($("#telefono").val() == ""){     
            $('#empresa').tab('show');      
            $("#telefono").focus();
            return false;
        }
        if($("#nombre_cliente").val() == ""){
            $('#contacto').tab('show');            
            $("#nombre_cliente").focus(); 
            return false;
        }
        if($("#apellido").val() == ""){ 
            $('#contacto').tab('show');              
            $("#apellido").focus();
            return false;
        }
        if($("#email").val() == ""){  
            $('#contacto').tab('show');             
            $("#email").focus();
            return false;
        }
        if($("#telefono_contacto").val() == ""){  
            $('#contacto').tab('show');             
            $("#telefono_contacto").focus();
            return false;
        }
        return true; // Si todo está correcto
      } 
    });
  </script>  
@endpush   





    
  



