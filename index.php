<?php 
include("includes/header.php");


if(isset($_POST['post'])){
	$post = new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_text'], 'none');
}


 ?>
		<div class="user_details column" style="margin-top:-15px;background:#E6EAE8;display:block">
			<a href="<?php echo $userLoggedIn; ?>" style="display:flex;">
				<div >  
					<img src="<?php echo $user['profile_pic']; ?>" style="height:30px;width:30px;border-radius:50%" > 
				</div>

				<div class="" style="margin-top:5px;margin-left:15px">
					<span style="font-size:2rem;color:#000;font-family:Segoe UI, sans-serif" >
					<?php 
					echo $user['first_name'] . " " . $user['last_name'];

					 ?></span>
				</div>
			</a>
			<a href="messages.php" style="display:flex;margin-top:20px">
				<div style="height:30px;width:30px;">
					<i class="fa fa-envelope fa-lg fa-2x"></i>
				</div>
				<div class="" style="margin-left:19px">
					<span style="font-size:2rem;color:#000;font-family:Segoe UI, sans-serif" >Tin nhắn</span>
				</div>
			</a>
			<a href="settings.php" style="display:flex;margin-top:20px">
				<div style="height:30px;width:30px;">
					<i class="fa fa-cog fa-lg fa-2x"></i>
				</div>
				<div class="" style="margin-left:19px">
					<span style="font-size:2rem;color:#000;font-family:Segoe UI, sans-serif" >Cài đặt</span>
				</div>
			</a>
		<div>
		</div>
		</div>


		<div class="main_column column" style="margin-top:-15px;background:#E6EAE8">
			<div style="position: relative;
    					padding: 15px 15px 20px 65px;background:#fff;border-radius:10px;margin-bottom: 20px;
						" data-toggle="modal" data-target="#my-modal">
						<img src="<?php echo $user['profile_pic']; ?>" style="position: absolute;left: 15px;top: 15px;width: 40px;height: 40px;padding: 2px;border: 1px solid #efefef;border-radius: 50%;" > 
						<div style="height:40px">
							<textarea style="    overflow: hidden;overflow-wrap: break-word;height: 24px;background: 0 0;direction: ltr;resize: none;outline: 0;width: 100%;margin-top: 5px;padding: 0;font-size: 15px;line-height: 24px;height: 20px;border: 0 none;    margin: 0;font-family: inherit;text-rendering: auto;color: -internal-light-dark(black, white);letter-spacing: normal;word-spacing: normal;text-transform: none;text-indent: 0px;text-shadow: none;"data-init-placeholder="What is on your mind? #Hashtag.. @Mention.. Link.." placeholder="What is on your mind? #Hashtag.. @Mention.. Link.." autocomplete="off"></textarea>
						</div>
						
						</div>
			<div></div>
			<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<form action="index.php" method="POST"  class="modal-content" style="width:540px">
      					<div class="modal-header">
        					<h5 class="modal-title" id="exampleModalLabel">Tạo bài mới</h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						<span aria-hidden="true">&times;</span>
        					</button>
      					</div>
      					<div class="modal-body">
							<textarea style="background: 0 0;
							  direction: ltr;resize: none;
							  outline: 0;width: 100%;margin-top: 5px;
							  padding: 0;font-size: 15px;line-height: 24px;border: 0 none;    margin: 0;" name="post_text" id="post_text" placeholder="Got something to say?"></textarea>
      					</div>
      					<div class="modal-footer">
        					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        					<input type="submit" class="btn btn-primary" name="post" id="post_button" value="POST"></input>
      					</div>
    				</form>
				</div>
			</div>

			<div class="posts_area">
			</div>
			<img id="loading" src="assets/images/icons/loading.gif">


		</div>

		<div class="user_details column">

			<h4>Popular</h4>

			<div class="trends">
			<?php 
			$query = mysqli_query($con, "SELECT * FROM trends ORDER BY hits DESC LIMIT 9");

				foreach ($query as $row) {
				
				$word = $row['title'];
				$word_dot = strlen($word) >= 14 ? "..." : "";

				$trimmed_word = str_split($word, 14);
				$trimmed_word = $trimmed_word[0];

				echo "<div style'padding: 1px'>";
				echo $trimmed_word . $word_dot;
				echo "<br></div><br>";


				}

			?>
			</div>

			<div>
				
			</div>
		</div>
	    </div>
	



	<script>
	var userLoggedIn = '<?php echo $userLoggedIn; ?>';

	$(document).ready(function() {

		$('#loading').show();

		//Original ajax request for loading first posts 
		$.ajax({
			url: "includes/handlers/ajax_load_posts.php",
			type: "POST",
			data: "page=1&userLoggedIn=" + userLoggedIn,
			cache:false,

			success: function(data) {
				$('#loading').hide();
				$('.posts_area').html(data);
			}
		});

		$(window).scroll(function() {
			var height = $('.posts_area').height(); //Div containing posts
			var scroll_top = $(this).scrollTop();
			var page = $('.posts_area').find('.nextPage').val();
			var noMorePosts = $('.posts_area').find('.noMorePosts').val();

			if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
				$('#loading').show();

				var ajaxReq = $.ajax({
					url: "includes/handlers/ajax_load_posts.php",
					type: "POST",
					data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
					cache:false,

					success: function(response) {
						$('.posts_area').find('.nextPage').remove(); //Removes current .nextpage 
						$('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage 

						$('#loading').hide();
						$('.posts_area').append(response);
					}
				});

			} //End if 

			return false;

		}); //End (window).scroll(function())


	});

	</script>




	</div>
</body>
</html>