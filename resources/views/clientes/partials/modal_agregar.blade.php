<div class="modal fade" id="modal_agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<!-- @if (session()->has('flash'))
  <div id="alert" class="alert alert-success">{{ session('flash') }}</div>
@endif -->
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
      <div class="modal-body" id="modal-body">        
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#activity" data-toggle="tab">Empresa</a></li>
            <li><a href="#timeline" data-toggle="tab">Contacto</a></li>
            <li><a href="#settings" data-toggle="tab">Dirección</a></li>
          </ul>
          <form class="form-horizontal"> 
          <div class="tab-content" >             
            <div class="active tab-pane" id="activity">             
              <div class="form-group {{ $errors->has('nombre_empresa') ? 'has-error' : ''}}">
                <label for="nombre_empresa" class="col-sm-3 control-label">Nombre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ old('nombre_empresa')}}" placeholder="Nombre empresa" id="nombre_empresa" name="nombre_empresa">
                    {!! $errors->first('nombre_empresa', '<span class="help-block">:message</span>') !!}
                  </div>
              </div>
              <div class="form-group {{ $errors->has('registro_fiscal') ? 'has-error' : ''}}">
                <label for="registro_fiscal" class="col-sm-3 control-label">Registro fiscal</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ old('registro_fiscal')}}" placeholder="Cuil" id="registro_fiscal" name="registro_fiscal">
                  {!! $errors->first('registro_fiscal', '<span class="help-block">:message</span>') !!}
                </div>
              </div>
              <div class="form-group">
                <label for="sitio_web" class="col-sm-3 control-label">Sitio Web</label>
                <div class="col-sm-9">
                  <input type="url" class="form-control" id="sitio_web" name="sitio_web">
                </div>
              </div>
              <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                <label for="telefono" class="col-sm-3 control-label">Teléfono</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ old('telefono')}}" placeholder="Telefono empresa" id="telefono" name="telefono">
                  {!! $errors->first('telefono', '<span class="help-block">:message</span>') !!}
                </div>
              </div>              
            </div>           
            <div class="tab-pane" id="timeline">             
              <div class="form-group {{ $errors->has('nombre_cliente') ? 'has-error' : ''}}">
                <label for="nombre_cliente" class="col-sm-3 control-label">Nombres</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ old('nombre_cliente')}}" placeholder="Nombres" id="nombre_cliente" name="nombre_cliente">
                  {!! $errors->first('nombre_cliente', '<span class="help-block">:message</span>') !!}
                </div>
              </div>
              <div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
                <label for="apellido" class="col-sm-3 control-label">Apellidos</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ old('apellido')}}" placeholder="Apellidos" id="apellido" name="apellido">
                  {!! $errors->first('apellido', '<span class="help-block">:message</span>') !!}
                </div>
              </div>
              <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email" class="col-sm-3 control-label">Correo Electrónico</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" value="{{ old('email')}}" placeholder="Correo electronico" id="email" name="email">
                  {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
              </div>
              <div class="form-group {{ $errors->has('telefono_contacto') ? 'has-error' : ''}}">
                <label for="telefono_contacto" class="col-sm-3 control-label">Teléfono</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ old('telefono_contacto')}}" placeholder="Telefono contacto" id="telefono_contacto" name="telefono_contacto">
                  {!! $errors->first('telefono_contacto', '<span class="help-block">:message</span>') !!}
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
        <button type="submit" id="guardar_datos" class="btn btn-primary" value="agregar">Registrar</button>
      </div>    
    </div>
  </div>  
</form>  
</div>  







