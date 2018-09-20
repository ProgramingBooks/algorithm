<?php
/**
 * 题目：从上到下打印二叉树，要求同一层结点从左至右输出
 * @param $tree
 * @return array
 */
function printBinaryTree($tree) {
	$data = [];
	$queue = new SplQueue();
	$queue->push($tree);
	while (!$queue->isEmpty()) {
		$node = $queue->pop();
		array_push($data, $node->data);
		if ($node->left) {
			$queue->push($node->left);
		}
		if ($node->right) {
			$queue->push($node->right);
		}
	}
	return $data;
}



/**
 * 题目：从上到下按层打印二叉树。要求同一层结点从左至右输出，每一层输出一行。
 * @param $tree
 * @return array
 */
function printBinaryTree1($tree) {
	$data = [];
	$queue = new SplQueue();
	if ($tree == null) {
		return [];
	}
	$queue->push($tree);
	while(!$queue->isEmpty()) {
		$count = $queue->count();
		$item = [];
		while($count--) {
			$node = $queue->shift();
			array_push($item, $node->data);
			if ($node->left) {
				$queue->push($node->left);
			}
			if ($node->right) {
				$queue->push($node->right);
			}
		}
		array_push($data, $item);
	}
	return $data;
}

/**
 * 题目：从上到下按层打印二叉树。按之字形顺序打印二叉树
 * 即第一层按照从左到右的顺序打印
 * 第二行按照从右至左的顺序打印，
 * 第三行按照从左到右的顺序打印，
 * 其他行以此类推。
 * @param $tree
 * @return array
 */
function printBinaryTree2($tree) {
	$stack1 = new SplStack();
	$stack2 = new SplStack();
	$data = [];
	$stack1->push($tree);
	while (!$stack1->isEmpty() || !$stack2->isEmpty()) {
		//todo

	}
	return $data;
}

// test
class BinaryTreeNode {
	public $left;
	public $right;
	public $data;
	public function __construct($data = "") {
		$this->data = $data;
	}
}
$root = new BinaryTreeNode(10);
$root->left = new BinaryTreeNode(12);
$root->right = new BinaryTreeNode(18);

$root->left->left = new BinaryTreeNode(16);
$root->left->right = new BinaryTreeNode(2);

$root->right->left = new BinaryTreeNode(17);
$root->right->right = new BinaryTreeNode(24);

$root->left->left->left = new BinaryTreeNode(19);
$root->right->right->left = new BinaryTreeNode(222);

// print
$data = printBinaryTree($root);
echo implode(",", $data)."\r\n";
echo "----------------------------\r\n";

// print1
$data = printBinaryTree1($root);
foreach ($data as $val) {
	echo implode(",", $val)."\r\n";
}
echo "----------------------------\r\n";

// print2
$data = printBinaryTree2($root);
foreach ($data as $val) {
	echo implode(",", $val)."\r\n";
}