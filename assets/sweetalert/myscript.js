const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal({
        title: 'Account  ',
        text: 'Successfully ' + flashData,
        type: 'success'
    });
}

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure?',
        text: "this account will permanently Deleted.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});