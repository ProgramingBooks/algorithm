<?php
/**
 * 题目：请实现一个函数，用来判断一颗二叉树是不是对称的。注意，如果一个二叉树同此二叉树的镜像是同样的，定义其为对称的。
 * @author phachon
 */


/**
 * code
 * @param $treeNode
 * @return bool
 */
function binaryTree($treeNode) {
	return _comRoot($treeNode->left, $treeNode->right);
}
function _comRoot($left, $right) {
	if ($left == null) {
		return $right == null;
	}
	if ($right == null) {
		return false;
	}
	if ($left->data != $right->data) {
		return false;
	}

	return _comRoot($left->left, $right->right) && _comRoot($left->right, $right->left);
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
$root->right = new BinaryTreeNode(12);

var_dump(binaryTree($root));