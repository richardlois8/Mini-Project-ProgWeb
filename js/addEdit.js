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
    }else if(parseInt(durasi.value) <= 0){
        alert("Durasi harus lebih dari 0");
    }
}

function validationEdit(){
    if (nama.value==="" || durasi.value==="" || deskripsi.value==="" || video.value==="" || tipe.value==="" || comboKesulitan.value==="" || comboInstruktur.value==="" || step.value==="" || alat.value===""){
        alert("Terdapat salah satu kolom yang kosong !");
    }else if(parseInt(durasi.value) <= 0){
        alert("Durasi harus lebih dari 0");
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

function validateDurasi(){
    let lblDurasi = document.getElementById("lblDurasi");
    let durasi = document.getElementById("durasi").value;
    if(durasi.includes("-") || durasi === "0"){
        lblDurasi.innerHTML = "*Durasi tidak boleh negatif atau 0";
    }else{
        lblDurasi.innerHTML = "*Durasi valid "
    }
}

function previewImage(){
    let img = document.getElementById("previewImage");
    document.querySelector("#gambar").addEventListener("change",function(e){
        if(e.target.files.length == 0){
            return;
        }
        let file = e.target.files[0];
        let url = URL.createObjectURL(file);
        img.src = url;
        img.removeAttribute("hidden");
    });
}
previewImage();