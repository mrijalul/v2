<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#detail_akta_sewa{{ $ijin_pendidikan->id }}">
	<i class="fa fa-eye" aria-hidden="true"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="detail_akta_sewa{{ $ijin_pendidikan->id }}" tabindex="-1" role="dialog" aria-labelledby="detail_akta_sewa{{ $ijin_pendidikan->id }}Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detail_akta_sewa{{ $ijin_pendidikan->id }}Label">Lihat Dokumen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<embed src="{{ asset('file/akta_sewa') }}/{{ $ijin_pendidikan->akta_sewa }}" width="100%" height="400vw" />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>