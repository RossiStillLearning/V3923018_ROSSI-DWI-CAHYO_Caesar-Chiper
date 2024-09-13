<?php  
// Fungsi cipher untuk enkripsi dan dekripsi
function cipher($char, $key){
    if (ctype_alpha($char)) {
        $nilai = ord(ctype_upper($char) ? 'A' : 'a');
        $ch = ord($char);
        $mod = fmod($ch + $key - $nilai, 26);
        return chr($mod + $nilai);
    } else {
        return $char;
    }
} 

// Fungsi enkripsi
function enkripsi($input, $key){
    $output = "";
    $chars = str_split($input);
    foreach($chars as $char){
        $output .= cipher($char, $key);
    }
    return $output;
}

// Fungsi dekripsi
function dekripsi($input, $key){
    return enkripsi($input, 26 - $key);
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V3923018</title>
    <style>
        /* Gaya Umum */
        body {
            background-color: #e6f2ff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container */
        .container {
            background-color: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }

        /* Judul */
        h1 {
            color: #3385ff;
            font-size: 1.8em;
            margin-bottom: 15px;
        }

        /* Kolom Input */
        input[type="text"], input[type="number"], textarea {
            width: calc(100% - 20px);
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #b3d1ff;
            border-radius: 8px;
            font-size: 1em;
            background-color: #f0f8ff;
            color: #333;
        }

        /* Textarea */
        textarea {
            height: 80px;
            resize: none;
        }

        /* Tombol */
        .btn {
            background-color: #3385ff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 8px;
            margin: 8px;
        }

        .btn:hover {
            background-color: #0059b3;
        }

        /* Footer */
        .footer {
            
            margin-top: 15px;
            font-size: 0.9em;
            color: #666;
        }

        .footer span {
            color: #3385ff;
            font-weight: bold;
            position: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Enkripsi & Dekripsi</h1>
        <form action="" method="post">
            <input type="text" name="plain" placeholder="Masukkan pesan Anda" required />
            <input type="number" name="key" placeholder="Masukkan kunci (0-25)" required />
            <br />
            <button type="submit" name="enkripsi" class="btn">Enkripsi</button>
            <button type="submit" name="dekripsi" class="btn">Dekripsi</button>
            <br />
            <textarea readonly placeholder="Hasil">
                <?php  
                    if (isset($_POST["enkripsi"])) { 
                        echo enkripsi($_POST["plain"], $_POST["key"]);
                    } else if (isset($_POST["dekripsi"])) {
                        echo dekripsi($_POST["plain"], $_POST["key"]);
                    }
                ?>
            </textarea>
        </form>
        <div class="footer">
            <span>ROSSI MASIH BELAJAR</span>
        </div>
    </div>
</body>
</html>
