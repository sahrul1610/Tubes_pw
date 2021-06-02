<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "dashboard";
    }
?>

<?php

    switch ($page) {
        case 'dashboard':
            include 'page/dashboard.php';
            break;

        // buku
        case 'buku':
            include 'page/admin/list.php';
            break;
        
        case 'tambah-buku':
            include 'page/admin/tambah.php';
            break;

        case 'edit-data':
            include 'page/admin/edit_data.php';
            break;

            case 'edit-data':
                include 'page/admin/edit_data.php';
                break;
        // end
        //kategori
        case 'kategori':
            include 'page/kategori.php';
            break;

        case 'tambah-kategori':
             include 'page/tambah-kategori.php';
             break;
        
         case 'edit-kategori':
            include 'page/edit-kategori.php';
            break;
        
        case 'customer-admin':
            include 'page/customer-admin/customer.php';
            break;

            // case 'logout':
            // include 'page/login/logout.php';
            // break;
       
        // end
        
        default:
            echo "404 Not Found";
            break;
    }

?>