<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DES
{

    public function dump($obj)
    {
        echo "<pre>";
        print_r($obj);
        echo "</pre>";
        echo "<br>";
    }

    /**
     * Mengubah palintext menjadi biner
     */
    public function text2bin($text)
    {
        $characters = str_split($text);
        $binary = [];

        foreach ($characters as $character) {
            $data = unpack("H*", $character);
            $binary[] = base_convert($data[1], 16, 2);
        }

        return $binary;
    }

    /**
     * Mengkonversi text ke format biner (hasil belum sempurna)
     */
    public function bin2text($bin)
    {
        $string = null;
        $string .= pack('H*', dechex(bindec($bin)));
        return $string;
    }

    /**
     * Memformat Hasil Binery ke format yang benar (8-bit)
     */
    public function bin8($bin)
    {
        $_bin = "";
        if (strlen($bin) < 8) {
            for ($i = 0; $i < (8 - strlen($bin)); $i++) {
                $_bin .= "0";
            }
            $_bin .= $bin;
        } else {
            return $bin;
        }
        return $_bin;
    }

    /**
     * penyempurnaan dari bin8
     */
    public function bin4($bin)
    {
        $_bin = "";
        if (strlen($bin) < 4) {
            for ($i = 0; $i < (4 - strlen($bin)); $i++) {
                $_bin .= "0";
            }
            $_bin .= $bin;
        } else {
            return $bin;
        }
        return $_bin;
    }

    public function bin2dec($bin)
    {
        return bindec($bin);
    }

    public function dec2bin($dec)
    {
        return decbin($dec);
    }

    /**
     * Membaca biner dr fungsi bin2text
     */
    public function read_bin($bin)
    {
        $out = "";
        for ($i = 0; $i < strlen($bin); $i += 8) {
            $str = substr($bin, $i, 8);
            $out .= $this->bin2text($str);
        }
        return $out;
    }

    /**
     * (pebangkitan kunci)
     * permutasion compressions
     */
    public function pc1($key)
    {
        $_pc1 = [
            56, 48, 40, 32, 24, 16,  8,
            0, 57, 49, 41, 33, 25, 17,
            9,  1, 58, 50, 42, 34, 26,
            18, 10,  2, 59, 51, 43, 35,
            62, 54, 46, 38, 30, 22, 14,
            6, 61, 53, 45, 37, 29, 21,
            13,  5, 60, 52, 44, 36, 28,
            20, 12,  4, 27, 19, 11,  3
        ];

        $result = "";
        $n = count($_pc1);

        for ($i = 0; $i < $n; $i++) {
            $index = $_pc1[$i];
            $result .= substr($key, $index, 1);
        }

        return $result;
    }

    /**
     * melakukan pergeseran ke kiri menghasilkan nilai c dan d
     */

    public $array_tampil_left_shift = [];

    public function left_shift($c, $d)
    {
        $_left_shift = [1, 1, 2, 2, 2, 2, 2, 2, 1, 2, 2, 2, 2, 2, 2, 1];
        $array_c = [];
        $array_d = [];
        $n = count($_left_shift);

        $this->array_tampil_left_shift = [];
        for ($i = 0; $i < $n; $i++) {
            $rotation = $_left_shift[$i];
            if ($rotation == 1) {
                $c0 = $c[0];
                $d0 = $d[0];
                $c = substr($c, 1);
                $d = substr($d, 1);
                $c .= $c0;
                $d .= $d0;
            } else {
                $c0 = $c[0];
                $c1 = $c[1];
                $d0 = $d[0];
                $d1 = $d[1];
                $c = substr($c, 2);
                $d = substr($d, 2);
                $c .= $c0;
                $c .= $c1;
                $d .= $d0;
                $d .= $d1;
            }
            array_push($array_c, $c);
            array_push($array_d, $d);
            array_push($this->array_tampil_left_shift, "<tr><td>CD({$i})</td><td>:</td><td>" . json_encode($c) . " " . json_encode($d) . "</td></tr>");
        }

        $array_cd = [];
        array_push($array_cd, $array_c);
        array_push($array_cd, $array_d);

        return $array_cd;
    }

    /**
     * melakukan permutasion compressions PC2 terhadap nilai c d
     */
    public function pc2($c, $d)
    {
        $_pc2 = [
            13, 16, 10, 23,  0,  4,
            2, 27, 14,  5, 20,  9,
            22, 18, 11,  3, 25,  7,
            15,  6, 26, 19, 12,  1,
            40, 51, 30, 36, 46, 54,
            29, 39, 50, 44, 32, 47,
            43, 48, 38, 55, 33, 52,
            45, 41, 49, 35, 28, 31
        ];

        $k = [];
        $n = count($_pc2);

        for ($i = 0; $i < 16; $i++) {
            $cdi = $c[$i] . $d[$i];
            $_k = "";

            for ($j = 0; $j < $n; $j++) {
                $index = $_pc2[$j];
                $_k .= substr($cdi, $index, 1);
            }

            array_push($k, $_k);
        }

        return $k;
    }

    /**
     * melakukan initial permutation pada bit plaintext
     */
    public function ip($plaintext)
    {
        $_ip = [
            57, 49, 41, 33, 25, 17, 9,  1,
            59, 51, 43, 35, 27, 19, 11, 3,
            61, 53, 45, 37, 29, 21, 13, 5,
            63, 55, 47, 39, 31, 23, 15, 7,
            56, 48, 40, 32, 24, 16, 8,  0,
            58, 50, 42, 34, 26, 18, 10, 2,
            60, 52, 44, 36, 28, 20, 12, 4,
            62, 54, 46, 38, 30, 22, 14, 6
        ];

        $result = "";
        $n = count($_ip);

        for ($i = 0; $i < $n; $i++) {
            $index = $_ip[$i];
            $result .= substr($plaintext, $index, 1);
        }

        $array_l = substr($result, 0, 32);
        $array_r = substr($result, 32);
        $array_lr = [$array_l, $array_r];

        return $array_lr;
    }

    /**
     * (proses enchipering)
     * melakukan ekspansi 
     */
    public function expansion($r)
    {
        $_expansion_table = [
            31,  0,  1,  2,  3,  4,
            3,  4,  5,  6,  7,  8,
            7,  8,  9, 10, 11, 12,
            11, 12, 13, 14, 15, 16,
            15, 16, 17, 18, 19, 20,
            19, 20, 21, 22, 23, 24,
            23, 24, 25, 26, 27, 28,
            27, 28, 29, 30, 31,  0
        ];

        $er = "";
        $n = count($_expansion_table);

        for ($i = 0; $i < $n; $i++) {
            $index = $_expansion_table[$i];
            $er .= substr($r, $index, 1);
        }

        return $er;
    }

    /**
     * melakukan XOR (iterasi) menghsilkan vektor A
     */
    public function _xor($a, $b)
    {
        if ($a == $b) {
            return "0";
        }
        return "1";
    }

    public function a($er, $k)
    {
        $result = "";
        $n = strlen($er);

        for ($i = 0; $i < $n; $i++) {
            $output = $this->_xor(substr($er, $i, 1), substr($k, $i, 1));
            $result .= $output;
        }

        $array_a = [
            substr($result, 0, 6),
            substr($result, 6, 6),
            substr($result, 12, 6),
            substr($result, 18, 6),
            substr($result, 24, 6),
            substr($result, 30, 6),
            substr($result, 36, 6),
            substr($result, 42, 6)
        ];

        return $array_a;
    }

    /**
     * subtitusi vektor A ke delapan buah Sbox
     */
    public function s_box($a)
    {
        $_s1 = [
            [14, 4, 13, 1, 2, 15, 11, 8, 3, 10, 6, 12, 5, 9, 0, 7],
            [0, 15, 7, 4, 14, 2, 13, 1, 10, 6, 12, 11, 9, 5, 3, 8],
            [4, 1, 14, 8, 13, 6, 2, 11, 15, 12, 9, 7, 3, 10, 5, 0],
            [15, 12, 8, 2, 4, 9, 1, 7, 5, 11, 3, 14, 10, 0, 6, 13]
        ];

        $_s2 = [
            [15, 1, 8, 14, 6, 11, 3, 4, 9, 7, 2, 13, 12, 0, 5, 10],
            [3, 13, 4, 7, 15, 2, 8, 14, 12, 0, 1, 10, 6, 9, 11, 5],
            [0, 14, 7, 11, 10, 4, 13, 1, 5, 8, 12, 6, 9, 3, 2, 15],
            [13, 8, 10, 1, 3, 15, 4, 2, 11, 6, 7, 12, 0, 5, 14, 9]
        ];

        $_s3 = [
            [10, 0, 9, 14, 6, 3, 15, 5, 1, 13, 12, 7, 11, 4, 2, 8],
            [13, 7, 0, 9, 3, 4, 6, 10, 2, 8, 5, 14, 12, 11, 15, 1],
            [13, 6, 4, 9, 8, 15, 3, 0, 11, 1, 2, 12, 5, 10, 14, 7],
            [1, 10, 13, 0, 6, 9, 8, 7, 4, 15, 14, 3, 11, 5, 2, 12]
        ];

        $_s4 = [
            [7, 13, 14, 3, 0, 6, 9, 10, 1, 2, 8, 5, 11, 12, 4, 15],
            [13, 8, 11, 5, 6, 15, 0, 3, 4, 7, 2, 12, 1, 10, 14, 9],
            [10, 6, 9, 0, 12, 11, 7, 13, 15, 1, 3, 14, 5, 2, 8, 4],
            [3, 15, 0, 6, 10, 1, 13, 8, 9, 4, 5, 11, 12, 7, 2, 14]
        ];

        $_s5 = [
            [2, 12, 4, 1, 7, 10, 11, 6, 8, 5, 3, 15, 13, 0, 14, 9],
            [14, 11, 2, 12, 4, 7, 13, 1, 5, 0, 15, 10, 3, 9, 8, 6],
            [4, 2, 1, 11, 10, 13, 7, 8, 15, 9, 12, 5, 6, 3, 0, 14],
            [11, 8, 12, 7, 1, 14, 2, 13, 6, 15, 0, 9, 10, 4, 5, 3]
        ];

        $_s6 = [
            [12, 1, 10, 15, 9, 2, 6, 8, 0, 13, 3, 4, 14, 7, 5, 11],
            [10, 15, 4, 2, 7, 12, 9, 5, 6, 1, 13, 14, 0, 11, 3, 8],
            [9, 14, 15, 5, 2, 8, 12, 3, 7, 0, 4, 10, 1, 13, 11, 6],
            [4, 3, 2, 12, 9, 5, 15, 10, 11, 14, 1, 7, 6, 0, 8, 13]
        ];

        $_s7 = [
            [4, 11, 2, 14, 15, 0, 8, 13, 3, 12, 9, 7, 5, 10, 6, 1],
            [13, 0, 11, 7, 4, 9, 1, 10, 14, 3, 5, 12, 2, 15, 8, 6],
            [1, 4, 11, 13, 12, 3, 7, 14, 10, 15, 6, 8, 0, 5, 9, 2],
            [6, 11, 13, 8, 1, 4, 10, 7, 9, 5, 0, 15, 14, 2, 3, 12]
        ];

        $_s8 = [
            [13, 2, 8, 4, 6, 15, 11, 1, 10, 9, 3, 14, 5, 0, 12, 7],
            [1, 15, 13, 8, 10, 3, 7, 4, 12, 5, 6, 11, 0, 14, 9, 2],
            [7, 11, 4, 1, 9, 12, 14, 2, 0, 6, 10, 13, 15, 3, 5, 8],
            [2, 1, 14, 7, 4, 10, 8, 13, 15, 12, 9, 0, 3, 5, 6, 11]
        ];

        $row = substr($a[0], 0, 1) . substr($a[0], 5, 1);
        $col = substr($a[0], 1, 4);
        $s1 = $_s1[$this->bin2dec($row)][$this->bin2dec($col)];
        $s1 = $this->dec2bin($s1);
        $s1 = $this->bin4($s1);

        $row = substr($a[1], 0, 1) . substr($a[1], 5, 1);
        $col = substr($a[1], 1, 4);
        $s2 = $_s2[$this->bin2dec($row)][$this->bin2dec($col)];
        $s2 = $this->dec2bin($s2);
        $s2 = $this->bin4($s2);

        $row = substr($a[2], 0, 1) . substr($a[2], 5, 1);
        $col = substr($a[2], 1, 4);
        $s3 = $_s3[$this->bin2dec($row)][$this->bin2dec($col)];
        $s3 = $this->dec2bin($s3);
        $s3 = $this->bin4($s3);

        $row = substr($a[3], 0, 1) . substr($a[3], 5, 1);
        $col = substr($a[3], 1, 4);
        $s4 = $_s4[$this->bin2dec($row)][$this->bin2dec($col)];
        $s4 = $this->dec2bin($s4);
        $s4 = $this->bin4($s4);

        $row = substr($a[4], 0, 1) . substr($a[4], 5, 1);
        $col = substr($a[4], 1, 4);
        $s5 = $_s5[$this->bin2dec($row)][$this->bin2dec($col)];
        $s5 = $this->dec2bin($s5);
        $s5 = $this->bin4($s5);

        $row = substr($a[5], 0, 1) . substr($a[5], 5, 1);
        $col = substr($a[5], 1, 4);
        $s6 = $_s6[$this->bin2dec($row)][$this->bin2dec($col)];
        $s6 = $this->dec2bin($s6);
        $s6 = $this->bin4($s6);

        $row = substr($a[6], 0, 1) . substr($a[6], 5, 1);
        $col = substr($a[6], 1, 4);
        $s7 = $_s7[$this->bin2dec($row)][$this->bin2dec($col)];
        $s7 = $this->dec2bin($s7);
        $s7 = $this->bin4($s7);

        $row = substr($a[7], 0, 1) . substr($a[7], 5, 1);
        $col = substr($a[7], 1, 4);
        $s8 = $_s8[$this->bin2dec($row)][$this->bin2dec($col)];
        $s8 = $this->dec2bin($s8);
        $s8 = $this->bin4($s8);

        $result = $s1 . $s2 . $s3 . $s4 . $s5 . $s6 . $s7 . $s8;
        return $result;
    }

    /**
     * memutasikan vektor b ke dalam pbox
     */
    public function p_box($b)
    {
        $_p_box = [
            15, 6, 19, 20, 28, 11,
            27, 16, 0, 14, 22, 25,
            4, 17, 30, 9, 1, 7,
            23, 13, 31, 26, 2, 8,
            18, 12, 29, 5, 21, 10,
            3, 24
        ];

        $pb = "";
        $n = count($_p_box);

        for ($i = 0; $i < $n; $i++) {
            $index = $_p_box[$i];
            $pb .= substr($b, $index, 1);
        }

        return $pb;
    }

    /**
     * memutasikan nilai rl ke tabel invers IP
     */
    public function final_permutation($rl)
    {
        $_fp = [
            39,  7, 47, 15, 55, 23, 63, 31,
            38,  6, 46, 14, 54, 22, 62, 30,
            37,  5, 45, 13, 53, 21, 61, 29,
            36,  4, 44, 12, 52, 20, 60, 28,
            35,  3, 43, 11, 51, 19, 59, 27,
            34,  2, 42, 10, 50, 18, 58, 26,
            33,  1, 41,  9, 49, 17, 57, 25,
            32,  0, 40,  8, 48, 16, 56, 24
        ];

        $cipher = "";
        $n = count($_fp);

        for ($i = 0; $i < $n; $i++) {
            $index = $_fp[$i];
            $cipher .= substr($rl, $index, 1);
        }

        return $cipher;
    }

    public $proses_encrypt = "";

    /**
     * variabel berupa $plaintext, $key dan $tampil_proses yang dibungkus di dalam satu function encrypt
     */
    public function encrypt($plaintext, $key, $tampil_proses = false)
    {
        $this->proses_encrypt = "";
        $tampilText = "$plaintext";
        $key = $this->text2bin($key);
        $key8 = [];
        foreach ($key as $i) {
            $i8 = $this->bin8($i);
            $key8[] = $i8;
        }
        $tampilKey8 =  json_encode($key8);
        $key8 = implode("", $key8);

        $out_pc1 = $this->pc1($key8);
        $tampilPc1 = json_encode($out_pc1);
        $c = substr($out_pc1, 0, 28);
        $d = substr($out_pc1, 28);

        $out_left_shift = $this->left_shift($c, $d);
        $c = $out_left_shift[0];
        $d = $out_left_shift[1];

        $tampilC = json_encode($c);
        $tampild = json_encode($d);
        $tampilShiftL = json_encode($out_left_shift);

        $k = $this->pc2($c, $d);
        $tampilPc2 = json_encode($k);

        $plaintext = $this->text2bin($plaintext);
        $plaintext8 = [];
        foreach ($plaintext as $i) {
            $i8 = $this->bin8($i);
            $plaintext8[] = $i8;
        }
        $tampilPlaintext8 = json_encode($plaintext8);

        $plaintext8 = implode("", $plaintext8);

        while (strlen($plaintext8) < 64) {
            $plaintext8 .= "00100000";
        }

        $out_ip = $this->ip($plaintext8);

        $l = $out_ip[0];
        $r = $out_ip[1];

        $tampil_expansion = [];
        $tampil_a = [];
        $tampil_b = [];
        $tampil_p = [];

        for ($i = 0; $i < 16; $i++) {
            $er = $this->expansion($r);
            array_push($tampil_expansion, "<tr><td>Expansion($i)</td><td>:</td><td>" . json_encode($er) . "</td></tr>");
            $ai = $this->a($er, $k[$i]);
            array_push($tampil_a, "<tr><td>Matrix A($i)</td><td>:</td><td>" . json_encode($ai) . "</td></tr>");
            $bi = $this->s_box($ai);
            array_push($tampil_b, "<tr><td>SBox($i)</td><td>:</td><td>" . json_encode($bi) . "</td></tr>");
            $pb = $this->p_box($bi);
            array_push($tampil_p, "<tr><td>PBox($i)</td><td>:</td><td>" . json_encode($pb) . "</td></tr>");

            $update_r = "";
            $n = strlen($pb);

            for ($j = 0; $j < $n; $j++) {
                $output = $this->_xor(substr($pb, $j, 1), substr($l, $j, 1));
                $update_r .= $output;
            }

            $l = $r;
            $r = $update_r;
        }

        $rl = $r . $l;
        $cipher = $this->final_permutation($rl);

        if ($tampil_proses) {
            $this->proses_encrypt .= "<table class='table table-responsive'><tbody><tr><td>Text</td><td>:</td><td>$tampilText</td></tr>";
            $this->proses_encrypt .= "<tr><td>Plaintext</td><td>:</td><td>" . $tampilPlaintext8 . "</td></tr>";
            $this->proses_encrypt .= "<tr><td>Password</td><td>:</td><td>" . $tampilKey8 . " </td></tr>";

            $this->proses_encrypt .= "<tr><td>PC1</td><td>:</td><td>" . $tampilPc1 . "</td></tr>";
            $this->proses_encrypt .= "<tr><td>PC2</td><td>:</td><td>" . $tampilPc2 . "</td></tr>";

            $this->proses_encrypt .= "<tr><td>C</td><td>:</td><td>" . $tampilC . "</td></tr>";
            $this->proses_encrypt .= "<tr><td>D</td><td>:</td><td>" . $tampild . "</td></tr>";

            foreach ($this->array_tampil_left_shift as $key => $value) {
                $this->proses_encrypt .= $value;
            }
            $this->proses_encrypt .= "<tr><td>Left Shift</td><td>:</td><td>" . $tampilShiftL . "</td></tr>";

            foreach ($tampil_expansion as $key => $value) {
                $this->proses_encrypt .= $value;
            }
            foreach ($tampil_a as $key => $value) {
                $this->proses_encrypt .= $value;
            }
            foreach ($tampil_b as $key => $value) {
                $this->proses_encrypt .= $value;
            }
            foreach ($tampil_p as $key => $value) {
                $this->proses_encrypt .= $value;
            }

            $this->proses_encrypt .= "<tr><td>Hasil Encrypt</td><td>:</td><td>" . $cipher . "</td></tr></tbody></table>";
        }

        return $cipher;
    }

    public function decrypt($cipher, $key)
    {
        $key = $this->text2bin($key);
        $key8 = [];
        foreach ($key as $i) {
            $i8 = $this->bin8($i);
            $key8[] = $i8;
        }
        $key8 = implode("", $key8);

        $out_pc1 = $this->pc1($key8);
        $c = substr($out_pc1, 0, 28);
        $d = substr($out_pc1, 28);

        $out_left_shift = $this->left_shift($c, $d);
        $c = $out_left_shift[0];
        $d = $out_left_shift[1];

        $k = $this->pc2($c, $d);

        $out_ip = $this->ip($cipher);
        $l = $out_ip[0];
        $r = $out_ip[1];

        $i = 15;
        while ($i >= 0) {
            $er = $this->expansion($r);
            $ai = $this->a($er, $k[$i]);
            $bi = $this->s_box($ai);
            $pb = $this->p_box($bi);

            $update_r = "";
            $n = strlen($pb);

            for ($j = 0; $j < $n; $j++) {
                $output = $this->_xor(substr($pb, $j, 1), substr($l, $j, 1));
                $update_r .= $output;
            }

            $l = $r;
            $r = $update_r;
            $i--;
        }

        $rl = $r . $l;
        $plain = $this->final_permutation($rl);

        return $plain;
    }
}
