<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<a href="/"><button class="btn btn-large btn-default">Back</button></a>
			<br/><br/>
			<form role="form" method="post" action="/events/">
				<div class="form-group">
					<label for="inpDescription">Description</label>
					<input class="form-control" name="inpDescription" type="text"/>
				</div>
				<div class="form-group">
					<label for="inpDate">Date</label>
					<input class="form-control" name="inpDate" type="date" />
				</div>
				<div class="checkbox">
					<label><input type="checkbox" name="inpActive" checked="true" /> Active</label>
				</div>
				<br/>
				<button type="submit" class="btn btn-primary">Create</button>
			</form>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>