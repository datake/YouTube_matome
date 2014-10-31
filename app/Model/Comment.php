    <?php
     
    class Comment extends AppModel {
    	//全てのコメントはpostに帰属する
    public $belongsTo = 'Post';
    public $validate=array(
		'commenter'=>array(
			'rule'=>'notEmpty',
			'message'=>'なんか入力してね'
			),
		'body'=>array(
			'rule'=>'notEmpty',
			'message'=>'なんか入力してね'
		)
	);
    }