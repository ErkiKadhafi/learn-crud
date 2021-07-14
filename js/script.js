const container = document.querySelector(".container");
const searchBtn = document.querySelector(".search-btn");
const keyword = document.querySelector(".keyword");

// console.log(container)
// console.log(searchBtn)
// console.log(keyword)

keyword.addEventListener('keyup', function() {
    //buat object ajax
    let xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    //ekseskusi ajax
    xhr.open("GET", "ajax/mahasiswa.php?keyword=" + keyword.value, true);
    xhr.send();
})