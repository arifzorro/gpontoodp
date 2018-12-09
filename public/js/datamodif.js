//console.log("tes",$('#table_data').DataTable());
console.log("tes",$('.from_tgl').val());
console.log(window.location.href);
var table = $('#table_data').DataTable({
    dom: 'lBfrtip',
    buttons: [
        {
            extend: 'excel',
            extension: '.xlsx',
            filename: 'listgpon (tanggal export: '+ $app.getCurrentDate('-') +')',
            title: '',
            text: 'Export ke Excel',
            exportOptions: {
                columns: [0, 2, 3, 4, 5, 6, 7, 8, 9]
            }
        }
    ],
    "processing": true,
    "serverSide": true,
    "order": [[ 3, "desc" ]],
    "ajax": {
        "url": window.location.href,
        "type": "POST",
        "data": function (d) {
            d.from_tgl = $('.from_tgl').val();
            d.to_tgl = $('.to_tgl').val();

        }
    },
    "columns": [
        {"data": null,
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }, searchable: false, orderable: false
        },
        {"data": "action", orderable: false, searchable: false},
        {"data": "tanggal"}, //urutan isi pada data tabel
        {"data": "ipgpon"},
        {"data": "slot"},
        {"data": "port"},
        {"data": "sto"},
        {"data": "odc"},
        {"data": "listodp"},
        {"data": "pelaksana"},

    ]
});

$('body').on('click', '.action_btn_edit', function () {
    window.location = $(this).data('url');
    //console.log("tes doank".window.location);
});

$('body').on('click', '.action_btn_delete', function () {
    var url = $(this).data('url');
    swal("Apakah anda yakin ingin menghapus data ini?", {
        buttons: {
            cancel: "Batal",
            delete: {
                text: "Hapus",
                value: "delete"
            }
        }
    })
        .then(function (value) {
            switch (value) {
                case "delete":
                    $.ajax({
                        url: url,
                        success: function (response) {
                            if (!response) {
                                swal("Error", "Terjadi Kesalahan. Data gagal terhapus!", "error");
                            } else {
                                swal(response, "", "success");
                                table.ajax.reload();
                            }
                        }
                    });
                    break;
            }
        });
});

// $('.refresh_filter_data').click(function () {
//     table.ajax.reload();
// });

$('#refresh_filter').click(function () {
    var from_tanggal=$('.from_tgl').val();
    var to_tanggal=$('.to_tgl').val();
    console.log(window.location.href);
    // "ajax": {
    //     "url": window.location.href,
    //         "type": "POST",
    //         "data": function (d) {
    //
    //     }
    // }
   // alert(1);
   //console.log(window.location = $(this).data('url'));
    $.ajax({
        url : window.location.href+"/search_with_date",
        type : "POST",
        datatype : "json",
        data : {"from_tanggal":from_tanggal,"to_tanggal":to_tanggal},
        // contentType: "application/json; charset=utf-8", perintah ini menyebabkan data yag dikirim ke php null
        success:function(data){
            alert("berhasil");
        }, error: function (errormessage) {
            alert("eror");
        }
    });
    });

// });

// $('body').on('click', '.refresh_filter_data', function () {
//     alert(1);
//     console.log('tes');
    // window.location = $(this).data('url');
    //console.log("tes doank".window.location);
// });