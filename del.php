
<?php
       
       include('conexion.php');
       include('header.php');
       
        ?>  

<body>
<?php

			if (!isset($_GET['do']) || $_GET['do'] != 1) {
								
	
			switch ($_GET['type']) {
				case 'clientes':
					$query = 'DELETE FROM clientes
							WHERE
							id = ' . $_GET['id'];
						$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
						
?>
			<script type="text/javascript">
				alert("Successfully Deleted.");
				window.location = "index.php";
			</script>				
				
			<?php
			//break;
				}
			}
			?>

</body>
</html>