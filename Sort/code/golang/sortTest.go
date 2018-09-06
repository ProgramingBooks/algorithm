package main

import (
	"strconv"
	"fmt"
	"strings"
)

// Run Sort Test
func main()  {

	sort := new(Sort)
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Select sort: "+printList(sort.Select(data)))
	data = []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Bubbling sort: "+printList(sort.Bubbling(data)))
	data = []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Insert sort: "+printList(sort.Insert(data)))
	data = []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("BinaryInsert sort: "+printList(sort.BinaryInsert(data)))
	data = []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Quick sort: "+printList(sort.Quick(data)))
	data = []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Merge sort: "+printList(sort.Merge(data)))
	data = []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Shell sort: "+printList(sort.Shell(data)))
	data = []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Count sort: "+printList(sort.Count(data)))
	data = []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Bucket sort: "+printList(sort.Bucket(data)))
	data = []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Radix sort: "+printList(sort.Radix(data)))
	data = []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Heap sort: "+printList(sort.Heap(data)))
}

func printList(data []int) string {
	str := ""
	for _, num := range data {
		str += strconv.FormatInt(int64(num), 10) + ","
	}
	return  strings.TrimRight(str, ",")
}

