<?php 



 if (in_array("<span style='color: red;'>Only letters and white space are allowed<br>", $error_array)) {
						echo "<span style='color: red; font-size:12px;'>Only letters and white space are allowed<br>";
					}else{
						if(in_array("<span style='color: red; font-size:12px;'>Invalid format<br>", $error_array)){
							echo "<span style='color: red; font-size:12px;'>Invalid format<br>";
						}
					} ?>

					<input type="text" name="name" placeholder="Enter name" value="<?php 
					if(isset($_SESSION['name'])) {
						echo $_SESSION['name'];
					} 
					?>" required>
					<br>


					<input type="number" name="phone" placeholder="Mobile" value="<?php 
					if(isset($_SESSION['phone'])) {
						echo $_SESSION['phone'];
					} 
					?>" required> <br>

					<?php if (in_array("<span style='color: red;'>provide address<br>", $error_array)) {
						echo "<span style='color: red; font-size:12px;'>provide address<br>";
					} ?>
					<input type="text" name="add" placeholder="Address" value="<?php 
					if(isset($_SESSION['add'])) {
						echo $_SESSION['add'];
					} 
					?>" required> <br>

					<!--Selecting an input box based on Login/Register Type Start-->
                        <?php if (in_array("<span style='color: red;'>Rank cannot be empty<br>", $error_array)) {
                        	echo "<span style='color: red; font-size:12px;'>Rank/occupation cannot be empty<br>";
                        } ?>
		
                   <input type="text" name="rank" placeholder="Rank/Occupation" value="<?php if(isset($_SESSION['rank'])){echo $_SESSION['rank'];} ?>">
	
                  <!--Selecting an input box based on Login/Register Type Ends -->
					<br>

					<?php if (in_array("<span style='color: red;'>Select gender<br>", $error_array)) {
                           	echo "<span style='color: red; font-size:12px;'>Select gender<br>";
                           } ?>
                      <select name="gender" id="gender" class="form-control">
                           <option value="">Gender</option>
                             
                             <option value="Male">Male</option>
                             <option value="Female">Female</option>
                             <option value="Other">Other</option>
                      
                           </select>
					
					<br>

	 ?>