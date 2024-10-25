// Menampilkan pesan sukses atau gagal setelah melakukan login atau absen
document.addEventListener("DOMContentLoaded", function() {
    let successMessage = document.getElementById('successMessage');
    let errorMessage = document.getElementById('errorMessage');
    
    if (successMessage) {
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 3000); // Pesan hilang setelah 3 detik
    }

    if (errorMessage) {
        setTimeout(function() {
            errorMessage.style.display = 'none';
        }, 3000); // Pesan hilang setelah 3 detik
    }
});

// Validasi form absensi agar waktu masuk tidak boleh lebih besar dari waktu keluar
function validateAbsensiForm() {
    let waktuMasuk = document.getElementById('waktuMasuk').value;
    let waktuKeluar = document.getElementById('waktuKeluar').value;

    if (waktuKeluar !== "" && waktuMasuk > waktuKeluar) {
        alert("Waktu Masuk tidak boleh lebih besar dari Waktu Keluar!");
        return false;
    }
    return true;
}

// Mengatur tampilan dashboard untuk admin
function toggleMenu() {
    let dashboardMenu = document.getElementById('dashboardMenu');
    if (dashboardMenu.style.display === 'none' || dashboardMenu.style.display === '') {
        dashboardMenu.style.display = 'block';
    } else {
        dashboardMenu.style.display = 'none';
    }
}

// Fitur pencarian karyawan
function searchKaryawan() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let karyawanList = document.getElementsByClassName('karyawan');

    for (let i = 0; i < karyawanList.length; i++) {
        let name = karyawanList[i].getElementsByTagName("p")[0].innerText.toLowerCase();
        if (name.includes(input)) {
            karyawanList[i].style.display = '';
        } else {
            karyawanList[i].style.display = 'none';
        }
    }
}
