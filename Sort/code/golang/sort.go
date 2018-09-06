package main

import (
	"math"
	"fmt"
)

// 排序算法的实现

type Sort struct {

}

// 选择排序
func (s *Sort) Select(data1 []int) ([]int) {
	data := data1
	count := len(data)
	for i := 0; i < count; i++ {
		min := i
		for y := i + 1; y < count; y++ {
			if data[y] < data[min] {
				min = y
			}
		}

		if min != i {
			tmp := data[min]
			data[min] = data[i]
			data[i] = tmp
		}
	}
	return  data
}

// 冒泡排序
func (s *Sort) Bubbling(data []int) []int {
	count := len(data)

	for i := 0; i < count; i++ {
		for j := 0; j < count - i -1; j++ {
			if data[j] > data[j+1] {
				tmp := data[j]
				data[j] = data[j+1]
				data[j+1] = tmp
			}
		}
	}
	return data
}

// 直接插入排序
func (s *Sort) Insert(data []int) []int {
	count := len(data)

	for i := 1; i < count; i++ {
		insert := data[i]
		var j int
		for j = i - 1; j >= 0; j-- {
			if insert < data[j]  {
				data[j+1] = data[j]
			}else {
				break
			}
		}
		data[j+1] = insert
	}
	return data
}

// 二分插入排序
func (s *Sort) BinaryInsert(data []int) []int {
	count := len(data)

	for i := 1; i < count; i++ {
		left := 0
		right := i - 1
		insert := data[i]

		for left <= right {
			middle := (left + right) / 2
			if insert > data[middle] {
				left = middle + 1
			}else {
				right = middle - 1
			}
		}

		for j := i-1; j >= left; j-- {
			data[j+1] = data[j]
		}
		data[left] = insert
	}
	return  data
}

// 快速排序
func (s *Sort) Quick(data []int) []int {
	count := len(data)
	if count <= 1 {
		return data
	}
	bigList := []int{}
	smallList := []int{}
	// 基准数
	tmp := data[0]

	for i := 1; i < count; i++ {
		if data[i] >= tmp {
			bigList = append(bigList, data[i])
		}else {
			smallList = append(smallList, data[i])
		}
	}

	bigList = s.Quick(bigList)
	smallList = s.Quick(smallList)

	res := append(smallList, tmp)
	res = append(res, bigList...)
	return res
}

// 归并排序
// 分而治之
func (s *Sort) Merge(data []int) []int {
	s.merge(0, len(data) - 1, data)
	return data
}

func (s *Sort) merge(start int, end int, data []int) {
	if start < end {
		middle := (start + end) / 2
		s.merge(start, middle, data)
		s.merge(middle+1, end, data)
		s.mergeList(start, middle, end, data)
	}
}

// 合并两个联系的数组
func (s *Sort) mergeList(start int, middle int, end int, data []int) {
	tmp := make([]int, len(data))
	lStart := start
	lEnd := middle

	rStart := middle + 1
	rEnd := end

	k := 0
	for (lStart <= lEnd) && (rStart <= rEnd) {
		if data[lStart] > data[rStart] {
			tmp[k] = data[rStart]
			rStart++
			k++
		}else {
			tmp[k] = data[lStart]
			lStart++
			k++
		}
	}
	// 检查是否剩余
	for lStart <= lEnd {
		tmp[k] = data[lStart]
		lStart++
		k++
	}
	for rStart <= rEnd {
		tmp[k] = data[rStart]
		rStart++
		k++
	}
	//移动元素
	for x := 0; x < k; x++ {
		data[start + x] = tmp[x]
	}
}

// 希尔排序
func (s *Sort) Shell(data []int) []int {

	count := len(data)
	// 第一次分组数
	size := 2

	// gap 为步长，每次减为原来的一半
	for gap := count / size ; gap > 0; gap /= size {
		// 对每组进行直接插入排序后再分
		for i := 0; i < gap; i++ {
			for x := i; x < count; x += gap {
				insert := data[x]
				var y int
				for y = x - gap; y >= i; y -= gap {
					if insert < data[y] {
						data[y+gap] = data[y]
					}else {
						break
					}
				}
				data[y+gap] = insert
			}
		}
	}
	return  data
}

