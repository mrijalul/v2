<td class="text-center">
	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ubahstatus{{ $dil->id }}">
		<i class="fa fa-refresh" aria-hidden="true"></i>
	</button>
</td>

<div class="modal fade" id="ubahstatus{{ $dil->id }}" tabindex="-1" role="dialog" aria-labelledby="ubahstatus{{ $dil->id }}_Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ubahstatus{{ $dil->id }}_Label">Ubah Status Pengajuan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{ Form::model($dil, ['route'=>['frontOffice.perijinan.update_status', $perijinan->slug_perijinan,$dil->id],'method'=>'POST']) }}
			@method('PATCH')
			<div class="modal-body">
				<div class="form-group">
					{{ Form::label('status_pemohon','Status Pemohon') }}
					<select name="status_pemohon" id="status_pemohon" class="form-control" required="">
						<option value="">- Pilih Status Pemohon -</option>
						@foreach($datastatus as $status)
						<option value="{{ $status->id }}" {{ $dil->status_id == $status->id  ? 'selected' : '' }}>{{ $status->nama_status }}</option>
						@endforeach
					</select>
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