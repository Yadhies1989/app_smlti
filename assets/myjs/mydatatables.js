// fungsi tanggal indonesia
function convertDateDBtoIndo(string) {
	bulanIndo = [
		"",
		"Januari",
		"Februari",
		"Maret",
		"April",
		"Mei",
		"Juni",
		"Juli",
		"Agustus",
		"September",
		"Oktober",
		"November",
		"Desember",
	];

	tanggal = string.split("-")[2];
	bulan = string.split("-")[1];
	tahun = string.split("-")[0];

	return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
}
// data tables
$(function () {
	$("#example1").DataTable({
		responsive: true,
		autoWidth: false,
		pageLength: 25,
	});
	$("#example2").DataTable({
		paging: true,
		lengthChange: false,
		searching: false,
		ordering: true,
		info: true,
		autoWidth: false,
		responsive: true,
		pageLength: 50,
	});
});
// sweet alert
const flashData = $(".flash-data").data("flashdata");
// console.log(flashData);
if (flashData) {
	Swal.fire({
		icon: "success",
		title: "Good Job",
		text: "Data Berhasil " + flashData,
	});
}
// sweet alert gagal upload
const namaMenu = $(".nama-menu").data("namamenu");
// console.log(namaMenu);

if (namaMenu) {
	Swal.fire({
		icon: "warning",
		title: "Cek Kembali",
		text: namaMenu,
	});
}
// untuk memberi label form upload
$(".custom-file-input").on("change", function () {
	let fileName = $(this).val().split("\\").pop();
	$(this).next(".custom-file-label").addClass("selected").html(fileName);
});

// form check role management

$(".form-check-input").on("click", function () {
	const menuId = $(this).data("menu");
	const roleId = $(this).data("role");

	$.ajax({
		// url: "<?php echo base_url('admin/changeaccess'); ?>",
		url: baseURL + "admin/changeaccess",
		type: "post",
		data: {
			menuId: menuId,
			roleId: roleId,
		},

		success: function () {
			document.location.href =
				// "<?php echo base_url('admin/roleaccess/'); ?>" + roleId;
				baseURL + "admin/roleaccess/" + roleId;
		},
	});
});
// laporan transaksi perbulan

window.onload = fnKaryawan(0);

function fnKaryawan(x) {
	// console.log(x);

	$.ajax({
		type: "GET",
		url: baseURL + "transaction/load_karyawan",
		async: true,
		data: {
			karyawan: x,
		},
		dataType: "JSON",
		success: function (data) {
			var html = "";
			var i;
			var no = 1;
			var stringKosong = "Tidak Ada Data";

			var yadhies = data.map(function (elem) {
				return parseInt(elem.total_harga);
			});

			let total = yadhies.reduce((val, nilaiSekarang) => {
				return val + nilaiSekarang;
			}, 0);

			if (data.length === 0) {
				html +=
					"<tr>" +
					'<td colspan="5" class="text-center">' +
					stringKosong +
					"</td>" +
					"</tr>";
			} else {
				for (i = 0; i < data.length; i++) {
					html +=
						"<tr>" +
						"<td>" +
						no++ +
						"</td>" +
						"<td>" +
						data[i].nama_transaksi +
						"</td>" +
						"<td>" +
						convertDateDBtoIndo(data[i].tgl_transaksi) +
						"</td>" +
						"<td>" +
						data[i].total_harga +
						"</td>" +
						"<td>" +
						data[i].keterangan +
						"</td>" +
						"</tr>";
				}
			}
			$("#show_data").html(html);
			$("#total_jumlah").val(total);
		},
	});
}
