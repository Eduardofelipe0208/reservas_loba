<div class="content-wrapper" style="min-height: 717px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Embarcaciones</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Embarcaciones</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          <!-- Default box -->
          <div class="card card-info card-outline">

            <div class="card-header">

              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearEmbarcacion">Crear nuevo tipo de Embarcacion</button>  

            </div>
            <!-- /.card-header -->

            <div class="card-body">

              <table class="table table-bordered table-striped dt-responsive tablaEmbarcaciones" width="100%">

                <thead>

                  <tr>

                    <th style="width:10px">#</th> 
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Acciones</th>          

                  </tr>   

                </thead>

                <tbody>
                  
                <!--   <tr>
              
                    <td>1</td>

                    <td>
                      Romántico
                    </td> 

                    <td>
                      <img src="vistas/img/embarcaciones/embarcaciones-medianas.jpg" class="img-fluid">
                    </td>

                    <td>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas suscipit quis eligendi voluptatibus dolore libero quasi delectus odit impedit optio eius corporis cumque numquam aliquid repudiandae quisquam dolor explicabo, totam.
                    </td> 

                    <td>
                      <div class="btn-group">
                        <button class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt text-white"></i></button>  
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                      </div>  
                    </td>

                  </tr>
 -->

                </tbody>



              </table>
              
            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->

        </div>

      </div>

    </div>

  </section>
  <!-- /.content -->

</div>

<!--=====================================
Modal Crear Embarcacion
======================================-->

<div class="modal" id="crearEmbarcacion">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!-- Modal Header -->
        <div class="modal-header bg-info">
          <h4 class="modal-title">Crear Embarcacion</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <div class="input-group mb-3">
           
            <div class="input-group-append input-group-text">
              <span class="fas fa-suitcase-rolling"></span>
            </div>

            <input type="text" class="form-control" name="tipoEmbarcacion" placeholder="Ingresa el nombre del Embarcacion" required> 

          </div>

          <div class="form-group">

            <div class="form-group my-2">

              <div class="btn btn-default btn-file">

                  <i class="fas fa-paperclip"></i> Adjuntar Imagen del Embarcacion 

                  <input type="file" name="subirImgEmbarcacion">
                 
              </div>

              <img class="previsualizarImgEmbarcacion img-fluid py-2">

               <p class="help-block small">Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>

            </div>

            <p>Escriba la descripción del tipo de Embarcacion:</p>

            <textarea id="descripcionEmbarcacion" name="descripcionEmbarcacion" style="width: 100%"></textarea>

          </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-between">

          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

        </div>

        <?php

          $registroEmbarcacion = new ControladorEmbarcaciones();
          $registroEmbarcacion -> ctrRegistroEmbarcacion();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
Modal Editar Embarcacion
======================================-->

<div class="modal" id="editarEmbarcacion">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!-- Modal Header -->
        <div class="modal-header bg-info">
          <h4 class="modal-title">Editar Embarcacion</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <input type="hidden" class="form-control" name="idEmbarcacion">

          <div class="input-group mb-3">
           
            <div class="input-group-append input-group-text">
              <span class="fas fa-suitcase-rolling"></span>
            </div>

            <input type="text" class="form-control" name="editarEmbarcacion" required> 

          </div>

          <div class="form-group">

            <div class="form-group my-2">

              <div class="btn btn-default btn-file">

                  <i class="fas fa-paperclip"></i> Cambiar imagen del Embarcacion 

                  <input type="file" name="editarImgEmbarcacion">

                  <input type="hidden" name="imgEmbarcacionActual">
                 
              </div>

              <img class="previsualizarImgEmbarcacion img-fluid py-2">

               <p class="help-block small">Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>

            </div>

            <p>Escriba la descripción del Embarcacion:</p>

            <textarea id="editarDescripcionEmbarcacion" name="editarDescripcionEmbarcacion" style="width: 100%"></textarea>

          </div>

          <div class="input-group mb-3">
           

        </div>

        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-between">

          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

        </div>

        <?php

          //$editarEmbarcacion = new ControladorEmbarcaciones();
          //$editarEmbarcacion -> ctrEditarEmbarcacion();

        ?>

      </form>

    </div>

  </div>

</div>