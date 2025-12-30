<div class="modal-header">
    <h5 class="modal-title">
        Bukti Keterangan Absen
    </h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

    @if(!$izin)
        <div class="alert alert-warning text-center">
            Tidak ada data izin / sakit pada tanggal
            <strong>{{ tanggalIndo($tanggal) }}</strong>
        </div>
    @else

        <table class="table table-bordered">
            <tr>
                <th width="40%">Nama Murid</th>
                <td>{{ $presensi->nama_lengkap ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ tanggalIndo($tanggal) }}</td>
            </tr>
            <tr>
                <th>Status Absen</th>
                <td>
                    @if($izin->status == 'i')
                        <span class="badge" style="background:#f1c40f;color:#000;">
                            Izin
                        </span>
                    @elseif($izin->status == 's')
                        <span class="badge bg-info">
                            Sakit
                        </span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $izin->keterangan }}</td>
            </tr>
        </table>

        <div class="mt-3">
            <label class="fw-bold mb-2">Bukti Izin / Sakit</label>

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

    @endif

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
        Tutup
    </button>
</div>