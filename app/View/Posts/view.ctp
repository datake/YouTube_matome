<h2><?php echo h($post['Post']['title']);?></h2>
<p><?php echo h($post['Post']['body']);?></p>
<p><?php echo h($post['Post']['URL']);?></p>
(<?php echo h($post['Post']['created']);?>)

<iframe width="560" height="315" src="//<?php echo h($post['Post']['URL']);?>" frameborder="0" allowfullscreen></iframe>

<h2>Comments</h2>
 
<ul>
	<!--postにcommentがついてくる-->
<?php foreach ((array)$post['Comment'] as $comment): ?>

<li id="comment_<?php echo h($comment['id']); ?>">
<?php echo h($comment['body']) ?> by <?php echo h($comment['commenter']); ?>
<?php
echo $this->Html->link('Edit(工事中)',array('controller'=>'comments','action'=>'edit',$comment['id']));
?>

<?php
echo $this->Html->link('Remove', '#', array('class'=>'delete', 'data-comment-id'=>$comment['id'],$comment['post_id']));
?>
</li>


<?php endforeach; ?>
</ul>

<h2>Add Comment</h2>
 

<?php
echo $this->Form->create('Comment', array('action'=>'add'));
echo $this->Form->input('commenter');
echo $this->Form->input('body', array('rows'=>3));
echo $this->Form->input('Comment.post_id', array('type'=>'hidden', 'value'=>$post['Post']['id']));
echo $this->Form->end('post comment');
?>


<h2>Edit Comment</h2>
<?php
echo $this->Form->create('Comment', array('action'=>'edit'));
echo $this->Form->input('commenter');
echo $this->Form->input('id');//表示されない？
echo $this->Form->input('post_id');
echo $this->Form->input('created');
echo $this->Form->input('body', array('rows'=>3));
/*echo $this->Form->input('Comment.post_id', array('type'=>'hidden', 'value'=>$post['Post']['id']));*/
echo $this->Form->end('edit comment');
?>

<script>
$(function() {
	$('a.delete').click(function(e) {
		if (confirm('sure?')) {
			$.post('/cakephp-blog/comments/delete/'+$(this).data('comment-id'), {}, function(res) {
			$('#comment_'+res.id).fadeOut();
		}, "json");
	}
return false;
});
});
</script>












