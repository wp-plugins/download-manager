<?php
if($_GET['download']!=''){
    $data = DB::getById('ahm_files',$_GET[download]);
?>
<style>
*{
    font-family: tahoma;
    letter-spacing: 0.5px;
}

input,form,p{
    font-size:9pt;    
}
form{text-align:center;}
</style>
<?php

if($data){
    
    echo "<h3><nobr>$data[title]</nobr></h3><p style='height:100px;overflow:auto;'>$data[description]</p>";
        /*
        if($_POST&&$data[password]==''){
        echo "<script>
                    window.opener.location.href='$_SERVER[HTTP_REFERER]'; self.close();</script>"; die(); }
        */            
        ?>        
        <form method="post">
            <?php if($data[password]!='') { 
                if($_POST[password]==$data[password]){
                    $_SESSION['download'] = '1';
                    echo "Please Wait... Download starting in a while...
                    <input type='hidden' name='password' value='{$_POST[password]}' />
                    
                    </form>
                    
                    <script>
                    window.opener.location.href='$_SERVER[HTTP_REFERER]'; self.close();</script>
                    ";     
                                        
                    die();
                } else {
                ?>
                Enter Password: <input type="password" size="10" name="password" /> 
           <?php }}
           else
           $_SESSION['download'] = 1;
            ?>
        <input type="submit" value="Download"/>
        </form>
        
        <?php
        die();
   }

else{
    echo "Error!";
}


    die();
}
?>
