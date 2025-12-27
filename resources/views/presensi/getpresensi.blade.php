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
                {!! $d->jam_in 
                    ? $d->jam_in 
                    : '<span class="badge bg-danger">Kosong</span>' 
                !!}
            </td>
            <td style="text-align:center;">
                {!! $d->jam_out 
                    ? $d->jam_out 
                    : '<span class="badge bg-danger">Kosong</span>' 
                !!}
            </td>
            <td style="text-align:center;">
                @if(!$d->jam_out)

                    @if($d->status_izin == 'i')
                        <span class="badge" style="background:#e0a800;color:white;">Izin</span>

                    @elseif($d->status_izin == 's')
                        <span class="badge bg-info">Sakit</span>

                    @elseif(!$d->jam_in && !$d->jam_out)
                        <span class="badge bg-danger">Alfa</span>

                    @else
                        <span class="badge bg-purple" style="background:#6f42c1;">Bolos</span>
                    @endif

                @else

                    @if($d->jam_in && $d->jam_in >= $jamMasuk)
                        @php $jamterlambat = selisih($jamMasuk, $d->jam_in); @endphp
                        <span class="badge" style="background:#fd7e14;color:white;">
                            Terlambat<br>{{ $jamterlambat }}
                        </span>

                    @elseif($d->jam_in)
                        <span class="badge bg-success">Tepat Waktu</span>

                    @else
                        <span class="badge bg-purple" style="background:#6f42c1;">Belum Absen</span>
                    @endif

                @endif
            </td>
            <td>
                <a href="#" class="btn btn-primary peta_jam_masuk" id="{{ $d->id }}" style="font-size:8pt; padding:2px 6px; height:auto; line-height:1;">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-map-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5" /><path d="M9 4v13" /><path d="M15 7v5.5" /><path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" /><path d="M19 18v.01" /></svg>
                    Masuk
                </a>
                <a href="#" class="btn btn-primary peta_jam_pulang" id="{{ $d->id }}" style="font-size:8pt; padding:2px 6px; height:auto; line-height:1;">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-map-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5" /><path d="M9 4v13" /><path d="M15 7v5.5" /><path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z" /><path d="M19 18v.01" /></svg>
                    Pulang
                </a>
            </td>
            <td style="text-align:center;">
                @if(
                    (!$d->jam_in || !$d->jam_out)
                    && !in_array($d->status_izin, ['i', 's'])
                )
                    <a href="#"
                       class="btn btn-secondary edit_keterangan_absen"
                       id       = "{{ $d->id }}"
                       nisn     = "{{ $d->nisn }}"
                       tanggal  = "{{ $tanggal }}"
                       style="font-size:8pt; padding:2px 6px; height:auto; line-height:1;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit-circle">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
                            <path d="M16 5l3 3" />
                            <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6" />
                        </svg>
                        Edit
                    </a>
                @else
                    <a href="#"
                       class="btn btn-secondary edit_keterangan_absen"
                       id       = "{{ $d->id }}"
                       nisn     = "{{ $d->nisn }}"
                       tanggal  = "{{ $tanggal }}"
                       style="font-size:8pt; padding:2px 6px; height:auto; line-height:1;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-article">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                            <path d="M7 8h10" />
                            <path d="M7 12h10" />
                            <path d="M7 16h10" />
                        </svg>
                        Bukti
                    </a>
                @endif
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
                type    :'POST',
                url     :'/peta_jam_masuk',
                data    :{
                    _token  :"{{ csrf_token() }}",
                    id      : id
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
                type    :'POST',
                url     :'/peta_jam_pulang',
                data    :{
                    _token  :"{{ csrf_token() }}",
                    id      : id
                },
                cache:false,
                success:function(respond){
                    $("#loadmap_jam_pulang").html(respond);
                }
            });
            $("#modal-peta_jam_pulang").modal("show");
        });
        $(".edit_keterangan_absen").click(function(e){
            var id      = $(this).attr("id") ?? null;
            var nisn    = $(this).attr("nisn");
            var tanggal = $(this).attr("tanggal");
            $.ajax({
                type    :'POST',
                url     :'/edit_keterangan_absen',
                data    :{
                    _token  :"{{ csrf_token() }}",
                    id      : id,
                    nisn    : nisn,
                    tanggal : tanggal
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