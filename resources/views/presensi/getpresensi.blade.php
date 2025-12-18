<?php
function selisih($jam_batas, $jam_masuk)
{
    if (!$jam_batas || !$jam_masuk) return "-";
    if (!str_contains($jam_batas, ':') || !str_contains($jam_masuk, ':')) return "-";

    list($h, $m, $s) = explode(":", $jam_batas);
    $dtBatas = mktime((int)$h, (int)$m, (int)$s, 1, 1, 1);
    
    list($h, $m, $s) = explode(":", $jam_masuk);
    $dtMasuk = mktime((int)$h, (int)$m, (int)$s, 1, 1, 1);
    
    $dtSelisih = $dtMasuk - $dtBatas;

    if ($dtSelisih <= 0) {
        return "Tepat Waktu";
    }

    $jam = floor($dtSelisih / 3600);
    $menit = floor(($dtSelisih % 3600) / 60);

    return $jam . " Jam : " . $menit . " Menit";
}
?>
@if ($presensi->count())
    @foreach ($presensi as $d)
        <tr>
            <td style="text-align:center;">{{ $loop->iteration }}</td>
            <td>{{ $d->nisn }}</td>
            <td>{{ $d->nama_lengkap }}</td>
            <td style="text-align:center;">{{ $d->kelas }}</td>
            <td>{{ $d->kode_jurusan }}</td>
            <td style="text-align:center;">
                {{ $d->jam_in ?? 'Kosong' }}
            </td>
            <td style="text-align:center;">
                {!! $d->jam_out 
                    ? $d->jam_out 
                    : '<span class="badge bg-danger">Belum Absen</span>' 
                !!}
            </td>
            <td style="text-align:center;">
                @if(!$d->jam_out)
                    <span class="badge bg-purple" style="background:#6f42c1;">Bolos</span>
                @else
                    @if($d->jam_in && $d->jam_in >= $jamMasuk)
                        @php $jamterlambat = selisih($jamMasuk, $d->jam_in); @endphp
                        <span class="badge bg-danger">
                            Terlambat<br>{{ $jamterlambat }}
                        </span>
                    @elseif($d->jam_in)
                        <span class="badge bg-success">Tepat Waktu</span>
                    @else
                        <span class="badge bg-warning">Belum Absen</span>
                    @endif
                @endif
            </td>
            <td>
                <!-- tombol masuk & pulang (tidak diubah) -->
            </td>
            <td>
                <!-- tombol edit (tidak diubah) -->
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="10" class="text-center text-muted">
            Tidak ada data presensi
        </td>
    </tr>
@endif
<script>
    $(function(){
        $(".peta_jam_masuk").click(function(e){
            var id = $(this).attr("id");
            $.ajax({
                type:'POST',
                url:'/peta_jam_masuk',
                data:{
                    _token:"{{ csrf_token() }}",
                    id: id
                },
                cache:false,
                success:function(respond){
                    $("#loadmap_jam_masuk").html(respond);
                }
            });
            $("#modal-peta_jam_masuk").modal("show");
        });
        $(".peta_jam_pulang").click(function(e){
            var id = $(this).attr("id");
            $.ajax({
                type:'POST',
                url:'/peta_jam_pulang',
                data:{
                    _token:"{{ csrf_token() }}",
                    id: id
                },
                cache:false,
                success:function(respond){
                    $("#loadmap_jam_pulang").html(respond);
                }
            });
            $("#modal-peta_jam_pulang").modal("show");
        });
        $(".edit_keterangan_absen").click(function(e){
            var id = $(this).attr("id");
            $.ajax({
                type:'POST',
                url:'/edit_keterangan_absen',
                data:{
                    _token:"{{ csrf_token() }}",
                    id: id
                },
                cache:false,
                success:function(respond){
                    $("#modal_edit_keterangan_absen").html(respond);
                }
            });
            $("#modal-edit_keterangan_absen").modal("show");
        });

        $('#modal-peta_jam_masuk').on('hidden.bs.modal', function () {
            $('#loadmap_jam_masuk').html('');
        });
        $('#modal-peta_jam_pulang').on('hidden.bs.modal', function () {
            $('#loadmap_jam_pulang').html('');
        });
    });
</script>