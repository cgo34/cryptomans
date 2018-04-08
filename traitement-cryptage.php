<!-- Static navbar -->
<?php use BoyHagemann\Wave\Wave; ?>
<?php include ('header.php'); ?>
<!-- Static navbar -->
<?php include ('nav.php'); ?>
<!-- Static navbar -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="pricing-header px-3 py-3 pb-md-4 mx-auto text-center">
                <h2 class="display-4">Crypting</h2>
                <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>

                <?php
                if($_POST['cacher']){

                    include ('functions.php');

                    $message = $_POST['message'];
                    $bin = str2bin($message);
                    echo "STR=$message<br />BIN=$bin<br />";
                    $str = bin2str($bin);
                    echo "STR=$str<br />";

                    echo $bin_space = binWithSpace($bin);


                    echo 'musique : '.$_POST['musique'];
                    $dossier_musique = 'musiques/';
                    $filename = $dossier_musique.$_POST['musique'];
                    ?>
                    <audio controls="controls">
                      <source src="<?php echo $filename; ?>" type="audio/wav" />
                      Votre navigateur n'est pas compatible
                    </audio>
                    <?php



                    $filename = 'musiques/'.$_POST['musique'];
                    if(isset($filename)){
                        print('<hr>');
                        print('<pre>');
                        echo '<br>filename : '.$filename.'<br>';
                        echo '<br><br>';
                        $handle = fopen($filename, "rb");

                        echo 'HANDLE : <br>';
                        print_r($handle);
                        echo '<br><br>';

                        //$contents = fread($handle, 100);

                        // lit quelques données
                        //$data = fgets($filename, 150);
                        //fclose($handle);

                        fseek($handle, 20);
                        $rawheader = fread($handle, 16);
                        $header = unpack('vtype/vchannels/Vsamplerate/Vbytespersec/valignment/vbits',
                            $rawheader);
                        print_r($header);


                        /*$fp=$d=$data=$format=$bit=$chn="0";
                        $fp = fopen($filename, 'r');
                        fseek($fp, 20);
                        $d = fread($fp, 18);

                        $data = unpack('vfmt/vch/Vsr/Vdr/vbs/vbis/vext', $d);
                        print_r($data);
                        $format = array(0x0001 => 'PCM',0x0003 => 'IEEE Float',0x0006 => 'A-LAW',0x0007 => 'MuLAW',0xFFFE => 'Extensible',);
                        $bit = rtrim($data['sr'],"0") * rtrim($data['dr'],"0");
                        $chn = ($data['ch'] = 1) ? "Mono" : "Stereo";
                        fclose($fp);

                        echo "{$format[$data['fmt']]} {$data['sr']}Hz {$bit}bit {$chn}";

                        if ($format[$data['fmt']]!="A-LAW" || $data['ch']>1 || $data['dr']>8000 || $bit>64) {

                            echo "wrong format";

                        }*/


                        include ('wavefilereader.class.php');

                        $file = 'musiques/01-jai-plus-le-temps.wav';

                        $wav = WaveFileReader::ReadFile($file, true);
                        echo 'dans traitement.php';
                        print('<pre>');
                        print_r($wav);
                        //print_r($wav['subchunk2']['data']);
                        echo '<hr>2ieme traitement<br><br>';
                        print_r(unpack("s*",$wav['subchunk2']['data']));
                        echo '<hr> 3ieme traitement<br><br>';

                     
                        print_r(unpack("v*", fread($wav['subchunk2']['data'], 2)));

                        /*
                        $i = 1;
                        while( $i <= 10000 ){

                            print_r(unpack("v*", fread($wav['subchunk2']['data'], 2)));
                            
                            $i++
                        }
                        */

                        print('</pre>');

                        


                        print('</pre>');
                    }else{
                        echo 'bad';
                    }






                }
                ?>

            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include ('footer.php'); ?>