// 计数排序
func (s *Sort) Count(data []int) []int {
	count := len(data)
	// 计算最大的数
	for i := 0; i < count - 1; i++ {
		if data[i] > data[i+1] {
			tmp := data[i+1]
			data[i+1] = data[i]
			data[i] = tmp
		}
	}
	max := data[count - 1]
	// 初始化桶
	bucket := make([]int, max+1)
	// 出现次数放入桶
	for x := 0; x < count; x++ {
		bucket[data[x]]++
	}
	// 对桶的数据累加
	for x := 1; x < max + 1; x++ {
		bucket[x] = bucket[x] + bucket[x-1]
	}
	out := make([]int, count)
	// 输出到新数组
	for x := 0; x < count; x++ {
		out[bucket[data[x]]-1] = data[x]
		bucket[data[x]]--
	}
	return out
}

// 单向链表节点
type LinkedNode struct {
	Next *LinkedNode
	Data int
}

func newLinkedNode() *LinkedNode {
	return &LinkedNode{
		Data: 0,
	}
}

// 桶排序
func (s *Sort) Bucket(data []int) []int {
	count := len(data)
	// 计算最大的数
	for i := 0; i < count - 1; i++ {
		if data[i] > data[i+1] {
			tmp := data[i+1]
			data[i+1] = data[i]
			data[i] = tmp
		}
	}
	max := data[count - 1]
	// 桶的数量
	size := 10
	// 初始化桶，桶中是单向链表，初始化头结点
	bucket := make([]*LinkedNode, size+1)
	for i := 0; i < len(bucket); i++ {
		bucket[i] = newLinkedNode()
	}

	// 满足条件的数据放入桶中
	for i := 0; i < count; i++ {
		bList := bucket[data[i] / (max /size)]
		// 对桶中的数排序
		current := bList
		for current.Next != nil {
			if data[i] < current.Next.Data {
				break
			}else {
				current = current.Next
			}
		}
		// 移动链表节点
		node := &LinkedNode{
			Next: current.Next,
			Data: data[i],
		}
		current.Next = node
	}
	out := []int{}
	// 输出数据都新数组
	for x := 0; x < len(bucket); x++ {
		bList := bucket[x]
		current := bList.Next
		for current != nil {
			out = append(out, current.Data)
			current = current.Next
		}
	}
	return out
}

// 基数排序
// 按位数分次排序
func (s *Sort) Radix(data []int) []int {
	count := len(data)
	//查找最大值
	for i := 0; i < count - 1; i++ {
		if data[i] > data[i+1] {
			tmp := data[i+1]
			data[i+1] = data[i]
			data[i] = tmp
		}
	}
	max := data[count - 1]
	// 最多的位数
	maxDigit := len(fmt.Sprintf("%d", max))

	// 每一位循环处理
	for digit := 1; digit <= maxDigit; digit++ {
		tmp := make([]int, max+1)
		for x := 0; x < count; x++ {
			d := s.digit(data[x], digit)
			tmp[d]++
		}
		// 对位数进行计数排序
		for y := 1; y < len(tmp); y++ {
			tmp[y] = tmp[y] + tmp[y - 1]
		}
		// 输出，必须倒着输出
		out := make([]int, count)
		for z := count-1; z >= 0; z-- {
			d := s.digit(data[z], digit)
			out[tmp[d] - 1] = data[z]
			tmp[d]--
		}
		data = out
	}
	return data
}

// 返回某个数第几位的数字
// e: 1346 第 1 位数字为 6
func (s *Sort) digit(number int, n int) int {
	x := math.Pow(10, float64(n - 1))
	return (number / int(x)) % 10
}

// 堆排序
func (s *Sort) Heap(data []int) []int {
	count := len(data)
	// 循环构建大顶堆
	for i := 0; i < count; i++ {
		// 构建大顶堆
		s.makeMaxHeap(count - i - 1, data)
		// 交换元素, 大顶堆的第一个元素和最后一个元素交换
		tmp := data[0]
		data[0] = data[count - i - 1]
		data[count - i - 1] = tmp
	}
	return data
}

// 构建大顶堆
func (s *Sort) makeMaxHeap(lastIndex int, data []int) {

	// 从最后一个元素的父节点开始
	for i := (lastIndex - 1) / 2; i >= 0; i-- {
		current := i
		for (current * 2 + 1) <= lastIndex {
			// 假设左节点最大
			bigIndex := (current * 2) + 1
			// 存在右节点
			if lastIndex > bigIndex {
				//比较左右节点
				if data[bigIndex+1] > data[bigIndex] {
					bigIndex++
				}
			}
			// 比较最大的叶子节点和当前节点
			if data[current] < data[bigIndex] {
				tmp := data[bigIndex]
				data[bigIndex] = data[current]
				data[current] = tmp

				current = bigIndex
			}else {
				break
			}
		}
	}
}