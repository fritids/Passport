<div id="modal-signup" class="modal modal-style-large">
	<article id="modal-welcome">
		<?php
			$user = get_user_info();
			//print_r($user);
			echo '<h2>Hello '.$user->first_name.'</h2>';
		?>
		<h3>Welcome to the Denizen Network</h3>
	</article>
	<form>
		<section id="modal-signup-scrollable">
			<div class="items">
				<article id="modal-screen-signup-schools" class="poo">
					
						<?php
							include('add-school-row.php');
						?>
						
						<a href="#" class="trigger-add-school-row add-school-row ">
							Add another international school
						</a>
						
						
					</form>
				</article>
				
			</div>
		</section>
		<input type="submit" value="Sign-up" class="submit-signup trigger-signup-complete"/>
		<input type="submit" value="No Thanks" class="signup-no-thanks trigger-signup-cancel"/>
		
	</form>
	
</div>