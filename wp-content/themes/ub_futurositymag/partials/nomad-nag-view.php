<div id="modal-signup" class="modal modal-style-large">
	<article id="modal-welcome">
		<?php
			$user = get_user_info();
			//print_r($user);
			echo '<h2>Hello '.$user->first_name.'</h2>';
		?>
		<h3><strong>Welcome to the Denizen Community!</strong> We are a global network of people who grew up attending international schools. To join your school's network, please indicate which international schools you attended.</h3>
	</article>
	<form>
		<section id="modal-signup-scrollable" class="scrollable">
			<div class="items">
				<article id="modal-screen-signup-schools" class="slide">
					
						<?php
							include('add-school-row.php');
						?>
						
						<p class="add-school-extra-info">If you attended the same school twice, enter it twice with the two different time spans you attended.</p>
						
						<a href="#" class="trigger-add-school-row add-school-row ">
							<span class="circ"><span class="plusser">+</span></span> Add another International School
						</a>
						
						
						<input type="button" value="Sign-up" class="submit-signup trigger-signup-complete"/>
						<input type="button" value="No Thanks" class="signup-no-thanks trigger-signup-cancel"/>
						
						
					</form>
				</article>
				<article id="modal-screen-signup-complete" class="slide">
					<h3><strong>Thanks!</strong> You can now keep up with Third Culture Kids and other International School students and alums from around the world.</h3>
					<div class="btn-group">
						<?php
							echo '<a href="'.$user->permalink.'" class="trigger-goto-profile btn-large-light">Go to My Profile</a>';
						?>
						<a href="#" class="trigger-close-modal btn-large-light">Close this window</a>
					</div>
				</article>
				
			</div>
		</section>
		
		
	</form>
	
</div>