package main

import (
	"strconv"
	"fmt"
)

// 测试
func main()  {

	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	sort := new(Sort)
	// 选择排序
	fmt.Println("Select sort: "+printList(sort.Select(data)))
	fmt.Println("Bubbling sort: "+printList(sort.Bubbling(data)))
	fmt.Println("Insert sort: "+printList(sort.Insert(data)))
	fmt.Println("BinaryInsert sort: "+printList(sort.BinaryInsert(data)))
	fmt.Println("Quick sort: "+printList(sort.Quick(data)))
	fmt.Println("Merge sort: "+printList(sort.Merge(data)))
}

func printList(data []int) string {
	str := ""
	for _, num := range data {
		str += strconv.FormatInt(int64(num), 10) + ","
	}
	return  str
}

