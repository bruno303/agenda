<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<a href="/"><button class="btn btn-large btn-default">Back</button></a>
			<br/><br/>
			<form role="form" method="post" action="/events/<?php echo htmlspecialchars( $ID_EVENT, ENT_COMPAT, 'UTF-8', FALSE ); ?>" onsubmit="return confirm('Deseja realmente alterar o registro?')">
				<div class="form-group">
					<label for="inpId">ID</label>
					<input class="form-control" name="inpId" type="text" value="<?php echo htmlspecialchars( $ID_EVENT, ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly="true" required="true" />
				</div>
				<div class="form-group">
					<label for="inpDescription">Description</label>
					<input class="form-control" name="inpDescription" type="text" value="<?php echo htmlspecialchars( $DESCRIPTION, ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="true"/>
				</div>
				<div class="form-group">
					<label for="inpDate">Date</label>
					<input class="form-control" name="inpDate" type="date" value=<?php echo htmlspecialchars( $DT_EVENT, ENT_COMPAT, 'UTF-8', FALSE ); ?> required="true"/>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="inpActive" <?php if( $ACTIVE == 1 ){ ?>checked="true"<?php } ?>/> Active</label>
				</div>
				<br/>
				<button type="submit" class="btn btn-primary">Alter</button>
			</form>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>