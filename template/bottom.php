
        

        <div class="footer">
        	<div class="pagination"><ul class="clearfix"><li class='disabled'>
       			 

        		<?php
        		if($page != "1"){
				$prev = $page-1;
				echo "<li><a href=\"$pnombre.php?page=$prev\">Ant</a>";
			}
				for ( $counter = 0; $counter < $Paginastotales; $counter += 1) {
				$current=$counter+1;
				echo "<li ";
				if($current==$page){
				echo "class='current'";

				}
				echo "><a href=\"$pnombre.php?page=$current\">";
				echo $counter+1;
				echo "</a>";
				}
				if($page < $Paginastotales){
				$next = $page+1;
				echo "<li><a href=\"$pnombre.php?page=$next\">Sig</a>";
				}
        		?>


       			<!--  <div >&laquo; Ant</div>
       				 </li><li class='current'><a href='#'>1</a></li><li ><a href='#'>2</a></li><li><a href='#' >Sig &raquo;</a></li></ul>

			-->
		</div>
			
		</div> <!-- end content-->

	</div>
</div>
</div>

</body>
</html>