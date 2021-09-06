<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#syarat17{{ $ijin_siujk->id }}">
	@if(is_null($ijin_siujk->syarat17))
	<i class="fa fa-cloud-upload" aria-hidden="true"></i>
	@else
	<i class="fa fa-pencil" aria-hidden="true"></i>
	@endif
</button>

<!-- Modal -->
<div class="modal fade" id="syarat17{{ $ijin_siujk->id }}" tabindex="-1" role="dialog" aria-labelledby="syarat17{{ $ijin_siujk->id }}Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="syarat17{{ $ijin_siujk->id }}Label">
					@if(is_null($ijin_siujk->syarat17))
						Upload Dokumen
					@else
						Edit Dokumen
					@endif
					Sertifikat Keterampilan Kerja (SKT) (Maks 5MB)</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{ Form::model($ijin_siujk, ['route'=>['pemohon.perijinan.upload_perizinan', $perijinan->slug_perijinan,$ijin_siujk->id],'method'=>'POST','files'=>true]) }}
				@method('PATCH')
			<div class="modal-body">
				<div class="form-group" style="display: none;">
					{{ Form::text('tipe_data','data_syarat17',['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::file('syarat17',['class'=>'form-control-file','aria-describedby'=>'id_syarat17','accept'=>'application/pdf']) }}
					<small class="form-text text-muted" id="id_syarat17"><code>Maks. 5MB, hanya PDF saja</code></small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">@if(is_null($ijin_siujk->syarat17))
					Upload Dokumen
				@else
					Edit Dokumen
				@endif</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>