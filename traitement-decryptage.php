<!-- Static navbar -->
<?php include ('header.php'); ?>
<!-- Static navbar -->
<?php include ('nav.php'); ?>
<!-- Static navbar -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="pricing-header px-3 py-3 pb-md-4 mx-auto text-center">
                <h2 class="display-4">Decrypting</h2>
                <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>

                <?php
                if ( $_POST['afficher'] ) {
                    $lien = $_FILES['image']['tmp_name'];
                    $tampon = "";
                    $message = "";
                    $f_image = fopen($lien, 'rb');
                    fseek($f_image, 54);
                    while (!feof($f_image)) {
                        $octet_image = fread($f_image, 1);
                        $octet_image = ord($octet_image);
                        $bits_pf = $octet_image % 4;
                        $bits_pf = decbin($bits_pf);
                        $bits_pf = str_pad($bits_pf, 2, '0', STR_PAD_LEFT);
                        $tampon .= $bits_pf;
                        if (strlen($tampon) == 8) {
                            $tampon = bindec($tampon);
                            if ($tampon == 26) {
                                ?>

                                <h1>Application De Steganographie</h1>
                                <p>
                                <form>
                                    <?php if (strlen($message) < 50) { ?>
                                        <label>LE MESSAGE CACHE
                                            EST: </label><?php echo('<h3><font color="red">' . $message . '</font></h3>'); ?>
                                    <?php } else { ?>
                                        <textarea rows="5" cols="40">Il N'Y A PAS DE MESSAGE CACHE</textarea>
                                    <?php } ?>
                                </form>
                                </p>
                                <a href="index.php">
                                    <button>Page D'Acceuil</button>
                                </a>

                                <?php return;
                            }
                            $message .= chr($tampon);
                            $tampon = "";
                        }
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include ('footer.php'); ?>

