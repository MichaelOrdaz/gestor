			<div class="modal fade" id="videoModal" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" type="button" data-dismiss="modal">&times;</button>
							<h1 class="modal-title"> Nombre del video</h1>
						</div>
						<div class="modal-body">
							<video preload="auto" id="demo" data-vt="" class="center-block" >
								<source src="#" type="video/mp4"></source>
								Video ó recurso <code>video</code> no disponible.
							</video>
							<!-- controller video -->
							<br>
							<div class="text-center">
								<button type="button" title="Play" id="play" class="btn btn-primary ib"> <span class="glyphicon glyphicon-play"></span> </button>
								<button type="button" title="Bajar Volumen" id="minVol" class="btn btn-primary ib"> <span class="glyphicon glyphicon-volume-down"></span></button>
								<button  type="button" title="Subir Volumen" id="maxVol" class="btn btn-primary ib"> <span class="glyphicon glyphicon-volume-up"></span> </button>
							</div>
							<br>
							<!-- end controller video -->
							<div id="desVideo"></div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal" type="button">Cerrar</button>
						</div>
					</div>
				</div>
			</div>

			<div id="contextMenu" class="dropdown clearfix">
		    	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
		      		<li><a tabindex="-1" id="edit" href="#">Editar</a></li>
		      		<li><a tabindex="-1" id="questions" href="#">Agregar Preguntas</a></li>
		      		<li><a tabindex="-1" id="delete" href="#">Eliminar</a></li>
		    	</ul>
		  	</div>

<!-- Modal de editar video -->
  				<div class="modal fade" id="modiVideoModal" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" type="button" data-dismiss="modal">&times;</button>
							<h1 class="modal-title"> Nombre del video</h1>
						</div>
						<div class="modal-body">
						
						<form role="form" name="editVideo" enctype="multipart/form-data" id="editVideo" action="#" method="POST">
						<input type="hidden" name="vt" id="vt" />
						<div class="form-group">
							<label for="titulo">Titulo</label>
							<input type="text" name="titulo" class="form-control" id="titulo" maxlength="100" placeholder="Agregar Titulo al video" required />
						</div>
						<div class="form-group">
							<label for="descrip">Descripción</label>
							<textarea name="descrip" id="descrip" class="form-control" placeholder="Breve Descripción" maxlength="200"></textarea>
						</div>
						<div class="form-group">
							<label for="video">Elegir video</label>
							<input type="file" name="video" id="video"/>
							<div id="msgFile"></div>
						</div>
						<button type="submit" class="btn btn-primary btn-block btn-lg">Guardar</button>
						</form>
						
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal" type="button">Cerrar</button>
						</div>
					</div>
				</div>
			</div>