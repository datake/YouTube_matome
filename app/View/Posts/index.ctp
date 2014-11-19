<!--//こんにちは???さんの処理 http://www.moonmile.net/blog/archives/4858-->



   <h2>Videos</h2>
     <!--
   <ul data-role="listview" data-filter="false">
            <li>
                <a href="#menu">
                <img src="http://img.youtube.com/vi/7KDez9VsV6w/3.jpg">
                <h3>赤いページ</h3>
                <p>なんかの説明。なんかの説明。なんかの説明。なんかの説明。</p>
                </a>
            </li>
            <li>
                <a href="#menu">
                <img src="http://img.youtube.com/vi/7KDez9VsV6w/3.jpg">
                <h3>青いページ</h3>
                <p>なんかの説明。なんかの説明。なんかの説明。なんかの説明。</p>
                </a>
            </li>
            <li>
                <a href="#menu">
                <img src="http://img.youtube.com/vi/7KDez9VsV6w/3.jpg">
                <h3>黄色いページ</h3>
                <p>なんかの説明。なんかの説明。なんかの説明。なんかの説明。</p>
                </a>
            </li>
        </ul>
    -->
    <ul style="list-style:none;">
    <?php foreach ($posts as $post) : ?>
    <li id="post_<?php echo h($post['Post']['id']); ?>">
    <img src="http://img.youtube.com/vi/<?php echo h($post['Post']['URL']); ?>/3.jpg" alt="alt here..." />
    
    <?php
    //debug($post);
    //    echo h($post['Post']['title']);
    echo $this->Html->link($post['Post']['title'],'/posts/view/'.$post['Post']['id']);;
    ?>
    <?//php echo h($post['Post']['URL']);?>
    <?php //echo h($post['Post']['created']);?>
    <?php echo $this->Html->link('編集',array('action'=>'edit',$post['Post']['id']));?>
    
    <?php
    //クラスとデータ属性を指定してjQueryでとる
    echo $this->Html->link('削除', '#', array('class'=>'delete', 'data-post-id'=>$post['Post']['id']));
    ?>
    </li>
    <?php endforeach; ?>
    </ul>
    <h2>Upload </h2>
    <?php echo $this->Html->Link('Upload from here',array('controller'=>'posts','action'=>'add'));?>
<!--<h2>Viewers</h2>
<ul>
  
   <?php foreach ($viewers as $viewer) : ?>
    <li>
    
    <?php echo h($viewer['Viewer']['viewersid']);?>
     <?php echo h($viewer['Viewer']['name']);?>
     <?php echo h($viewer['Viewer']['mail']);?>

    
    
    </li>
    <?php endforeach; ?>
    </ul>

-->

<!--サイドバー-->
<div>
    <!--
    <?php if ($auth->loggedIn()) : ?>
    <?php echo h($auth->user('username')); ?> さん、こんにちは <a href="/cakephp-blog/Users/logout">logout</a>
    <?php else: ?>
    <a href="/cakephp-blog/Users/login">login</a>
    <?php endif ?>-->
</div><!--
<div class="actions">
     <?php if ($auth->loggedIn()) : ?>
    <?php echo h($auth->user('username')); ?> さん、<br>こんにちは<br><br> <a href="/cakephp-blog/Users/logout">logout</a>
    <?php else: ?>
    <a href="/cakephp-blog/Users/login">login</a>
    <?php endif ?>
    <br>
    <br>
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
    </ul>
</div>-->
<script>
$(function() {
    $('a.delete').click(function(e) {//a要素のdeleteクラスがついたものがクリックされた処理
        if (confirm('sure?')) {
            //次の行パスを間違えてはまった!注意！
            $.post('/cakephp-blog/posts/delete/'+$(this).data('post-id'), {}, function(res) {
                //削除にフェードアウトを使う
                $('#post_'+res.id).fadeOut();
            }, "json");
        }
        return false;
    });
});
</script>








