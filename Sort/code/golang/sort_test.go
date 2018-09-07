package golang

import (
	"strconv"
	"fmt"
	"strings"
	"testing"
)

// Run Sort Test: go test

var sort = new(Sort)

func TestSort_Select(t *testing.T) {
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Select sort: "+printList(sort.Select(data)))
}

func TestSort_Bubbling(t *testing.T) {
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Bubbling sort: "+printList(sort.Bubbling(data)))
}

func TestSort_Insert(t *testing.T) {
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Insert sort: "+printList(sort.Insert(data)))
}

func TestSort_BinaryInsert(t *testing.T) {
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("BinaryInsert sort: "+printList(sort.BinaryInsert(data)))
}

func TestSort_Quick(t *testing.T) {
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Quick sort: "+printList(sort.Quick(data)))
}

func TestSort_Merge(t *testing.T) {
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Merge sort: "+printList(sort.Merge(data)))
}

func TestSort_Shell(t *testing.T) {
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Shell sort: "+printList(sort.Shell(data)))
}

func TestSort_Count(t *testing.T) {
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Count sort: "+printList(sort.Count(data)))
}

func TestSort_Bucket(t *testing.T) {
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Bucket sort: "+printList(sort.Bucket(data)))
}

func TestSort_Radix(t *testing.T) {
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Radix sort: "+printList(sort.Radix(data)))
}

func TestSort_Heap(t *testing.T) {
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Println("Heap sort: "+printList(sort.Heap(data)))
}

func printList(data []int) string {
	str := ""
	for _, num := range data {
		str += strconv.FormatInt(int64(num), 10) + ","
	}
	return  strings.TrimRight(str, ",")
}

