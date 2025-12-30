<div class="modal-body">
    <div class="mt-3">
        @if($izin->bukti_izin)
            <div class="text-center">
                <img src="{{ asset('storage/uploads/bukti_izin/'.$izin->bukti_izin) }}"
                     class="img-fluid rounded shadow"
                     style="max-height:350px;">
            </div>
        @else
            <div class="alert alert-secondary text-center">
                Tidak ada file bukti
            </div>
        @endif
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
        Tutup
    </button>
</div>