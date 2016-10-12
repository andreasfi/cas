<?php
$pageTitle = $this->vars['pageTitle'];
$pageMessage = $this->vars['pageMessage'];
$eventId = $this->vars['eventId'];
include_once ROOT_DIR.'views/header.inc';

?>


    <script>
        function addBox()
        {
            //window.location.replace("sorties/inscription/"+$("#participantsNumber").val());
            var numberP = document.getElementById("participantsNumber").value;

            if(numberP > 6)
            {
                alert("Trop de participants, veuillez inscrire au maximum 5");
                document.getElementById("participantsNumber").value = null;
                for(i = 1; i <= numberP; i++)
                {
                    document.getElementById('blockP'+i).style.display = "none";
                }
            }

            else
            {
                for(i = 1; i <= numberP; i++)
                {
                    document.getElementById('blockP'+i).style.display = "block";
                    document.getElementById('inscriptionBlock').style.display = "block";
                }
            }


        }
		
		
		function sendRequest(){
			$.post($(location).attr('origin') + '/cas/sorties/details.php',{
					participantsNumber : $('#participantsNumber').val(),
					eventId : <?php echo $eventId;?>
				}, 
				function(data){
					window.location.replace('/cas/sorties/details/' + <?php echo $eventId ?>)
				});
		}
		

    </script>
<form action="<?php echo URL_DIR.'sorties/details/'.$eventId;?>" method="post">
	<input name='testName' type=text required placeholder="test">
	<input type=submit>
</form>








<?php
unset($_SESSION['msg']);
include_once ROOT_DIR.'views/footer.inc';
?>