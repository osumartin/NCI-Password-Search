<?php

class ManageDisplay {
    private $default_display;

    function __construct(){
        $this->default_display='html';
    }

    public function display_results($result_arr){
        $this->display_HTML($result_arr);
    }

    private function display_HTML($result_arr){
        $c = count($result_arr);
        if ($c >0){
        echo "<table><tr><th> Hack ID </th><th>Hack Date</th><th>Hack Details</th><th>Hack URI</th></tr>";

        if (is_array($result_arr)){
            echo "<tr>";
            foreach ($result_arr as $value) {
                if (is_array($value)){
                    foreach ($value as $value2) {
                        echo "<td>$value2</td>\n";
                    } // end foreach $value as $value2
                    echo "</tr>";
                } else {
                    echo "<td>$value</td>\n";
                } // end if is_array
            } // enf foreach
            echo "</tr>";
        } else {
            echo "<tr><td>$result_arr</td></tr>";
        } // end if is_array   
        echo "</table>";
        } else {
            echo "<p>Password not found in any known hack</p>";
        } // end count > 0
    }
} // End ManageDisplay 

?>
