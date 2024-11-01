let submit_method;

$(document).ready(function () {
    writerTable();
});

// datatable serverside
function writerTable() {
    $('#yajra').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        // pageLength: 20, // set default records per page
        ajax: "/admin/writers/serverside",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'created_at',
            name: 'created_at'
        },
        {
            data: 'is_verified',
            name: 'is_verified'
        },
        {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        },
        ]
    });
};

const deleteData = (e) => {
    let id = e.getAttribute('data-id');

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        allowOutsideClick: false,
        showCancelButton: true,
        showCloseButton: true,
        preConfirm: () => {
            startLoading();
        },
        onClose: () => {
            stopLoading();
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                url: "/admin/writers/" + id,
                dataType: "json",
                success: function (response) {
                    reloadTable();

                    toastSuccess(response.message);
                },
                error: function (response) {
                    console.log(response);
                }
            });
        } else {
            stopLoading();
        }
    })
}

// form create
const modalWriter = () => {
    submit_method = 'create';

    resetForm('#formWriter');
    resetValidation();
    $('#modalWriter').modal('show');
    $('.modal-title').html('<i class="fa fa-plus"></i> Create Writer');
    $('.btnSubmit').html('<i class="fa fa-save"></i> Save');
}

// form edit
const editData = (e) => {
    let id = e.getAttribute('data-id');

    startLoading();
    resetForm('#formWriter');
    resetValidation();

    $.ajax({
        type: "GET",
        url: "/admin/writers/" + id,
        success: function (response) {
            let parsedData = response.data;

            $('#id').val(parsedData.uuid);
            $('#name').val(parsedData.name);
            $('#modalWriter').modal('show');
            $('.modal-title').html('<i class="fa fa-edit"></i> Verified Writer');
            $('.btnSubmit').html('<i class="fa fa-save"></i> Save');

            submit_method = 'edit';

            stopLoading();
        },
        error: function (jqXHR, response) {
            console.log(jqXHR.responseText);
            toastError(jqXHR.responseText);
        }
    });
}

$('#formWriter').on('submit', function (e) {
    e.preventDefault();
    startLoading();

    let url, method;
    url = '/admin/writers';
    method = 'POST';

    const inputForm = new FormData(this);

    if (submit_method == 'edit') {
        url = '/admin/writers/' + $('#id').val();
        inputForm.append('_method', 'PUT');
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: method,
        url: url,
        data: inputForm,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#modalWriter').modal('hide');
            reloadTable();
            resetValidation();
            stopLoading();
            toastSuccess(response.message);
        },
        error: function (jqXHR, response) {
            console.log(response.message);
            toastError(jqXHR.responseText);
        }
    });
})

const verifyWriter = (e) => {
    let id = e.getAttribute('data-id');

    // Konfirmasi verifikasi
    Swal.fire({
        title: "Verify/Unverify Writer",
        text: "Do you want to verify or unverify this writer?",
        icon: "question",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        allowOutsideClick: false,
        showCancelButton: true,
        showCloseButton: true,
        preConfirm: () => startLoading(),
    }).then((result) => {
        if (result.isConfirmed) {
            // Mengirim permintaan untuk memverifikasi atau membatalkan verifikasi writer
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: "PUT",
                url: "/admin/writers/" + id,
                dataType: "json",
                success: function (response) {
                    reloadTable();  // Memperbarui tabel setelah perubahan
                    toastSuccess(response.message);  // Menampilkan pesan sukses
                },
                error: function (jqXHR, response) {
                    console.log(response.message);
                    toastError(jqXHR.responseText);
                },
            });
        } else {
            stopLoading();
        }
    });
};

