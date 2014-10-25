<?php
class Post extends AppModel{
	//postにコメントもひっぱってくる
	public $hasMany = "Comment";
	public $validate=array(
		'title'=>array(
			'rule'=>'notEmpty',
			'message'=>'なんか入力してね'
			),
		'body'=>array(
			'rule'=>'notEmpty',
			'message'=>'なんか入力してね'
		)
	);

		
}