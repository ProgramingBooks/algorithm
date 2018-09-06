package main

type Search struct {

}

// 二分查找
// data: 待查找的数组
// key: 待查找的 key
func (s *Search) Binary(data []int, key int) int {

	start := 0
	end := len(data)
	for start <= end {
		middle := (start + end) / 2
		if key > data[middle] {
			start = middle + 1
		}else if key < data[middle] {
			end = middle - 1
		}else {
			return middle
		}
	}
	return -1
}
