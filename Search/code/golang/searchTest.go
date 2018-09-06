package main

import "fmt"

// Run Search Test
func main() {

	search := &Search{}
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}

	// 二分查找
	fmt.Println(search.Binary(data, 4))
	fmt.Println(search.Binary(data, 10))
}


