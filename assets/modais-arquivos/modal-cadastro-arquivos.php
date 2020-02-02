<style>

.column {
  float: left;
  width: 25%;
  padding: 10px;
}

.column img {
  opacity: 0.8;
  cursor: pointer;
}

.column img:hover {
  opacity: 1;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.container {
  position: relative;
  display: none;
}

.closebtn {
  position: absolute;
  top: 10px;
  right: 15px;
  color: white;
  font-size: 35px;
  cursor: pointer;
}

.img_contorno, .img_principal{
  /* box-sizing: border-box; */
  border:4px double #3e3e3e;
}
</style>

<!-- listar/baixar relatorio escolhido -->

<div class="modal fade moda-lg" id="modalBaixar_arquivos"  tabindex="-1" role="dialog" aria-labelledby="modalBaixar_arquivos"
aria-hidden="true" style="width: 100%;">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header" style="background-color:#4287f5; color:white;">
      <h5 class="modal-title"><i class="fas fa-file-archive"></i> Relatório</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="modal-body topoImagem">

      <div class="container img_principal galeria_principal">
        <span onclick="this.parentElement.style.display='none'" class="closebtn" style="color:#424242;"><i class="fas fa-window-close"></i></span>
        <img id="expandedImg" style="width:100%;">
      </div>

      <br>

      <div class="row galeria">

      </div>

      <div class="row">

        <div class="col-md-12">
          <hr>
          <p id="txtTitulo_relatorio" style="font-size:20px;"></p>
        </div>

        <div class="col-md-12 mt-3">
          <h5 clas=""  style="font-size:20px;">Descrição: <br>
            <p class="txtDescricao_relatorio text-justify mt-1" style="font-size:15px;">
            </p>
          </h5>

          <div class="btn_baixar mt-3"></div>
        </div>

      </div>
    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
        <i class="fas fa-times-circle"></i> Fechar
      </button>
    </div>

  </div>

</div>
</div>
