<?php
    // koneksi ke database
    include "../../config/database.php";
    include "../../functions/helpers.php";

    $emotions = query("SELECT * FROM emotions");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Clean Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="form-box">
        <?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
            <div style="padding:10px; background:#d4edda; color:#155724; margin-bottom:15px;">
                Feedback berhasil dikirim!
            </div>
        <?php endif; ?>

        <h1>My Feedback Form</h1>
        <div class="title">Kirimkan feedback mu untuk akuu!!</div>

        <form action="process.php" method="POST" enctype="multipart/form-data">
            <ul>
                <li>Name : <input type="text" name="name"></li>
                <li>Email : <input type="text" name="email"></li>
                <li>Password : <input type="password" name="password"></li>
                <li>Hobi : <input type="text" name="hobi"></li>
            </ul>

            <ul>
                <li>Please check all the emotions that apply to you :</li>
                <ul class="group">
                    <?php foreach ($emotions as $emotion) : ?>
                    <li>
                        <input type="checkbox" name="emotions[]" 
                            value="<?php echo $emotion['id']; ?>"> 
                            <?php echo $emotion['emotion_name']; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </ul>

            <ul>
                <li>How satisfied were you with our service :</li>
                <ul class="group">
                    <li><input type="radio" name="satisfaction" value="Very Satisfied"> Very Satisfied</li>
                    <li><input type="radio" name="satisfaction" value="Satisfied"> Satisfied</li>
                    <li><input type="radio" name="satisfaction" value="Didn't Care"> Didn't Care</li>
                    <li><input type="radio" name="satisfaction" value="Dissatisfied"> Dissatisfied</li>
                    <li><input type="radio" name="satisfaction" value="Very Dissatisfied"> Very Dissatisfied</li>
                </ul>
            </ul>

            <ul>
                <li>Further Comments :
                    <textarea rows="4" cols="50" name="comments" placeholder="Comments"></textarea>
                </li>
            </ul>

            <ul>
                <li>Bio photo : <input type="file" name="photo" id="photo" accept="image/*"></li>
                <li>Location visited :
                    <select name="location" id="location">
                        <option disabled>Select location</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Bandung">Bandung</option>
                        <option value="Surabaya">Surabaya</option>
                        <option value="Bogor">Bogor</option>
                    </select>
                </li>
            </ul>

            <button class="submit">Kirim</button>
        </form>
    </div>

    </body>
    </html>