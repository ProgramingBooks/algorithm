package main

type Search struct {

}


// 顺序查找
// data: 待查找的数组
// key: 待查找的 key
func (s *Search) Sequence(data []int, key int) int {
	count := len(data)
	for i := 0; i < count; i ++ {
		if data[i] == key {
			return i
		}
	}
	return -1
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

// 插值查找
// data: 待查找的数组
// key: 待查找的 key
func (s *Search) Interpolation(data []int, key int) int {
	start := 0
	end := len(data) - 1

	for start <= end {
		middle := start + (end - start) * (data[key] - data[start]) / (data[end] - data[start])
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

// 斐波那契查找
// data: 待查找的数组
// key: 待查找的 key
func (s *Search) Fibonacci(data []int, key int) int {
	start := 0
	count := len(data)
	end := count - 1

	// 构造一个斐波那契数组
	f := make([]int, 20)
	f[0] = 1
	f[1] = 1
	for i := 2; i < 20; i++ {
		f[i] = f[i - 1] + f[i -2]
	}

	// 查找 count 最接近的斐波那契数的位置
	var k int
	for k = 0; k < 20; k++ {
		if f[k] > count {
			break
		}
	}

	tmp := make([]int, f[k] - 1)
	// 补充数据，满足 f[k] - 1 = count
	for i := 0; i < f[k] - 1; i++ {
		if i < count {
			tmp[i] = data[i]
		}else {
			tmp[i] = data[end]
		}
	}

	// 循环比较
	for start <= end {
		middle := start + f[k -1] - 1
		if key > data[middle] {
			start = middle + 1
			k -= 2
		}else if key < data[middle] {
			end = middle - 1
			k -= 1
		}else {
			if start < count {
				return middle
			}else {
				return end
			}
		}
	}
	return -1
}