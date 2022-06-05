var nama = document.getElementById("nama_olahraga");
var durasi = document.getElementById("durasi");
var deskripsi = document.getElementById("deskripsi");
var video = document.getElementById("video");
var tipe = document.getElementById("comboTipe");
var comboKesulitan = document.getElementById("comboKesulitan");
var comboInstruktur = document.getElementById("comboInstruktur");
var step = document.getElementById("step");
var gambar = document.getElementById("gambar");
var alat = document.getElementsByClassName("alat");

function validation(){
    let checked = false;
    for(let ch of alat){
        if(ch.checked){
            checked = true;
        }
    }
    if (nama.value==="" || durasi.value==="" || deskripsi.value==="" || video.value==="" || tipe.value==="" || comboKesulitan.value==="" || comboInstruktur.value==="" || step.value==="" || checked===false || gambar.value===""){
        alert("SEMUA HARUS ISI BLOK");
        
    }
    else {
        alert("XXXX")}
    }