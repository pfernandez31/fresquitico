<div class="container-fluid pt-5 pb-5">
  <div class="row">
    <div class="col-md-10 offset-md-1">
        <h1>Producto <?php echo $id ?></h1>
        <button id="btnEnviar">Enviar</button>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#btnEnviar").on("click",function(){
			alert("Enviar");
		})
	});
</script>