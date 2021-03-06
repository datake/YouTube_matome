<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
		<?php ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<!--<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>-->
	 <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link('動画まとめ', '/'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php if ($auth->user('username')){
							echo h($auth->user('username'));?>
							 さんでloginしています。&nbsp;&nbsp;&nbsp;
							　<a href="/video-blog/Users/logout">logoutはこちら</a></h1>

						<?php 
					} elseif (!($auth->user('username'))) {?>
							
						 							<a href="/video-blog/Users/login">login</a>
<?php }?>
<!--form action="cgi-bin/abc.cgi" method="post">-->
&nbsp;

<input class="search_input" type="search" size="20">  
&nbsp;

<input  type ="submit" value="検索">
<!--</form>-->
<style>
.search_input{
width:150px;
}
</style>
</h1>
		</div>
		<div id="content">
			<!--<h2>default.php content </h2>-->
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>


	<script>
$(function() {
    setTimeout(function() {
        $('#flashMessage').fadeOut("slow");
    }, 800);
});
</script>

</body>
</html>
