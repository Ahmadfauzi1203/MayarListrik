<!DOCTYPE html>
<html>


<head>
	<title>PT MayarListrik &middot; Invoice -
		{{ $data->id_tagihan }}
	</title>
	<style type="text/css">
		* {
			margin: 0;
		}

		tr>th,
		.content>td {
			border: 1px solid #eee;
			text-align: center;
		}

		table {
			border-collapse: collapse;
		}
	</style>
</head>

<body style="font-family: sans-serif;">
	<div style="background-color: #fafafa;padding: 20px;width:80%">
		<table>
			<tr>
				<td colspan="7" style="text-align: right;font-size:14px;"><span style="cursor:pointer;"
						onclick="window.print();">Cetak Tagihan</span></td>
			</tr>
			<tr>
				<td colspan="4">
					<h2 style="margin-bottom:30px;">PT. MayarListrik Distribusi Subang</h2>
			<tr>
				<td style="font-weight: bold;font-size:14px;">Alamat</td>
				<td colspan="3">Jln. Gajah Mada No.128</td>
				<td></td>
				<td style="font-weight: bold;font-size:14px;">Kepada</td>
				<td colspan="4">
					{{ $data->pelanggan->nama_pelanggan }}
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold;font-size:14px;">Telepon</td>
				<td colspan="3">(0361) 220539</td>
				<td></td>
				<td style="font-weight: bold;font-size:14px;">Bulan Tagih</td>
				<td colspan="4">
					{{ $data->bulan }}
				</td>
			</tr>
			<tr>
				<td style="font-weight: bold;font-size:14px;">Email</td>
				<td colspan="3">support@mayarlistrik.co.id</td>
				<td></td>
				<td style="font-weight: bold;font-size:14px;">Tahun Tagih</td>
				<td colspan="4">
					{{ $data->tahun }}
				</td>
			</tr>
			</td>
			</tr>
			<tr>
				<td colspan="7" style="padding:20px;"></td>
			</tr>
			<tr style="background-color: #fff;">
				<th>No Tagihan</th>
				<th>No Pelanggan</th>
				<th>Tahun Tagih</th>
				<th>Bulan Tagih</th>
				<th>Jumlah Pemakaian</th>
				<th>Total Bayar</th>
				<th>Status</th>
			</tr>
			<tr class="content" style="background-color: #fff;">
				<td>
					{{ $data->id_tagihan }}
				</td>
				<td>
					{{ $data->pelanggan->nomor_kwh }}
				</td>
				<td>
					{{ $data->tahun }}
				</td>
				<td>
					{{ $data->bulan }}
				</td>
				<td>
					{{ $data->jumlah_meter }} kWh
				</td>
				<td>
					Rp. {{ number_format($data->jumlah_meter * $data->pelanggan->tarif->tarifperkwh, 0, ",", ".")}}
				</td>
				<td>
					{{ $data->status }}
				</td>
				</td>
			</tr>
			<tr>
				<td colspan="7" style="padding:20px;"></td>
			</tr>
			<tr>
				<td colspan="7" style="padding:20px 0;">
					Silahkan melakukan pembayaran sejumlah <em>
						Rp. {{ number_format($data->jumlah_meter * $data->pelanggan->tarif->tarifperkwh, 0, ",", ".")}}
					</em> ke Rekening BNI (161810028696), sampai batas akhir tanggal 1 - 10 di awal Bulan.
				</td>
			</tr>
			<tr>
				<td colspan="6"></td>
				<td>
					Subang,
					<?php echo date('d-m-Y'); ?>.
					<br>
					<br>
					<br>
					<br>
					<br>
					Petugas.
				</td>
			</tr>
		</table>
	</div>
	<small>
		@if(Auth::user()->id_level == 1)
		<a href="{{ url('admin/tagihan') }}">Kembali</a>
		@elseif (Auth::user()->id_level == 2)
		<a href="{{ url('admin/tagihan') }}">Kembali</a>
		@else
		<a href="{{ url('/') }}">Kembali</a>
		@endif
	</small>
</body>


</html>