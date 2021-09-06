<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#detail_syarat9{{ $ijin_siujk->id }}">
	<i class="fa fa-eye" aria-hidden="true"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="detail_syarat9{{ $ijin_siujk->id }}" tabindex="-1" role="dialog" aria-labelledby="detail_syarat9{{ $ijin_siujk->id }}Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detail_syarat9{{ $ijin_siujk->id }}Label">Lihat Dokumen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<embed src="{{ asset('file/syarat9') }}/{{ $ijin_siujk->syarat9 }}" width="100%" height="400vw" />
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>