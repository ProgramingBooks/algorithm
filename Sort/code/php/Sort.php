<?php
/**
 * 排序算法实现
 * @author phachon@163.com
 */

class Sort {

	/**
	 * Sort constructor.
	 */
	public function __construct() {}

	/**
	 * 选择排序
	 * @param array $data
	 * @return array
	 */
	public function select($data = array()) {
		$count = count($data);
		for ($i = 0; $i < $count; $i++) {
			// 每次都假设第一个位置为最小的元素
			$min = $i;
			for ($j = $i + 1; $j < $count; $j ++) {
				if ($data[$j] < $data[$min]) {
					$min = $j;
				}
			}
			// 判断最小的数是否还是 $i, 否则交换位置
			if ($min != $i) {
				$tmp = $data[$i];
				$data[$i] = $data[$min];
				$data[$min] = $tmp;
 			}
		}
		return $data;
	}

	/**
	 * 冒泡排序
	 * @param array $data
	 * @return array
	 */
	public function bubbling($data = array()) {
		$count = count($data);
		for ($i = 0; $i < $count; $i++) {
			for($j = 0; $j < $count - $i - 1; $j++) {
				if ($data[$j] > $data[$j + 1]) {
					$tmp = $data[$j + 1];
					$data[$j + 1] = $data[$j];
					$data[$j] = $tmp;
				}
			}
		}
		return $data;
	}

	/**
	 * 直接插入排序
	 * @param array $data
	 * @return array
	 */
	public function insert($data = array()) {
		$count = count($data);
		for ($i = 1; $i < $count; $i++) {
			$insert = $data[$i];
			for ($j = $i - 1; $j >= 0; $j--) {
				if ($insert < $data[$j]) {
					$data[$j+1] = $data[$j];
				}else {
					break;
				}
			}
			$data[$j+1] = $insert;
		}
		return $data;
	}

	/**
	 * 二分插入排序
	 * @param array $data
	 * @return array
	 */
	public function binaryInsert($data = array()) {
		$count = count($data);
		for ($i = 1; $i < $count; $i++) {
			$insert = $data[$i];
			if ($insert < $data[$i-1]) {
				// 二分查找插入
				// 0 ~ (i -1)
				$left = 0;
				$right = $i - 1;
				while ($left <= $right) {
					$middle = intval(($left + $right) / 2);
					if ($insert < $data[$middle]) {
						$right = $middle - 1;
					} else {
						$left = $middle + 1;
					}
				}
				// 找到位置，位置之后元素后移
				for ($k = $i - 1; $k >= $left; $k--) {
					$data[$k + 1] = $data[$k];
				}
				$data[$left] = $insert;
			}
		}


		return $data;
	}

	/**
	 * 快速排序
	 * @param array $data
	 * @return array
	 */
	public function quick($data = array()) {
		$count = count($data);
		if(count($data) <= 1) {
			return $data;
		}
		// 基准数
		$key = $data[0];
		$bigList = [];
		$smallList = [];

		// 以基准数为界限分隔
		for ($i = 1; $i < $count; $i++) {
			if ($data[$i] > $key) {
				array_push($bigList, $data[$i]);
			}else {
				array_push($smallList, $data[$i]);
			}
		}

		$bigList = $this->quick($bigList);
		$smallList = $this->quick($smallList);

		return array_merge($smallList, array($key), $bigList);

	}

	/**
	 * 归并排序
	 * @param array $data
	 * @return array
	 */
	public function merge($data = array()) {
		$start = 0;
		$end = count($data) - 1;
		$this->_mergeSort($start, $end, $data);
		return $data;
	}

	/**
	 * 递归拆分并合并
	 * @param array $data
	 * @param $start
	 * @param $end
	 */
	private function _mergeSort($start, $end, array &$data) {
		if ($start < $end) {
			$middle = floor(($start + $end) / 2);

			// 左半部分
			$this->_mergeSort($start, $middle, $data);
			// 右半部分
			$this->_mergeSort($middle + 1, $end, $data);

			// 归并操作
			$this->_merge($start, $middle, $end, $data);
		}
	}

	/**
	 * 将一个数组中的两个相邻有序区间合并成一个
	 * @param $start
	 * @param $middle
	 * @param $end
	 * @param $data
	 */
	private function _merge($start, $middle, $end, array &$data) {
		$i = $start;
		$j = $middle + 1;
		$k = $start;
		$tmpArr = [];

		while($i != $middle + 1 && $j != $end+1) {
			if($data[$i] < $data[$j]) {
				$tmpArr[$k++] = $data[$i++];
			}else {
				$tmpArr[$k++] = $data[$j++];
			}
		}

		// 第一个序列的剩余部分添加到数组
		while ($i != $middle+1) {
			$tmpArr[$k++] = $data[$i++];
		}
		// 第二个序列的剩余部分添加到数组
		while ($j != $end+1) {
			$tmpArr[$k++] = $data[$j++];
		}

		// 改变 data
		for($i = $start; $i <= $end; $i++) {
			$data[$i] = $tmpArr[$i];
		}
	}

	/**
	 * 希尔排序
	 * @param $data
	 * @return mixed
	 */
	public function shell($data) {
		$count = count($data);
		// 分组的大小
		$number = 2;

		// gap为步长，每次减为原来的一半。
		for ($gap = floor($count/$number); $gap > 0; $gap = floor($gap/$number)) {
			// 对 gap 个分组数组执行直接插入排序
			for ($i = 0; $i < $gap; $i++) {
				// 直接插入排序
				for ($j = $i; $j < $count; $j += $gap) {
					$insert = $data[$j];
					for ($z = $j - $gap; $z >= $i; $z -= $gap) {
						if ($insert < $data[$z]) {
							// 移动元素到后面
							$data[$z+$gap] = $data[$z];
						}else {
							break;
						}
					}
					$data[$z+$gap] = $insert;
				}
			}
		}

		return $data;
	}

	/**
	 * 堆排序
     * 第一个非叶子结点 count(arr)/2-1
	 * @param array $data
	 */
	public function heap($data = array()) {

		// 1. 构建大顶堆
		for ($i = floor(count($data) / 2) - 1; $i >= 0; $i--) {
			// 从下至上，从右至左调整
			$this->_makeMaxHeap($data);
		}

		// 2. 交换堆顶元素和末尾元素，重新调整堆结构
	}

	/**
	 * 调整大顶堆
	 * 大顶堆：arr[i] >= arr[2i+1] && arr[i] >= arr[2i+2]
	 * @param array $data
	 * @param $i
	 */
	private function _makeMaxHeap($i, $data = array()) {
		$current = $data[$i];

		for ($k = $i*2 + 1; $k < count($data); $k = $i*2 + 1) { //从i结点的左子结点开始，也就是2i+1处开始
			if($k+1 < count($data) && $data[$k] < $data[$k+1]) { //如果左子结点小于右子结点，k 指向右子结点
				$k++;
			}

			if($data[$k] > $current){//如果子节点大于父节点，将子节点值赋给父节点（不用进行交换）
				$data[$i] = $data[$k];
				$i = $k;
			}else{
				break;
			}
		}

		$data[$i] = $current;//将temp值放到最终的位置
	}
}