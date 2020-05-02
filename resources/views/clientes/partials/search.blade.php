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
      <button type="button" class="btn btn-default" id="#mod_agregar" data-toggle="modal" data-target="#modal_agregar"><i class="fa fa-plus"></i> Nuevo</button>
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
<!-- fin search-blade    -->