$(document).ready(function () {
    // Hilangkan tombol cari
    $('#tombol-cari').hide();

    // Event ketika keyword ditulis
    $('#keyword').on('keyup', function () {
        // Munculkan icon loading
        $('.loader').show();

        // Ajax menggunakan laod
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function (data) {
            $('#container').html(data);
            $('.loader').hide();
        });
    });
});