<a href="?page=tambah-kategori"> Tambah Data</a>
<hr>

<table >
    <tr>
        <td>Nama Kategori</td>
        <td>:</td>
        <td>
            <input type="hidden" id="kategori_id">
            <input type="text" id="kategori">
        </td>
    </tr>
    <tr>
        <td>
            <button onclick="send_update()" id="btn_update">
                Update
            </button>
        </td>
    </tr>
</table>

<hr>

<table id="data" border="1" cellspacing="0" cellpadding="10" width="400">
    <thead style="background-color:#5F9EA0">
        <tr>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="table_data">

    </tbody>
</table>

<script>
    function load_data() {
        var xhttp = new XMLHttpRequest()
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const table = document.getElementById('table_data')
                const res = JSON.parse(this.responseText)

                table.innerHTML = null

                for (let key in res) {
                    var tr = document.createElement('tr')
                    var td_kat = document.createElement('td')
                    var td_aksi = document.createElement('td')
                    var upbtn = document.createElement('button')
                    var delbtn = document.createElement('button')
                    var data = res[key]

                    if (res.hasOwnProperty(key)) {
                        upbtn.textContent = "Update"
                        delbtn.textContent = "Delete"

                        upbtn.setAttribute('onclick', `update(${data['kategori_id']},'${data['kategori']}')`)
                        delbtn.setAttribute('onclick', `del(${data['kategori_id']})`)

                        td_aksi.append(upbtn, delbtn)
                        td_kat.textContent = data['kategori']

                        tr.append(td_kat, td_aksi)

                    }

                    table.append(tr)
                }

            }
        };
        xhttp.open("GET", "http://localhost/Tubes_pw/admin/pages/ajax/get-data.php", true);
        xhttp.send();
    }

    function update(id, kat) {
        const id_kat = document.getElementById('kategori_id')
        const kategori = document.getElementById('kategori')

        id_kat.value = id
        kategori.value = kat
    }

    function send_update() {
        var xhttp = new XMLHttpRequest()
        const id_kat = document.getElementById('kategori_id')
        const kategori = document.getElementById('kategori')
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                id_kat.value = null
                kategori.value = null
                alert('Berhasil Diupdate')
                load_data()
            }
        };
        xhttp.open("POST", "http://localhost/tubes_pw_new/admin/pages/ajax/edit-kategori.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`id=${id_kat.value}&kategori=${kategori.value}`);
    }

    function del(id) {
        var xhttp = new XMLHttpRequest()
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert('Berhasil Dihapus')
                load_data()
            }
        };
        xhttp.open("POST", "http://localhost/tubes_pw_new/admin/pages/ajax/delete-kategori.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`id=${id}`);
    }

    load_data()
</script>