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
            <?php 
                $did = uniqid();
                if($_POST['password']==$data['password']&&count($_POST)>0){
                    
                    $_SESSION[$did] = $data;
                    echo "Please Wait... Download starting in a while...
                    </form>
                    
                    <script>
                    window.opener.location.href='".get_option('siteurl')."/wp-content/plugins/donwload-manager/process.php?did={$did}'; 
                    self.close();
                    </script>
                    ";     
                                        
                    die();
                } else {
                    if($data['password']!=''){
                ?>
                Enter Password: <input type="password" size="10" name="password" /> 
           <?php }else{?>
           <input type="hidden" name="password" value="" /> 
           <?php }}
           
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
