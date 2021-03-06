<?php
/**
 * 两个链表的第一个公共结点
 * 题目：输入两个链表，找出它们的第一个公共结点。
 */

/**
 * 查找两个链表的第一个公共节点
 * @param $list1
 * @param $list2
 * @return null
 */
function towLinkedListNode($list1, $list2) {
	$length1 = linkedListLength($list1);
	$length2 = linkedListLength($list2);

	if ($length1 > $length2) {
		$c = $length1 - $length2;
		$big = $list1;
		$small = $list2;
	}else {
		$c = $length2 - $length1;
		$big = $list2;
		$small = $list1;
	}

	// 先让长的走差值
	for ($i = 0; $i < $c; $i++) {
		$big = $big->next;
	}

	// 长的和短的一起走, 相遇
	while ($small != NULL) {
		if ($small === $big) {
			return $small;
		}
		$small = $small->next;
		$big = $big->next;
	}
	return NULL;
}

/**
 * 获取链表的长度
 * @param $linkedList
 * @return int
 */
function linkedListLength($linkedList) {
	$n = 0;
	$current = $linkedList;
	while ($current != NULL) {
		$n += 1;
		$current = $current->next;
	}
	return $n;
}

// test
class LinkedListNode {
	public $next = NULL;
	public $data;
	public function __construct($data = "") {
		$this->data = $data;
	}
}

$a1 = new LinkedListNode("a1");
$a2 = new LinkedListNode("a2");
$a3 = new LinkedListNode("a3");
$a4 = new LinkedListNode("a4");
$a5 = new LinkedListNode("a5");
$a6 = new LinkedListNode("a6");

$b1 = new LinkedListNode("b1");
$b2 = new LinkedListNode("b2");
$b3 = new LinkedListNode("b3");

$c1 = new LinkedListNode("c1");
$c2 = new LinkedListNode("c2");
$c3 = new LinkedListNode("c3");
$c4 = new LinkedListNode("c4");

$a1->next = $a2;
$a2->next = $a3;
$a3->next = $a4;
$a4->next = $a5;
$a5->next = $a6;
$a6->next = $c1;

$b1->next = $b2;
$b2->next = $b3;
$b3->next = $c1;
$c1->next = $c2;
$c2->next = $c3;
$c3->next = $c4;

$headA = new LinkedListNode();
$headB = new LinkedListNode();
$headA->next = $a1;
$headB->next = $b1;

$commonNode = towLinkedListNode($headA, $headB);
echo $commonNode->data."\r\n";