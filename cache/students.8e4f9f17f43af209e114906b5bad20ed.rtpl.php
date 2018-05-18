<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<a href="/admin/students"><button class="btn btn-large btn-default">Back</button></a>
			<br/><br/>
			<form role="form" method="post" action="/students">
				<div class="form-group">
					<label for="inpName">Name</label>
					<input class="form-control" name="inpName" type="text" required="true"/>
				</div>

				<div class="form-group">
					<label for="inpRa">RA</label>
					<input class="form-control" name="inpRa" type="text" required="true"/>
				</div>
				<div class="form-group">
					<label for="inpLogin">Login</label>
					<input class="form-control" name="inpLogin" type="text" required="true"/>
				</div>
				<div class="form-group">
					<label for="inpPassword">Password</label>
					<input class="form-control" name="inpPassword" type="password" required="true"/>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="inpAdmin"/> Admin</label>
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="inpActive" checked="true"/> Active</label>
				</div>
				<br/>
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>