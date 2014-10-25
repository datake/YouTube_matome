   <h2>Videos</h2>
     
    <ul>
    <?php foreach ($posts as $post) : ?>
    <li id="post_<?php echo h($post['Post']['id']); ?>">
    <?php
    //debug($post);
    //    echo h($post['Post']['title']);
    echo $this->Html->link($post['Post']['title'],'/posts/view/'.$post['Post']['id']);;

    ?>
    <?php echo h($post['Post']['URL']);?>
    (<?php echo h($post['Post']['created']);?>)
    <?php echo $this->Html->link('編集',array('action'=>'edit',$post['Post']['id']));?>
    
    <?php
    //クラスとデータ属性を指定してjQueryでとる
    echo $this->Html->link('削除', '#', array('class'=>'delete', 'data-post-id'=>$post['Post']['id']));
    ?>
    </li>
    <?php endforeach; ?>
    </ul>
    <h2>Upload </h2>
    <?php echo $this->Html->Link('Add post',array('controller'=>'posts','action'=>'add'));?>
<h2>Viewers</h2>
<ul>
  
 <!--   <?php foreach ($viewers as $viewer) : ?>
    <li>
    
    <?php echo h($viewer['Viewer']['viewersid']);?>
     <?php echo h($viewer['Viewer']['name']);?>
     <?php echo h($viewer['Viewer']['mail']);?>

    
    
    </li>
    <?php endforeach; ?>
    </ul>

-->


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








