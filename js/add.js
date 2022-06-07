var nama = document.getElementById("nama_olahraga");
var durasi = document.getElementById("durasi");
var deskripsi = document.getElementById("deskripsi");
var video = document.getElementById("video");
var tipe = document.getElementById("comboTipe");
var comboKesulitan = document.getElementById("comboKesulitan");
var comboInstruktur = document.getElementById("comboInstruktur");
var step = document.getElementById("step");
var gambar = document.getElementById("gambar");
var alat = document.getElementById("alat");

function validation(){
    if (nama.value==="" || durasi.value==="" || deskripsi.value==="" || video.value==="" || tipe.value==="" || comboKesulitan.value==="" || comboInstruktur.value==="" || step.value==="" || alat.value==="" || gambar.value===""){
        alert("Terdapat salah satu kolom yang kosong !");
    }else{
        nama.value = nama.value

    }
}

function validateVideo(){
    var lblVideo = document.getElementById("lblVideo");
    let regex = /https:\/\/www\.youtube\.com\/\embed.*/;
    if(regex.test(video.value)){
        lblVideo.innerHTML = "*Video Valid";
    }
    else{
        lblVideo.innerHTML = "*Video Tidak Valid. Video harus embeded YouTube";
    }
}