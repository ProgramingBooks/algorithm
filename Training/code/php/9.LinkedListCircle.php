<?php
/**
 * 链表是否存在环
 * 题目：一个链表中包含环，请找出该链表的环的入口结点。
 */

/**
 * 链表是否存在环
 * @param $linkedHead
 * @return int
 */
function linkedListCircle($linkedHead) {

	if ($linkedHead == NULL || $linkedHead->next == NULL) {
		return NULL;
	}
	$first = $linkedHead;
	$last = $linkedHead;

	while ($first != NULL && $first->next != NULL) {
		$first = $first->next->next;
		$last = $last->next;
		// 不能用 == 判断变量相等（ == 会导致嵌套太深报错！）
		if ($last === $first) {
			// 存在环，查找入口节点
			$first = $linkedHead;
			while ($first != $last) {
				$first = $first->next;
				$last = $last->next;
			}
			if ($first == $last) {
				return $first;
			}
		}
	}
	return NULL;
}


class LinkedListNode {
	public $next = NULL;
	public $data;
	public function __construct($data = "") {
		$this->data = $data;
	}
}

/**
 *  构造环形链表
 */
function makeLinkedList() {
	$a1 = new LinkedListNode("a1");
	$a2 = new LinkedListNode("a2");
	$a3 = new LinkedListNode("a3");
	$a4 = new LinkedListNode("a4");
	$a5 = new LinkedListNode("a5");
	$a6 = new LinkedListNode("a6");
	$a7 = new LinkedListNode("a7");
	$a8 = new LinkedListNode("a8");

	$a1->next = $a2;
	$a2->next = $a3;
	$a3->next = $a4;
	$a4->next = $a5;
	$a5->next = $a6;
	$a6->next = $a7;
	$a7->next = $a8;
	$a8->next = $a4;
	$head = new LinkedListNode();
	$head->next = $a1;

	return $head;
}

// test

$head = makeLinkedList();
$node = linkedListCircle($head);
if ($node != NULL) {
	echo $node->data;
}else {
	echo "null";
}