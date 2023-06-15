<?php
if(!function_exists('dateFormat')) 
    {
        function dateFormat($date)
            {
                return date("F d Y", strtotime($date));
            }
    }
        
?>