
<a href="?page=tambah-kategori"> Tambah Data</a>
<hr>

<table>
    <input type="hidden" id="id_ketegori">
    <tr>
        <td>Nama Kategori</td>
        <td>:</td>
        <td>
            <input type="text" id="kategori">
        </td>
    </tr>
    <tr>
        <td>
            <button id="btn" onclick="insert()">
                Submit
            </button>
            <button id="btn_update" onclick="update()" hidden>
                Update
            </button>
        </td>
    </tr>
</table>

<hr>

<table id="data" border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    load();

    function load() {
        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://localhost/dashboard1/page/dataAjax.php", true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = JSON.parse(this.responseText);
                let empTable = document.getElementById("data").getElementsByTagName("tbody")[0];

                empTable.innerHTML = "";

                for (let key in response) {
                    if (response.hasOwnProperty(key)) {
                        let val = response[key];

                        let NewRow = empTable.insertRow(0); 
                        let kategori = NewRow.insertCell(0);
                        let aksi_cell = NewRow.insertCell(1);

                        kategori.innerHTML = val['kategori']; 
                        aksi_cell.innerHTML = '<button onclick="edit('+ val['id_ketegori'] +')" id="btn_edit">Edit</button> &bull; <button onclick="hapus('+ val['id_ketegori'] +')">Hapus</button>'; 
                        
                    }
                } 

            }
        };

        xhttp.send();

        
    }

    function insert() {

        let kategori = document.getElementById('kategori').value;

        if(kategori != ""){

            let data = { kategori : kategori };
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "http://localhost/dashboard1/page/ajaxKategori.php", true);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let response = this.responseText;
                    if(response == 1){
                        alert("Insert successfully.");

                        load();
                        
                        document.getElementById("kategori").value = '';
                    }
                }
            };

        xhttp.setRequestHeader("Content-Type", "application/json");

        xhttp.send(JSON.stringify(data));
        }

    }

    function edit(id_ketegori) {
        let kategori = document.getElementById('kategori');
        let btn = document.getElementById('btn');
        let btn_edit = document.getElementById('btn_edit');
        let btn_update = document.getElementById('btn_update');
        
        btn.hidden = true;
        btn_update.hidden = false;

        let xhttp = new XMLHttpRequest();
        xhttp.open("GET", "http://localhost/dashboard1/page/editKategori.php?id_ketegori="+id_ketegori, true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = JSON.parse(this.responseText);

                for (let key in response) {
                    if (response.hasOwnProperty(key)) {
                        let val = response[key];

                        kategori.value = val['kategori'];
                        document.getElementById("id_ketegori").value = val['id_ketegori'];

                    }
                } 

            }
        };

        xhttp.send();
    }

    function hapus(id_ketegori) {
        let xhttp = new XMLHttpRequest();
        let konfirmasi = confirm("Yakin ? Mau di Hapus ?");

        if (konfirmasi) {
            xhttp.open("GET", "http://localhost/dashboard1/page/hapusKategori.php?id_ketegori="+id_ketegori, true);

            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    let response = this.responseText;
                    if(response == 1){
                        alert("Delete successfully.");

                        load();
                    }

                }
            };

            xhttp.send();
        }
    }

    function update() {
        
        let id_ketegori = document.getElementById('id_ketegori').value;
        let kategori = document.getElementById('kategori').value;

        if(kategori != ''){
            
        let data = { id_ketegori : id_ketegori, kategori : kategori };
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "http://localhost/dashboard1/page/updateKategori.php", true);

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                let response = this.responseText;
                if(response == 1){
                    alert("Update successfully.");

                    load();

                    document.getElementById("kategori").value = "";
                }
            }
        };

        xhttp.setRequestHeader("Content-Type", "application/json");

        xhttp.send(JSON.stringify(data));
        }
    }
</script>