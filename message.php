<?php

if(isset($_SESSION['mensagem'])):?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
<script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script> 
<script>
    //Mensagem
    window.onload = function() {
        M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});
    };
</script>

 <?php   
endif;

?>