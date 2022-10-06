<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktif Menü Bağlantısı</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>

<body>

    <style>
        body {
            background: #47332E;
            color: white;
            margin: 0%;
        }

        header {
            background: #231412;
            padding: 1rem;
        }

        button {
            background: #B06601;
            color: white;
            border: none;
            outline: none;
            padding: .5rem 2rem;
            margin: .5rem;
            cursor: pointer;
            font-size: 1.3rem;
            font-weight: 500;
        }

        a {
            color: white;
        }

        button.aktif {
            border: 2px solid #FEBA3A;
            background: #59433C;
        }
    </style>


    <header>
        <a href="http://localhost:2525/"><button class="anasayfa">anasayfa</button></a>
        <a href="http://localhost:2525/sayfa1"><button class="sayfa1">sayfa1</button></a>
        <a href="http://localhost:2525/sayfa2"><button class="sayfa2">sayfa2</button></a>
        <a href="http://localhost:2525/sayfa3"><button class="sayfa3">sayfa3</button></a>
    </header>


    <?php
    $url = $_SERVER['REQUEST_URI']; //Domain adresinden sonra gelen url uzantısını alıyoruz "sayfa/dosyalar/dosya.php" gibi
    $sayfalar = explode("/", $url); //explode methodu ile $url degişkenimizi ayrıştırıyoruz ve "/" işaretinden önce gelenleri array olarak sıralıyoruz
    $sayfa = $sayfalar[1]; //2. array degerimizi alıyoruz "ilk klasörü"
    switch ($sayfa) { // switch hedef parametresi
        case "": //parametre ile eşleşmesi istenen değer
            $sonuc = '$(".anasayfa").addClass("aktif");'; // eşleşme sonrası çalışması istenen koşul
            break; //eşleşme sonrası işlemi durdurma
        case "sayfa1":
            $sonuc = '$(".sayfa1").addClass("aktif");';
            break;
        case "sayfa2":
            $sonuc = '$(".sayfa2").addClass("aktif");';
            break;
        case "sayfa3":
            $sonuc = '$(".sayfa3").addClass("aktif");';
            break;
        default: //istenen değer eşlenemezse default ile bildirilir
            $sonuc = '$("button").removeClass("aktif");';
    }
    ?>

    <script>
        $(document).ready(function() {
            <?php echo $sonuc; ?> // switch sonucumuzu jquery ile çalıştırıyoruz
        });
    </script>

</body>

</html>
