package main

import (
	"fmt"
)

// 排序算法的实现

type Sort struct {

}

// 选择排序
func (s *Sort) Select(data []int) ([]int) {
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
	tmp := data[0]

	for i := 1; i < count; i++ {
		if data[i] >= tmp {
			bigList = append(bigList, data[i])
		}else {
			smallList = append(smallList, data[i])
		}
	}

	s.Quick(bigList)
	s.Quick(smallList)

	res := append(smallList, tmp)
	res = append(res, bigList...)
	return res
}

// 归并排序
// 分而治之
func (s *Sort) Merge(data []int) []int {
	count := len(data)
	start := 0
	end := count - 1
	tmp := make([]int, len(data))
	s.merge(start, end, data, tmp)
	return tmp
}

// 循环拆分
func (s *Sort) merge(start int, end int, data []int, tmp []int) {

	for start < end {
		fmt.Println(start, end)
		if end == 1 {
			//os.Exit(100)
		}
		middle := (start + end) / 2
		// 左半部分
		s.merge(start, middle, data, tmp)
		// 右半部分
		s.merge(middle + 1, end, data, tmp)
		// 归并
		s.mergeList(start, middle, end, data, tmp)
	}
}

// 归并两个列表的数据
func (s *Sort) mergeList(start int, middle int, end int, data []int, tmp []int) {
	lstart := start
	lend := middle
	rstart := middle + 1
	rend := end
	//tmp := []int{}
	k := 0
	for (lstart <= lend) && (rstart <= rend) {
		fmt.Printf("ls:%d ld:%d rs:%d rd:%d \r\n", lstart, lend, rstart, rend)

		if data[lstart] > data[rstart] {
			tmp[k] = data[rstart]
			rstart++
			k++
		}else {
			tmp[k] = data[lstart]
			lstart++
			k++
		}
	}
	//  检查剩余部分
	for lstart <= lend {
		tmp[k] = data[lstart]
		lstart++
		k++
	}
	for rstart <= rend {
		tmp[k] = data[rstart]
		rstart++
		k++
	}

	fmt.Println(tmp)
	for x := 0; x < k; x++ {
		data[start+x] = tmp[x]
	}
}