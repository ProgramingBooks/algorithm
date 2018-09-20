<?php
/**
 * 求二叉树的深度
 * 题目：输入一棵二叉树，求该树的深度。从根结点到叶结点依次经过的结点（含根、叶结点）形成树的一条路径，最长路径的长度为树的深度
 * @author phachon
 */

/**
 * code
 * @param $root
 * @return bool|int
 */
function binaryTreeDepth($root) {
	if ($root == NULL) {
		return 0;
	}
	if ($root->left == NULL && $root->right == NULL) {
		return 1;
	}

	$leftDepth = 0;
	$rightDepth = 0;
	if ($root->left) {
		$leftDepth = binaryTreeDepth($root->left) + 1;
	}
	if ($root->right) {
		$rightDepth = binaryTreeDepth($root->right) + 1;
	}

	return ($leftDepth > $rightDepth) ? $leftDepth : $rightDepth;
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

echo binaryTreeDepth($root)."\r\n";
