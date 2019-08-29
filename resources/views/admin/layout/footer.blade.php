<!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="#">Abc-Simple</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <div class="modal fade" id="cambiarClave" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">

          <div class="modal-header" style="background-color: #73879C; color: white;border-radius: 5px 5px 0px 0px;">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title text-center" id="myModalLabel">Cambiar Clave</h4>
          </div>
            <form action="" method="post">
          <div class="modal-body">
            	<div class="form-group">
                <label for="varchar">Clave Actual</label>
                <input type="password" class="form-control" name="clave_act" id="clave_act" placeholder="Clave Actual" value="" required maxlength="18" minlength="8"/>
            </div>
            <br>
            	<div class="form-group">
                <label for="varchar">Clave Nueva</label>
                <input type="password" class="form-control" name="clave_new" id="clave_new" placeholder="Clave Nueva" value="" required maxlength="18" minlength="8"/>
            </div>
            	<div class="form-group">
                <label for="varchar">Confirme Clave Nueva</label>
                <input type="password" class="form-control" name="clave_new2" id="clave_new2" placeholder="Confirme Clave Nueva" value="" required maxlength="18" minlength="8"/>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Cambiar</button>
          </div>
            </form>
        </div>
      </div>
    </div>