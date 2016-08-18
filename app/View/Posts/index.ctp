 <style>
        body {
            text-align:center;
        }
        
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        li.movie {
            float:left;
            width:120px;
            padding:10px;
        }
#contents {
    width: 960px;
    margin: 0 auto;
    overflow: hidden;
    //background: #ccc;
}

.grid4 {
        float: left;
        width: 200px;
        height:180px;
	//background: #9fb7d4;
        margin: 10px;
        padding: 10px;
}
.block_videos{
//padding :10px;
}
</style>
 <div id = "contents">
   <h2>Videos</h2>
  <?php $count = 0;?>
  <?php shuffle($posts)?> 
  <?php foreach ($posts as $post) : ?>
   <?php 
$count = $count + 1;
if ($count >98){
    break;
}?>
  <div class="grid4">
    <p id="post_<?php echo h($post['Post']['id']); ?>" class="movie">
    <img src="http://img.youtube.com/vi/<?php echo h($post['Post']['URL']); ?>/hqdefault.jpg" width="196" height="110"  alt="alt here..." />
    <br>
    <?php
    echo $this->Html->link($post['Post']['title'],'/posts/view/'.$post['Post']['id']);;
    ?>
    <br>
    <?php echo $this->Html->link('編集',array('action'=>'edit',$post['Post']['id']));?>
    
    <?php
    echo $this->Html->link('削除', '#', array('class'=>'delete', 'data-post-id'=>$post['Post']['id']));
    ?>
    </p>
</div>
      <?php endforeach; ?>
    </div>

   <!--  <ul >
    <?php foreach ($posts as $post) : ?>
    <li id="post_<?php echo h($post['Post']['id']); ?>" class="movie">
    <img src="http://img.youtube.com/vi/<?php echo h($post['Post']['URL']); ?>/3.jpg" alt="alt here..." />
    
    <?php
    echo $this->Html->link($post['Post']['title'],'/posts/view/'.$post['Post']['id']);;
    ?>
    <br>
    <?php echo $this->Html->link('編集',array('action'=>'edit',$post['Post']['id']));?>
    
    <?php
    echo $this->Html->link('削除', '#', array('class'=>'delete', 'data-post-id'=>$post['Post']['id']));
    ?>
    </li>
    <?php endforeach; ?>
    </ul>-->
</div>
<br><br><br><br>
    <h2>Upload </h2>
    <?php echo $this->Html->Link('Upload from here',array('controller'=>'posts','action'=>'add'));?>
<!--サイドバー-->
<div>
    <!--
    <?php if ($auth->loggedIn()) : ?>
    <?php echo h($auth->user('username')); ?> さん、こんにちは <a href="/video-blog/Users/logout">logout</a>
    <?php else: ?>
    <a href="/video-blog/Users/login">login</a>
    <?php endif ?>-->
</div>
<script>
$(function() {
    $('a.delete').click(function(e) {
        if (confirm('sure?')) {
            $.post('/video-blog/posts/delete/'+$(this).data('post-id'), {}, function(res) {
                //削除にフェードアウトを使う
                $('#post_'+res.id).fadeOut();
            }, "json");
        }
        return false;
    });
});
</script>








