<?php
/*
Template Name: page 2 form
*/
?>

<?php get_header(); ?>
<div class="wrapper">
	<form id="contact" action="mail.php" method="post">
	<h3>Форма обратной связи</h3>
		<div id="note"></div>
		<div id="fields">
			<p>
				<input type="text" name="name" id="author" placeholder="Имя" required> 
				<label for="author">Как вас зовут</label>
			</p>
			<p>
				<input type="email" name="email" id="email" placeholder="E-mail" required> 
				<label for="email">Электронная почта</label>
			</p>
			<p>
				<input type="text" name="sub" id="url" placeholder="Тема" required> 
				<label for="url">Тема сообщения</label>
			</p>
			<p>
				<textarea name="message" cols="1" rows="10" id="comment" placeholder="Введите сюда текст сообщения" required></textarea>
			</p>
			<div class="g-recaptcha" data-sitekey="6w1LdB0TAAAAAMXQinyLbR7iBknC1guI"></div>
			<p>
				<button type="submit" id="submit" class="go">Отправить сообщение</button>
			</p>
		</div>
	</form>
</div>
<?php get_footer(); ?>