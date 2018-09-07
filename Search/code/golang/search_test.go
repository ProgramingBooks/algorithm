package golang

import (
	"fmt"
	"testing"
)

// Run Search Test: go test

var search = &Search{}

func TestSearch_Sequence(t *testing.T) {
	data := []int{11, 4, 17, 889, 26, 28, 3, 72}
	fmt.Printf("%s", "Sequence: ")
	fmt.Printf("%d|", search.Sequence(data, 4))
	fmt.Printf("%d|", search.Sequence(data, 10))
	fmt.Printf("%d|", search.Sequence(data, 3))
	fmt.Println()
}

func TestSearch_Binary(t *testing.T) {
	data := []int{1, 4, 7, 9, 26, 28, 33, 72}
	fmt.Printf("%s", "Binary: ")
	fmt.Printf("%d|", search.Binary(data, 4))
	fmt.Printf("%d|", search.Binary(data, 10))
	fmt.Printf("%d|", search.Binary(data, 33))
	fmt.Println()
}

func TestSearch_Interpolation(t *testing.T) {
	data := []int{1, 4, 7, 9, 26, 28, 33, 72}
	fmt.Printf("%s", "Interpolation: ")
	fmt.Printf("%d|", search.Interpolation(data, 4))
	fmt.Printf("%d|", search.Interpolation(data, 10))
	fmt.Printf("%d|", search.Interpolation(data, 33))
	fmt.Println()
}

func TestSearch_Fibonacci(t *testing.T) {
	data := []int{1, 4, 7, 9, 26, 28, 33, 72}
	fmt.Printf("%s", "Fibonacci: ")
	fmt.Printf("%d|", search.Fibonacci(data, 4))
	fmt.Printf("%d|", search.Fibonacci(data, 10))
	fmt.Printf("%d|", search.Fibonacci(data, 33))
	fmt.Println()
}

