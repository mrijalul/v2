<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#slf{{ $ijin_lingkungan->id }}">
	@if(is_null($ijin_lingkungan->slf))
	<i class="fa fa-cloud-upload" aria-hidden="true"></i>
	@else
	<i class="fa fa-pencil" aria-hidden="true"></i>
	@endif
</button>

<!-- Modal -->
<div class="modal fade" id="slf{{ $ijin_lingkungan->id }}" tabindex="-1" role="dialog" aria-labelledby="slf{{ $ijin_lingkungan->id }}Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="slf{{ $ijin_lingkungan->id }}Label">
					@if(is_null($ijin_lingkungan->slf))
						Upload Dokumen
					@else
						Edit Dokumen
					@endif
					SLF (Sertifikat Laik Fungsi) (Maks 5MB)</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{ Form::model($ijin_lingkungan, ['route'=>['pemohon.perijinan.upload_perizinan', $perijinan->slug_perijinan,$ijin_lingkungan->id],'method'=>'POST','files'=>true]) }}
				@method('PATCH')
			<div class="modal-body">
				<div class="form-group" style="display: none;">
					{{ Form::text('tipe_data','data_slf',['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::file('slf',['class'=>'form-control-file','aria-describedby'=>'id_slf','accept'=>'application/pdf']) }}
					<small class="form-text text-muted" id="id_slf"><code>Maks. 5MB, hanya PDF saja</code></small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">@if(is_null($ijin_lingkungan->slf))
					Upload Dokumen
				@else
					Edit Dokumen
				@endif</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>