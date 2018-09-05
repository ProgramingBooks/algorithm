<?php
/**
 * 单向链表节点, 主要用于桶排序
 * @author phchon@163.com
 */

class LinkedNode {

	/**
	 * 指针
	 * @var null
	 */
	public $next = NULL;

	/**
	 * 数据元素
	 * @var string
	 */
	public $data = NULL;

	/**
	 * LinkedNode constructor.
	 * @param $data
	 */
	public function __construct($data = NULL) {
		$this->data = $data;
	}

}