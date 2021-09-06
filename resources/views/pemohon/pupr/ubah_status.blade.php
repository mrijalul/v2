<td class="text-center">
	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubahstatus{{ $dis->id }}">
		<i class="fa fa-refresh" aria-hidden="true"></i>
	</button>
</td>

<div class="modal fade" id="ubahstatus{{ $dis->id }}" tabindex="-1" role="dialog" aria-labelledby="ubahstatus{{ $dis->id }}_Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ubahstatus{{ $dis->id }}_Label">Ubah Status Pengajuan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{ Form::model($dis, ['route'=>['pemohon.perijinan.update_status', $perijinan->slug_perijinan,$dis->id],'method'=>'POST']) }}
			@method('PATCH')
			<div class="modal-body">
				<div class="form-group">
					{{ Form::label('status_pemohon','Status Pemohon') }}
					{{ Form::select('status_pemohon',$status,$dis->status_id,['placeholder'=>'Pilih Status Pemohon','id'=>'status_pemohon','class'=>'form-control','required']) }}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Update Status</button>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>