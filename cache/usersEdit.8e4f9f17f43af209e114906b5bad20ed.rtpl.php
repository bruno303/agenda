<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<a href="/admin/students"><button class="btn btn-large btn-default">Back</button></a>
			<br/><br/>
			<form role="form" method="post" action="/students/<?php echo htmlspecialchars( $ID_STUDENT, ENT_COMPAT, 'UTF-8', FALSE ); ?>" onsubmit="return confirm('Deseja realmente alterar o registro?')">
				<div class="form-group">
					<label for="inpId">ID</label>
					<input class="form-control" name="inpId" type="text" value="<?php echo htmlspecialchars( $ID_STUDENT, ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly="true" required="true" />
				</div>
				<div class="form-group">
					<label for="inpName">Name</label>
					<input class="form-control" name="inpName" type="text" value="<?php echo htmlspecialchars( $NAME, ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="true"/>
				</div>
				<div class="form-group">
					<label for="inpRa">RA</label>
					<input class="form-control" name="inpRa" type="text" value="<?php echo htmlspecialchars( $RA, ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="true"/>
				</div>
				<div class="form-group">
					<label for="inpLogin">Login</label>
					<input class="form-control" name="inpLogin" type="text" value="<?php echo htmlspecialchars( $LOGIN, ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="true"/>
				</div>
				<div class="form-group">
					<label for="inpPassword">Password</label>
					<input class="form-control" name="inpPassword" type="password" value="<?php echo htmlspecialchars( $PASSWORD, ENT_COMPAT, 'UTF-8', FALSE ); ?>" required="true"/>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="inpAdmin" <?php if( $IS_ADMIN == 1 ){ ?>checked="true"<?php } ?>/> Admin</label>
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