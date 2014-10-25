    <?php
     
    class Comment extends AppModel {
    	//全てのコメントはpostに帰属する
    public $belongsTo = 'Post';
    }